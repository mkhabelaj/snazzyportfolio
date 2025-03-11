<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\{ExtendedTimelinesMetaModel,ExtendedProjectMetaModel};

$project = ExtendedProjectMetaModel::instance(new ExtendedProjectMetaModel(get_the_ID()));
$related_timelines = $project->timelines->getValue();

if (empty($related_timelines)) {
    return;
}
$showLabel =  $attributes['showLabel'];
$marginB = $attributes['marginB'];
?>

<div class="<?= $marginB; ?>">
  <!-- Timeline Template -->
  <?php if ($showLabel) : ?>
  <h3 class="sp-text-2xl sp-font-bold sp-text-slate-200 sp-uppercase sp-tracking-widest">
    Related Timeline
  </h3>
  <?php endif; ?>
  <div class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
    <ul class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
      <?php
      //TODO: limit this block to project timelines
      foreach ($related_timelines as $timeline) :
          $timeline = ExtendedTimelinesMetaModel::instance($timeline);
          ?>
        <li class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-300">
          <?= $timeline->institution->getValue(); ?>
          <p class="sp-text-sm sp-font-normal sp-text-slate-400">
            <?= $timeline->getTrimmedDescription(); ?>
          </p>
          <p class="sp-text-sm sp-font-normal sp-text-slate-400">
            <?php echo $timeline->getFormattedStartDate(); ?> - <?php echo $timeline->getFormattedEndDate(); ?>
          </p>
        </li>

      <?php endforeach; ?>

    </ul>

  </div>
</div>
