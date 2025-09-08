<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Limitless
 */

get_header(); ?>

<div class="main w-full flex flex-col p-6 md:px-10 md:pt-10 md:pb-0 overflow-x-hidden">
    <?php get_template_part('template-parts/simple-nav'); ?>

    <div class="single-post mt-20 md:mt-16 mb-0 lg:mb-0">
        <div class="featured-post-title-container w-full lg:w-7/12 mx-auto">
            <div class="category-label mt-8">
                <?php
                $category = get_the_category();
                echo '<a class="text-black/50 font-medium text-[1rem] transition hover:text-black" href="' .
                    get_category_link($category[0]->cat_ID) .
                    '">' .
                    $category[0]->cat_name .
                    '</a>';
                ?>
            </div>

            <div class="featured-post-meta-container grid grid-cols-1 lg:grid-cols-12 gap-0 lg:gap-20 mb-8 w-full mx-auto items-center mt-3">
                <div class="featured-post-title col-span-1 lg:col-span-9">
                    <h2 class="post-title text-[1.75rem] lg:text-[2.25rem] font-medium text-black leading-[2.2rem] lg:leading-[2.75rem]">
                        <?php the_title(); ?>
                    </h2>
                </div>

                <div class="featured-post-meta col-span-1 lg:col-span-3 my-4 lg:my-0 mb-0 md:mb-0">
                    <ul class="flex justify-start lg:justify-end">
                        <li class="">
                            <a class="flex items-center justify-center bg-black rounded-[500px] w-7 h-7 lg:w-9 lg:h-9 text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-twitter" style="color: #fff;"></i>
                            </a>
                        </li>

                        <li class="ml-4">
                            <a class="flex items-center justify-center bg-black w-7 h-7 lg:w-9 lg:h-9 rounded-[500px] text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-facebook-f" style="color: #fff;"></i>
                            </a>
                        </li>

                        <li class="ml-4">
                            <a class="flex items-center justify-center bg-black w-7 h-7 lg:w-9 lg:h-9 rounded-[500px] text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-linkedin-in" style="color: #fff;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php if (has_post_thumbnail()): ?>
            <div class="featured-post-thumb mb-0 lg:mb-8 rounded overflow-hidden w-full lg:w-8/12 mx-auto">
                <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="single-post-content bg-white w-full pt-0 pb-6 lg:pb-20 lg:pt-0">
    <div class="w-full lg:w-7/12 mx-auto px-6">
        <div class="content text-black/80 text-[1.2rem] leading-8">
            <?php the_content(); ?>
        </div>

        <?php
        // FAQ section (unchanged)
        $has_faq = false;

        for ($i = 1; $i <= 4; $i++) {
            $question = get_field('question-' . $i);
            $answer = get_field('answer-' . $i);

            if ($question && $answer) {
                $has_faq = true;
                break;
            }
        }

        if ($has_faq): ?>
        <div id="faqs" class="bg-blue/5 rounded p-6 lg:p-12 mt-16 relative border-[2px] border-blue">
            <svg class="absolute top-6 right-6 w-[3rem] h-auto" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0509FF" viewBox="0 0 256 256">
                <path fill="#fff" d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="1"></path>
                <path d="M140,180a12,12,0,1,1-12-12A12,12,0,0,1,140,180ZM128,72c-22.06,0-40,16.15-40,36v4a8,8,0,0,0,16,0v-4c0-11,10.77-20,24-20s24,9,24,20-10.77,20-24,20a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-.72c18.24-3.35,32-17.9,32-35.28C168,88.15,150.06,72,128,72Zm104,56A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path></svg>
            
            <h2 class="text-blue w-3/4">Frequently Asked Questions</h2>
            
            <div class="faq-container">
                <?php for ($i = 1; $i <= 4; $i++) {
                    $question = get_field('question-' . $i);
                    $answer = get_field('answer-' . $i);

                    if ($question && $answer): ?>
                        <div class="faq-item">
                            <h3 class="text-black">Q: <?php echo esc_html($question); ?></h3>
                            <p class="text-black/80">A: <?php echo esc_html($answer); ?></p>
                        </div>
                    <?php endif;
                } ?>
            </div>
        </div>
        <?php endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
