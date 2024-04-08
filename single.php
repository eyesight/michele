<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<main class="main single">
			<?php the_post(); ?>
			<div class="content title-lead">
				<div class="grid-container title-lead__container">
					<div class="title-lead__categories-wrapper">
						<div class="title-lead__categories-container">
							<?php the_category_valid(); ?>
						</div>
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
			<?php get_template_part( 'template-parts/content/content' ); ?>
			<?php get_template_part( 'template-parts/content/content-prevNext' ); ?>  
		</main>
	<?php endwhile; ?>
<?php else : ?>
<?php endif;  ?>
  
  <?php get_footer(); ?>