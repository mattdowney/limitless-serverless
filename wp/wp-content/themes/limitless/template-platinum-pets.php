<?php
/**
 * The Platinum Pets Template
 * Template Name: Platinum Pets
 *
 * @package Limitless
 */

 get_header(); ?>

 <div class="hero container mx-auto m-[2.5%] lg:mt-12 p-6 md:p-12 bg-[url('../img/img-pp-bg.svg')] bg-cover rounded">
    <div class="header">
        <?php get_template_part('template-parts/nav'); ?>

        <div class="mybite-hero text-center mt-20 mb-12 lg:mb-20 mx-auto">
            <h1 class="text-3xl lg:text-5xl font-medium text-white mb-2 tracking-tighter mx-4 lg:mx-0">Platinum Pets</h1>
            <p class="text-lg w-full lg:w-3/4 xl:w-7/12 mx-auto text-white/80 mb-0 lg:mb-10 px-10 lg:px-0">We helped Platinum Pets establish a strong email marketing presence by crafting numerous campaigns that raised conversion rates 56%.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-12 items-center pb-0 lg:pb-12">
        <div class="case-left">
          <img
            class="mb-4 lg:mb-12"
            src="<?= img_path('img-pp-case-1.webp'); ?>"
            alt="Platinum Pets - 1"
          />
          <img
            class="mb-4 lg:mb-12"
            src="<?= img_path('img-pp-case-2.webp'); ?>"
            alt="Platinum Pets - 2"
          />
          <img
            class="mb-0"
            src="<?= img_path('img-pp-case-3.webp'); ?>"
            alt="Platinum Pets - 4"
          />
        </div>

        <div class="case-right">
          <img src="<?= img_path('img-pp-case-4.webp'); ?>" alt="Platinum Pets - 4" />
        </div>
      </div>
    </div>

    <div class="container mx-auto py-0 mb-4 lg:mb-12 rounded">
        <img
            class="mb-0 rounded"
            src="<?= img_path('img-pp-case-5.webp'); ?>"
            alt="Platinum Pets - 5"
        />
    </div>

    <div class="container mx-auto grid-cols-5 px-12 lg:gap-4 xl:gap-6 mb-4 lg:mb-12 rounded h-auto overflow-hidden relative hidden lg:grid">
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
              src="<?= img_path('img-pp-case-6.webp'); ?>"
              alt="Platinum Pets - 6"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-6.webp'); ?>"
              alt="Platinum Pets - 6"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-7.webp'); ?>"
              alt="Platinum Pets - 7"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-7.webp'); ?>"
              alt="Platinum Pets - 7"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-8.webp'); ?>"
              alt="Platinum Pets - 8"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-8.webp'); ?>"
              alt="Platinum Pets - 8"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-9.webp'); ?>"
              alt="Platinum Pets - 9"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-9.webp'); ?>"
              alt="Platinum Pets - 9"
            />
          </div>
        </div>
      </div>

      <div class="col-span-1 column-scroll">
        <div class="viewport">
          <div class="image-wrap">
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-10.webp'); ?>"
              alt="Platinum Pets - 10"
            />
            <img
              class="mb-2"
              src="<?= img_path('img-pp-case-10.webp'); ?>"
              alt="Platinum Pets - 10"
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
          src="<?= img_path('img-testimonial-dave.webp'); ?>"
          alt="Dave Greiner"
        />

        <p class="text-sm">
          "Limitless is one of those rare design services that can turn even the
          most mundane email into something beautiful and effective. I couldn't
          have been happier with the work they did for us."
        </p>

        <p class="text-sm mt-4 font-medium">
          Dave Greiner
          <span class="block text-black/50">Founder, Campaign Monitor</span>
        </p>
      </div>

      <div class="case-study-next rounded relative h-full overflow-hidden z-0">
        <a class="flex items-center h-full hover:scale-105 transition-transform duration-300 ease-in-out" href="/mybite/"
          ><img
            class="w-auto h-full object-cover rounded"
            src="<?= img_path('img-case-study-next-mybite.webp'); ?>"
            alt="Mybite"
        /></a>
        <div
          class="home-case-screen-desc absolute bottom-6 left-8 text-left z-10"
        >
          <h4
            class="tracking-widest uppercase text-xs font-medium inline-block mb-1 text-white/70"
          >
            Case Study
          </h4>
          <h4 class="text-2xl font-medium text-white">Mybite</h4>
        </div>
      </div>
    </div>

 <?php get_footer(); ?>