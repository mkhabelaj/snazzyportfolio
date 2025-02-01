<!-- Timeline Template -->
<h3 class="sp-text-2xl sp-font-bold sp-text-slate-200 sp-uppercase sp-tracking-widest">
  Related Timeline
</h3>
<div class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
  <ul class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
    <?php
    //TODO: limit this block to project timelines
    $related_timelines = get_field('related_timelines');
    foreach ($related_timelines as $timeline) : ?>

      <li class="sp-flex sp-flex-col sp-gap-2 sp-text-slate-200">
        <?php echo get_field('institution', $timeline); ?>
        <p class="sp-text-sm sp-font-normal sp-text-slate-400">
          <?php echo get_field('description', $timeline); ?>
        </p>
        <p class="sp-text-sm sp-font-normal sp-text-slate-400">
          <?php echo get_field('start_date', $timeline); ?> - <?php echo get_field('end_date', $timeline); ?>
        </p>
      </li>

    <?php endforeach; ?>

  </ul>

</div>
