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

//get acf-stuff
require_once 'inc/acf.php';

// Register theme features
function mim_features() {
  register_nav_menu('main-menu', 'Main Menu Header');
  register_nav_menu('main-menu-mobile', 'Main Menu Header Mobile');
  register_nav_menu('social-menu', 'Social Media Footer');
  register_nav_menu('footer-menu', 'Footer Menu');
  register_sidebar( array(
    'name' => 'Footer Adress',
    'id' => 'footer-adress',
    'description' => 'Address in the footer area',
    'before_widget' => '<div class="footer__text">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="footer__title">',
    'after_title' => '</h3>',
    'show_in_rest' => false
    ) );

    register_sidebar( array(
      'name' => 'Footer Adress 2',
      'id' => 'footer-adress2',
      'description' => 'Address in the footer area',
      'before_widget' => '<div class="footer__text">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="footer__title">',
      'after_title' => '</h3>',
      'show_in_rest' => false
      ) );
    add_theme_support('post-thumbnails');
}

// Hook the mim_features function to the 'after_setup_theme' action
add_action('after_setup_theme', 'mim_features');

// Function to display categories of the post
function the_category_valid() {
  $categories = get_the_category();
     $separator = ',';
     $output = '';
     if($categories){
       foreach($categories as $category) {
         $category_link = get_category_link($category->cat_ID);
         $output .= '<div data-filter-target="'.$category->slug.'" class="title-lead__categories"><a href=" '.$category_link.'" >'.$category->cat_name.'</a></div>,';
       }
       echo trim($output, $separator);
     }
 }

// Filter to control the block types allowed in Gutenberg editor
add_filter( 'allowed_block_types_all', 'mim_allowed_block_types', 10, 2 );

// Function to specify allowed block types based on post type
function mim_allowed_block_types( $allowed_blocks, $post ) {
  $screen = get_current_screen();

  if ( $screen && $screen->post_type === 'page' ) {
      // Add or remove block types for the 'page' post type.
      $allowed_blocks = array(
        'cgb/block-mim-img-txt',  
        'cgb/block-mim-img',
        'cgb/block-mim-img-up', 
        'cgb/block-mim-title-h3',
        'cgb/block-mim-text',
        'cgb/block-mim-list-container',
        'cgb/block-mim-list-item',
        'cgb/block-mim-list-item-title',
        'cgb/block-mim-list-outer-container',
        "core/heading",
        // 'core/video',
        // "core/image",
        // "core/paragraph"
      );
  } elseif ( $screen && $screen->post_type === 'post' ) {
      // Add or remove block types for the 'post' post type.

      $allowed_blocks = array(
        'cgb/block-mim-img-txt',  
        'cgb/block-mim-img',
        'cgb/block-mim-img-up', 
        'cgb/block-mim-title-h3',
        'cgb/block-mim-text',
        'cgb/block-mim-video',
        "core/embed",
        'cgb/block-mim-image-container',
        'cgb/block-mim-img-sizes',
        "core/heading",
        // "core/image",
        // "core/paragraph"
      );
  }

  // Return the modified array of allowed blocks.
  return $allowed_blocks;
}


// Exclude a category on the front page
// not used yet
function exclude_category_home( $query ) {
  if ( $query->is_home ) {
      $excluded_category_name = 'notShowingOnFront'; // Change 'category_name_to_exclude' to the name of the category you want to exclude
      $excluded_category = get_category_by_slug( $excluded_category_name );
      
      if ( $excluded_category ) {
          $query->set( 'category__not_in', array( $excluded_category->term_id ) );
      }
  }
  return $query;
}

add_filter( 'pre_get_posts', 'exclude_category_home' );

// deactivate new block editor
function mim_theme_support() {
  remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'mim_theme_support' );


function create_category_on_theme_activation() {
  // Check if the category already exists
  $category = get_term_by('slug', 'your-theme-category-slug', 'category');

  // If the category doesn't exist, create it
  if (!$category) {
      $category_id = wp_insert_term(
          'Part of the team',
          'category',
          array(
              'description' => 'Wird auf Startseite nur bei aktivem Filter angezeigt. Ansonsten wird der Post ausgeblendet.',
              'slug' => 'part-of-the-team',
          )
      );
  }
}
add_action('init', 'create_category_on_theme_activation');

function add_hero_image_meta_box() {
  add_meta_box(
      'hero_image_meta_box',          // Unique ID for the meta box
      'Hero Image',                   // Meta box title
      'display_hero_image_meta_box',  // Callback function
      'post',                         // Post type
      'side',                         // Context (where it appears: side, normal, advanced)
      'high'                          // Priority
  );
}
add_action('add_meta_boxes', 'add_hero_image_meta_box');

function display_hero_image_meta_box($post) {
  // Retrieve the existing value
  $hero_image = get_post_meta($post->ID, '_hero_image', true);
  ?>
  <p>
      <label for="hero_image">Upload Hero Image</label>
      <input type="text" id="hero_image" name="hero_image" value="<?php echo esc_attr($hero_image); ?>" style="width: 100%;" />
      <input type="button" id="upload_hero_image_button" class="button" value="Upload Image" />
  </p>
  <script type="text/javascript">
      jQuery(document).ready(function($) {
          var mediaUploader;

          $('#upload_hero_image_button').click(function(e) {
              e.preventDefault();

              // If the uploader object has already been created, reopen the dialog
              if (mediaUploader) {
                  mediaUploader.open();
                  return;
              }

              // Create a new media uploader
              mediaUploader = wp.media({
                  title: 'Choose Hero Image',
                  button: {
                      text: 'Use this image'
                  },
                  multiple: false // Set to false to allow only one file selection
              });

              // When an image is selected, grab the URL and set it as the input field's value
              mediaUploader.on('select', function() {
                  var attachment = mediaUploader.state().get('selection').first().toJSON();
                  $('#hero_image').val(attachment.url);
              });

              // Open the uploader dialog
              mediaUploader.open();
          });
      });
  </script>
  <?php
}

// Save the meta box data
function save_hero_image_meta_box($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;
  if (isset($_POST['hero_image'])) {
      update_post_meta($post_id, '_hero_image', esc_url_raw($_POST['hero_image']));
  }
}
add_action('save_post', 'save_hero_image_meta_box');




class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start level function (do nothing here, no ul/ol tags)
    function start_lvl( &$output, $depth = 0, $args = null ) {}

    // End level function (do nothing here, no closing ul/ol tags)
    function end_lvl( &$output, $depth = 0, $args = null ) {}

    // Start each element
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Get the title and URL for the navigation item
        $title = $item->title;
        $url = $item->url;
        
        // Generate the button content similar to the filter buttons
        $button_content = $title;

        // Wrap the navigation item like a filter button
        $output .= "<div class='filter__button-wrapper'>
                        <a href='" . esc_url($url) . "' class='filter__button'>
                            $button_content
                        </a>
                    </div>";
    }

    // End each element (no closing tag needed for items)
    function end_el( &$output, $item, $depth = 0, $args = null ) {}
}

?>