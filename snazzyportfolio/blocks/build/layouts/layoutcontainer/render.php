<?php
$stylesArr = $attributes['styles'];
$styles = implode(' ', $stylesArr);
?>
  <div class="main-content sp-w-full">
    <div class="<?php echo $styles ?>">
      <?php echo $content ?> 
    </div>
  </div>
