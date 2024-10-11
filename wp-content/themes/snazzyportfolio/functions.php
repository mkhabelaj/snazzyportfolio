<?php

// snazzyportfolio  files
function snazzyportfolio_files()
{
  wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/build/output.css'));
}
// TODO: snazzyportfolio theme features

add_action('wp_enqueue_scripts', 'snazzyportfolio_files');
