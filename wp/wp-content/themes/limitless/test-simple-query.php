<?php
/**
 * Test Simple Query for TiDB Compatibility
 * Temporary file to test if basic queries work
 */

// Simple query without offset - test this first
$simple_query = new WP_Query([
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC'
]);

echo "<h2>Simple Query Results:</h2>";
if ($simple_query->have_posts()) {
    while ($simple_query->have_posts()) {
        $simple_query->the_post();
        echo "<p>✅ Found post: " . get_the_title() . " (ID: " . get_the_ID() . ")</p>";
    }
    wp_reset_postdata();
} else {
    echo "<p>❌ No posts found with simple query</p>";
}

echo "<br><br>";

// Test the complex query from your theme
$current_page = 1;
$per_page = 6;
$offset_start = 1;
$offset = ($current_page - 1) * $per_page + $offset_start;

$complex_query = new WP_Query([
    'posts_per_page' => $per_page,
    'paged' => $current_page,
    'offset' => $offset,
    'orderby' => 'date',
    'order' => 'DESC',
]);

echo "<h2>Complex Query Results (with offset = $offset):</h2>";
if ($complex_query->have_posts()) {
    while ($complex_query->have_posts()) {
        $complex_query->the_post();
        echo "<p>✅ Found post: " . get_the_title() . " (ID: " . get_the_ID() . ")</p>";
    }
    wp_reset_postdata();
} else {
    echo "<p>❌ No posts found with complex query (this is likely the problem)</p>";
}

echo "<br><br>";
echo "<p><strong>Total posts in database:</strong> " . wp_count_posts()->publish . "</p>";
?>