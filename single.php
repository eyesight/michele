<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : ?>
        <main class="main single" data-sticky-container>
            <?php the_post(); ?>

            <?php
            // Get ACF fields
            $acf_hero_image = get_field('hero');
            $acf_hero_mobile = get_field('hero_mobile');
            $acf_hero_video = get_field('hero_video');

            // Get hero image from meta field
            $hero_image = get_post_meta(get_the_ID(), '_hero_image', true);

            // Determine hero image URL
            if (is_array($acf_hero_image) && !empty($acf_hero_image['url'])) {
                $hero_image_url = esc_url($acf_hero_image['url']);
            } elseif (!empty($hero_image)) {
                $hero_image_url = esc_url($hero_image);
            } elseif (empty($acf_hero_video) && has_post_thumbnail()) {
                $hero_image_url = get_the_post_thumbnail_url(get_the_ID(), 'category-thumb');
            } else {
                $hero_image_url = '';
            }

            // Mobile hero image URL
            $hero_mobile_url = (!empty($acf_hero_mobile['url'])) ? esc_url($acf_hero_mobile['url']) : '';

			$image_width = get_field('image-width');
			$object_fit_contain = get_field('object-fit-contain'); // true or false
			$wrapper_classes = [];

			$wrapper_classes[] = ($image_width === 'content') ? 'content' : 'fullwidth';
			
            // Display hero content
            if (!empty($hero_image_url) || !empty($hero_mobile_url)) {

				if ($object_fit_contain) {
					$wrapper_classes[] = 'hero-image__wrapper--contain';
				}	

                echo '<div class="hero-image">
                        <div class="hero-image__wrapper ' . esc_attr(implode(' ', $wrapper_classes)) . '">';

                $desktop_class = !empty($hero_mobile_url) ? 'screen-only' : '';
                $mobile_class = !empty($hero_mobile_url) ? 'mobile-only' : '';

                if (!empty($hero_image_url)) {
                    echo '<img class="hero-image__image ' . esc_attr($desktop_class) . '" src="' . $hero_image_url . '" />';
                }

                if (!empty($hero_mobile_url)) {
                    echo '<img class="hero-image__image ' . esc_attr($mobile_class) . '" src="' . $hero_mobile_url . '" />';
                }

                echo '</div>
                    </div>';
            } elseif (!empty($acf_hero_video)) {
                echo '<div class="hero-video">
                        <div class="' . esc_attr(implode(' ', $wrapper_classes)) . '">' . $acf_hero_video . '</div>
                      </div>';
            }
            ?>

            <div class="hero-image--placeholder"></div>

            <div class="title-lead sticky" data-sticky data-sticky-wrap>
                <div class="content title-lead__content">
                    <div class="grid-offset-container title-lead__container">
                        <div class="title-lead__wrapper">
                            <h1 class="title-lead__title"><?php the_title(); ?></h1>
                            <p class="title-lead__lead"><?php echo esc_html(get_field('lead')); ?></p>
                        </div>

						<?php
						$hasCredits = false;

						for ($i = 0; $i < 20; $i++) {
							$creditvar = 'credits' . $i;
							$credit = get_field($creditvar);
							if (!empty($credit['name'])) {
								$hasCredits = true;
								break;
							}
						}

						if ($hasCredits): ?>
                        	<div class="title-lead__categories-wrapper">
                                <div class="title-lead__credits-container">
                                    <div class="title-lead__credit-item">
                                        <p class="title-lead__text title-lead__text--bold">Credits</p>
                                        <div>
                                            <?php
                                            for ($i = 0; $i < 20; $i++) {
                                                $creditvar = 'credits' . $i;
                                                $credit = get_field($creditvar);
                                                $creditName = $credit['name'] ?? '';
                                                $creditJob = $credit['job'] ?? '';

                                                if (!empty($creditName)) {
                                                    echo '<p class="title-lead__text">' . esc_html($creditJob) . ': ' . esc_html($creditName) . '</p>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
							</div>
						<?php endif; ?>
						<?php
                            $client = get_field('client');
                            if (!empty($client)) {
                                echo '<div class="title-lead__client-wrapper">';
                                echo '<p class="title-lead__text title-lead__text--bold">Kunde</p>';
                                echo '<p class="title-lead__text">' . esc_html($client) . '</p>';
                                echo '</div>';
                            }
						?>
						<?php
							$copyright = get_field('copyright');
							if (!empty($copyright)) {
								echo '<div class="title-lead__copyright-wrapper">';
								echo '<p class="title-lead__copyright">©' . esc_html($copyright) . '</p>';
								echo '</div>';
							}
						?>
                    </div> <!-- .title-lead__container -->
                </div> <!-- .title-lead__content -->
            </div> <!-- ✅ Properly closed .title-lead sticky -->

            <div class="bg-white">
                <?php get_template_part('template-parts/content/content'); ?>
                <?php get_template_part('template-parts/content/content-prevNext'); ?>  
            </div>
        </main>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
