<?php

use Nzuridesigns\WPUtility\ThemeIconManager;

$iconManager = ThemeIconManager::getInstance();
$chevDow = $iconManager->render('circle-chevron-down');
$chevUp = $iconManager->render('circle-chevron-up');
$title = $attributes['title'];
$initialOpen = $attributes['initialOpen'];
?>

<div 
  data-wp-interactive="snazzyDropdown"
  <?= wp_interactivity_data_wp_context(['navIsOpen' => $initialOpen]) ?>
  class="sp-mb-4"
>
  <div class="sp-bg-gray-800 sp-p-3 sp-flex sp-flex-row sp-justify-start sp-gap-2 sp-items-center sp-font-bold"> 
    <!--icon-->
    <span class="sp-flex sp-flex-row sp-gap-2 sp-items-center hover:sp-cursor-pointer hover:sp-text-teal-300"
      data-wp-on--click="actions.toggleNav"
    >
      <span data-wp-bind--hidden="context.navIsOpen"><?php echo $chevDow; ?></span>
      <span data-wp-bind--hidden="!context.navIsOpen"><?php echo $chevUp; ?></span>
    </span>
   <!--header-->
    <h3 class="sp-text-l  sp-text-slate-200 sp-uppercase">
     <?= $title; ?>
    </h3>
  </div>
  <div class="sp-border-gray-800 sp-border sp-p-2" data-wp-bind--hidden="!context.navIsOpen">
    <?= $content; ?>
  </div>
</div>

