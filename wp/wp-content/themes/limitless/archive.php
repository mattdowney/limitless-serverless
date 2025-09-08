<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Limitless
 */

get_header(); ?>

<body <?php
$page_slug = 'archive-' . get_queried_object()->slug;
echo 'id="' . $page_slug . '"';
?> class="antialiased font-regular">

<div class="main bg-white w-full flex flex-col p-6 md:p-10 overflow-x-hidden">
    <?php get_template_part('template-parts/simple-nav'); ?>

    <div class="archive-content py-12">
        
        <!-- Archive Header with SEO Content -->
        <div class="archive-header w-full lg:w-10/12 mx-auto mb-8">
            <h1 class="archive-title text-[2rem] lg:text-[2.5rem] font-medium text-black leading-[2.5rem] lg:leading-[3rem] mb-4">
                <?php
                if (is_category()) {
                    echo 'Category: ' . single_cat_title('', false);
                } else {
                    the_archive_title();
                }
                ?>
            </h1>
            
            <?php if (is_category() && category_description()): ?>
                <div class="archive-description text-black/80 text-lg leading-relaxed mb-6">
                    <?php echo category_description(); ?>
                </div>
            <?php elseif (is_category()): ?>
                <div class="archive-description text-black/80 text-lg leading-relaxed mb-6">
                    <p>Explore our latest articles and insights in <?php single_cat_title(); ?>.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="archive-posts blog-posts w-full lg:w-10/12 mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 py-0 md:py-8 px-0">
            <?php if (have_posts()): ?>
                <?php while (have_posts()):
                    the_post(); ?>
                    <article <?php post_class(); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail mb-6 rounded overflow-hidden">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <p class="meta mb-2">
                                <?php
                                $category = get_the_category();
                                echo '<a class="text-black/40 font-medium text-[1rem] transition hover:text-black" href="' .
                                    get_category_link($category[0]->cat_ID) .
                                    '">' .
                                    $category[0]->cat_name .
                                    '</a>';
                                ?>
                            </p>
                            
                            <h2 class="post-title text-[1.5rem] lg:text-[1.75rem] font-medium text-black leading-[1.8rem] lg:leading-[2.2rem] mb-3">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="post-excerpt text-black/80 mb-4">
                                <?php the_excerpt(); ?>
                            </div>

                            <a class="text-blue font-semibold hover:text-black transition group" href="<?php the_permalink(); ?>">
                                Read more <span class="inline-block transform translate-x-0 transition-transform group-hover:translate-x-[2px]">→</span>
                            </a>
                        </div>
                    </article>
                <?php
                endwhile; ?>

                <?php the_posts_pagination([
                    'prev_text' => __('← Previous', 'limitless'),
                    'next_text' => __('Next →', 'limitless'),
                ]); ?>
            <?php else: ?>
                <p>No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
