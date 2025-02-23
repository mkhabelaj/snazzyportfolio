<?php
$tag = $attributes['tag'];
$text = $attributes['text'];
$identifier = implode("-", explode(" ", $text));
$class = "";
switch ($tag) {
    case "h3":
        $class = $class . "sp-pl-2";
        break;
    case "h4":
        $class = $class . "sp-pl-4";
        break;
    case "h5":
        $class = $class . "sp-pl-6";
        break;
    case "h6":
        $class = $class . "sp-pl-8";
        break;
    default:
        break;
}
$context = [
  'tag' => $tag,
  "text" => $text,
  "identifier" => $identifier,
  "href" => "#" . $identifier,
  "classes" => $class
];
?>
<span
  data-wp-interactive="overview"
  <?php echo get_block_wrapper_attributes(); ?>
  <?php echo  wp_interactivity_data_wp_context($context) ?>
>
  <span
  data-wp-init--tags="actions.loadHeaders"
  ></span>
</span>

<section id="<?= $identifier ?>">
  <?= $content ?>
</section>

