<?php get_header(); ?>
<main class="wp-page-shell"><div class="container"><div class="entry-content legal-card">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?><article><h1 class="section-title compact"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php the_excerpt(); ?></article><?php endwhile; else: ?><p>Keine Inhalte gefunden.</p><?php endif; ?>
</div></div></main>
<?php get_footer(); ?>
