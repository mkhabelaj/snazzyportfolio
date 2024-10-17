<?php

// includes
require get_theme_file_path('/inc/posttypes.php');

// snazzyportfolio  files
function snazzyportfolio_files()
{
  wp_enqueue_style('snazzyportfolio_main_styles', get_theme_file_uri('/build/output.css'));
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


// TODO: Move this to a separate file && Add error handling
function auto_block_register($DIR, $build_dir, $src_dir)
{

  function get_paths($path)
  {
    $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::LEAVES_ONLY);

    $paths = [];
    $rel = [];
    foreach ($dir as $file) {
      if ($file->isFile() && $file->getFilename() === 'block.json') {
        $relesive_path = substr($file->getPath(), strlen($path));
        $paths[] = ['path' => $file->getPath(), 'rel' => $relesive_path];
        $rel[] = $relesive_path;
      }
    }

    return [
      'paths' => $paths,
      'rel' => $rel
    ];
  }
  $json_build_paths = get_paths($DIR . $build_dir);
  $json_src_paths = get_paths($DIR . $src_dir);

  $reconciled_paths = array_filter($json_build_paths['paths'], function ($json_path) use ($json_src_paths) {
    return in_array($json_path['rel'], $json_src_paths['rel']);
  });

  $reconciled_paths = array_map(function ($json_path) {
    return $json_path['path'];
  }, $reconciled_paths);

  foreach ($reconciled_paths as $json_path) {
    register_block_type_from_metadata($json_path);
  }
}

// snazzyportfolio_blocks

function snazzyportfolio_blocks()
{
  auto_block_register(__DIR__, '/build', '/src');
}

add_action('init', 'snazzyportfolio_blocks');

// pagination template
function snazzyportfolio_pagination()
{
  require get_theme_file_path('/inc/pagination.php');
}
