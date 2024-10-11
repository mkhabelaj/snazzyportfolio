<?php

// snazzyportfolio  files
function snazzyportfolio_files()
{
  wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/build/output.css'));
}

add_action('wp_enqueue_scripts', 'snazzyportfolio_files');

// TODO: snazzyportfolio theme features
function snazzyportfolio_features()
{
  add_theme_support('editor-styles');
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
}

add_action('init', 'snazzyportfolio_blocks');
