<?php get_header(); ?>
<main class="wp-site-main">
<section class="order-hero"><div class="container order-hero-grid"><div><p class="eyebrow">Buon appetito</p><h1>Speise<wbr>karte.</h1><p class="order-lead">Die Karte wird direkt aus den WooCommerce-Produkten aufgebaut. Wenn ein Preis oder Gericht im Shop geändert wird, ist es hier automatisch ebenfalls aktuell.</p></div><div class="order-hours"><strong>Direkt bestellen?</strong><span>In der Online-Bestellung können die Gerichte direkt in den Warenkorb gelegt werden.</span><div style="margin-top:16px"><a class="btn btn-dark btn-small" href="<?php echo esc_url(delfino_order_url()); ?>">Online bestellen</a></div></div></div></section>
<?php delfino_render_product_catalog(false); ?>
</main>
<?php get_footer(); ?>
