<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function limitless_setup() {
    load_theme_textdomain('limitless', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support(
        'custom-background',
        apply_filters('limitless_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]),
    );

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo', [
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ]);
}
add_action('after_setup_theme', 'limitless_setup');

function limitless_content_width() {
    $GLOBALS['content_width'] = apply_filters('limitless_content_width', 640);
}
add_action('after_setup_theme', 'limitless_content_width', 0);

function limitless_widgets_init() {
    register_sidebar([
        'name' => esc_html__('Sidebar', 'limitless'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'limitless'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'limitless_widgets_init');

function limitless_scripts() {
    wp_enqueue_style('limitless-styles', get_template_directory_uri() . '/css/main-min.css', [], _S_VERSION);
}

add_action('wp_enqueue_scripts', 'limitless_scripts');

require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

if (!function_exists('img_path')):
    function img_path($image_name) {
        return get_template_directory_uri() . '/img/' . $image_name;
    }
endif;

function get_first_paragraph() {
    global $post;
    $content = wp_strip_all_tags(get_post_field('post_content', $post->ID));

    $paragraphs = preg_split('/\n\s*\n/', $content);
    $first_paragraph = isset($paragraphs[0]) ? $paragraphs[0] : '';

    return '' . $first_paragraph . '';
}

function content_insert($content) {
    // Only proceed if we're on a single post
    if (!is_single()) {
        return $content;
    }
    
    // Get the template part content
    ob_start();
    get_template_part('template-parts/limitless-blog-insert');
    $custom_content = ob_get_clean();
    
    // Split content by h2 tags
    $content_parts = explode('<h2>', $content);
    
    // Only insert content if we have at least 2 h2 tags (index 0 is content before first h2, indexes 1+ are h2 sections)
    if (count($content_parts) >= 3) {
        $content_parts[2] = $custom_content . '<h2>' . $content_parts[2];
        $content = implode('<h2>', $content_parts);
    } 
    // If we have fewer h2 tags, just append the custom content at the end
    else {
        $content .= $custom_content;
    }
    
    return $content;
}
add_filter('the_content', 'content_insert');

// SEO Helper Functions
function limitless_get_meta_title() {
    if (is_home() || is_front_page()) {
        return get_bloginfo('name') . ' - ' . get_bloginfo('description');
    }
    
    if (is_single() || is_page()) {
        return get_the_title() . ' - ' . get_bloginfo('name');
    }
    
    if (is_category()) {
        $category = get_queried_object();
        return 'Category: ' . $category->name . ' - ' . get_bloginfo('name');
    }
    
    if (is_archive()) {
        return get_the_archive_title() . ' - ' . get_bloginfo('name');
    }
    
    if (is_search()) {
        return 'Search Results for "' . get_search_query() . '" - ' . get_bloginfo('name');
    }
    
    return get_bloginfo('name');
}

function limitless_get_meta_description() {
    $default_description = get_bloginfo('description');
    
    if (is_home() || is_front_page()) {
        return $default_description;
    }
    
    if (is_single() || is_page()) {
        $content = get_post_field('post_content', get_the_ID());
        $excerpt = wp_strip_all_tags($content);
        $excerpt = wp_trim_words($excerpt, 25, '...');
        return $excerpt ? $excerpt : $default_description;
    }
    
    if (is_category()) {
        $category = get_queried_object();
        if (!empty($category->description)) {
            return wp_trim_words($category->description, 25, '...');
        }
        return 'Browse articles in the ' . $category->name . ' category on ' . get_bloginfo('name');
    }
    
    if (is_archive()) {
        return 'Archive page for ' . get_the_archive_title() . ' on ' . get_bloginfo('name');
    }
    
    if (is_search()) {
        return 'Search results for "' . get_search_query() . '" on ' . get_bloginfo('name');
    }
    
    return $default_description;
}

function limitless_get_canonical_url() {
    global $wp;
    return home_url($wp->request);
}

// Add noindex to feed URLs and other pages that shouldn't be indexed
function limitless_add_noindex_meta() {
    if (is_feed() || is_trackback() || is_search() || is_404() || is_author()) {
        echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
    }
    
    // Add noindex to paginated archives beyond page 1
    if (is_paged() && get_query_var('paged') > 1) {
        echo '<meta name="robots" content="noindex, follow" />' . "\n";
    }
}
add_action('wp_head', 'limitless_add_noindex_meta', 1);

// Redirect feed URLs to their parent category pages (optional alternative)
function limitless_redirect_feeds() {
    if (is_feed()) {
        if (is_category_feed()) {
            $category = get_queried_object();
            wp_redirect(get_category_link($category->term_id), 301);
            exit;
        }
        if (is_home_feed()) {
            wp_redirect(home_url(), 301);
            exit;
        }
    }
}
// Uncomment the line below if you want to redirect feeds instead of noindexing them
// add_action('template_redirect', 'limitless_redirect_feeds');
