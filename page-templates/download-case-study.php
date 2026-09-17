<?php
/**
 * Template Name: Download Case Study
 *
 * Serves a page's case study PDF as a download: /download-case-study?id={page-id}&submission_id={forminator-entry-id}
 * Reads the pdf_file field from the page given by ?id= after verifying the Forminator submission.
 */

function silverride_case_study_404() {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    get_template_part('404');
    exit;
}

$page_id = isset($_GET['id']) ? absint($_GET['id']) : 0;
$submission_id = isset($_GET['submission_id']) ? absint($_GET['submission_id']) : 0;

if (!$page_id || !$submission_id) {
    silverride_case_study_404();
}

if (!class_exists('Forminator_Form_Entry_Model')) {
    silverride_case_study_404();
}

$entry = new Forminator_Form_Entry_Model($submission_id);
if (empty($entry->entry_id) || !empty($entry->is_spam)) {
    silverride_case_study_404();
}

$file = function_exists('get_field') ? get_field('pdf_file', $page_id) : false;

$file_id = 0;
$file_url = '';
if (is_array($file)) {
    $file_id = isset($file['ID']) ? absint($file['ID']) : 0;
    $file_url = $file['url'] ?? '';
} elseif (is_numeric($file)) {
    $file_id = absint($file);
    $file_url = function_exists('wp_get_attachment_url') ? wp_get_attachment_url($file_id) : '';
}

if (!$file_id || !$file_url || get_post_mime_type($file_id) !== 'application/pdf') {
    silverride_case_study_404();
}

$path = get_attached_file($file_id);
if (!$path || !is_readable($path)) {
    wp_redirect(esc_url_raw($file_url));
    exit;
}

nocache_headers();
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . wp_basename($path) . '"');
header('Content-Length: ' . filesize($path));
readfile($path);
exit;
