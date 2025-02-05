<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedProjectMetaModel;

$post_id = get_the_ID();
$tagList = (ExtendedProjectMetaModel::instance(new ExtendedProjectMetaModel($post_id)))->taxonomyTechnology->getValue();
?>
<a href="<?php the_permalink(); ?>">
  <div class="
          sp-border-2 
          sp-rounded-md sp-overflow-hidden sp-border-slate-600
          hover:sp-border-teal-600 hover:sp-border-2
          sp-max-w-sm
          sp-w-72
          sp-h-80
          md:sp-w-80
          sp-transition-transform sp-duration-200 sp-ease-out hover:sp-scale-105 sp-min-h-64 md:sp-min-h-96">
    <img src="<?php the_post_thumbnail_url("projectLandscapeSm"); ?>" alt="portfolio image"
      class="sp-w-full sp-h-36 md:sp-h-48 sp-object-cover sp-cursor-pointer">
    <div class="sp-w-full sp-p-4">
      <h2 class="sp-text-lg md:sp-text-xl sp-mb-2 md:sp-mb-3 sp-font-semibold sp-text-center sp-text-slate-200"><?php the_title(); ?></h2>
      <p class="sp-flex sp-flex-wrap sp-gap-2 sp-flex-row sp-items-center sp-justify-center sp-text-xs md:sp-text-sm">
        <?php if (!empty($tagList)) : ?>
          <?php foreach ($tagList as $tag) : ?>
            <span class="sp-border-white sp-inline-block sp-px-2 sp-py-1 sp-font-semibold sp-bg-teal-400/10 sp-text-teal-300 sp-leading-5 sp-rounded-full">
              <?php echo $tag->name; ?>
            </span>
          <?php endforeach; ?>
        <?php endif; ?>
      </p>
    </div>
  </div>
</a>
