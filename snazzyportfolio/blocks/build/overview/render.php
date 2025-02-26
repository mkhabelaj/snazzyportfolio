<?php
$marginB = $attributes['marginB'];
$state = wp_interactivity_state('overview', array(
  'headers' => array(),
));
?>

<div 
  data-wp-interactive="overview"
  <?php echo get_block_wrapper_attributes(array('class' => $marginB)); ?>
>
   <div class="sp-text-slate-100 sp-flex sp-gap-2 sp-flex-col">
    <template data-wp-each="state.headers">
    <a data-wp-bind--href="context.item.href" class=" hover:sp-underline hover:sp-text-teal-400">
      <div data-wp-text="context.item.text" data-wp-bind--class="context.item.class">
      </div>
    </a>
    </template>
  </div>
</div>
