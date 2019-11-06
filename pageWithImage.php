<?php /* Template Name: Seite mit Bild */ ?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="content title-image">
			<div class="grid-container title-image__container">
				<div class="title-image__image">
					<?php
						$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
					<img src="<?php echo $image_url; ?>">
				</div>
				<div class="title-image__wrapper">
					<h1 class="title-image__title" placeholder="Titel">
						<?php the_title(); ?>
					</h1>
				</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/content/content' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>