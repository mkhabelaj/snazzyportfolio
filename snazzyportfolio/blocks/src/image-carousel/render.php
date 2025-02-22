<?php

if (!isset($attributes['images']) || !isset($attributes['imageSize'])) {
    return;
}

$images = $attributes['images'];
$imageSize = $attributes['imageSize'];
$config = $attributes['config'];
$marginB = $attributes['marginB'];

$image_urls = array_map(function ($image) use ($imageSize) {
    return snazzyposnazzyportfolio_get_image_url_by_id($image['id'], $imageSize);
}, $images);

if (empty($image_urls)) {
    return;
}

?>
<div  
  data-wp-interactive="imageGallery"

  <?php if ($marginB) : ?>
  class="sp-mb-4"
  <?php endif; ?>

  <?= wp_interactivity_data_wp_context(["config" => $config]) ?>
>

<div class="glide" data-wp-run--glide="callbacks.loadGlide">
    <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
    <?php foreach ($image_urls as $image_url) : ?>
        <li class="glide__slide">
          <img src="<?= $image_url ?>" />
        </li>
    <?php endforeach; ?>
    </ul>
    </div>

  <div class="glide__bullets" data-glide-el="controls[nav]">
    <?php foreach ($image_urls as $index => $image) : ?>
    <button class="glide__bullet" data-glide-dir="=<?= $index ?>"></button>
    <?php endforeach; ?>
  </div>
</div>
</div>

