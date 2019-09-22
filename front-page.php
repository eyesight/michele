<?php get_header(); ?>

<?php get_template_part( 'template-parts/content/content-categorieList' ); ?>

<?php 
// the query
$wpb_all_query = new WP_Query(
    array('post_type'=>'post', 
    'post_status'=>'publish', 
    'posts_per_page'=>-1
    )); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 
<ul>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <li>
        <a href="<?php the_permalink(); ?>">
            <img class="random" src="<?php the_post_thumbnail_url( 'category-thumb' );?>" >
            <?php the_title(); ?>
            <?php if ( ! has_excerpt() ) {
                get_template_part( 'template-parts/content/content' );
            } else { 
                the_excerpt();
            }?>
        </a>
        <p> <?php 
    foreach((get_the_category()) as $category){
        echo $category->name." ";
        }
    ?></p></li>
    <?php endwhile; ?>
    <!-- end of the loop -->
</ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?> 