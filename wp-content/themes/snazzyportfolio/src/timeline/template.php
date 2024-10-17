<!-- Tag Template -->
<?php

function yearly_pill($year)
{
  ob_start();
?>

  <span class="sp-inline-block
            sp-px-2 sp-py-1 sp-font-semibold 
            sp-rounded-md
            sp-text-slate-900 sp-bg-white">
    <?php echo $year; ?>
  </span>

<?php

  return ob_get_clean();
}

function hyphen()
{
  ob_start(); ?>
  <span>-</span>
<?php
  return ob_get_clean();
}

function get_yearly_duration_content($start_date, $end_date, $is_present)
{
  if (!is_string($start_date)) :
    return "N/A";
  endif;

  if (!is_string($end_date)) :
    return "N/A";
  endif;

  $startDate = new DateTime($start_date);
  $endDate = new DateTime($end_date);
  if (isset($is_present) && $is_present && !isset($startDate)) {
    return "N/A";
  }

  if (isset($is_present)) {
    return yearly_pill($startDate->format('Y')) . hyphen() . yearly_pill("Present");
  }

  if (!isset($startDate) || !isset($endDate)) :
    return "N/A";
  endif;

  if ($startDate->format('Y') == $endDate->format('Y')) {
    return yearly_pill($startDate->format('Y'));
  }

  return yearly_pill($startDate->format('Y')) . hyphen() . yearly_pill($endDate->format('Y'));
}

function get_time_duration($start_date, $end_date)
{
  //Todo: add error handling

  if (!is_string($start_date)) :
    return "N/A";
  endif;

  if (!is_string($end_date)) :
    return "N/A";
  endif;

  $startDate = new DateTime($start_date);
  $endDate = new DateTime($end_date);

  if (!isset($startDate) || !isset($endDate)) :
    return "N/A";
  endif;

  $duration = $startDate->diff($endDate);

  if ($duration->format('%y') > 0) {
    return $duration->format('%y years');
  }
  if ($duration->format('%m') > 0) {
    return $duration->format('%m months');
  }
  if ($duration->format('%d') > 0) {
    return $duration->format('%d days');
  }
}




$args = array(
  'post_type' => 'timeline',
  'posts_per_page' => -1,
  'meta_key' => 'start_date',
  'orderby' => 'meta_value',
  'order' => 'DESC',
  "meta_type" => 'DATE',
);
$custom_query = new WP_Query($args);
?>


<div class="sp-flex sp-flex-col md:sp-flex-row sp-justify-center">
  <div class="sp-w-full md:sp-w-8/12">
    <h2 class="sp-text-2xl 
      sp-font-bold 
      sp-decoration-4 sp-mb-5
      sp-text-slate-200
      sp-uppercase
      sp-tracking-widest
      ">Timeline</h2>
    <?php while ($custom_query->have_posts()) :
      $custom_query->the_post();
    ?>

      <ol class="sp-flex sp-flex-col md:sp-flex-row sp-relative sp-border-l sp-border-stone-700">
        <li class="sp-mb-10 sp-ml-4">
          <div class="sp-absolute sp-w-3 sp-h-3 sp-bg-stone-200 
          sp-rounded-full sp-mt-1.5 -sp-left-1.5 sp-border 
          sp-border-stone-900
          ">

          </div>
          <div class="sp-flex sp-flex-wrap sp-gap-4 
          sp-flex-row sp-items-center 
          sp-justify-start sp-text-xs md:sp-text-sm
          ">
            <?php echo get_yearly_duration_content(get_field('start_date'), get_field('end_date'), get_field('present')); ?>

            <h3 class="sp-text-lg sp-font-semibold sp-text-slate-200"><?php the_field('institution'); ?></h3>

            <div class="sp-my-1 sp-text-sm sp-font-normal sp-leading-none dark:sp-text-stone-500">
              <?php echo get_time_duration(get_field('start_date'), get_field('end_date')); ?>
            </div>
          </div>
          <p class="sp-my-2 sp-text-base sp-font-normal"><?php the_field('description'); ?></p>
        </li>
      </ol>
    <?php
    endwhile;
    wp_reset_postdata();
    // TODO: add project archive link as view all
    ?>

  </div>
</div>
