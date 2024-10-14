<?php

// includes
require get_theme_file_path('/inc/posttypes.php');

// snazzyportfolio  files
function snazzyportfolio_files()
{
  wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/build/output.css'));
}

add_action('wp_enqueue_scripts', 'snazzyportfolio_files');

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

// snazzyportfolio_blocks

function snazzyportfolio_blocks()
{
  register_block_type_from_metadata(__DIR__ . '/build/intro');
  register_block_type_from_metadata(__DIR__ . '/build/introheadline');
  register_block_type_from_metadata(__DIR__ . '/build/introparagraph');
  register_block_type_from_metadata(__DIR__ . '/build/introsubheadline');
  register_block_type_from_metadata(__DIR__ . '/build/singleproject');
  register_block_type_from_metadata(__DIR__ . '/build/projecttitle');
  register_block_type_from_metadata(__DIR__ . '/build/projectsubtitle');
  register_block_type_from_metadata(__DIR__ . '/build/projectexcerpt');
  register_block_type_from_metadata(__DIR__ . '/build/projectparagraph');
  register_block_type_from_metadata(__DIR__ . '/build/projectimage');
  register_block_type_from_metadata(__DIR__ . '/build/projectlayout');
  register_block_type_from_metadata(__DIR__ . '/build/projectlayoutmaincontent');
  register_block_type_from_metadata(__DIR__ . '/build/projectlayoutsidecontent');
}

add_action('init', 'snazzyportfolio_blocks');
