<?php get_header(); ?>
    <div class="content">
        <?php get_template_part( 'template-parts/content/content-categorieList' ); ?>
        <div class="grid-container tiles">
        <?php 
        /* function get_inner_html( $node ) {
            $innerHTML= '';
            $children = $node->childNodes;
            foreach ($children as $child) {
                $innerHTML .= $child->ownerDocument->saveXML( $child );
            }
            return $innerHTML;
        } 

        function be_display_post_blockquote() {
            global $post;
            $blocks = parse_blocks( $post->post_content );
            foreach( $blocks as $block ) {
              if( 'cgb/block-mim-title-lead' === $block['blockName'] ) {
                $item = render_block( $block );
                echo $item;
                echo get_inner_html($item);
                break;
              }
            }
        } */

        // the query
        $wpb_all_query = new WP_Query(
            array('post_type'=>'post', 
            'post_status'=>'publish', 
            'posts_per_page'=>-1
            )); ?>
        
        <?php if ( $wpb_all_query->have_posts() ) : ?>
        
            <!-- the loop -->
            <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <div class="tiles__item <?php foreach((get_the_category()) as $category){
                        echo "tiles__filter--".$category->name." ";
                    }?>" data-category="<?php foreach((get_the_category()) as $category){
                        echo $category->name." ";
                    }?>" data-id="<?php the_id() ?>" 
                >
                    <a class="tiles__item-link" href="<?php the_permalink(); ?>">
                        <div class="tiles__img-wrapper">
                            <img class="random initial loading"
                            src="<?php the_post_thumbnail_url( 'category-thumb' );?>"
                            data-was-processed="true">
                        </div>
                        <div class="tiles__text-wrapper">
                            <div class="tiles__item-title"></div>
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