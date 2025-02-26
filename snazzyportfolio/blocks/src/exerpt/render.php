<?php
$attributes;
$container_classes = $attributes['container'];
$content_classes = $attributes['content'];
$marginB = $attributes['marginB'];
?>
<div class="<?php echo $container_classes; ?> <?php echo $marginB; ?>">
  <p class="sp-text-lg sp-italic sp-whitespace-pre-wrap sp-font-bold sp-leading-relaxed $marginB <?php echo $content_classes; ?>"
  ><?php echo get_the_excerpt();?></p>
</div>
