<?php

use Nzuridesigns\WPUtility\ThemeIconManager;

function get_active_class($is_active)
{
    $active_class = 'sp-bg-teal-400/10 sp-text-teal-300';
    $not_active_class = 'sp-text-white';
    return $is_active ? $active_class : $not_active_class;
}

$navItems = [
  ['name' => 'Home', 'link' => site_url(), 'active' => is_front_page()],
  [
    'name' => 'Projects', 'link' => get_post_type_archive_link('project'), 'active' => is_post_type_archive('project')
  ],
  [
    'name' => 'Blog', 'link' => get_permalink(get_page_by_path('latest-blog')), 'active' => is_page('latest-blog')
  ],
];
$icon_man = ThemeIconManager::getInstance();
$icon = $icon_man->render('menu');
$close_icon = $icon_man->render('x', ['width' => '40', 'height' => '40']);
?>

<header class="sp-mb-10" 
  data-wp-interactive="navbarPlugin"
  <?= wp_interactivity_data_wp_context(['isMobileNavOpen' => false]) ?>
>

    <!-- Desktop Nav -->
    <nav class="sp-hidden md:sp-block sp-bg-gray-800 sp-p-4">
      <div class="sp-container sp-mx-auto sp-flex sp-justify-between sp-items-center">
        <div class="sp-text-white sp-text-lg sp-font-bold">
          <a href="<?php echo site_url() ?>">
            Jcodify.com
          </a>
        </div>
        <ul class="sp-flex sp-space-x-6 sp-uppercase">
          <?php foreach ($navItems as $item) : ?>
            <li>
              <a href="<?php echo $item['link']; ?>" class="<?php echo get_active_class($item['active']); ?>  hover:sp-text-red-white">
                <?php echo $item['name']; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <!-- Mobile Nav -->
    <nav class="sp-block md:sp-hidden sp-bg-gray-800 sp-p-4"
          data-wp-class--sp-hidden="context.isMobileNavOpen"
    >
      <div class="sp-container sp-mx-auto sp-flex sp-justify-between sp-items-center">
        <div class="sp-text-white sp-text-lg sp-font-bold">
            <a href="<?php echo site_url() ?>">
              Jcodify.com
            </a>
          </div>
        <div 
          id="mini-menu" 
          class="sp-flex sp-items-center" 
          data-wp-on--click="actions.toggleMobileNav"
        >
              <?php echo $icon; ?>
        </div>
      </div>
    </nav>
  <!-- Mobile Nav full screen menu -->
  <div class="sp-bg-gray-800 sp-p-2 sp-w-full sp-h-screen sp-fixed sp-top-0 sp-left-0 sp-z-50 menu"
    data-wp-bind--hidden="!context.isMobileNavOpen">
    <div class="sp-relative">
      <div class="sp-absolute sp-right-4 sp-top-4" data-wp-on--click="actions.toggleMobileNav">
        <?php echo $close_icon; ?>
      </div>
    </div>
    <ul class="sp-mt-20 sp-flex sp-flex-col sp-space-y-4 sp-uppercase sp-items-center sp-justify-start sp-h-screen sp-text-3xl sp-gap-6">
      <?php foreach ($navItems as $item) : ?>
        <li>
          <a href="<?php echo $item['link']; ?>" class="<?php echo get_active_class($item['active']); ?>  hover:sp-text-red-white">
            <?php echo $item['name']; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</header>

