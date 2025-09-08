<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Limitless
 */

get_header(); ?>

<div class="container mx-auto bg-white m-[2.5%] lg:mt-12 p-6 md:p-12 rounded">
    <div class="header">
        <?php get_template_part('template-parts/nav-light'); ?>

        <main id="primary" class="site-main">
            <section class="error-404 not-found text-center mt-32 mb-20 mx-auto">
                <header class="page-header">
                    <h1 class="page-title xs:text-xl sm:text-3xl font-medium text-black mb-6 tracking-tighter">
                        <?php esc_html_e(
                            'Oops! That page can&rsquo;t be found...',
                            'limitless',
                        ); ?>
                    </h1>
                </header>

                <div class="page-content">
                    <div class="mt-0">
                        <a href="<?php echo esc_url(
                            home_url('/'),
                        ); ?>" class="button">
                            <?php esc_html_e('← Go home', 'limitless'); ?>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<?php get_footer();
