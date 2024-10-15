  <div class="sp-mt-8 sp-flex sp-justify-center sp-items-center sp-gap-2">
    <?php
    the_posts_pagination(array(
      'mid_size'  => 2, // Show two page numbers on either side of the current page
      'prev_text' => '<span class="sp-px-3 sp-py-2 sp-bg-gray-300 sp-text-gray-700 sp-rounded-l-md sp-font-semibold sp-hover:bg-gray-400">« Previous</span>', // Text for previous button
      'next_text' => '<span class="sp-px-3 sp-py-2 sp-bg-gray-300 sp-text-gray-700 sp-rounded-r-md sp-font-semibold sp-hover:bg-gray-400">Next »</span>', // Text for next button
      'before_page_number' => '<span class="sp-px-3 sp-py-2 sp-bg-white sp-border sp-border-gray-300 sp-text-gray-700 sp-rounded-md sp-font-semibold sp-hover:bg-gray-200 sp-transition sp-duration-300">', // Styling for the page numbers
      'after_page_number' => '</span>',
    ));
    ?>
  </div>
