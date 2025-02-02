<!-- Tag Render -->
<div class="main-content">
  <div class="sub-main-content">

    <!-- Tag Title and Description -->
    <header class="sp-mb-8">
      <h1 class="sp-text-4xl md:sp-text-7xl sp-font-bold sp-mb-4 sp-text-slate-200">
        <?php single_term_title(); ?> <!-- Tag archive title -->
      </h1>
      <div class="sp-text-lg">
        <?php echo term_description(); ?> <!-- Tag description -->
      </div>
    </header>

    <!-- Posts Loop -->
    <?php if (have_posts()) : ?>
      <div class="sp-space-y-8 sp-flex sp-flex-col">
        <?php
        // Loop through each post in the tag archive
        while (have_posts()) :
          the_post();
        ?>
          <a href="<?php the_permalink(); ?>" class="sp-hover:underline">
            <article <?php post_class('sp-p-6 sp-bg-teal-400/10 sp-text-2xl  sp-text-teal-300 '); ?>>
              <!-- Post Title -->
              <h2 class="sp-font-semibold sp-mb-3 sp-text-teal-300 sp-tracking-wide">
                <?php the_title(); ?> <!-- Post title -->
              </h2>

              <?php if (has_excerpt()) : ?>
                <!-- Post Excerpt -->
                <div class="sp-text-base">
                  <?php the_excerpt(); ?> <!-- Post excerpt -->
                </div>
              <?php endif; ?>
            </article>
          </a>
        <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <?php snazzyportfolio_pagination(); ?>

    <?php else : ?>
      <!-- If no posts are found -->
      <p class="sp-text-xl sp-text-center sp-text-gray-500"><?php _e('No posts found.', 'your-theme-textdomain'); ?></p>
    <?php endif; ?>
  </div>
</div>
