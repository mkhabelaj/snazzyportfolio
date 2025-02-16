<?php
$attributes;
$info_block_type = $attributes['type'];
$content = $attributes['content'];

$icon_manager = \Nzuridesigns\WPUtility\ThemeIconManager::getInstance();
$default_icon_classes = 'sp-w-8 sp-h-8 sp-fill-slate-200 sp-flex-shrink-0';
$icon = $icon_manager->render('info', ['class' => $default_icon_classes]);
$container_classes = 'sp-flex sp-flex-row sp-gap-4 sp-p-5 sp-rounded-md sp-items-center sp-mb-4 md:sp-mb-8';
$content_classes = 'sp-text-slate-200 sp-text-md sp-font-semibold sp-tracking-wide project-paragraph';

switch ($info_block_type) {
    case 'info':
        // concact info color
        $container_classes = "sp-bg-teal-400/10 $container_classes";
        break;
    case 'warn':
        $container_classes = "sp-bg-amber-400/10 $container_classes";
        $icon = $icon_manager->render('circle-alert', ['class' => $default_icon_classes]);
        break;
    case 'erro':
        $container_classes = "sp-bg-rose-400/10 $container_classes";
        $icon = $icon_manager->render('circle-x', ['class' => $default_icon_classes]);
        break;
}
?>
<div class="<?php echo $container_classes; ?>">
  <!-- Icon -->
  <?= $icon; ?>
  <!-- Content -->
  <p class="<?= $content_classes; ?>"> <?=  $content; ?> </p>
</div>
