<?php
$attributes;
$container_classes = $attributes['container'];
$content_classes = $attributes['content'];
?>
<div class="<?php echo $container_classes; ?>">
  <p class="sp-text-md sp-italic sp-whitespace-pre-wrap sp-my-5 sp-font-medium sp-leading-tight <?php echo $content_classes; ?>"
  ><?php echo get_the_excerpt();?></p>
</div>
