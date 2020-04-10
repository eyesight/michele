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
  wp_enqueue_script('main-flyra-js', get_theme_file_uri('dist/js/script.min.js'), NULL, '1.0', true);
  wp_enqueue_style( 'flyra_styles', get_template_directory_uri() . '/dist/css/wordpress.css' ); 
}

function site_block_editor_styles() {
    wp_enqueue_style( 'site-block-editor-styles', get_template_directory_uri() . '/dist/css/style-editor.css' );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_styles' ); 
add_action('wp_enqueue_scripts', 'flyra_files');  

//get acf-stuff
//require_once 'inc/acf.php';

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

  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'flyra_features');

function flyra_allowed_block_types( $allowed_blocks, $post ) {
  /* this shows all blocks in console of Editor
  console.table( wp.blocks.getBlockTypes() );
  */
	$allowed_blocks = array(
    'core/video',
    "core-embed/youtube",
    "core-embed/vimeo",
    "core/image"
	);
  
	/* if( $post->post_type === 'page' ) {
    $allowed_blocks[] = 'cgb/block-mim-img-txt';
		$allowed_blocks[] = 'cgb/block-mim-img';
		$allowed_blocks[] = 'cgb/block-mim-img-title';
		$allowed_blocks[] = 'cgb/block-mim-list-container';
		$allowed_blocks[] = 'cgb/block-mim-list-item';
		$allowed_blocks[] = 'cgb/block-mim-list-item-title';
		$allowed_blocks[] = 'cgb/block-mim-list-outer-container';
		$allowed_blocks[] = 'cgb/block-mim-text';
		$allowed_blocks[] = 'cgb/block-mim-title-h3';
  }  */
  
	return $allowed_blocks;
}

add_filter( 'allowed_block_types', 'flyra_allowed_block_types', 10, 2 );

?>