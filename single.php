<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div class="content title-lead">
			<div class="grid-container title-lead__container">
				<div class="title-lead__categories-wrapper">
					<p class="title-lead__categories">
						<?php the_category_valid(); ?>
					</p>
						<?php 
							$value = get_field('copyright');
							if( $value ) {
								echo '<p class="title-lead__copyright" placeholder="copyright">@' . 
								 $value
								. '</p>';
							} else {
								echo '';
							}
						?>
				</div>
				<div class="title-lead__wrapper">
					<h1 class="title-lead__title" placeholder="Titel">
						<?php the_title()?>
					</h1>
					<p class="title-lead__lead" placeholder="LeadText">
						<?php the_subtitle()?>
					</p>
				</div>
			</div>
		</div>
		<?php get_template_part( 'template-parts/content/content' ); ?>
    	<?php get_template_part( 'template-parts/content/content-prevNext' ); ?>  
	<?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>
  
  <?php get_footer(); ?>