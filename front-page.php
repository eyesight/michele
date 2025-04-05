<?php get_header(); ?>
<main class="content">
    <h1 class="visually-hidden"><?php the_title(); ?></h1>

    <div class="grid-container-space-between tiles">
        <?php 
        $wpb_all_query = new WP_Query(array(
            'post_type'      => array('post', 'page'),
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'not-on-front',
                    'value'   => '1',
                    'compare' => '!=',
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'sortdate',
                        'compare' => 'EXISTS',
                    ),
                    array(
                        'key'     => 'sortdate',
                        'compare' => 'NOT EXISTS',
                    ),
                ),
            ),
            'orderby'   => array(
                'meta_value' => 'DESC',
                'date'       => 'DESC',
            ),
            'meta_key'  => 'sortdate',
        ));
        ?>

        <?php if ($wpb_all_query->have_posts()) { ?>

            <?php while ($wpb_all_query->have_posts()) {
                $wpb_all_query->the_post();

                $custom_css_variable = get_field('col-numb') !== '' ? get_field('col-numb') : 3;
                $wrapper_classes = "tiles__item tiles__item--col-" . $custom_css_variable;

                if (get_post_type() === 'page') {
                    $wrapper_classes .= " tiles__item--page";
                }

                $extra_classes = '';
                $data_category = '';

                if (get_post_type() === 'post') {
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        $extra_classes .= ' tiles__filter--' . $category->slug;
                        $data_category .= $category->slug . ' ';
                    }
                } else {
                    $menu_item_title = '';
                    $locations = get_nav_menu_locations();
                    if (isset($locations['main-menu'])) {
                        $menu = wp_get_nav_menu_object($locations['main-menu']);
                        $menu_items = wp_get_nav_menu_items($menu->term_id);
                        foreach ($menu_items as $menu_item) {
                            if ($menu_item->object_id == get_the_ID()) {
                                $menu_item_title = $menu_item->title;
                                break;
                            }
                        }
                    }
                    $page_slug = sanitize_title(!empty($menu_item_title) ? $menu_item_title : get_the_title());
                    $extra_classes .= ' tiles__filter--' . $page_slug;
                    $data_category = $page_slug;
                }
            ?>

                <div class="<?php echo esc_attr($wrapper_classes . $extra_classes); ?>" 
                     data-category="<?php echo esc_attr($data_category); ?>" 
                     data-id="<?php the_id(); ?>">

                    <div class="tiles__cats-wrapper">
                        <?php 
                        if (get_post_type() === 'post') {
                            $categories = get_the_category();
                            foreach ($categories as $category) {
                                echo "<button data-filter-target='" . esc_attr($category->slug) . "' class='tiles__cat-filter'>" . esc_html($category->name) . "</button>";
                            }
                        } else {
                            $button_label = !empty($menu_item_title) ? $menu_item_title : get_the_title();
                            echo "<button data-filter-target='" . sanitize_title($button_label) . "' class='tiles__cat-filter'>" . esc_html($button_label) . "</button>";
                        }
                        ?>
                    </div>

                    <a class="tiles__item-link" href="<?php the_permalink(); ?>">
                        <div class="tiles__img-wrapper">
                            <?php 
                            $image_front = get_field('image_front');
                            $image_url = '';

                            if ($image_front) {
                                // If ACF image field is set
                                $image_url = is_array($image_front) ? $image_front['url'] : $image_front;
                            } else {
                                // Fallback to featured image
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'category-thumb');
                            }
                            ?>

                            <?php if ($image_url): ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <article class="tiles__text-wrapper">
                            <?php if (get_post_type() === 'page') { ?>
                                <?php 
                                $menu_item_title = '';
                                $locations = get_nav_menu_locations();
                                if (isset($locations['main-menu'])) {
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
                                <h2 class="tiles__item-title"><?php echo !empty($menu_item_title) ? esc_html($menu_item_title) : get_the_title(); ?></h2>
                            <?php } else { ?>
                                <h3 class="tiles__item-title"><?php the_title(); ?></h3>
                            <?php } ?>

                            <?php 
                            $copyright = get_field('copyright');
                            if (!empty($copyright) || get_post_type() !== 'page') { ?>
                                <div class="tiles__item-copyright">
                                    <?php echo esc_html($copyright); ?>
                                </div>
                            <?php } ?>
                        </article>
                    </a>
                </div>
            <?php } // end while ?>
            <?php wp_reset_postdata(); ?>
        <?php } else { ?>
            <p><?php _e('Sorry, no posts or pages found.'); ?></p>
        <?php } ?>
    </div>
</main>
<?php get_footer(); ?>
