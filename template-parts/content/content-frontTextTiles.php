<?php $parent_cat_ID_info = get_field('category-information-front'); ?>

<?php $wpb_all_query = new WP_Query(
        array('post_type'      =>'post', 
              'post_status'    =>'publish', 
              'posts_per_page' => 4,
              'meta_key'       => 'order-information',
              'orderby'        => 'meta_value',
              'order'          => 'ASC',
              'cat' => $parent_cat_ID_info
        )); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>
<section class="layout-centered">
    <div class="title-h2">
        <p class="title-h2__preline"><?php echo get_cat_name( $parent_cat_ID_info ); ?></p>
        <h2 class="title-h2__title"><?php echo category_description( $parent_cat_ID_info );?></h2>
    </div>
    <div class="info-tile-wrapper">
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div class="info-tile">
            <div class="info-tile__icon">
                <?php the_field('icon', false, false) ?>
            </div>
            <h3 class="info-tile__title"><?php the_title() ?></h3>
            <div class="info-tile__text">
                <?php the_content() ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <a href="<?php echo get_category_link( $parent_cat_ID_info ); ?>" class="arrow-link">
        <span class="arrow-link__button-text">Mehr Wissenswertes</span><span class="arrow-link__button-arrow"></span>
    </a>
</section>
<?php endif; ?>