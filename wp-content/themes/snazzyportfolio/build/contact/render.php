<?php
if (!isset($attributes['action'])) {
?>
  <div class="main-content">
    <div class="sub-main-content">
      Contact form not configured
    </div>
  </div>
<?php
  return;
}

$action = $attributes['action'];

?>
<div class="main-content">
  <div class="sub-main-content">
    <div class="sp-flex sp-flex-col sp-mb-10 sp-mx-auto">
      <div class="sp-flex sp-justify-center sp-items-center">
        <form action="<?= $action ?>" method="POST"
          class="sp-flex sp-flex-col sp-w-full md:sp-w-7/12">
          <h2 class="sp-text-2xl sp-font-bold sp-decoration-4 sp-mb-5 sp-text-slate-200 sp-uppercase sp-tracking-widest
            ">Contact</h2>
          <input type="text" name="name" placeholder="Name"
            class="sp-p-2 sp-rounded-md focus:sp-outline-none sp-border-2 sp-bg-transparent sp-mb-2 focus:sp-border-teal-300"
            required>
          <input
            type="email"
            name="email"
            placeholder="Email"
            class="sp-p-2 sp-my-2 sp-rounded-md focus:sp-outline-none sp-border-2 sp-bg-transparent focus:sp-border-teal-300"
            required>
          <textarea
            name=" message" rows="10"
            class="sp-p-2 sp-my-2 sp-mb-4 sp-rounded-md focus:sp-outline-none sp-border-2 sp-bg-transparent focus:sp-border-teal-300"
            required></textarea>
          <button type="submit" class="sp-text-center sp-inline-block 
            sp-px-8 sp-py-3 sp-w-max sp-text-base sp-font-medium 
            sp-rounded-md sp-text-teal-300 sp-bg-teal-400/10 hover:sp-bg-teal-300 hover:sp-text-teal-700">
            Work with me!
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
