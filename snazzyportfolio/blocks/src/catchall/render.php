<?php

$links = [
  "Home" => site_url(),
  "Blog" => get_permalink(get_page_by_path('latest-blog')),
  "Projects" => get_post_type_archive_link('project'),
];

?>
<div class="sp-flex sp-flex-col sp-space-y-8 sp-items-center sp-justify-center sp-w-full sp-h-screen sp-p-8">
  <div class="sp-text-center">
    <h1 class="sp-text-2xl md:sp-text-4xl sp-font-bold sp-text-slate-200">
      Oops, this page doesn't exist
    </h1>
  </div>
  <div class="sp-text-center">
    <p class="sp-text-lg sp-text-slate-200">
      Try these links:
    </p>
    <ul class="sp-mt-4 sp-bg-gray-800  sp-shadow-sm sp-shadow-gray-800 sp-rounded-lg sp-p-6 sp-w-64">
      <?php foreach ($links as $name => $link) : ?>
        <li class="sp-mb-2">
          <a class="sp-text-white hover:sp-text-teal-400 sp-transition-colors sp-duration-200" href="<?php echo $link; ?>">
            <?php echo $name; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
