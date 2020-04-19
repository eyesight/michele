<?php /* Template Name: Seite Formular */ ?>
<?php get_header('blue'); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="title-h2">
			<h2 class="title-h2__title"><?php the_title(); ?></h2>
		</div>
		<div class="formular-wrapper">
			<?php get_template_part( 'template-parts/content/content' ); ?>
		</div>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>