<?php get_header(); ?>
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : ?>
      <main class="main single" data-sticky-container>
        <?php the_post(); ?>

        <?php
          // Get the ACF 'hero' and 'hero_mobile' fields
          $acf_hero_image = get_field('hero');
          $acf_hero_mobile = get_field('hero_mobile');

          // Get the hero image URL from a custom meta field '_hero_image'
          $hero_image = get_post_meta(get_the_ID(), '_hero_image', true);

          // Ensure it is an array (ACF image field returns an array by default)
          if (is_array($acf_hero_image) && !empty($acf_hero_image['url'])) {
              $hero_image_url = esc_url($acf_hero_image['url']);
          } else {
              // If ACF 'hero' is empty, check the '_hero_image' custom meta field
              if (!empty($hero_image)) {
                  $hero_image_url = esc_url($hero_image);
              } elseif (has_post_thumbnail()) {
                  $hero_image_url = get_the_post_thumbnail_url(get_the_ID(), 'category-thumb');
              } else {
                  $hero_image_url = ''; // No image found
              }
          }

          // Get hero mobile image URL
          $hero_mobile_url = (!empty($acf_hero_mobile['url'])) ? esc_url($acf_hero_mobile['url']) : '';

          // Display hero images
          if (!empty($hero_image_url)) {
              echo '<div class="hero-image">
                      <div class="hero-image__wrapper content">';

              // Add classes if a mobile image exists
              $desktop_class = !empty($hero_mobile_url) ? 'screen-only' : '';
              $mobile_class = !empty($hero_mobile_url) ? 'mobile-only' : '';

              // Desktop hero image
              echo '<img class="hero-image__image ' . esc_attr($desktop_class) . '" src="' . $hero_image_url . '" />';

              // Mobile hero image (if exists)
              if (!empty($hero_mobile_url)) {
                  echo '<img class="hero-image__image ' . esc_attr($mobile_class) . '" src="' . $hero_mobile_url . '" />';
              }

              echo '</div>
                  </div>';
          }
        ?>
        
        <div class="hero-image--placeholder"></div>
        <div class="title-lead sticky" data-sticky-wrap>
          <div class="content title-lead__content">
            <div class="grid-container title-lead__container">
              <div class="title-lead__categories-wrapper">
                <div class="title-lead__credits-container"> 
                  <div class="title-lead__credit">
                    <?php
                      for ($i = 0; $i < 20; $i++) {
                          $creditvar = 'credits' . $i;
                          $credit = get_field($creditvar);
                          $creditName = $credit['name'] ?? '';
                          $creditJob = $credit['job'] ?? '';

                          if (!empty($creditName)) {
                              echo '<div class="title-lead__credit-item">';
                              echo '<p class="title-lead__text">' . esc_html($creditJob) . '</p>';
                              echo '<p class="title-lead__text">' . esc_html($creditName) . '</p>';
                              echo '</div>';
                          }
                      }
                    ?>
                  </div>
                </div>
                <div class="title-lead__copyright-container">
                  <?php 
                    $copyright = get_field('copyright');
                    if (!empty($copyright)) {
                        echo '<p class="title-lead__copyright">©' . esc_html($copyright) . '</p>';
                    }
                  ?>
                </div>
              </div>
              <div class="title-lead__wrapper">
                <h1 class="title-lead__title">
                  <?php the_title(); ?>
                </h1>
                <p class="title-lead__lead">
                  <?php echo esc_html(get_field('lead')); ?>
                </p>
              </div>
            </div>
          </div> 
        </div>
        <div class="bg-white">
          <?php get_template_part('template-parts/content/content'); ?>
          <?php get_template_part('template-parts/content/content-prevNext'); ?>  
        </div>
      </main>
    <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer(); ?>
