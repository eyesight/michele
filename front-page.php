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
                        'relation' => 'OR',
                        array( // Posts and pages with a valid sort-number
                            'key'     => 'sort-number',
                            'compare' => 'EXISTS',
                        ),
                        array( // Posts without sort-number
                            'relation' => 'AND',
                            array(
                                'key'     => 'sort-number',
                                'compare' => 'NOT EXISTS',
                            ),
                            array(
                                'key'     => 'post_type',
                                'value'   => 'post',
                                'compare' => '=',
                            ),
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
                            <h2 class="tiles__item-title">
                                <?php the_title(); ?>
                            </h2>
                            <div class="tiles__item-copyright">
                                <?php if (get_field('copyright') !== '') : ?>
                                    Entstanden bei <?php echo get_field('copyright'); ?>
                                <?php endif; ?>
                            </div>
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
