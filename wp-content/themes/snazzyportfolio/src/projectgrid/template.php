<!-- Tag Template -->
<?php
$args = array(
  'post_type' => 'project',
  'posts_per_page' => 6
);
$custom_query = new WP_Query($args); ?>


<section class="sp-flex sp-flex-col md:sp-flex-row sp-items-center sp-justify-center">
  <div class="sp-grid sp-grid-cols-1 md:sp-grid-cols-2 lg:sp-grid-cols-3 sp-gap-4">
    <?php while ($custom_query->have_posts()) :
      $custom_query->the_post() ?>

      <a href="<?php the_permalink(); ?>">
        <div class="
          sp-border-2 
          sp-rounded-md sp-overflow-hidden sp-border-slate-600
          hover:sp-border-teal-600 hover:sp-border-2
          sp-max-w-sm
          sp-transition-transform sp-duration-200 sp-ease-out hover:sp-scale-105">
          <img src="<?php the_post_thumbnail_url("projectLandscapeSm"); ?>" alt="portfolio image"
            class="sp-w-full sp-h-36 md:sp-h-48 sp-object-cover sp-cursor-pointer">
          <div class="sp-w-full sp-p-4">
            <h2 class="sp-text-lg md:sp-text-xl sp-mb-2 md:sp-mb-3 sp-font-semibold sp-text-center sp-text-slate-200"><?php the_title(); ?></h2>
            <p class="sp-flex sp-flex-wrap sp-gap-2 sp-flex-row sp-items-center sp-justify-start sp-text-xs md:sp-text-sm">
              <?php if (has_tag()) : ?>
                <?php foreach ((get_the_tags()) as $tag) : ?>
                  <span class="sp-border-white sp-inline-block sp-px-2 sp-py-1 sp-font-semibold sp-bg-teal-400/10 sp-text-teal-300 sp-leading-5 sp-rounded-full">
                    <?php echo $tag->name; ?>
                  </span>
                <?php endforeach; ?>
              <?php endif; ?>
            </p>
          </div>
        </div>
      </a>
    <?php
    endwhile;
    wp_reset_postdata();
    // TODO: add project archive link as view all
    ?>

  </div>
</section>
