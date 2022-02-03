<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="title-h1">
			<h1 class="title-h1__text"><?php the_title()?></h1>
		</div>
		<?php get_template_part( 'template-parts/content/content' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>