<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : ?>
    <?php the_post(); ?>
    <h1 class="titulo"><?php the_title(); ?></h1>
    <main class="container container-index"><?php the_content(); ?></main>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>