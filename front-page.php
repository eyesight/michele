<?php get_header(); ?>
<?php $parent_cat_ID = 11;
$args = array(
    'parent' => $parent_cat_ID,
    'taxonomy' => 'category',
    'hide_empty' => false,
    'meta_key'       => 'order-cat',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
);
$subcats = get_categories($args);
?>
      
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content-hero' ); ?>
        <section class="layout-centered">
            <div class="title-h2">
                <p class="title-h2__preline">Gleitschirm Tandemflüge</p>
                <h2 class="title-h2__title">Entdecke mein Flugangebot.</h2>
            </div>
            <?php set_query_var( 'subcats', $subcats ); ?>
            <?php get_template_part( 'template-parts/content/content-frontTilesPictures' ); ?>
        </section>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>