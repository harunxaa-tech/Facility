<?php
if (!defined('ABSPATH')) exit;

function delfino_modern_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    register_nav_menus(['primary' => __('Hauptnavigation', 'delfino-modern')]);
}
add_action('after_setup_theme', 'delfino_modern_setup');

function delfino_modern_assets() {
    wp_enqueue_style('delfino-modern', get_stylesheet_uri(), [], '1.0.0');
    wp_enqueue_script('delfino-modern', get_template_directory_uri() . '/assets/js/site.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'delfino_modern_assets', 20);

function delfino_order_url() {
    $page = get_page_by_path('bestellen');
    return $page ? get_permalink($page) : home_url('/bestellen/');
}
function delfino_menu_url() {
    $page = get_page_by_path('speisekarte');
    return $page ? get_permalink($page) : home_url('/speisekarte/');
}

function delfino_cart_count() {
    return (function_exists('WC') && WC()->cart) ? WC()->cart->get_cart_contents_count() : 0;
}

function delfino_cart_fragment($fragments) {
    ob_start(); ?>
    <span class="js-cart-count"><?php echo esc_html(delfino_cart_count()); ?></span>
    <?php
    $fragments['span.js-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'delfino_cart_fragment');

function delfino_sorted_product_categories() {
    if (!taxonomy_exists('product_cat')) return [];
    $terms = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ]);
    if (is_wp_error($terms)) return [];
    $priority = ['specials'=>1,'antipasti'=>2,'salate'=>3,'pizza'=>4,'pasta'=>5,'panini'=>6,'eis'=>7];
    usort($terms, function($a,$b) use ($priority){
        $pa = $priority[sanitize_title($a->name)] ?? $priority[$a->slug] ?? 100;
        $pb = $priority[sanitize_title($b->name)] ?? $priority[$b->slug] ?? 100;
        return $pa === $pb ? strcasecmp($a->name, $b->name) : $pa <=> $pb;
    });
    return array_values(array_filter($terms, fn($t) => $t->slug !== 'uncategorized'));
}

function delfino_product_description($product) {
    $text = $product->get_short_description();
    if (!$text) $text = $product->get_description();
    return wp_trim_words(wp_strip_all_tags($text), 25, '…');
}

function delfino_render_product_catalog($ordering = true) {
    if (!class_exists('WooCommerce')) {
        echo '<div class="order-empty">WooCommerce ist nicht aktiv. Nach der Installation/Aktivierung von WooCommerce erscheinen hier automatisch die Produkte.</div>';
        return;
    }
    $cats = delfino_sorted_product_categories();
    if (!$cats) {
        echo '<div class="order-empty">Noch keine Produktkategorien gefunden.</div>';
        return;
    }
    echo '<div class="order-tools"><div class="container order-tools-inner"><div class="catalog-tabs">';
    echo '<button class="catalog-tab active" type="button" data-target="all">Alles</button>';
    foreach($cats as $cat){
        echo '<button class="catalog-tab" type="button" data-target="cat-' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button>';
    }
    echo '</div><label class="catalog-search"><span class="screen-reader-text">Produkte suchen</span><input id="delfino-product-search" type="search" placeholder="Suchen …" autocomplete="off"></label>';
    if ($ordering && function_exists('wc_get_cart_url')) {
        echo '<a class="cart-pill" href="' . esc_url(wc_get_cart_url()) . '">Warenkorb <span class="js-cart-count">' . esc_html(delfino_cart_count()) . '</span></a>';
    }
    echo '</div></div><div class="order-catalog"><div class="container">';
    $n=1;
    foreach($cats as $cat){
        $products = wc_get_products([
            'status' => 'publish',
            'limit' => -1,
            'category' => [$cat->slug],
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);
        if (!$products) continue;
        echo '<section class="order-category" id="cat-' . esc_attr($cat->slug) . '">';
        echo '<div class="order-category-head"><span class="order-category-index">' . esc_html(str_pad((string)$n,2,'0',STR_PAD_LEFT)) . '</span><div><h2>' . esc_html($cat->name) . '</h2>';
        if ($cat->description) echo '<p class="order-category-desc">' . esc_html(wp_strip_all_tags($cat->description)) . '</p>';
        echo '</div></div><div class="order-list">';
        foreach($products as $product){
            $GLOBALS['product'] = $product;
            $desc = delfino_product_description($product);
            $search = function_exists('mb_strtolower') ? mb_strtolower($product->get_name().' '.$desc, 'UTF-8') : strtolower($product->get_name().' '.$desc);
            echo '<article class="order-item" data-search="' . esc_attr($search) . '"><div class="order-item-copy">';
            echo '<a class="catalog-product-link" href="' . esc_url(get_permalink($product->get_id())) . '"><h3>' . esc_html($product->get_name()) . '</h3></a>';
            if ($desc) echo '<p>' . esc_html($desc) . '</p>';
            echo '</div><div class="order-item-price">' . wp_kses_post($product->get_price_html()) . '</div>';
            if ($ordering) {
                echo '<div class="order-add">';
                woocommerce_template_loop_add_to_cart(['product' => $product]);
                echo '</div>';
            }
            echo '</article>';
        }
        echo '</div></section>';
        $n++;
    }
    echo '</div></div>';
    wp_reset_postdata();
}
