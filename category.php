<?php get_header(); ?>
    <main class="content">
        <h1 class="visually-hidden"><?php the_title() ?></h1>
        <div class="grid-container-space-between tiles">
        <?php 
        // the query
        $wpb_all_query = new WP_Query(
            array('post_type'=>'post', 
            'post_status'=>'publish', 
            'posts_per_page'=>-1,
            'meta_key'       => 'sort-number', // Specify the custom meta field to sort by
            'orderby'        => array(
                'meta_value_num' => 'ASC', // Sort by sort_number ascending
                'date'           => 'DESC' // Then by date descending
            )
            )); ?>
        
        <?php if ( $wpb_all_query->have_posts() ) : ?>
        
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <?php $custom_css_variable = 3;
                 if(get_field('col-numb') !== '') : ?>
                    <?php $custom_css_variable = get_field('col-numb'); ?>
                <?php endif; ?>
                <div class="tiles__item tiles__item--col-<?php echo $custom_css_variable; ?> 
                <?php foreach((get_the_category()) as $category){
                        echo "tiles__filter--".$category->slug." ";
                    }?>" data-category="<?php foreach((get_the_category()) as $category){
                        echo $category->slug." ";
                    }?>" data-id="<?php the_id() ?>" 
                >   <div class="tiles__cats-wrapper">
                        <?php foreach((get_the_category()) as $category){
                            echo "<button data-filter-target=".$category->slug." class='tiles__cat-filter'>".$category->name."</button>";
                        }?>
                    </div>
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
            <p><?php _e( 'Sorry, no posts' ); ?></p>
        <?php endif; ?>
    </main>
<?php get_footer(); ?> 