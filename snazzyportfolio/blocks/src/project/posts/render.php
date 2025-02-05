<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\{ExtendedTimelinesMetaModel,ExtendedProjectMetaModel};

$project = ExtendedProjectMetaModel::instance(new ExtendedProjectMetaModel(get_the_ID()));

$related_posts = $project->getRelatedPosts();
if (empty($related_posts)) {
    return;
}
?>
<!-- Project Template -->
<h3 class="sp-text-2xl sp-font-bold sp-text-slate-200 sp-uppercase sp-tracking-widest sp-mt-5">
  Related Posts 
</h3>
<div class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
  <ul class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
    <?php
    //TODO: limit this block to project timelines
    foreach ($related_posts as $project) :
        if (!($project instanceof WP_Post)) {
            continue;
        }?>
      <li class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
        <?= $project->post_title; ?>
        <p class="sp-text-sm sp-font-normal sp-text-slate-400">
          <?= $project->post_excerpt; ?>
        </p>
        <p>
        <a class="sp-text-teal-300  hover:sp-text-red-white" href="<?= get_the_permalink($project->ID); ?>">Read more</a>
        </p>
      </li>

    <?php endforeach; ?>

  </ul>

</div>
