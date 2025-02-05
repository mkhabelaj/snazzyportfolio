<?php
$clean_title = str_replace('Archives: ', 'All ', get_the_archive_title());
?>
<div class="main-content">
  <div class="sub-main-content">
    <h1 class="sp-text-4xl md:sp-text-5xl sp-font-bold sp-mb-4 sp-text-slate-200 sp-mt-10">
      <?php echo $clean_title; ?>
    </h1>
    <!-- Project Archive -->
    <section class="sp-flex sp-flex-col md:sp-flex-row sp-items-center sp-justify-center">
      <div class="sp-grid sp-grid-cols-1 md:sp-grid-cols-2 lg:sp-grid-cols-3 sp-gap-4">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/grid');
        endwhile; ?>
      </div>
    </section>
    <?php snazzyportfolio_pagination(); ?>
  </div>
</div>
