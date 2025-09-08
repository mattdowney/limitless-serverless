<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Limitless
 */

get_header(); ?>

<div class="main bg-blue bg-[url('../img/img-hero-bg.svg')] bg-cover bg-center w-screen h-screen flex flex-col justify-between p-6 md:p-10">
  <?php get_template_part('template-parts/simple-nav'); ?>

  <section class="flex-1 flex flex-col items-center justify-center text-center">
    <h1 class="text-2xl md:text-3xl lg:text-5xl font-medium text-white mb-2 tracking-tighter mx-0 md:mx-4 lg:mx-0">
      Unlimited email design. <span class="block">One low<span class="hidden md:inline">-priced</span> monthly rate.</span>
    </h1>

    <p class="text-lg w-full md:w-7/12 mx-auto mb-12 text-white">
      With Limitless, you can get unlimited email design requests, and revisions for
      <span class="inline xl:block">
        <span class="bg-[url('../img/img-hero-underline-straight.svg')] xl:bg-[url('../img/img-hero-underline.svg')] bg-no-repeat bg-left-bottom pb-1 xl:pb-2 font-medium text-white">
          70% less than the cost of a full-time designer.
        </span>
      </span>
    </p>

    <div class="availability">
      <div class="capacity block">
        <p class="text-white font-medium mb-4 inline-block text-md">
          Sorry, all spots are sold out for <?php echo date('F'); ?>.
        </p>
        <p>
          <a id="open-modal-1" class="waitlist-launch button button-alt" href="javascript:void(0)">Join the waitlist</a>
        </p>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/logo-cloud'); ?>
</div>

<?php get_template_part('template-parts/waitlist'); ?>
