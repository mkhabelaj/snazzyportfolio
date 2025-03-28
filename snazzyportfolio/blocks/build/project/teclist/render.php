<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedProjectMetaModel;

// posttype is project return

if (get_post_type() !== ExtendedProjectMetaModel::getPostType()) {
    return;
}

$showLabel = $attributes['showLabel'];
$post_id = get_the_ID();
$tagList = (ExtendedProjectMetaModel::instance(new ExtendedProjectMetaModel($post_id)))->taxonomyTechnology->getValue();
$marginB = $attributes['marginB'];
?>
<div class="sp-flex sp-flex-col <?= $marginB; ?>">
  <div>
    <?php if ($showLabel) : ?>
    <h2 class="sp-text-2xl 
      sp-font-bold 
      sp-decoration-4 
      sp-text-slate-200
      sp-uppercase
      sp-tracking-widest
      sp-mb-4
      ">Stack</h2>
    <?php endif; ?>
    <p class="sp-flex sp-flex-wrap sp-gap-2 sp-flex-row sp-items-center sp-justify-start sp-text-xs md:sp-text-sm">
      <?php
      if (!empty($tagList)) :
          foreach ($tagList as $tag): ?>
          <a href="<?= get_term_link($tag->term_id) ?>" class="sp-text-slate-300 hover:sp-text-slate-200 sp-font-semibold sp-underline">
            <span class="sp-border-white 
                         sp-inline-block sp-px-2 sp-py-1 sp-font-semibold 
                          sp-bg-teal-400/10 sp-text-teal-300 sp-leading-5 sp-rounded-full">
              <?= $tag->name ?>
            </span>
          </a>

        <?php endforeach;
      else : ?>
    <p class="sp-text-slate-300">No Tags</p>
  <?php endif; ?>
  </p>
  </div>
</div>
