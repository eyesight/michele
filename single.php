<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<main class="main single" data-sticky-container>
			<?php the_post(); ?>

			<?php
				// Get the hero image URL from a custom field
				$hero_image = get_post_meta(get_the_ID(), '_hero_image', true);

				// Check if the hero image exists
				if (!empty($hero_image)) {
					echo '<div class="hero-image">
							<div class="hero-image__wrapper content">
								<img class="hero-image__image" src="' . esc_url($hero_image) . '" />
							</div>
						</div>';
				} 
				// If no hero image, use the post's featured image
				elseif (has_post_thumbnail()) { ?>
					<div class="hero-image">
							<div class="hero-image__wrapper content">
								<img class="hero-image__image" src="<?php the_post_thumbnail_url( 'category-thumb' );?>" /> 
							</div>
						</div>
			<?php	}
			?>
			<div class="hero-image--placeholder"></div>
			<div class="title-lead sticky" data-sticky-wrap>
				<div class="content title-lead__content">
					<div class="grid-container title-lead__container">
						<div class="title-lead__categories-wrapper">
							<div class="title-lead__credits-container">
								<div class="title-lead__credit">
									<?php
										for($i=0; $i<20; $i++){
											$creditvar = 'credits' . $i;
											$creditName = get_field($creditvar)['name'] === null ? '' : get_field($creditvar)['name'];
											$creditJob = get_field($creditvar)['job'] === null ? '' : get_field($creditvar)['job'];
											if($creditName && $creditName !== ''){
												echo '<div class="title-lead__credit-item">';
												echo '<p class="title-lead__text">' .$creditJob. '</p>';
												echo '<p class="title-lead__text">' .$creditName. '</p>';
												echo '</div>';
											}
										}
									?>
								</div>
							</div>
							<div class="title-lead__copyright-container">
								<?php 
									$value = get_field('copyright') === null ? '' : get_field('copyright');
									if( $value !== '' ) {
										echo '<p class="title-lead__copyright">©' . 
										$value
										. '</p>';
									} else {
										echo '';
									}
								?>
							</div>
						</div>
						<div class="title-lead__wrapper">
							<h1 class="title-lead__title" placeholder="Titel">
								<?php the_title()?>
							</h1>
							<p class="title-lead__lead" placeholder="LeadText">
								<?php echo get_field('lead')?>
							</p>
						</div>
					</div>
				</div> 
			</div>
			<div class="bg-white">
				<?php get_template_part( 'template-parts/content/content' ); ?>
				<?php get_template_part( 'template-parts/content/content-prevNext' ); ?>  
			</div>
		</main>
	<?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>
  
  <?php get_footer(); ?>