<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedTimelinesMetaModel;

function yearly_pill($year)
{
    ob_start();?>

  <span class="sp-inline-block
            sp-px-2 sp-py-1 sp-font-semibold 
            sp-rounded-md
            sp-text-slate-900 sp-bg-white">
    <?php echo $year; ?>
  </span>

    <?php return ob_get_clean();
}

function hyphen()
{
    ob_start(); ?>
  <span>-</span>

    <?php return ob_get_clean();
}

function get_yearly_duration_content(array $data)
{

    $start_year = $data[0];

    if (count($data) == 1 && $start_year == "N/A") {
        return  $start_year;
    }

    if (count($data) == 1) {
        return  yearly_pill($start_year);
    }

    if (count($data) == 2) {
        $end_year = $data[1];
    }

    return yearly_pill($start_year) . hyphen() . yearly_pill($end_year);
}

?>

<div class="main-content">
  <div class="sub-main-content">
    <div class="sp-flex sp-flex-col md:sp-flex-row sp-justify-center">
      <div class="sp-w-full md:sp-w-[80%]">
          <h2 
            class="sp-text-2xl sp-font-bold sp-decoration-4 sp-mb-5 sp-text-slate-200 sp-uppercase sp-tracking-widest">
            Timeline
          </h2>
        <?php foreach (ExtendedTimelinesMetaModel::getAllTimelines() as $timeline) :
            $timeline = ExtendedTimelinesMetaModel::instance($timeline);
            ?>

          <ol class="sp-flex sp-flex-col md:sp-flex-row sp-relative sp-border-l sp-border-stone-700">
            <li class="sp-mb-10 sp-ml-4">
              <div class="sp-absolute sp-w-3 sp-h-3 sp-bg-stone-200 
          sp-rounded-full sp-mt-1.5 -sp-left-1.5 sp-border 
          sp-border-stone-900
          ">
              </div>
              <div class="
                sp-flex sp-flex-wrap sp-gap-4 sp-flex-row sp-items-center sp-justify-start sp-text-xs md:sp-text-sm"
              >
                <?php echo get_yearly_duration_content($timeline->getYearlyDurationContent()); ?>

                <h3 class="sp-text-lg sp-font-semibold sp-text-slate-200">
                  <?= $timeline->institution->getValue(); ?>
                </h3>

                <div class="sp-my-1 sp-text-sm sp-font-normal sp-leading-none dark:sp-text-stone-500">
                  <?= $timeline->getTimeDuration(); ?>
                </div>
              </div>
              <p class="sp-my-2 sp-text-base sp-font-normal"><?php echo $timeline->description->getValue(); ?></p>
            </li>
          </ol>
        <?php endforeach;?>

      </div>
    </div>

  </div>
</div>
