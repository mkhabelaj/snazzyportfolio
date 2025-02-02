<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once get_template_directory() . '/lib/worm-model-generator.php';
require get_theme_file_path('/inc/posttypes.php');
require get_theme_file_path('/inc/taxonomies.php');

// snazzyportfolio  files
function snazzyportfolio_files()
{
    wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/lib/styles/output.css'));
    add_editor_style('build/output.css');
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
    add_image_size('projectLandscapeLg', 600, 375, true);
    add_image_size('projectLandscapeSm', 343, 201, true);
    add_editor_style('build/output.css');
}
add_action('after_setup_theme', 'snazzyportfolio_features');



function snazzyportfolio_blocks()
{
    $auto_block_register = new \Nzuridesigns\WPUtility\AutoBlockRegistrar(__DIR__);
    $auto_block_register->registerBlocks();
}

add_action('init', 'snazzyportfolio_blocks');

// pagination template
function snazzyportfolio_pagination()
{
    require get_theme_file_path('/inc/pagination.php');
}
