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
        <div class="tile-blue-wrapper">
            <div class="tile-blue">
                <img class="tile-blue__icon" src="./../dist/svg/Arrow-Link.min.svg">
                <h3 class="tile-blue__title">Frag mich direkt mit einem Anruf oder per Whatsapp Nachricht.</h3>
                <button class="tile-blue__button">
                    <span class="tile-blue__button-text">Flüge ansehen</span><span class="tile-blue__button-arrow"></span>
                </button>   
            </div>
            <div class="tile-blue">
                <img class="tile-blue__icon" src="./../dist/svg/Arrow-Link.min.svg">
                <h3 class="tile-blue__title">Frag mich direkt mit einem Anruf oder per Whatsapp Nachricht.</h3>
                <button class="tile-blue__button">
                    <span class="tile-blue__button-text">Flüge ansehen</span><span class="tile-blue__button-arrow"></span>
                </button>   
            </div>
        </div>
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
        <div class="tile-blue-wrapper">
            <div class="tile-blue">
                <img class="tile-blue__icon" src="./../dist/svg/Arrow-Link.min.svg">
                <h3 class="tile-blue__title">Frag mich direkt mit einem Anruf oder per Whatsapp Nachricht.</h3>
                <button class="tile-blue__button">
                    <span class="tile-blue__button-text">Flüge ansehen</span><span class="tile-blue__button-arrow"></span>
                </button>   
            </div>
            <div class="tile-blue">
                <img class="tile-blue__icon" src="./../dist/svg/Arrow-Link.min.svg">
                <h3 class="tile-blue__title">Frag mich direkt mit einem Anruf oder per Whatsapp Nachricht.</h3>
                <button class="tile-blue__button">
                    <span class="tile-blue__button-text">Flüge ansehen</span><span class="tile-blue__button-arrow"></span>
                </button>   
            </div>
        </div>
    </section>
    <?php } else if($current_category->slug === 'about') { ?>
    <?php get_header(); ?>
    <div class="title-h2">
        <p class="title-h2__preline"><?php echo $current_category->name?></p>
        <h2 class="title-h2__title"><?php echo $current_category->description?></h2>
    </div>
    <div class="text-tiles-wrapper">
        <?php ow_categories_and_posts_about_page( 'category', 'post', $current_category ); ?>
    </div>
    <section class="layout-bg layout-bg--image">
        <div class="layout-bg__img-wrapper">
            <img class="img-wrapper__img" href="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>" />
        </div>
        <div class="layout-bg__text-wrapper">
            <div class="title-h2">
                <p class="title-h2__preline"><?php the_field('box-tandem-subtitle', $current_category) ?></p>
                <h2 class="title-h2__title"><?php the_field('box-tandem-title', $current_category) ?></h2>
            </div>
            <div class="tile-blue-wrapper">
                <div class="tile-blue-wrapper__text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
<?php get_footer(); ?> 