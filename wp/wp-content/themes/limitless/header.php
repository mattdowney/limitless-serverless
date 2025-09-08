<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Limitless
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo esc_attr(limitless_get_meta_description()); ?>" />
    <link rel="canonical" href="<?php echo esc_url(limitless_get_canonical_url()); ?>" />

    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon-32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon-192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="384x384"
      href="<?php echo esc_url(get_template_directory_uri()); ?>/img/favicon-384.png"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/js/site-min.js"></script>

    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Open Graph -->
    <meta property="og:locale" content="<?php echo esc_attr(get_locale()); ?>" />
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />
    <meta property="og:title" content="<?php echo esc_attr(limitless_get_meta_title()); ?>" />
    <meta property="og:description" content="<?php echo esc_attr(limitless_get_meta_description()); ?>" />
    <meta property="og:url" content="<?php echo esc_url(limitless_get_canonical_url()); ?>" />
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/img/og.jpg" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@mattdowney" />
    <meta name="twitter:title" content="<?php echo esc_attr(limitless_get_meta_title()); ?>" />
    <meta name="twitter:description" content="<?php echo esc_attr(limitless_get_meta_description()); ?>" />
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/img/twitter.jpg" />

    <?php wp_head(); ?>

    <!-- Structured Data (JSON-LD) -->
    <?php if (is_home() || is_front_page()): ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
            "url": "<?php echo esc_url(home_url()); ?>",
            "description": "<?php echo esc_js(get_bloginfo('description')); ?>",
            "sameAs": [
                "https://twitter.com/mattdowney"
            ]
        }
        </script>
    <?php endif; ?>

    <?php if (is_single()): ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "<?php echo esc_js(get_the_title()); ?>",
            "description": "<?php echo esc_js(limitless_get_meta_description()); ?>",
            "author": {
                "@type": "Person",
                "name": "<?php echo esc_js(get_the_author()); ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "<?php echo esc_js(get_bloginfo('name')); ?>",
                "url": "<?php echo esc_url(home_url()); ?>"
            },
            "datePublished": "<?php echo get_the_date('c'); ?>",
            "dateModified": "<?php echo get_the_modified_date('c'); ?>",
            "url": "<?php echo esc_url(get_permalink()); ?>"
            <?php if (has_post_thumbnail()): ?>
            ,"image": "<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
            <?php endif; ?>
        }
        </script>
    <?php endif; ?>

    <?php if (is_category()): ?>
        <?php $category = get_queried_object(); ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_url(home_url()); ?>"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "<?php echo esc_js($category->name); ?>",
                    "item": "<?php echo esc_url(get_category_link($category->term_id)); ?>"
                }
            ]
        }
        </script>
    <?php endif; ?>

    <script src="https://kit.fontawesome.com/137bb2f766.js" crossorigin="anonymous"></script>

  <script
      src="https://openpanel.dev/op.js"
      defer
      async></script>
    <script>
        window.op = window.op || function (...args) { (window.op.q = window.op.q || []).push(args); };
        window.op('ctor', {
          clientId: '593c28ec-ea83-4dfa-b5fa-d37e177acd66',
          trackScreenViews: true,
          trackOutgoingLinks: true,
          trackAttributes: true,
        });
    </script>
  </head>

  <body <?php body_class('antialiased font-regular'); ?>>
    <?php wp_body_open(); ?>
    <?php $page_slug = is_front_page() ? 'home' : basename(get_permalink()); ?>
    <div id="<?php echo esc_attr($page_slug); ?>">
      <!-- Your site header content goes here -->
