<?php get_header(); ?>
<?php $parent_cat_ID = get_field('category-offer');
$args = array(
    'parent' => $parent_cat_ID,
    'taxonomy' => 'category',
    'hide_empty' => false,
    'meta_key'       => 'order-cat',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
);
$subcats = get_categories($args);
$f = get_field("front-blue-box-subtitle");
$f2 = get_field("front-blue-box-title");

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
        <?php get_template_part( 'template-parts/content/content-frontList' ); ?>
        <?php get_template_part( 'template-parts/content/content-frontTextTiles' ); ?>
        <section class="layout-bg">
            <div class="title-h2">
                <p class="title-h2__preline"><?php echo $f; ?></p>
                <h2 class="title-h2__title"><?php echo $f2; ?></h2>
            </div>
            <?php get_template_part( 'template-parts/content/content-blueTile' ); ?>
        </section>
	<?php endwhile; ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/404/content' ); ?>
<?php endif; ?>

<?php get_footer(); ?>