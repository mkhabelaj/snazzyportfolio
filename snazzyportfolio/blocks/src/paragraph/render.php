<?php

$classe_map = [
  'sm' => 'sp-text-sm',
  'lg' => 'sp-text-lg',
  'md' => 'sp-text-md',
  'xl' => 'sp-text-xl',
];
$size = $attributes['size'];
$text_size_class = $classe_map[$size];
$text = " Placeholder Text lorem ispum dolor sit amet consectetur adipisicing elit. Quos, quod.
lorm ispum dolor sit amet consectetur adipisicing elit. Quos, quod.";

$marginB = $attributes['marginB'];

if (isset($attributes['text'])) {
    $text = $attributes['text'];
}
if (empty($text)) {
}
$wrapper_attributes =  "$text_size_class sp-leading-relaxed project-paragraph $marginB";
?>
<p class="<?= $wrapper_attributes; ?>"><?= $text; ?></p>


