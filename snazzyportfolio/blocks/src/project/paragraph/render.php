<?php

$classe_map = [
  'sm' => 'sp-text-sm',
  'md' => 'sp-text-md',
  'xl' => 'sp-text-xl',
];
$size = $attributes['size'];
$text_size_class = $classe_map[$size];
$text = $attributes['text'];
$wrapper_attributes =  "$text_size_class sp-md:sp-max-w-[650px] sp-whitespace-pre-wrap sp-my-5 sp-leading-tight project-paragraph";
?>
<p class="<?= $wrapper_attributes; ?>"><?= $text; ?></p>


