<?php

use Nzuridesigns\WPUtility\ThemeIconManager;

$iconManager = ThemeIconManager::getInstance();
$iconManager->setDefaultAttributes(['width' => '20', 'height' => '20']);
$chevDow = $iconManager->render('circle-chevron-down');
$chevUp = $iconManager->render('circle-chevron-up');
$title = $attributes['title'];
$initialOpen = $attributes['initialOpen'];
$marginB = $attributes['marginB'];
?>

<div 
  data-wp-interactive="snazzyDropdown"
  <?= wp_interactivity_data_wp_context(['navIsOpen' => $initialOpen]) ?>
  class="
   <?php echo $marginB; ?>
    group
    sp-text-slate-300
    hover:sp-text-teal-300
  "
>
  <div class=" sp-bg-gray-800 sp-p-1 sp-rounded 
    sp-flex sp-flex-row sp-justify-start sp-gap-2 sp-items-center 
    sp-font-bold hover:sp-cursor-pointer 
    "
      data-wp-on--click="actions.toggleNav"
  > 
    <!--icon-->
    <span class="sp-flex sp-flex-row sp-gap-2 sp-items-center " "
    >
      <span data-wp-bind--hidden="context.navIsOpen"><?php echo $chevDow; ?></span>
      <span data-wp-bind--hidden="!context.navIsOpen"><?php echo $chevUp; ?></span>
    </span>
   <!--header-->
    <h3 class="sp-text-sm group-hover:sp-text-teal-300  sp-uppercase">
     <?= $title; ?>
    </h3>
  </div>
  <div class="sp-border-gray-800 sp-border sp-p-2" data-wp-bind--hidden="!context.navIsOpen">
    <?= $content; ?>
  </div>
</div>

