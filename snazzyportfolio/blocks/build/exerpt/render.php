<?php
$attributes;
$container_classes = $attributes['container'];
$content_classes = $attributes['content'];
?>
<div class="<?php echo $container_classes; ?>">
  <p class="sp-text-lg sp-italic sp-whitespace-pre-wrap sp-font-bold sp-leading-relaxed sp-mb-4 <?php echo $content_classes; ?>"
  ><?php echo get_the_excerpt();?></p>
</div>
