<?php

if (!isset($attributes['imgID']) || !isset($attributes['size'])) {
    return;
}
$id = $attributes['imgID'];
$size = $attributes['size'];
$center = $attributes['center'];
$fullWidth = $attributes['fullWidth'];
$autoHeight = $attributes['autoHeight'];
$marginB = $attributes['marginB'];
$image_url = null;
$containerClassExtra = '';
$imgClassExtra = '';

if ($center) {
    $containerClassExtra .= ' sp-items-center';
}
if ($fullWidth) {
    $imgClassExtra .= ' sp-w-full';
}
if ($autoHeight) {
    $imgClassExtra .= ' sp-h-auto';
}


switch ($size) {
    case 'sm':
        $image_url = snazzyposnazzyportfolio_get_image_url_by_id($id, 'projectLandscapeSm');
        break;
    case 'lg':
        $image_url = snazzyposnazzyportfolio_get_image_url_by_id($id, 'projectLandscapeLg');
        break;
    case 'xl':
        $image_url = snazzyposnazzyportfolio_get_image_url_by_id($id, 'projectLandscapeXl');
        break;
    case '2xl':
        $image_url = snazzyposnazzyportfolio_get_image_url_by_id($id, 'projectLandscapeXXl');
        break;
    case '3xl':
        $image_url = snazzyposnazzyportfolio_get_image_url_by_id($id, 'pageBanner');
        break;
    default:
        trigger_error('Invalid image size: ' . $size);
        break;
}

?>
<div class="sp-flex sp-flex-col <?= $marginB; ?> <?= $containerClassExtra; ?> ">
  <div class="<?= $imgClassExtra; ?>">
    <img class="<?= $imgClassExtra; ?>" src="<?php echo $image_url; ?>" alt="Image">
  </div>
</div>
