<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content' ); ?>
    <?php get_template_part( 'template-parts/content/content-prevNext' ); ?>  
	<?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>
  
  <?php get_footer(); ?>