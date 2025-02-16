<?php

$classe_map = [
  'sm' => 'sp-text-sm',
  'lg' => 'sp-text-lg',
  'md' => 'sp-text-md',
  'xl' => 'sp-text-xl',
];
$size = $attributes['size'];
$text_size_class = $classe_map[$size];
$text = $attributes['text'];
$wrapper_attributes =  "$text_size_class sp-md:sp-max-w-[650px] sp-leading-relaxed sp-my-5 project-paragraph";
?>
<p class="<?= $wrapper_attributes; ?>"><?= $text; ?></p>


