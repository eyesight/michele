<?php
function mim_files() {
  wp_enqueue_script('main-mim-js', get_theme_file_uri('dist/js/script.min.js'), NULL, '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Bree+Serif&display=swap');
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Bree+Serif|Open+Sans&display=swap');
  wp_enqueue_style( 'mim_styles', get_template_directory_uri() . '/dist/css/wordpress.css' ); 
}

add_action('wp_enqueue_scripts', 'mim_files');

function mim_features() {
  register_nav_menu('main-menu', 'Main Menu Header');
  register_nav_menu('social-menu', 'Social Media Footer');
  register_sidebar( array(
    'name' => 'Footer Adress',
    'id' => 'footer-adress',
    'description' => 'Adress in the footer area',
    'before_widget' => '<div class="footer__text">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer__title">',
    'after_title' => '</h3>',
    ) );

    register_sidebar( array(
      'name' => 'Text on Frontpage',
      'id' => 'pretitle-front',
      'description' => 'Text on Frontpage',
      'before_widget' => '<div class="pre-title">',
      'after_widget' => '</div>',
      'class'         => 'pre-title__title'
      ) );
    add_theme_support('post-thumbnails');
    /* add_image_size('mimLandscape', 400, 260, true);
    add_image_size('mimPortrait', 480, 650, true);
    add_image_size('mimBanner', 1500, 350, true); */
}

add_action('after_setup_theme', 'mim_features');

//exclude a category on frontpage
function exclude_category_home( $query ) {
  if ( $query->is_home ) {
    $query->set( 'cat', '-600' );
  }
    return $query;
  }
   
  add_filter( 'pre_get_posts', 'exclude_category_home' );

?>