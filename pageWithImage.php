<?php /* Template Name: Seite mit Bild */ ?>
<?php
	// Get the current menu location
	$current_menu_location = 'main-menu'; 
	$menu_locations = get_nav_menu_locations();
	$current_menu_id = $menu_locations[$current_menu_location];

	$current_page_id = get_the_ID();

	$menu_items = wp_get_nav_menu_items($current_menu_id);

	$active_menu_title = '';

	// Loop through menu items
	foreach ($menu_items as $menu_item) {
		// Check if the menu item corresponds to the current page
		if ($menu_item->object_id == $current_page_id) {
			// Get the title of the active menu item
			$active_menu_title = $menu_item->title;
					
			// Break the loop since we found the active menu item
			break;
		}
	}

	// if the active menu title is empty, set the title for the h1. Better than having nothing in the h1 of the page
	if($active_menu_title == '') {
		$active_menu_title = the_title();
	}
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<main class="content title-image">
			<div class="grid-container title-image__container">				
				<div class="title-image__image">
					<?php
						$image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
					<img src="<?php echo $image_url; ?>">
				</div>
				<div class="title-image__wrapper">
					<?php
                      for ($i = 0; $i < 20; $i++) {
                          $creditvar = 'credits' . $i;
                          $credit = get_field($creditvar);
                          $creditName = $credit['name'] ?? '';
                          $creditJob = $credit['job'] ?? '';

                          if (!empty($creditName)) {
                              echo '<div class="title-image__credit">';
                              echo '<p class="title-image__text bold">' . esc_html($creditJob) . '</p>';
                              echo '<p class="title-image__text">' . esc_html($creditName) . '</p>';
                              echo '</div>';
                          }
                      }
                    ?>
					<h1 class="title-image__title" placeholder="Titel">
						<?php the_title(); ?>
					</h1>
					<?php 
						// ACF field for Lead under the title
						$lead = get_field('lead'); 
						if ($lead): ?>
							<p class="title-image__lead"><?php echo esc_html($lead); ?></p>
					<?php endif; ?>
					<?php get_template_part( 'template-parts/content/content' ); ?>
				</div>
			</div>
		</main>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>