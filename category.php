<?php $current_category = get_queried_object(); //getting current category 
if($current_category->slug === 'information') { ?>
    <?php get_header(); ?>
    <div class="title-h2">
        <p class="title-h2__preline"><?php echo $current_category->name?></p>
        <h2 class="title-h2__title"><?php echo $current_category->description?></h2>
    </div>
    <div class="text-tiles-wrapper">
        <?php
            ow_categories_and_posts( 'category', 'post', $current_category );
        ?>
    </div>
    <section class="layout-bg">
        <div class="title-h2">
            <p class="title-h2__preline"><?php the_field('box-tandem-subtitle', $current_category) ?></p>
            <h2 class="title-h2__title"><?php the_field('box-tandem-title', $current_category) ?></h2>
        </div>
        <?php get_template_part( 'template-parts/content/content-blueTile' ); ?>
    </section>
<?php } else if($current_category->slug === 'information-blue') { ?>
    <?php get_header('blue'); ?>
    <div class="title-h2">
        <p class="title-h2__preline"><?php echo $current_category->name?></p>
        <h2 class="title-h2__title"><?php echo $current_category->description?></h2>
    </div>
    <div class="text-tiles-wrapper">
        <?php
            ow_categories_and_posts( 'category', 'post', $current_category );
        ?>
    </div>
    <section class="layout-bg">
        <div class="title-h2">
            <p class="title-h2__preline"><?php the_field('box-tandem-subtitle', $current_category) ?></p>
            <h2 class="title-h2__title"><?php the_field('box-tandem-title', $current_category) ?></h2>
        </div>
        <?php get_template_part( 'template-parts/content/content-blueTile' ); ?>
    </section>
    <?php } else if($current_category->slug === 'about') { ?>
    <?php get_header(); ?>
    <div class="title-h2">
        <p class="title-h2__preline"><?php echo $current_category->name?></p>
        <h2 class="title-h2__title"><?php echo $current_category->description?></h2>
    </div>
    <div class="image-tiles-wrapper">
        <?php ow_categories_and_posts_about_page( 'category', 'post', $current_category ); ?>
    </div>
    <section class="insta-feed">
        <div class="insta-feed__title title-h2">
            <p class="title-h2__title">
            <svg class="insta-feed__icon xmlns="http://www.w3.org/2000/svg" width="69.978" height="69.962" viewBox="0 0 69.978 69.962">
                <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M34.991,19.281A17.937,17.937,0,1,0,52.929,37.219,17.909,17.909,0,0,0,34.991,19.281Zm0,29.6A11.662,11.662,0,1,1,46.653,37.219,11.683,11.683,0,0,1,34.991,48.881ZM57.847,18.548a4.184,4.184,0,1,1-4.184-4.184A4.174,4.174,0,0,1,57.847,18.548Zm11.88,4.246c-.265-5.6-1.546-10.569-5.651-14.659-4.09-4.09-9.055-5.37-14.659-5.651-5.776-.328-23.089-.328-28.865,0C14.962,2.749,10,4.029,5.892,8.119S.522,17.174.241,22.778c-.328,5.776-.328,23.089,0,28.865.265,5.6,1.546,10.569,5.651,14.659s9.055,5.37,14.659,5.651c5.776.328,23.089.328,28.865,0,5.6-.265,10.569-1.546,14.659-5.651,4.09-4.09,5.37-9.055,5.651-14.659.328-5.776.328-23.074,0-28.85ZM62.265,57.841a11.806,11.806,0,0,1-6.65,6.65C51.009,66.318,40.081,65.9,34.991,65.9s-16.033.406-20.623-1.405a11.806,11.806,0,0,1-6.65-6.65C5.892,53.236,6.313,42.308,6.313,37.219S5.908,21.186,7.718,16.6a11.806,11.806,0,0,1,6.65-6.65C18.974,8.119,29.9,8.541,34.991,8.541s16.033-.406,20.623,1.405a11.806,11.806,0,0,1,6.65,6.65C64.091,21.2,63.67,32.13,63.67,37.219S64.091,53.252,62.265,57.841Z" transform="translate(0.005 -2.238)" fill="#020440"/>
            </svg>
                <?php the_field('instagram-feed-title', $current_category) ?>
            </p>
        </div>
        <div class="insta-feed__feed"><?php the_field('instagram-feed', $current_category) ?></div>
    </section>
    <section class="layout-bg layout-bg--image">
        <div class="layout-bg__inner">
            <div class="layout-bg__img-wrapper">
                <img class="img-wrapper__img" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>" />
            </div>
            <div class="layout-bg__text-wrapper">
                <div class="title-h2">
                    <p class="title-h2__preline"><?php the_field('box-tandem-subtitle', $current_category) ?></p>
                    <h2 class="title-h2__title"><?php the_field('box-tandem-title', $current_category) ?></h2>
                </div>
                <div class="layout-bg__text">
                    <?php the_field('about-text', $current_category) ?>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <?php get_header(); ?>
    <section class="hero" style="background-image: url(<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>);">
        <div class="title-h1">
            <h1 class="title-h1__text"><?php echo $current_category->description?></h1>
        </div>
        <button class="go-to-button">
            <span class="go-to-button__text"><?php echo get_field('button-text-on-front', $current_category); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="21.83" height="47.976" viewBox="0 0 21.83 47.976">
                <g id="Pfeil-zu-Content" transform="translate(-672.085 -569.5)">
                    <line id="Linie" class="arrow" y2="46" transform="translate(683 569.5)"/>
                    <path id="Pfeilspitze" class="arrow" d="M3594.146,655.5l9.854,9.854,9.854-9.854" transform="translate(-2921 -50)"/>
                </g>
                </svg>
        </button>
    </section>
    <?php
    ow_categories_with_subcategories_and_posts( 'category', 'post', $current_category );
}?>

<?php if($current_category->slug !== 'information-blue') { ?>
<?php get_footer(); ?> 
<?php } ?> 