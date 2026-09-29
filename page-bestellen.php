<?php get_header(); ?>
<main class="wp-site-main">
<section class="order-hero"><div class="container order-hero-grid"><div><p class="eyebrow">Buon appetito</p><h1>Online<br>bestellen.</h1><p class="order-lead">Produkte auswählen, in den Warenkorb legen und direkt im Delfino-Design zur Kasse gehen – ohne auf eine andere Website zu wechseln.</p></div><div class="order-hours"><strong>Bestellzeiten</strong><span>Aktuell laut bestehendem Delfino-System: 11:30–20:30 Uhr. WooCommerce und vorhandene Bestellregeln bleiben aktiv.</span></div></div></section>
<?php delfino_render_product_catalog(true); ?>
<?php
// Falls die bestehende Bestellen-Seite zusätzlich wichtige Shortcodes/Plugin-Ausgaben enthält,
// bleiben sie unterhalb des neuen Katalogs erhalten. Ein leerer Inhalt wird nicht ausgegeben.
while (have_posts()) : the_post();
  $raw = trim((string)get_post_field('post_content', get_the_ID()));
  if ($raw !== '') : ?>
    <section class="order-legacy"><div class="container"><?php the_content(); ?></div></section>
  <?php endif;
endwhile;
?>
</main>
<?php get_footer(); ?>
