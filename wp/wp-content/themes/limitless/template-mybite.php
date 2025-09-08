<?php
/**
 * The Mybite Template
 * Template Name: Mybite
 *
 * @package Limitless
 */

 get_header(); ?>

 <div class="hero container mx-auto m-[2.5%] lg:mt-12 p-6 md:p-12 bg-[url('../img/img-mybite-bg.svg')] bg-cover rounded">
    <div class="header">
        <?php get_template_part('template-parts/nav'); ?>

        <div class="mybite-hero text-center mt-20 mb-12 lg:mb-20 mx-auto">
            <h1 class="text-3xl lg:text-5xl font-medium text-white mb-2 tracking-tighter mx-4 lg:mx-0">Mybite</h1>
            <p class="text-lg w-full lg:w-3/4 xl:w-7/12 mx-auto text-white/80 mb-0 lg:mb-10 px-10 lg:px-0">We helped Mybite build out their email marketing presence and designed dozens of campaigns to rave reviews.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-12 items-center pb-0 lg:pb-12">
            <div class="case-left">
            <img src="<?= img_path('img-mybite-case-1.webp'); ?>" alt="Mybite - 1" />
            </div>

            <div class="case-right">
                <img
                    class="mb-4 lg:mb-12"
                    src="<?= img_path('img-mybite-case-2.webp'); ?>"
                    alt="Mybite - 2"
                />
                <img
                    class="mb-4 lg:mb-12"
                    src="<?= img_path('img-mybite-case-3.webp'); ?>"
                    alt="Mybite - 3"
                />
                <img
                    class="mb-0"
                    src="<?= img_path('img-mybite-case-4.webp'); ?>"
                    alt="Mybite - 4"
                />
            </div>  
        </div>
    </div>

    <div class="container mx-auto py-0 mb-4 lg:mb-12 rounded">
        <img
            class="mb-0 rounded"
            src="<?= img_path('img-mybite-case-5.webp'); ?>"
            alt="Mybite - 5"
        />
    </div>

    <div
      class="container mx-auto grid-cols-6 px-12 gap-12 mb-12 rounded h-auto bg-[url('/img/img-mybite-case-scroll-bg.svg')] bg-cover overflow-hidden relative hidden lg:grid"
    >
      <img
        class="absolute top-0 left-0 z-10"
        src="<?= img_path('img-case-study-infinite-overlay-top.svg'); ?>"
        alt="Overlay"
      />

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-6.webp'); ?>"
              alt="Mybite - 6"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-6.webp'); ?>"
              alt="Mybite - 6"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-7.webp'); ?>"
              alt="Mybite - 7"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-7.webp'); ?>"
              alt="Mybite - 7"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-8.webp'); ?>"
              alt="Mybite - 8"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-8.webp'); ?>"
              alt="Mybite - 8"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-9.webp'); ?>"
              alt="Mybite - 9"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-9.webp'); ?>"
              alt="Mybite - 9"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-10.webp'); ?>"
              alt="Mybite - 10"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-10.webp'); ?>"
              alt="Mybite - 10"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-11.webp'); ?>"
              alt="Mybite - 11"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-mybite-case-11.webp'); ?>"
              alt="Mybite - 11"
            />
          </div>
        </div>
      </div>

      <img
        class="absolute bottom-0 left-0 z-10"
        src="<?= img_path('img-case-study-infinite-overlay-btm.svg'); ?>"
        alt="Overlay"
      />
    </div>

    <div class="pagination container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-12 mb-4 lg:mb-12 h-full">
      <div class="case-study-testimonial bg-white rounded p-12">
        <img
          class="w-[70px] h-auto mb-6 mx-0"
          src="<?= img_path('img-testimonial-meredith.webp'); ?>"
          alt="Meredith Blechman"
        />

        <p class="text-sm">
          "The email templates you designed are perfect. Our latest campaigns
          have our highest click through rates ever and we're seeing a 20%+ open
          rate increase!"
        </p>

        <p class="text-sm mt-4 font-medium">
          Meredith Blechman
          <span class="block text-black/50">Marketing, Foursquare</span>
        </p>
      </div>

      <div class="case-study-next rounded relative h-full overflow-hidden z-0">
        <a class="flex items-center h-full hover:scale-105 transition-transform duration-300 ease-in-out" href="/platinum-pets/">
          <img
            class="w-auto h-full object-cover rounded"
            src="<?= img_path('img-case-study-next-pp.webp'); ?>"
            alt="Platinum Pets"
          />
        </a>
        <div
          class="home-case-screen-desc absolute bottom-6 left-8 text-left z-10"
        >
          <h4
            class="tracking-widest uppercase text-xs font-medium inline-block mb-1 text-white/70"
          >
            Case Study
          </h4>
          <h4 class="text-2xl font-medium text-white">Platinum Pets</h4>
        </div>
      </div>
    </div>

 <?php get_footer(); ?>