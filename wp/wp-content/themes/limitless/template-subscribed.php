<?php
/**
 * The Subscribed Template
 * Template Name: Subscribed
 *
 * @package Limitless
 */

get_header(); ?>

<!-- Hero -->
<div class="hero container mx-auto bg-white m-[2.5%] lg:mt-12 p-6 md:p-12 rounded ">
    <div class="header">
        <?php get_template_part('template-parts/nav-light'); ?>

        <div class="subscribed-icon flex justify-center mt-[10%]">
            <img
              class="mb-4 mx-auto lg:mx-0 w-20 h-auto"
              src="<?= img_path('icon-subscribed.svg') ?>"
              alt="Subscribed"
            />
        </div>
   
        <h1 class="text-black text-xl md:text-2xl lg:text-3xl font-medium text-center px-12 pb-2">You're on the waitlist!</h1>
        <p class="text-lg w-10/12 lg:w-1/2 mx-auto text-center mb-20 lg:mb-32">We'll be sure to contact you as soon as a spot opens up.</p>
    </div>

<?php get_footer('subscribed'); ?>
