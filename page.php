<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<main class="main page">
			<?php the_post(); ?>
			<div class="content title">
				<h1 class="title__text" placeholder="Titel">
					<?php the_title()?>
				</h1>
			</div>
			<?php get_template_part( 'template-parts/content/content' ); ?>
		</main>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>