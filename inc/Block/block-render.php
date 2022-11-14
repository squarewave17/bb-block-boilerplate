<?php

/**
 * Function to handle rendering the Boilerplate block on the frontend.
 * 
 * @param array  $attributes - Block attributes.
 * @param string $content - Block Content.
 */
function bigbite_render_boilerplate_block($content)
{
    include plugin_dir_path(__DIR__) . 'allowed-tags-args.php';
    $wrapper_attributes = get_block_wrapper_attributes();

    return sprintf(
        '<div %1$s>%2$s Boilerplate Frontend</div>',
        $wrapper_attributes,
        wp_kses($content, $allowed_tags)
    );
}
