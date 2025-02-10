<?php

/**
 * Get image URL by ID
 * trigger_error if image ID is invalid
 *
 * @param int $id
 * @param string $size
 * @return string Image URL
 */
function snazzyposnazzyportfolio_get_image_url_by_id($id, $size = 'projectLandscapeLg'): string
{
    $url = wp_get_attachment_image_url($id, $size);
    if ($url) {
        return $url;
    }
    trigger_error('Invalid image ID: ' . $id);
}
