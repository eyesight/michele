<?php get_header(); ?>
    <div class="content">
        <?php get_template_part( 'template-parts/content/content-categorieList' ); ?>
        <div class="grid-container tiles">
        <?php 
        // the query
        $wpb_all_query = new WP_Query(
            array('post_type'=>'post', 
            'post_status'=>'publish', 
            'posts_per_page'=>-1,
            'meta_key' => 'date',
	        'orderby' => 'meta_value',
	        'order' => 'DESC'
            )); ?>
        
        <?php if ( $wpb_all_query->have_posts() ) : ?>
        
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <div class="tiles__item <?php foreach((get_the_category()) as $category){
                        echo "tiles__filter--".$category->slug." ";
                    }?>" data-category="<?php foreach((get_the_category()) as $category){
                        echo $category->slug." ";
                    }?>" data-id="<?php the_id() ?>" 
                >   <div class="tiles__cats-wrapper">
                        <?php foreach((get_the_category()) as $category){
                            echo "<p class='tiles__cat-text'>".$category->name."</p>";
                        }?>
                    </div>
                    <a class="tiles__item-link" href="<?php the_permalink(); ?>">
                        <div class="tiles__img-wrapper">
                            <img src="<?php the_post_thumbnail_url( 'category-thumb' );?>">
                        </div>
                        <div class="tiles__text-wrapper">
                            <div class="tiles__item-title">
                                <?php the_title() ?>
                            </div>
                            <div class="tiles__item-copyright">
                                <?php if(get_field('copyright') !== '') : ?>
                                    Entstanden bei <?php echo get_field('copyright'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
            <!-- end of the loop -->
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts' ); ?></p>
        <?php endif; ?>
    </div>
<?php get_footer(); ?> 