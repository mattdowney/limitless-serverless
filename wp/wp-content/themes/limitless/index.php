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

<div class="main bg-blue w-full flex flex-col p-6 md:p-10 overflow-x-hidden">
    <?php get_template_part('template-parts/simple-nav'); ?>

    <div class="blog-hero mt-20 md:mt-16 mb-8 md:mb-16">
        <?php
        $args = [
            'posts_per_page' => 1,
        ];

        $category_posts = new WP_Query($args);

        if ($category_posts->have_posts()):
            while ($category_posts->have_posts()):
                $category_posts->the_post(); ?>

                <div class="featured-post-title-container w-full md:w-7/12 mx-auto">
                    <div class="category-label mt-8">
                <?php
                $category = get_the_category();
                echo '<a class="text-white/70 font-medium text-[1rem] transition hover:text-white" href="' .
                    get_category_link($category[0]->cat_ID) .
                    '">' .
                    $category[0]->cat_name .
                    '</a>';
                ?>
            </div>

            <div class="featured-post-meta-container grid grid-cols-1 lg:grid-cols-12 gap-0 lg:gap-20 mb-8 w-full mx-auto items-center mt-3">
                <div class="featured-post-title col-span-1 lg:col-span-9">
                    <h2 class="post-title text-[1.75rem] lg:text-[2.25rem] font-medium text-white leading-[2.2rem] lg:leading-[2.75rem]">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </div>

                <div class="featured-post-meta col-span-1 lg:col-span-3 my-4 lg:my-0 mb-0 md:mb-0">
                    <ul class="flex justify-start lg:justify-end">
                        <li class="">
                            <a class="flex items-center justify-center bg-white rounded-[500px] w-7 h-7 lg:w-9 lg:h-9 text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-twitter" style="color: #0009FF;"></i>
                            </a>
                        </li>

                        <li class="ml-4">
                            <a class="flex items-center justify-center bg-white w-7 h-7 lg:w-9 lg:h-9 rounded-[500px] text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-facebook-f" style="color: #0009FF;"></i>
                            </a>
                        </li>

                        <li class="ml-4">
                            <a class="flex items-center justify-center bg-white w-7 h-7 lg:w-9 lg:h-9 rounded-[500px] text-base hover:bg-white transform hover:-translate-y-1 transition-transform duration-300 ease-out" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
                                <i class="fa-brands fa-linkedin-in" style="color: #0009FF;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="featured-post-thumb mb-6 md:mb-8 rounded overflow-hidden w-full md:w-8/12 mx-auto">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>

        <div class="featured-post-excerpt-container w-full md:w-7/12 mx-auto">
            <div class="featured-post-excerpt text-white text-[1.2rem] leading-8 mb-4">
                <p class="mb-0 text-white/80 inline">
                <?php
                $first_paragraph = get_first_paragraph();
                $read_more_link =
                    '<a class="text-white font-semibold transition group inline" href="' .
                    get_permalink() .
                    '"> Read more <span class="inline-block transform translate-x-0 transition-transform group-hover:translate-x-[2px]">→</span></a>';
                echo $first_paragraph . $read_more_link;
                ?>
                </p>
            </div>
        </div>
        <?php
            endwhile;
        else:
             ?>
        <p>Oops, there are no posts.</p>
        <?php
        endif;
        ?>
    </div>
</div>

<div class="blog-posts w-full md:w-10/12 mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 py-12 md:py-20 px-6 md:px-0">
    <?php
    $current_page = get_query_var('paged');
    $current_page = max(1, $current_page);

    $per_page = 6;
    $offset_start = 1;
    $offset = ($current_page - 1) * $per_page + $offset_start;

    // Modified query for TiDB compatibility - removed offset, using pagination differently
    $post_list = new WP_Query([
        'posts_per_page' => $per_page,
        'paged' => $current_page,
        'orderby' => 'date', 
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => 'post'
    ]);
    
    // Skip the first post manually if we're on page 1 (since it's shown as featured)
    if ($current_page == 1) {
        $skip_first = true;
        $posts_to_show = $per_page;
    } else {
        $skip_first = false;
        $posts_to_show = $per_page;
    }

    $total_rows = max(0, $post_list->found_posts - $offset_start);
    $total_pages = ceil($total_rows / $per_page);

    if ($post_list->have_posts()):
        $post_count = 0;
        while ($post_list->have_posts()):
            $post_list->the_post(); 
            $post_count++;
            
            // Skip the first post on page 1 (it's already shown as featured)
            if ($current_page == 1 && $post_count == 1) {
                continue;
            } ?>
        <article <?php post_class('mb-5'); ?>>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <div class="blog-archive-post-thumbnail h-[20rem] w-auto bg-black rounded overflow-hidden mb-6">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', ['class' => 'h-full w-full object-cover']); ?>
                    </a>
                </div>
            </a>

            <div class="blog-post-details">
                <div class="blog-post-intro">
                    <div class="blog-post-meta">
                        <p class="hidden lg:block meta mt-1 mb-1">
                        <?php
                        $category = get_the_category();
                        echo '<a class="text-black/40 font-medium text-[1rem] transition hover:text-black" href="' .
                            get_category_link($category[0]->cat_ID) .
                            '">' .
                            $category[0]->cat_name .
                            '</a>';
                        ?>
                        </p>
                    </div>
                    
                    <h2 class="post-title text-[1.6rem] font-medium mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <p class="mt-0">
                        <a class="text-blue font-semibold hover:text-black transition group" href="<?php the_permalink(); ?>">Read more <span class="inline-block transform translate-x-0 transition-transform group-hover:translate-x-[2px]">→</span></a>
                    </p>
                </div>
            </div>
        </article>
    <?php
        endwhile; ?>
        <div class="pagination">
            <?php echo paginate_links([
                'total' => $total_pages,
                'current' => $current_page,
                'prev_text' => __('← Back'),
                'next_text' => __('More →'),
            ]); ?>
        </div>
    <?php
    endif;
    wp_reset_postdata();
    ?>
</div>

<?php get_footer(); ?>
