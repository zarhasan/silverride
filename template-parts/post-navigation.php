<?php

$prev_link = get_previous_post_link('%link');
$next_link = get_next_post_link('%link');

?>

<div class="list-none m-0 p-0 flex justify-between items-center lg:flex-nowrap gap-4 bg-background-900 my-4 mt-8 w-full">
    <?php if(!empty($prev_link)): ?>
        <div class="w-full lg:w-1/2 text-frost-900 bg-frost-0 border-1 border-frost-200 border-solid py-6 self-stretch transition-all ease-out-expo">
            <p class="flex justify-start items-center font-sm mb-1 gap-2">
                <span class="w-4 h-auto flex justify-start item-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                </span> 
                
                <?php esc_html_e('Previous', 'wp-documentation'); ?>
            </p>
            <span class="text-underline font-semibold hover:underline">
                <?php echo next_post_link('%link'); ?>
            </span>
        </div>
    <?php endif; ?>

    <?php if(!empty($next_link)): ?>
        <div class="w-full lg:w-1/2 text-right ml-auto text-frost-900 bg-frost-0 border-1 border-frost-200 border-solid py-6 self-stretch transition-all ease-out-expo">
            <p class="flex justify-end items-center text-end font-sm mb-1 gap-2">
                <?php esc_html_e('Next', 'wp-documentation'); ?>

                <span class="w-4 h-auto flex justify-end item-center">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
                </span>
            </p>
            <span class="text-underline font-semibold hover:underline">
                <?php previous_post_link('%link'); ?>            
            </span>
        </div>
    <?php endif; ?>
</div>
