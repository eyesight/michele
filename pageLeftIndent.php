<?php /* Template Name: Seite mit Einzug links (impressum) */ ?>
<?php get_header(); ?>
<main class="content-left-indent">
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="content title">
			<h1 class="title__text" placeholder="Titel">
				<?php the_title()?>
			</h1>
		</div>
		<?php get_template_part( 'template-parts/content/content' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>
</main>
<?php get_footer(); ?>