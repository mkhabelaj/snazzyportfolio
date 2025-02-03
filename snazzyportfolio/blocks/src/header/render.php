  <header class="">

    <?php

    function get_active_class($is_active)
    {
      $active_class = 'sp-bg-teal-400/10 sp-text-teal-300';
      $not_active_class = 'sp-text-white';
      return $is_active ? $active_class : $not_active_class;
    }
    $navItems = [
      ['name' => 'Home', 'link' => site_url(), 'active' => is_front_page()],
      ['name' => 'Projects', 'link' => get_post_type_archive_link('project'), 'active' => is_post_type_archive('project')],
     # ['name' => 'Work History', 'link' => get_post_type_archive_link('timeline'), 'active' => is_post_type_archive('timeline')],
    ];
    ?>
    <nav class="sp-bg-gray-800 sp-p-4">
      <div class="sp-container sp-mx-auto sp-flex sp-justify-between sp-items-center">
        <div class="sp-text-white sp-text-lg sp-font-bold">
          <a href="<?php echo site_url() ?>">
            Jcodify.com
          </a>
        </div>
        <ul class="sp-flex sp-space-x-6">
          <?php foreach ($navItems as $item): ?>
            <li>
              <a href="<?php echo $item['link']; ?>" class="<?php echo get_active_class($item['active']); ?>  hover:sp-text-red-white">
                <?php echo $item['name']; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

  </header>
