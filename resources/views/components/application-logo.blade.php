<div id="logo-container" class="relative flex w-full flex-1 items-stretch">
    <img src="images/logo-dark.png" alt="logo-dark" {!! $attributes->merge(['class' => 'dark:hidden']) !!}>
    <img src="images/logo-light.png" alt="logo-light" {!! $attributes->merge(['class' => 'hidden dark:block']) !!}>
</div>

