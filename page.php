<?php get_header(); ?>
<main class="wp-page-shell"><div class="container"><div class="entry-content legal-card">
<?php while (have_posts()) : the_post(); ?><h1 class="section-title compact"><?php the_title(); ?></h1><?php the_content(); ?><?php endwhile; ?>
</div></div></main>
<?php get_footer(); ?>
