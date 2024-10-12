<?php

function snazzyportfolio_post_types()
{
  register_post_type('project', [
    'rewrite' => [
      'slug' => 'projects'
    ],
    'show_in_rest' => true,
    'has_archive' => true,
    'public' => true, // Todo: change to false after development
    "description" => "Projects for Snazzy Portfolio",
    "menu_icon" => "dashicons-portfolio",
    "labels" => [
      "name" => "Projects",
      "singular_name" => "Project",
      "menu_name" => "Projects",
      "all_items" => "All Projects",
      "add_new" => "Add New",
      "add_new_item" => "Add New Project",
      "edit_item" => "Edit Project",
      "new_item" => "New Project",
      "view_item" => "View Project",
      "search_items" => "Search Projects",
      "not_found" => "No projects found",
      "not_found_in_trash" => "No projects found in Trash",
    ],
    "supports" => [
      "title",
      "editor",
      "thumbnail"
    ],
  ]);
}

add_action('init', 'snazzyportfolio_post_types');
