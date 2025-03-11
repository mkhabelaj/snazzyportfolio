<!-- Tag Render -->
<?php
$query = new WP_Query(
    [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]
);

?>
<div class="main-content">
  <div class="sub-main-content">
    <div class="sp-px-4 md:sp-px-0">
      <header class="sp-mb-8">
        <h1 class="sp-text-4xl md:sp-text-5xl sp-font-bold sp-mb-4 sp-text-slate-200 sp-tracking-wide sp-mt-10">
           Latest Blog Posts 
        </h1>
        <div class="sp-text-lg">
          A collection of my latest blog posts. Usually about web development and design, or deep dive into topics I'm interested in. 
        </div>
      </header>

      <!-- Posts Loop -->
      <?php if ($query->have_posts()) : ?>
        <div class="sp-space-y-4 md:sp-space-y-8 sp-flex sp-flex-col">
          
          <?php while ($query->have_posts()) :
              $query->the_post();?>
            <a href="<?php the_permalink(); ?>" class="sp-hover:underline">
              <article <?php post_class('sp-p-6 sp-bg-teal-400/10 sp-text-2xl  sp-text-teal-300 '); ?>>
                <!-- Post Title -->
                <h2 class="sp-font-semibold sp-mb-3 sp-text-teal-300 sp-tracking-wide sp-uppercase">
                  <?php the_title(); ?> <!-- Post title -->
                </h2>

                <?php if (has_excerpt()) : ?>
                  <!-- Post Excerpt -->
                  <div class="sp-text-base">
                      <?php the_excerpt(); ?> <!-- Post excerpt -->
                  </div>
                <?php endif; ?>
               <div class="sp-text-sm sp-text-gray-500 sp-mt-4">
                  <?php echo get_the_date(); ?> <!-- Post date -->
               </div>
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
</div>

