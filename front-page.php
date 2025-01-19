<?php get_header(); ?>
<main class="content">
    <h1 class="visually-hidden"><?php the_title(); ?></h1>

    <div class="grid-container-space-between tiles">
        <?php 
            // the query     
            $wpb_all_query = new WP_Query(
                array(
                    'post_type'      => array('post', 'page'), // Include posts and pages
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'meta_query'     => array(
                        'relation' => 'AND', // Ensure all conditions must be met
                        array( // Only include posts and pages where 'sort-number' exists
                            'key'     => 'sort-number',
                            'compare' => 'EXISTS',
                        ),
                        array( // Only include posts and pages with 'sort-number' > 0
                            'key'     => 'sort-number',
                            'value'   => 0,
                            'type'    => 'NUMERIC',
                            'compare' => '>',
                        ),
                    ),
                    'meta_key'       => 'sort-number',
                    'orderby'        => array(
                        'meta_value_num' => 'ASC', // Sort by sort-number first
                        'date'           => 'DESC' // Then by publish date descending
                    ),
                )
            );
        ?>

        <?php if ( $wpb_all_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <?php 
                $custom_css_variable = 3;
                if (get_field('col-numb') !== '') {
                    $custom_css_variable = get_field('col-numb');
                } 
                $wrapper_classes = "tiles__item tiles__item--col-" . $custom_css_variable;
                if (get_post_type() === 'page') {
                    $wrapper_classes .= " tiles__item--page"; // Add additional class for pages
                }
                ?>
                <div class="<?php echo $wrapper_classes; ?> 
                <?php if (get_post_type() === 'post') { // Only add categories for posts
                    foreach ((get_the_category()) as $category) {
                        echo "tiles__filter--" . $category->slug . " ";
                    }
                } ?>" 
                data-category="<?php if (get_post_type() === 'post') { // Add data-category for posts
                    foreach ((get_the_category()) as $category) {
                        echo $category->slug . " ";
                    }
                } ?>" data-id="<?php the_id(); ?>" 
                >
                    <?php if (get_post_type() === 'post') : // Display category filters for posts ?>
                        <div class="tiles__cats-wrapper">
                            <?php foreach ((get_the_category()) as $category) {
                                echo "<button data-filter-target=" . $category->slug . " class='tiles__cat-filter'>" . $category->name . "</button>";
                            } ?>
                        </div>
                    <?php endif; ?>
                    
                    <a class="tiles__item-link" href="<?php the_permalink(); ?>">
                        <div class="tiles__img-wrapper">
                            <img src="<?php the_post_thumbnail_url('category-thumb'); ?>" alt="<?php the_title(); ?>">
                        </div>
                        <article class="tiles__text-wrapper">
                            <?php if (get_post_type() === 'page') : ?>
                                <?php 
                                    // Attempt to get the navigation title
                                    $menu_item_title = '';
                                    $locations = get_nav_menu_locations();
                                    if (isset($locations['main-menu'])) { // Replace 'primary' with your menu location
                                        $menu = wp_get_nav_menu_object($locations['main-menu']);
                                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                                        foreach ($menu_items as $menu_item) {
                                            if ($menu_item->object_id == get_the_ID()) {
                                                $menu_item_title = $menu_item->title;
                                                break;
                                            }
                                        }
                                    }
                                ?>
                                <h2 class="tiles__item-title">
                                    <?php echo !empty($menu_item_title) ? $menu_item_title : the_title(); ?>
                                </h2>
                            <?php else : ?>
                                <h3 class="tiles__item-title">
                                    <?php the_title(); ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ((get_field('copyright') !== '') || !(get_post_type() === 'page')) : ?>
                                <div class="tiles__item-copyright">
                                    Entstanden bei <?php echo get_field('copyright'); ?>
                                </div>
                            <?php endif; ?>
                        </article>
                    </a>

                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->
        </div>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('Sorry, no posts or pages found.'); ?></p>
        <?php endif; ?>
</main>
<?php get_footer(); ?>
