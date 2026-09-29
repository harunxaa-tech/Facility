<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#f4efe6">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="grain" aria-hidden="true"></div>
<header class="site-header <?php echo is_front_page() ? '' : 'solid-header'; ?>" id="top">
  <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Eiscafé Delfino Startseite">
    <span class="brand-mark">D</span>
    <span class="brand-copy"><strong>Delfino</strong><small>Gelateria · Pizzeria</small></span>
  </a>
  <nav class="desktop-nav" aria-label="Hauptnavigation">
    <a href="<?php echo esc_url(home_url('/#genuss')); ?>">Genuss</a>
    <a href="<?php echo esc_url(delfino_menu_url()); ?>">Speisekarte</a>
    <a href="<?php echo esc_url(home_url('/#feiern')); ?>">Feiern</a>
    <a href="<?php echo esc_url(home_url('/#besuch')); ?>">Besuch</a>
  </nav>
  <div class="header-actions">
    <a class="text-link hide-mobile" href="tel:+4989604061">089 604061</a>
    <a class="btn btn-dark btn-small hide-mobile" href="<?php echo esc_url(delfino_order_url()); ?>">Online bestellen</a>
    <button class="menu-toggle" type="button" aria-label="Menü öffnen" aria-expanded="false" aria-controls="mobile-menu"><span></span><span></span></button>
  </div>
</header>
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
  <div class="mobile-menu-inner">
    <a href="<?php echo esc_url(home_url('/#genuss')); ?>">Genuss</a>
    <a href="<?php echo esc_url(delfino_menu_url()); ?>">Speisekarte</a>
    <a href="<?php echo esc_url(home_url('/#feiern')); ?>">Feiern</a>
    <a href="<?php echo esc_url(home_url('/#besuch')); ?>">Besuch</a>
    <a class="btn btn-accent" href="<?php echo esc_url(delfino_order_url()); ?>">Online bestellen</a>
    <a class="btn btn-outline mobile-call-btn" href="tel:+4989604061">Anrufen</a>
  </div>
</div>
