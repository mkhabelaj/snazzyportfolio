<?php

require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/lib/theme_functions.php';
require_once get_template_directory() . '/lib/worm-model-generator.php';
require get_theme_file_path('/inc/posttypes.php');
require get_theme_file_path('/inc/taxonomies.php');
require get_theme_file_path('/inc/acf.php');

// snazzyportfolio  files
function snazzyportfolio_files()
{
    wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/lib/styles/theme/output.css'));
    add_editor_style('/lib/styles/theme/output.css');

    //TODO: fix this: This is specific to one block it should be handled
    //in the block itself(we could also make it a plugin)
    wp_enqueue_style(
        'prism-tomorrow',
        get_theme_file_uri('./node_modules/prismjs/themes/prism-tomorrow.css'),
    );
}

add_action('wp_enqueue_scripts', 'snazzyportfolio_files');
add_action("admin_init", 'snazzyportfolio_files');

function snazzyportfolio_features()
{
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('pageBanner', 1500, 350, true);
    add_image_size('projectLandscapeXXl', 1024, 450, true);
    add_image_size('projectLandscapeXl', 655, 410, true);
    add_image_size('projectLandscapeLg', 600, 375, true);
    add_image_size('projectLandscapeSm', 343, 201, true);
    add_editor_style('build/output.css');
}
add_action('after_setup_theme', 'snazzyportfolio_features');



function snazzyportfolio_blocks()
{
    $auto_block_register = new \Nzuridesigns\WPUtility\AutoBlockRegistrar(__DIR__);
    if (WP_DEBUG) {
        $auto_block_register->registerBlocksForDevelopmentMode();
    }
    if (!WP_DEBUG) {
        $auto_block_register->registerBuildBlocks();
    }
}

add_action('init', 'snazzyportfolio_blocks');

// pagination template
function snazzyportfolio_pagination()
{
    require get_theme_file_path('/inc/pagination.php');
}

/**
 * Programmatically assign the custom block template to a page and set it as the Posts Page.
 */
function assign_latest_blog_template()
{
    $page_title    = 'Latest Blog';             // The title of the page to search or create

    // Add a filter to search by title using a custom query variable.
    add_filter('posts_where', 'wpse_search_by_title', 10, 2);
    function wpse_search_by_title($where, $query)
    {
        global $wpdb;
        if ($title = $query->get('search_page_title')) {
            // Use an exact match for the post title.
            $where .= $wpdb->prepare(" AND {$wpdb->posts}.post_title = %s", $title);
        }
        return $where;
    }

    // Query to check if a page with the given title exists.
    $query = new WP_Query(array(
        'post_type'         => 'page',
        'post_status'       => 'publish',
        'posts_per_page'    => 1,
        'search_page_title' => $page_title, // Custom query variable used in our filter.
    ));

    // Remove the filter so it does not affect other queries.
    remove_filter('posts_where', 'wpse_search_by_title', 10, 2);

    if (!$query->have_posts()) {
        // update reading settings
        wp_insert_post(array(
            'post_title'   => $page_title,
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));
    }
}
// Run this function after the theme is set up.
add_action('after_setup_theme', 'assign_latest_blog_template');
