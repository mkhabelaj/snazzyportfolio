<?php

new Nzuridesigns\WPUtility\CustomPostType('project', 'projects', 'Projects', [
  'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
  'description' => 'Projects for Snazzy Portfolio',
  'menu_icon' => 'dashicons-portfolio',
]);

new Nzuridesigns\WPUtility\CustomPostType('timeline', 'timeline', 'Timeline', [
  'supports' => ['title'],
  'taxonomies' => ['category', 'post_tag'],
  'description' => 'Timeline for Snazzy Portfolio',
  'menu_icon' => 'dashicons-clock',
]);


function include_custom_post_types_in_tag_archive($query)
{
    // Check if it's the main query, a tag archive, and not in the admin area
    if (! is_admin() && $query->is_main_query() && is_tag()) {
        // Add your custom post type to the query
        $query->set('post_type', array('post', 'project')); // Include both 'post' and your custom post type
    }
}

add_action('pre_get_posts', 'include_custom_post_types_in_tag_archive');
