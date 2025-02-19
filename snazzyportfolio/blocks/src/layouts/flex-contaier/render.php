<?php
$stylesArr = $attributes['styles'];
$styles = implode(' ', $stylesArr);
?> 
<div class="<?php echo $styles ?>">
  <?php echo $content ?> 
</div>
