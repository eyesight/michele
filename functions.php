<?php
function mim_files() {
  wp_enqueue_script('main-mim-js', get_theme_file_uri('dist/js/script.min.js'), NULL, '1.0', true);
  wp_enqueue_style( 'mim_styles', get_template_directory_uri() . '/dist/css/wordpress.css' ); 
}

function site_block_editor_styles() {
    wp_enqueue_style( 'site-block-editor-styles', get_template_directory_uri() . '/dist/css/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_styles' ); 
add_action('wp_enqueue_scripts', 'mim_files');  

function mim_features() {
  register_nav_menu('main-menu', 'Main Menu Header');
  register_nav_menu('main-menu-mobile', 'Main Menu Header Mobile');
  register_nav_menu('social-menu', 'Social Media Footer');
  register_nav_menu('footer-menu', 'Footer Menu');
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
      ) );

    register_sidebar( array(
      'name' => 'Text in header',
      'id' => 'headertext',
      'description' => 'Text in header, running from left to right',
      'before_widget' => '<div class="animated-text__item">',
      'after_widget' => '</div>',
      ) );
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mim_features');

function the_category_valid() {
  $categories = get_the_category();
     $separator = ',';
     $output = '';
     if($categories){
       foreach($categories as $category) {
         $category_link = get_category_link($category->cat_ID);
         $output .= '<p class="title-lead__categories"><a href=" '.$category_link.'" >'.$category->cat_name.'</a></p>,';
       }
       echo trim($output, $separator);
     }
 }

add_filter( 'allowed_block_types', 'mim_allowed_block_types', 10, 2 );
 
function mim_allowed_block_types( $allowed_blocks, $post ) {
 /* this shows all blocks in console of Editor
    console.table( wp.blocks.getBlockTypes() );
*/
	$allowed_blocks = array(
    'cgb/block-mim-img-txt',  
    'cgb/block-mim-img',
    'cgb/block-mim-img-title',
    'cgb/block-mim-img-up', 
    'core/video',
    "core-embed/youtube",
    "core-embed/vimeo",
    "core/image"
	);

	if( $post->post_type === 'page' ) {
		$allowed_blocks[] = 'cgb/block-mim-img-txt';
		$allowed_blocks[] = 'cgb/block-mim-img';
		$allowed_blocks[] = 'cgb/block-mim-img-title';
		$allowed_blocks[] = 'cgb/block-mim-list-container';
		$allowed_blocks[] = 'cgb/block-mim-list-item';
		$allowed_blocks[] = 'cgb/block-mim-list-item-title';
		$allowed_blocks[] = 'cgb/block-mim-list-outer-container';
		$allowed_blocks[] = 'cgb/block-mim-text';
		$allowed_blocks[] = 'cgb/block-mim-title-h3';
  } 

	return $allowed_blocks;
 
}


//exclude a category on frontpage
function exclude_category_home( $query ) {
  if ( $query->is_home ) {
    $query->set( 'cat', '-600' );
  }
    return $query;
  }
   
  add_filter( 'pre_get_posts', 'exclude_category_home' );
  include_once('inc/acf.php');

?>