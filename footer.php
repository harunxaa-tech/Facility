<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-brand"><span class="brand-mark">D</span><div><strong>Delfino</strong><small>Gelateria · Pizzeria</small></div></div>
    <div class="footer-nav"><a href="<?php echo esc_url(delfino_menu_url()); ?>">Speisekarte</a><a href="tel:+4989604061">Anrufen</a><a href="https://www.instagram.com/eiscafedelfino/" target="_blank" rel="noopener">Instagram</a></div>
    <div class="footer-legal"><a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a><a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutz</a></div>
  </div>
  <div class="container footer-bottom"><span>© <span id="year"><?php echo esc_html(date('Y')); ?></span> Eiscafé Delfino</span><span>Hauptstraße 55 · 85579 Neubiberg</span></div>
</footer>
<?php if (!is_page('bestellen') && !is_cart() && !is_checkout()) : ?>
<div class="mobile-orderbar single-action"><a class="mobile-order-primary" href="<?php echo esc_url(delfino_order_url()); ?>">Online bestellen</a></div>
<?php endif; ?>
<?php wp_footer(); ?>
</body></html>
