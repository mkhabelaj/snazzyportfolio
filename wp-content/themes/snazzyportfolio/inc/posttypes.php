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
      "thumbnail",
      "excerpt",
    ],
    "taxonomies" => ["category", "post_tag"],
  ]);
}

add_action('init', 'snazzyportfolio_post_types');

function include_custom_post_types_in_tag_archive($query)
{
  // Check if it's the main query, a tag archive, and not in the admin area
  if (! is_admin() && $query->is_main_query() && is_tag()) {
    // Add your custom post type to the query
    $query->set('post_type', array('post', 'project')); // Include both 'post' and your custom post type
  }
}

add_action('pre_get_posts', 'include_custom_post_types_in_tag_archive');
