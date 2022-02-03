<?php
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){ 
	require_once get_template_directory() . '/src/MainNavWalker.php';
	require_once get_template_directory() . '/src/FooterNavWalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

function flyra_files() {
  wp_enqueue_script('jquery', get_theme_file_uri('dist/js/jquery/jquery.js'), NULL, '1.12.4', true);
  wp_enqueue_script('main-flyra-js', get_theme_file_uri('dist/js/script.min.js'), NULL, '1.0', true);
  wp_enqueue_style( 'flyra_styles', get_template_directory_uri() . '/dist/css/wordpress.css' ); 
}

add_action('wp_enqueue_scripts', 'flyra_files');  

add_theme_support( 'title-tag' );

//get acf-stuff
//require get_template_directory() . '/inc/acf-fields.php';

function flyra_features() {
  register_nav_menu('main-menu', 'Main Menu Header');
  register_nav_menu('service-menu', 'Service Menu Left');
  register_nav_menu('footer-menu', 'Footer Left Menu');
  register_nav_menu('footer-center-menu', 'Footer Center Menu');
  register_nav_menu('footer-right-menu', 'Footer Right Menu');
  register_nav_menu('footer-bottom-menu', 'Footer Bottom Menu');
  register_sidebar( array(
    'name' => 'Copyright',
    'id' => 'copyright',
    'description' => 'Copyright in footer. Use a Text-Element',
    'before_widget' => '<div class="footer__copyright">',
    'after_widget' => '</div>',
    ) );

  register_sidebar( array(
    'name' => 'Link on Footer',
    'id' => 'footer-link',
    'description' => 'Link in Footer. Use a Text-Element and make a Link. Please add target=_blank [_blank in quotes] to the link. <a target="_blank" href="https://www.w3schools.com/tags/att_a_target.asp">look here</a>',
    'before_widget' => '<div class="footer__info-right">',
    'after_widget' => '</div>',
  ) );
  
  register_sidebar( array(
    'name' => 'Kontakt 1 in blauer Box',
    'id' => 'contact-one',
    'description' => 'Bitte Text-Widget benutzen und im Titel den Text und im Content den Link für die Telefonnummer hinterlegen',
    'before_widget' => '<div class="tile-blue__text-wrapper">',
    'after_widget' => '</div>'
  ) );

  register_sidebar( array(
    'name' => 'Kontakt 2 in blauer Box',
    'id' => 'contact-two',
    'description' => 'Bitte Text-Widget benutzen und im Titel den Text und im Content den Link für das Kontaktformular hinterlegen',
    'before_widget' => '<div class="tile-blue__text-wrapper">',
    'after_widget' => '</div>'
  ) );

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'flyra_features');

//function to loop the categories for the flight-pages
function ow_categories_with_subcategories_and_posts( $taxonomy, $post_type, $currentCat ) {
  $taxonomy   = $taxonomy;
  $post_type  = $post_type;

  // Get the top categories that belong to the provided taxonomy (the ones without parent)
  $categories = get_terms( 
      array(
          'taxonomy'   => $taxonomy,
          'parent'     => 0, // <-- No Parent
          'orderby'    => 'term_id',
          'hide_empty' => true // <-- change to false to also display empty ones
      )
  );
  ?>            
  <?php
  // Iterate through all categories to display each individual category
  if (!empty( $categories ) && ! is_wp_error($categories)){
      foreach ( $categories as $category ) {
          $cat_name = $category->name;
          $cat_id   = $category->term_id;
          $cat_slug = $category->slug;
          $cat_subtitle_box = get_field('box-tandem-subtitle', $currentCat);
          $cat_title_box = get_field('box-tandem-title', $currentCat);
          
          if($cat_id === $currentCat->cat_ID) {
              // Get all the subcategories that belong to the current category
              $subcategories = get_terms(
                  array(
                      'taxonomy'   => $taxonomy,
                      'parent'     => $cat_id, // <-- The parent is the current category
                      'meta_key'       => 'order-cat',
                      'orderby'        => 'meta_value',
                      'order'          => 'ASC',
                      'hide_empty' => true
                  )
              );
              
              // Iterate through all subcategories to display each individual subcategory
              foreach ( $subcategories as $subcategory ) {

                  $subcat_name = $subcategory->name;
                  $subcat_id   = $subcategory->term_id;
                  $subcat_slug = $subcategory->slug;
                  $subcat_desc = $subcategory->description;
                  $cat_button = get_field('button-info-page', $subcategory); 
                  $cat_button_link = get_field('btn-link-infopage', $subcategory);
                  $cat_icon = get_field('icons_for_cat', $subcategory, false);

                  ?>
                  <section class="categories" data-sticky-container>
                      <div id="<?php echo $subcat_slug ?>" class="category-title" data-margin-top="130" data-sticky-class="is-sticky" data-sticky-for="992">
                          <div class="category-title__icon">
                              <?php echo $cat_icon; ?>                  
                          </div> 
                          <div class="category-title__pretitle"><?php echo $subcat_name ?></div>
                          <h3 class="category-title__title"><?php echo $subcat_desc ?></h3>
                          <a href="<?php echo $cat_button_link ?>" class="arrow-link category-title__link">
                              <span class="arrow-link__button-text">
                                  <?php echo $cat_button ?>
                              </span>
                              <span class="arrow-link__button-arrow"></span>
                          </a>
                      </div>
                      <div class="category-items-wrapper">
                      <?php
                      // Get all posts that belong to this specific subcategory
                      $posts = new WP_Query(
                          array(
                              'post_type'      => $post_type,
                              'posts_per_page' => -1, // <-- Show all posts
                              'hide_empty'     => true,
                              'meta_key'       => 'ordering',
	                          'orderby'        => 'meta_value',
                              'order'          => 'ASC',
                              'tax_query'      => array(
                                  array(
                                      'taxonomy' => $taxonomy,
                                      'terms'    => $subcat_id,
                                      'field'    => 'id'
                                  )
                              )
                          )
                      );

                      // If there are posts available within this subcategory
                      if ( $posts->have_posts() ):
                          // As long as there are posts to show
                          while ( $posts->have_posts() ): $posts->the_post(); ?>
                              <div class="category-item">
                                  <div class="category-item__image-wrapper">
                                      <img src="<?php the_post_thumbnail_url( 'category-thumb' );?>" />
                                  </div>
                                  <div class=category-item__title-wrapper>
                                  <?php 
                                      $fields = get_field_objects();
                                      if( $fields ): ?>
                                          <ul class=category-item__sevice-list>
                                          <?php foreach( $fields as $field ): ?>
                                              <?php if( $field['name']=='flighttime' && $field['value'] ): ?>
                                                  <li class="category-item__service-list-item">
                                                      <span class="category-item__icon category-item__icon--time">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="13.6" height="20.894" viewBox="0 0 13.6 20.894">
                                                              <g id="Icon-Flugzeit" transform="translate(-26.4 -23.447)">
                                                                  <path id="Pfad_203" data-name="Pfad 203" d="M38.316,41.869V39.053a4.642,4.642,0,0,0-1.974-3.8l-1.833-1.287a.332.332,0,0,1-.08-.462.354.354,0,0,1,.08-.08l1.833-1.287a4.643,4.643,0,0,0,1.974-3.8V25.289m-10.611,0V28.34a4.643,4.643,0,0,0,1.974,3.8l1.833,1.287a.332.332,0,0,1,0,.542l-1.833,1.287a4.645,4.645,0,0,0-1.974,3.8v2.815" transform="translate(0.189 0.316)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                  <path id="Pfad_204" data-name="Pfad 204" d="M27.705,40.061c1.327,0,3.3-1.86,4.3-2.653a1.7,1.7,0,0,1,2,0c1.012.786,2.982,2.658,4.309,2.658m-9.257-9.616c2.653-1.062,4.841,1.211,8-.072M31.623,32.69c.952.242,1.332,1.4,1.387,1.4a2.658,2.658,0,0,1,1.36-1.56" transform="translate(0.189 1.46)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                  <rect id="Rechteck_19" data-name="Rechteck 19" width="12.6" height="1.658" rx="0.268" transform="translate(26.9 42.184)" stroke-width="1" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                                                  <rect id="Rechteck_20" data-name="Rechteck 20" width="12.6" height="1.658" rx="0.268" transform="translate(26.9 23.947)" stroke-width="1" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                                              </g>
                                                          </svg>
                                                      </span>
                                                      <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                  </li> 
                                              <?php endif; ?>
                                              <?php if( $field['name']=='altitude' && $field['value'] ): ?>
                                                  <li class="category-item__service-list-item">
                                                      <span class="category-item__icon category-item__icon--mountain">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="36.076" height="19.557" viewBox="0 0 36.076 19.557">
                                                              <g id="Gruppe_57" data-name="Gruppe 57" transform="translate(-1.45 -14.85)">
                                                                  <path id="Pfad_206" data-name="Pfad 206" d="M9.229,25,2.1,37.751H25.284L19.372,27.318m9.389,10.433h8.114l-4.521-7.94" transform="translate(0 -3.994)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                                                  <path id="Pfad_207" data-name="Pfad 207" d="M20.064,22.165l4.579,1.159L20.7,16.369a2.291,2.291,0,0,0-3.593,0L14.5,21.006l3.246,2.318ZM31.83,20.485,29.859,24.02l2.492,1.739,1.739-.869,3.478.869-2.956-5.274A1.81,1.81,0,0,0,31.83,20.485Z" transform="translate(-5.213 0)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                                              </g>
                                                          </svg>
                                                      </span>
                                                      <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                  </li> 
                                              <?php endif; ?>
                                              <?php if( $field['name']=='distance' && $field['value'] ): ?>
                                                  <li class="category-item__service-list-item">
                                                      <span class="category-item__icon category-item__icon--cart">
                                                          <svg xmlns="http://www.w3.org/2000/svg" width="22.099" height="20.693" viewBox="0 0 22.099 20.693">
                                                              <g id="Gruppe_69" data-name="Gruppe 69" transform="translate(-1.5 -3.5)">
                                                                  <path id="Pfad_208" data-name="Pfad 208" d="M16.453,17l3.481,3.481m-3.517.035L19.9,17.035m-6.857,2.673a3.516,3.516,0,0,1,2.391-.949M11.741,23.4a3.517,3.517,0,0,0,.176-1.02v-.105a3.519,3.519,0,0,1,.316-1.512M8.752,25.791a3.516,3.516,0,0,0,2.321-1.231m-6.33,1.231H7.415M2,25.791H3.407" transform="translate(0 -8.429)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                  <path id="Pfad_209" data-name="Pfad 209" d="M23.1,6.11V23.693l-7.736-2.11-5.626,2.11L2,21.583V4L9.736,6.11,15.363,4Z" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                              </g>
                                                          </svg>                                  
                                                      </span>
                                                      <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                  </li> 
                                              <?php endif; ?>
                                          <?php endforeach; ?>
                                          </ul>
                                      <?php endif; ?>
                                      <h2 class="category-item__title"><?php the_title(); ?></h2>
                                  </div>
                                  <div class="category-item__places">
                                      <span class="category-item__places-bold">Fluggebiete:</span> 
                                      <?php foreach( get_field('places') as $place ): ?>
                                          <a target="_blank" href="<?php echo $place['value']; ?>" class="category-item__places-item"><?php echo $place['label']; ?></a>
                                      <?php endforeach; ?>
                                  </div>
                                  <div class="category-item__text">
                                      <?php the_content();?>   
                                  </div>
                                  <p class="category-item__big-text"><?php the_field('price'); ?></p>
                                  <?php if(the_field('preiszusatz') !== NULL): ?>
                                      <p class="category-item__medium-text"><?php the_field('preiszusatz'); ?></p>
                                  <?php endif; ?>
                              </div>
                              <?php endwhile; ?>
                           </div>
                  </section>
                  
                  <?php else:
                      echo 'No posts found';
                  endif;
                      wp_reset_query();
                  }}?>
       <?php } ?>
          <section class="layout-bg">
              <div class="layout-bg__inner-wrapper" id="blue-box">
                <div class="title-h2">
                    <p class="title-h2__preline"><?php echo $cat_subtitle_box ?></p>
                    <h2 class="title-h2__title"><?php echo $cat_title_box ?></h2>
                </div>
                <?php get_template_part( 'template-parts/content/content-blueTile' ); ?>
              </div>
          </section>
      <?php } else { ?>
      <div>there are no categories found</div>
  <?php } ?>
 <?php
}

//function to loop the categories for the current page, as the information-page
function ow_categories_and_posts( $taxonomy, $post_type, $currentCat ) {
  $taxonomy   = $taxonomy;
  $post_type  = $post_type;

      $wpb_all_query = new WP_Query(
        array('post_type'=>'post', 
              'post_status'=>'publish', 
              'posts_per_page'=>-1,
              'meta_key'       => 'order-information',
              'orderby'        => 'meta_value',
              'order'          => 'ASC',
              'cat' => $currentCat->cat_ID
        )); ?>

    <?php if ( $wpb_all_query->have_posts() ) : ?>
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div class="text-tiles">
            <div class="text-tiles__icon">
                <?php the_field('icon', false, false) ?>                  
            </div>
            <h3 class="text-tiles__title"><?php the_title() ?></h3>
            <div class="text-tiles__text">
                <?php the_content() ?>
            </div>
        </div>
    <?php endwhile; ?>
    
    <?php endif;
}

//function to loop the categories for the current page, as the information-page
function ow_categories_and_posts_about_page( $taxonomy, $post_type, $currentCat ) {
  $taxonomy   = $taxonomy;
  $post_type  = $post_type;

      $wpb_all_query = new WP_Query(
        array('post_type'=>'post', 
              'post_status'=>'publish', 
              'posts_per_page'=>-1,
              'meta_key' => 'order-about',
              'orderby'=> 'meta_value',
              'order' => 'ASC',
              'cat' => $currentCat->cat_ID
        )); ?>

    <?php if ( $wpb_all_query->have_posts() ) : ?>
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
      <div class="image-tiles">
          <p class="image-tiles__subtitle"><?php the_title(); ?></p>
          <h3 class="image-tiles__title"><?php the_field('title') ?></h3>
          <a href="<?php the_field('link') ?>" class="arrow-link image-tiles__link">
              <span class="arrow-link__button-text">
                <?php the_field('link-text') ?>                              </span>
              <span class="arrow-link__button-arrow"></span>
          </a>
          <div class="image-tiles__embed">
              <?php the_content() ?>
          </div>
      </div>
    <?php endwhile; ?>
    
    <?php endif;
}

add_action('admin_head', 'remove_content_editor');
/**
 * Remove the content editor from pages as all content is handled through Panels
 */
function remove_content_editor()
{
    if((int) get_option('page_on_front')==get_the_ID())
    {
        remove_post_type_support('page', 'editor');
    }
}
?>

