<!-- Project Grid Render -->

<?php

use Jcodify\Snazzyportfolio\Wordpress\ORM\Models\Extended\ExtendedProjectMetaModel;

$project = new ExtendedProjectMetaModel(-1);

$args = array(
  'post_type'      => 'project',
  'posts_per_page' => 6,
  'meta_key'       => $project->priority->getName(),
  "orderby"        => "meta_value_num",
  'order'          => 'DESC'
);

$custom_query = new WP_Query($args); ?>


<div class="main-content">
  <section class="sub-main-content">
      <div class="sp-grid sp-grid-cols-1 md:sp-grid-cols-2 lg:sp-grid-cols-3 sp-gap-4 sp-place-items-center">
        <?php while ($custom_query->have_posts()) :
            $custom_query->the_post() ?>
          <?php get_template_part('template-parts/grid') ?>
        <?php
        endwhile;
wp_reset_postdata();
// TODO: add project archive link as view all
?>

      </div>
  </section>
</div>
