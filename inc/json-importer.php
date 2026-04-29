<?php

add_action('admin_menu', 'silverride_json_importer_menu');
add_action('wp_ajax_silverride_import_start', 'silverride_json_import_start');
add_action('wp_ajax_silverride_import_batch', 'silverride_json_import_batch');
add_action('wp_ajax_silverride_import_finalize', 'silverride_json_import_finalize');

define('ACCESSIBLEMINDS_IMPORT_BATCH_SIZE', 5);

function silverride_json_importer_menu() {
    add_management_page(
        'JSON Page Importer',
        'JSON Page Importer',
        'manage_options',
        'json-page-importer',
        'silverride_json_importer_page'
    );
}

function silverride_json_importer_page() {
    $json_dir = get_template_directory() . '/src/json';
    $imported_dir = $json_dir . '/imported';
    $json_files = glob($json_dir . '/*.json');
    $imported_files = glob($imported_dir . '/*.json');

    $revert_message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['revert_json_files'])) {
        check_admin_referer('revert_json_files');
        $files_to_revert = array_map('sanitize_file_name', $_POST['revert_json_files']);
        $reverted = array();
        foreach ($files_to_revert as $filename) {
            $src = $imported_dir . '/' . $filename;
            $dst = $json_dir . '/' . $filename;
            if (file_exists($src) && rename($src, $dst)) {
                $reverted[] = $filename;
            }
        }
        $revert_message = $reverted
            ? sprintf('Reverted %d file(s): %s', count($reverted), implode(', ', $reverted))
            : 'No files were reverted.';
        $json_files = glob($json_dir . '/*.json');
        $imported_files = glob($imported_dir . '/*.json');
    }

    ?>
    <div class="wrap">
        <h1>JSON Page Importer</h1>

        <?php if ($revert_message): ?>
            <div class="notice notice-success"><p><?php echo esc_html($revert_message); ?></p></div>
        <?php endif; ?>

        <div id="import-feedback" class="notice" style="display:none;"><p id="import-feedback-msg"></p></div>
        <div id="import-progress-wrap" style="display:none;margin:10px 0;">
            <div style="background:#ddd;border-radius:4px;overflow:hidden;">
                <div id="import-progress-bar" style="height:24px;background:#2271b1;width:0%;transition:width 0.3s;"></div>
            </div>
            <p id="import-progress-text">Preparing...</p>
        </div>

        <form id="import-form">
            <?php wp_nonce_field('silverride_json_import', 'import_nonce'); ?>
            <h2>Available JSON Files</h2>
            <?php if (empty($json_files)): ?>
                <p>No JSON files found in <?php echo esc_html($json_dir); ?></p>
            <?php else: ?>
                <table class="widefat fixed striped">
                    <thead><tr><th style="width:40px;"><input type="checkbox" id="select-all" /></th><th>Filename</th></tr></thead>
                    <tbody>
                        <?php foreach ($json_files as $file): ?>
                            <tr>
                                <td><input type="checkbox" name="files[]" value="<?php echo esc_attr(basename($file)); ?>" /></td>
                                <td><?php echo esc_html(basename($file)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="submit">
                    <button type="submit" id="import-btn" class="button button-primary">Import Selected</button>
                    <span id="import-spinner" class="spinner" style="float:none;"></span>
                </p>
            <?php endif; ?>
        </form>

        <hr />

        <form method="post" id="revert-form">
            <?php wp_nonce_field('revert_json_files'); ?>
            <h2>Imported Files</h2>
            <?php if (empty($imported_files)): ?>
                <p>No imported files found.</p>
            <?php else: ?>
                <table class="widefat fixed striped">
                    <thead><tr><th style="width:40px;"><input type="checkbox" id="select-all-revert" /></th><th>Filename</th><th>Page</th></tr></thead>
                    <tbody>
                        <?php foreach ($imported_files as $file): ?>
                            <?php
                            $filename = basename($file);
                            $slug = sanitize_title(pathinfo($filename, PATHINFO_FILENAME));
                            $page = get_page_by_path($slug);
                            ?>
                            <tr>
                                <td><input type="checkbox" name="revert_json_files[]" value="<?php echo esc_attr($filename); ?>" /></td>
                                <td><?php echo esc_html($filename); ?></td>
                                <td>
                                    <?php if ($page): ?>
                                        <a href="<?php echo esc_url(get_permalink($page)); ?>">View</a>
                                        | <a href="<?php echo esc_url(get_edit_post_link($page->ID, 'raw')); ?>">Edit</a>
                                        (<?php echo esc_html($page->post_status); ?>)
                                    <?php else: ?>
                                        &mdash;
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="submit"><input type="submit" name="revert_submit" class="button" value="Revert Selected Files" /></p>
            <?php endif; ?>
        </form>
    </div>

    <script>
    jQuery(function($) {
        $('#select-all, #select-all-revert').on('change', function() {
            $(this).closest('table').find('tbody input[type="checkbox"]').prop('checked', this.checked);
        });

        $('#import-form').on('submit', function(e) {
            e.preventDefault();
            var files = [];
            $('input[name="files[]"]:checked').each(function() { files.push($(this).val()); });
            if (!files.length) { alert('Select at least one file.'); return; }

            var $fb = $('#import-feedback'), $msg = $('#import-feedback-msg');
            var $pw = $('#import-progress-wrap'), $pb = $('#import-progress-bar'), $pt = $('#import-progress-text');
            var $btn = $('#import-btn'), $sp = $('#import-spinner');

            $fb.removeClass('notice-error notice-success notice-info').addClass('notice-info').show();
            $msg.text('Starting import...');
            $pw.show(); $pt.text('Preparing...'); $pb.css('width','0%');
            $btn.prop('disabled',true); $sp.addClass('is-active');

            $.ajax({
                url: ajaxurl, type: 'POST',
                data: { action: 'silverride_import_start', nonce: $('#import_nonce').val(), files: files }
            }).done(function(r) {
                if (!r.success) { show_error(r.data); return; }
                var d = r.data, total = d.total_images || 0;
                if (!total || d.unresolved_images === 0) { finalize(d.import_id); return; }
                process_batch(d.import_id, 0, d.total_images, d.unresolved_images);
            }).fail(function() { show_error('Connection error. Please try again.'); });

            function process_batch(importId, done, total, unresolved) {
                $pt.text('Downloading images ' + done + ' / ' + total + '...');
                var pct = total > 0 ? Math.round((done / total) * 100) : 0;
                $pb.css('width', pct + '%');
                $.ajax({
                    url: ajaxurl, type: 'POST',
                    data: { action: 'silverride_import_batch', nonce: $('#import_nonce').val(), import_id: importId }
                }).done(function(r) {
                    if (!r.success) { show_error(r.data || 'Error processing images.'); return; }
                    var bd = r.data;
                    done = bd.processed || done;
                    unresolved = bd.remaining !== undefined ? bd.remaining : unresolved;
                    $pb.css('width', Math.round((done / total) * 100) + '%');
                    if (bd.done) {
                        finalize(importId);
                    } else {
                        process_batch(importId, done, total, unresolved);
                    }
                }).fail(function() { show_error('Connection error during image download. Some images may be missing.'); });
            }

            function finalize(importId) {
                $pt.text('Finalizing import...');
                $pb.css('width','90%');
                $.ajax({
                    url: ajaxurl, type: 'POST',
                    data: { action: 'silverride_import_finalize', nonce: $('#import_nonce').val(), import_id: importId }
                }).done(function(r) {
                    var results = (r.success && r.data && r.data.results) ? r.data.results : [];
                    var links = [];
                    $.each(results, function(i, pg) {
                        if (pg.success) {
                            links.push(pg.edit_link ? '<a href="' + pg.edit_link + '">' + pg.title + '</a>' : pg.title);
                        }
                    });
                    $fb.removeClass('notice-info notice-error').addClass('notice-success');
                    $msg.html('Successfully imported ' + links.length + ' page(s): ' + links.join(', '));
                    $pb.css('width','100%'); $pt.text('Complete!');
                    $btn.prop('disabled',false); $sp.removeClass('is-active');
                    setTimeout(function() { location.reload(); }, 3000);
                }).fail(function() { show_error('Error finalizing import. Check pages manually.'); });
            }

            function show_error(msg) {
                $fb.removeClass('notice-info notice-success').addClass('notice-error');
                $msg.text(msg || 'Unknown error.');
                $pw.hide();
                $btn.prop('disabled',false); $sp.removeClass('is-active');
            }
        });
    });
    </script>
    <?php
}

// ─── AJAX: Start Import ──────────────────────────────────────────────────────

function silverride_json_import_start() {
    check_ajax_referer('silverride_json_import', 'nonce');

    if (get_transient('silverride_import_lock')) {
        wp_send_json_error('An import is already in progress. Please wait for it to finish.');
    }

    if (empty($_POST['files']) || !is_array($_POST['files'])) {
        wp_send_json_error('No files selected.');
    }

    set_transient('silverride_import_lock', true, 5 * MINUTE_IN_SECONDS);

    $json_dir = get_template_directory() . '/src/json';
    $files = array_map('sanitize_file_name', $_POST['files']);
    $import_id = uniqid('ji_');
    $pages = array();
    $all_images = array();
    $dedup_map = silverride_build_dedup_map();

    foreach ($files as $filename) {
        $filepath = $json_dir . '/' . $filename;
        if (!file_exists($filepath)) continue;

        $json_content = file_get_contents($filepath);
        $data = json_decode($json_content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            delete_transient('silverride_import_lock');
            wp_send_json_error('Invalid JSON in ' . $filename . ': ' . json_last_error_msg());
        }

        if (empty($data['page_title'])) {
            delete_transient('silverride_import_lock');
            wp_send_json_error('Missing page_title in ' . $filename);
        }

        $slug = sanitize_title(pathinfo($filename, PATHINFO_FILENAME));
        $existing = get_page_by_path($slug);
        if ($existing && $existing->post_status !== 'trash') {
            wp_trash_post($existing->ID);
        }

        $page_id = wp_insert_post(array(
            'post_title'  => $data['page_title'],
            'post_name'   => $slug,
            'post_content' => '',
            'post_status' => 'draft',
            'post_type'   => 'page',
        ));

        if (is_wp_error($page_id)) {
            delete_transient('silverride_import_lock');
            wp_send_json_error('Error creating page: ' . $page_id->get_error_message());
        }

        if (!empty($data['page_template'])) {
            update_post_meta($page_id, '_wp_page_template', $data['page_template']);
        }

        $source_url = !empty($data['source_url']) ? $data['source_url'] : '';

        $images = array();
        if (!empty($data['sections'])) {
            silverride_collect_images($data['sections'], $source_url, $images);
        }

        $pages[] = array(
            'page_id'    => $page_id,
            'title'      => $data['page_title'],
            'filename'   => $filename,
            'source_url' => $source_url,
            'sections'   => $data['sections'],
        );

        foreach ($images as $url => $info) {
            if (!isset($all_images[$url])) {
                $all_images[$url] = array(
                    'url'      => $info['url'],
                    'alt'      => $info['alt'],
                    'resolved' => isset($dedup_map[$url]) ? $dedup_map[$url] : null,
                );
            }
        }
    }

    $import_data = array(
        'pages'     => $pages,
        'images'    => $all_images,
        'dedup_map' => $dedup_map,
    );

    if (!silverride_save_import_state($import_id, $import_data)) {
        delete_transient('silverride_import_lock');
        wp_send_json_error('Failed to save import state.');
    }

    $total = count($all_images);
    $already = 0;
    foreach ($all_images as $url => $info) {
        if ($info['resolved'] !== null) $already++;
    }

    wp_send_json_success(array(
        'import_id'          => $import_id,
        'total_images'       => $total,
        'unresolved_images'  => $total - $already,
        'already_sideloaded' => $already,
    ));
}

// ─── AJAX: Process Batch ───────────────────────────────────────────────────────

function silverride_json_import_batch() {
    check_ajax_referer('silverride_json_import', 'nonce');

    $import_id = sanitize_text_field($_POST['import_id']);
    $import_data = silverride_load_import_state($import_id);
    if (!$import_data) {
        wp_send_json_error('Import session expired. Please start over.');
    }

    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    @set_time_limit(120);

    $batch_size = ACCESSIBLEMINDS_IMPORT_BATCH_SIZE;
    $dedup_map = $import_data['dedup_map'];
    $processed = 0;
    $total = count($import_data['images']);

    foreach ($import_data['images'] as $url => &$info) {
        if ($info['resolved'] !== null) {
            $processed++;
            continue;
        }

        if ($batch_size <= 0) break;

        $attachment_id = silverride_sideload_image($info['url'], 0, $info['alt'], $dedup_map);

        if (is_wp_error($attachment_id)) {
            error_log('JSON Importer: Failed to sideload ' . $info['url'] . ': ' . $attachment_id->get_error_message());
            $info['resolved'] = 0;
        } else {
            $info['resolved'] = $attachment_id;
            $dedup_map[$info['url']] = $attachment_id;
        }

        $processed++;
        $batch_size--;
    }
    unset($info);

    $import_data['dedup_map'] = $dedup_map;
    silverride_save_import_state($import_id, $import_data);

    $remaining = 0;
    foreach ($import_data['images'] as $url => $info) {
        if ($info['resolved'] === null) $remaining++;
    }

    wp_send_json_success(array(
        'processed' => $processed,
        'total'     => $total,
        'remaining' => $remaining,
        'done'      => ($remaining === 0),
    ));
}

// ─── AJAX: Finalize Import ─────────────────────────────────────────────────────

function silverride_json_import_finalize() {
    check_ajax_referer('silverride_json_import', 'nonce');

    $import_id = sanitize_text_field($_POST['import_id']);
    $import_data = silverride_load_import_state($import_id);
    if (!$import_data) {
        wp_send_json_error('Import session expired. Please start over.');
    }

    $json_dir = get_template_directory() . '/src/json';
    $imported_dir = $json_dir . '/imported';
    $results = array();

    foreach ($import_data['pages'] as $page_info) {
        $sections = $page_info['sections'];
        $source_url = $page_info['source_url'];
        $page_id = $page_info['page_id'];

        silverride_replace_image_ids($sections, $import_data['images'], $source_url);

        if ($source_url) {
            $dest_url = home_url();
            silverride_rewrite_source_urls($sections, $source_url, $dest_url);
        }

        if (function_exists('update_field')) {
            update_field('field_68ce8cffb2dc4', $sections, $page_id);
        }

        if (!file_exists($imported_dir)) {
            mkdir($imported_dir, 0755, true);
        }
        $filepath = $json_dir . '/' . $page_info['filename'];
        if (file_exists($filepath)) {
            rename($filepath, $imported_dir . '/' . $page_info['filename']);
        }

        $results[] = array(
            'success'   => true,
            'title'     => $page_info['title'],
            'page_id'   => $page_id,
            'edit_link' => get_edit_post_link($page_id, 'raw'),
        );
    }

    silverride_delete_import_state($import_id);
    delete_transient('silverride_import_lock');

    wp_send_json_success(array('results' => $results));
}

// ─── Import State Persistence ─────────────────────────────────────────────────

function silverride_get_import_dir() {
    $upload_dir = wp_upload_dir();
    $dir = $upload_dir['basedir'] . '/json-importer';
    if (!file_exists($dir)) {
        wp_mkdir_p($dir);
    }
    if (!file_exists($dir . '/index.php')) {
        file_put_contents($dir . '/index.php', '<?php // Silence is golden.');
    }
    if (!file_exists($dir . '/.htaccess')) {
        file_put_contents($dir . '/.htaccess', 'Deny from all');
    }
    return $dir;
}

function silverride_save_import_state($import_id, $data) {
    $dir = silverride_get_import_dir();
    $filepath = $dir . '/' . $import_id . '.json';
    $result = file_put_contents($filepath, wp_json_encode($data));
    set_transient('json_import_state_' . $import_id, $filepath, HOUR_IN_SECONDS);
    return $result !== false;
}

function silverride_load_import_state($import_id) {
    $filepath = get_transient('json_import_state_' . $import_id);
    if (!$filepath || !file_exists($filepath)) return null;
    $content = file_get_contents($filepath);
    return json_decode($content, true);
}

function silverride_delete_import_state($import_id) {
    $filepath = get_transient('json_import_state_' . $import_id);
    if ($filepath && file_exists($filepath)) {
        @unlink($filepath);
    }
    delete_transient('json_import_state_' . $import_id);
}

function silverride_cleanup_import_states() {
    $dir = silverride_get_import_dir();
    $files = glob($dir . '/ji_*.json');
    $cutoff = time() - HOUR_IN_SECONDS;
    foreach ($files as $file) {
        if (filemtime($file) < $cutoff) {
            @unlink($file);
        }
    }
}

// ─── Deduplication Map ─────────────────────────────────────────────────────────

function silverride_build_dedup_map() {
    global $wpdb;
    $map = array();
    $rows = $wpdb->get_results(
        "SELECT post_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_source_url'"
    );
    foreach ($rows as $row) {
        $map[$row->meta_value] = (int) $row->post_id;
    }
    return $map;
}

// ─── Recursive Image Collection ────────────────────────────────────────────────

function silverride_collect_images($data, $source_url, &$images) {
    if (!is_array($data)) return;

    if (silverride_is_image_object($data)) {
        $url = $data['url'];
        if (!preg_match('#^https?://#i', $url) && $source_url) {
            $url = rtrim($source_url, '/') . '/' . ltrim($url, '/');
        }
        if (preg_match('#^https?://#i', $url)) {
            $images[$url] = array('url' => $url, 'alt' => isset($data['alt']) ? $data['alt'] : '');
        }
        return;
    }

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            silverride_collect_images($value, $source_url, $images);
        } elseif (is_string($value) && !empty($value) && in_array($key, array('image', 'icon'), true)) {
            $url = $value;
            if (!preg_match('#^https?://#i', $url) && $source_url) {
                $url = rtrim($source_url, '/') . '/' . ltrim($url, '/');
            }
            if (preg_match('#^https?://#i', $url)) {
                $images[$url] = array('url' => $url, 'alt' => '');
            }
        }
    }
}

function silverride_is_image_object($data) {
    if (!is_array($data)) return false;
    if (!isset($data['url']) || !is_string($data['url']) || empty($data['url'])) return false;
    if (isset($data['target'])) return false;
    if (isset($data['title']) && !isset($data['alt'])) return false;
    $url = $data['url'];
    return (bool) (preg_match('/\.(jpe?g|png|gif|webp|svg|bmp|ico)/i', $url)
        || strpos($url, '/uploads/') !== false);
}

// ─── Recursive Image ID Replacement ────────────────────────────────────────────

function silverride_replace_image_ids(&$data, $resolved_images, $source_url = '') {
    if (!is_array($data)) return;

    if (silverride_is_image_object($data)) {
        $url = $data['url'];
        if (!preg_match('#^https?://#i', $url) && $source_url) {
            $url = rtrim($source_url, '/') . '/' . ltrim($url, '/');
        }
        if (isset($resolved_images[$url]) && intval($resolved_images[$url]['resolved']) > 0) {
            $data = intval($resolved_images[$url]['resolved']);
        }
        return;
    }

    foreach ($data as $key => &$value) {
        if (is_array($value)) {
            silverride_replace_image_ids($value, $resolved_images, $source_url);
        } elseif (is_string($value) && !empty($value) && in_array($key, array('image', 'icon'), true)) {
            $url = $value;
            if (!preg_match('#^https?://#i', $url) && $source_url) {
                $url = rtrim($source_url, '/') . '/' . ltrim($url, '/');
            }
            if (isset($resolved_images[$url]) && intval($resolved_images[$url]['resolved']) > 0) {
                $value = intval($resolved_images[$url]['resolved']);
            }
        }
    }
    unset($value);
}

// ─── Source URL Rewriting ─────────────────────────────────────────────────────

function silverride_rewrite_source_urls(&$data, $source_url, $dest_url) {
    if (is_string($data)) {
        $source = rtrim($source_url, '/');
        $dest = rtrim($dest_url, '/');
        if ($source && $dest && $source !== $dest) {
            $data = str_replace($source . '/', $dest . '/', $data);
            $data = str_replace($source, $dest, $data);
        }
        return;
    }

    if (is_array($data)) {
        foreach ($data as $key => &$value) {
            silverride_rewrite_source_urls($value, $source_url, $dest_url);
        }
        unset($value);
    }
}

// ─── Image Sideload ────────────────────────────────────────────────────────────

function silverride_sideload_image($url, $post_id = 0, $alt_text = '', &$dedup_map = null) {
    if ($dedup_map !== null && isset($dedup_map[$url])) {
        return $dedup_map[$url];
    }

    $tmp = download_url($url, 30);
    if (is_wp_error($tmp)) {
        return $tmp;
    }

    $url_path = wp_parse_url($url, PHP_URL_PATH);
    $filename = $url_path ? sanitize_file_name(basename($url_path)) : 'imported-image.jpg';
    if (!preg_match('/\.(jpe?g|png|gif|webp|svg|bmp|ico)$/i', $filename)) {
        $filename .= '.jpg';
    }

    $file_array = array('name' => $filename, 'tmp_name' => $tmp);
    $attachment_id = media_handle_sideload($file_array, $post_id);

    if (is_wp_error($attachment_id)) {
        @unlink($file_array['tmp_name']);
        return $attachment_id;
    }

    update_post_meta($attachment_id, '_source_url', $url);
    if ($alt_text) {
        update_post_meta($attachment_id, '_wp_attachment_image_alt', sanitize_text_field($alt_text));
    }
    if ($dedup_map !== null) {
        $dedup_map[$url] = $attachment_id;
    }

    return $attachment_id;
}