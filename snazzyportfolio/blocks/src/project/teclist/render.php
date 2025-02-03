<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedProjectMetaModel;

$post_id = get_the_ID();
$tagList = (ExtendedProjectMetaModel::instance(new ExtendedProjectMetaModel($post_id)))->taxonomyTechnology->getValue();
?>
<div class="sp-flex sp-flex-col sp-gap-4 sp-sticky sp-top-4">
  <div>
    <h2 class="sp-text-2xl 
      sp-font-bold 
      sp-decoration-4 mb-5
      sp-text-slate-200
      sp-uppercase
      sp-tracking-widest
      sp-mb-5
      ">Stack</h2>
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
  <div>
    <div class="sp-flex sp-flex-col"></div>
  </div>
</div>
