<?php /* Template Name: Seite Formular Bestätigung */ ?>
<?php get_header('blueNavi'); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<section class="layout-content-width">
			<div class="icon-wrapper">
				<?php the_field('icon', false, false); ?>
			</div>
			<div class="title-h2">
				<p class="title-h2__preline"><?php the_title(); ?></p>
				<h2 class="title-h2__title"><?php the_field('subtitle'); ?></h2>
			</div>
			<?php get_template_part( 'template-parts/content/content' ); ?>
			<div class="layout-content-width__links">
				<?php $link1 = get_field('link1'); ?>
				<?php $link2 = get_field('link2'); ?>
				<?php if($link1) : ?>
				<a href="<?php echo array_values($link1)[1] ?>" class="arrow-link layout-content-width__link">
					<span class="arrow-link__button-text"><?php echo array_values($link1)[0] ?></span>
					<span class="arrow-link__button-arrow"></span>
				</a>
				<?php 
					endif; 
				?>
				<?php if($link2) : ?>
				<a href="<?php echo array_values($link1)[1] ?>" class="arrow-link layout-content-width__link">
					<span class="arrow-link__button-text"><?php echo array_values($link2)[0] ?></span>
					<span class="arrow-link__button-arrow"></span>
				</a>
				<?php
					endif;
				?>
			</div>
		</section>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>