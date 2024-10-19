<?php
// Check if the function already exists before declaring it
if (!function_exists('render_category_filter_button')) {
    // Function to output category filter button
    function render_category_filter_button($term) {
        // Start the common HTML structure
        $button_content = $term->name;

        // Check if the current page is NOT the homepage
        if (!is_front_page()) {
            // Generate a link to the homepage with the category slug as the hash
            $link = home_url() . '/#' . $term->slug;

            // Output the <a> tag styled as a button for non-homepage
            echo "<div class='filter__button-wrapper'>
                    <a href='$link' class='filter__button' data-filter-target='" . $term->slug . "'>
                        $button_content
                    </a>
                  </div>";
        } else {
            // Output the <button> for the homepage
            echo "<div class='filter__button-wrapper'>
                    <button class='filter__button' data-filter-target='" . $term->slug . "'>
                        $button_content
                    </button>
                  </div>";
        }
    }
}
?>

<!-- The combined filter list with navigation menu -->
<div class="filter">
    <div class="filter__wrapper">
        <?php
        // Render the navigation menu before the filter buttons using the custom walker
        wp_nav_menu( array( 
          'theme_location' => 'main-menu',
          'container'       => '', // No container for the menu
          'items_wrap'      => '%3$s', // Avoid wrapping in <ul> tags
          'walker'          => new Custom_Walker_Nav_Menu(), // Use the custom walker
          'menu_class'      => 'header__navigation filter__menu' // Added class for styling consistency
        ));

        // Now render the category filter buttons
        $taxonomy = array(); // Set this to the desired taxonomy, e.g., 'category'
        $terms = get_terms($taxonomy);
        $count = count($terms);

        if ($count > 0) {
            foreach ($terms as $term) {
                if ($term->taxonomy === 'category') {
                    // Call the reusable function for each term
                    render_category_filter_button($term);
                }
            }
        }
        ?>
    </div>
    <button class="filter__burger js-burger"><span class="line"></span><span class="line"></span><span class="line"></span></button>
</div>
