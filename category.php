<?php get_header(); ?>

<section class="hero" style="background-image: url(<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>);">
    <div class="title-h1">
        <h1 class="title-h1__text">Gleitschirm Flüge und Abenteuer</h1>
    </div>
    <button class="go-to-button">
        <span class="go-to-button__text">Finde dein Abenteuer</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="21.83" height="47.976" viewBox="0 0 21.83 47.976">
            <g id="Pfeil-zu-Content" transform="translate(-672.085 -569.5)">
                <line id="Linie" class="arrow" y2="46" transform="translate(683 569.5)"/>
                <path id="Pfeilspitze" class="arrow" d="M3594.146,655.5l9.854,9.854,9.854-9.854" transform="translate(-2921 -50)"/>
            </g>
            </svg>
    </button>
</section>
<?php
$current_category = get_queried_object(); ////getting current category

function ow_categories_with_subcategories_and_posts( $taxonomy, $post_type, $currentCat ) {
    $taxonomy   = $taxonomy;
    $post_type  = $post_type;

    // Get the top categories that belong to the provided taxonomy (the ones without parent)
    $categories = get_terms( 
        array(
            'taxonomy'   => $taxonomy,
            'parent'     => 0, // <-- No Parent
            'orderby'    => 'term_id',
            'hide_empty' => true // <-- change to false to also display empty ones
        )
    );
    ?>            
    <?php
    // Iterate through all categories to display each individual category
    if (!empty( $categories ) && ! is_wp_error($categories)){
        foreach ( $categories as $category ) {
            $cat_name = $category->name;
            $cat_id   = $category->term_id;
            $cat_slug = $category->slug;
            $cat_subtitle_box = get_field('box-tandem-subtitle', $currentCat);
            $cat_title_box = get_field('box-tandem-title', $currentCat);

            if($cat_id === $currentCat->cat_ID) {
                // Get all the subcategories that belong to the current category
                $subcategories = get_terms(
                    array(
                        'taxonomy'   => $taxonomy,
                        'parent'     => $cat_id, // <-- The parent is the current category
                        'orderby'    => 'term_id',
                        'hide_empty' => true
                    )
                );
                
                // Iterate through all subcategories to display each individual subcategory
                foreach ( $subcategories as $subcategory ) {

                    $subcat_name = $subcategory->name;
                    $subcat_id   = $subcategory->term_id;
                    $subcat_slug = $subcategory->slug;
                    $subcat_desc = $subcategory->description;

                    ?>
                    <section class="categories" data-sticky-container>
                        <div id="<?php echo $subcat_slug ?>" class="category-title" data-margin-top="130" data-sticky-class="is-sticky">
                            <div class="category-title__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50.208" height="50.208" viewBox="0 0 50.208 50.208">
                                    <g class="icon-sonne" transform="translate(-1 -1)">
                                        <circle id="Ellipse_14" data-name="Ellipse 14" cx="11" cy="11" r="11" transform="translate(15.104 15.104)" stroke-width="2" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                        <path id="Pfad_238" data-name="Pfad 238" d="M26.1,2V8.428m0,35.353v6.428m24.1-24.1H43.781m-35.353,0H2M9.071,9.071l4.5,4.5M38.638,38.638l4.5,4.5m0-34.067-4.5,4.5M13.57,38.638l-4.5,4.5" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    </g>
                                </svg>                  
                            </div> 
                            <div class="category-title__pretitle"><?php echo $subcat_name ?></div>
                            <h3 class="category-title__title"><?php echo $subcat_desc ?></h3>
                            <a href="#" class="arrow-link category-title__link">
                                <span class="arrow-link__button-text">Ablauf und Häufige 
                                    Fragen beanwortet</span><span class="arrow-link__button-arrow"></span>
                            </a>
                        </div>
                        <div class="category-items-wrapper">
                        <?php
                        // Get all posts that belong to this specific subcategory
                        $posts = new WP_Query(
                            array(
                                'post_type'      => $post_type,
                                'posts_per_page' => -1, // <-- Show all posts
                                'hide_empty'     => true,
                                'order'          => 'ASC',
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'terms'    => $subcat_id,
                                        'field'    => 'id'
                                    )
                                )
                            )
                        );

                        // If there are posts available within this subcategory
                        if ( $posts->have_posts() ):
                            // As long as there are posts to show
                            while ( $posts->have_posts() ): $posts->the_post(); ?>
                                <div class="category-item">
                                    <div class="category-item__image-wrapper">
                                        <img src="<?php the_post_thumbnail_url( 'category-thumb' );?>" />
                                    </div>
                                    <div class=category-item__title-wrapper>
                                    <?php 
                                        $fields = get_field_objects();
                                        if( $fields ): ?>
                                            <ul class=category-item__sevice-list>
                                            <?php foreach( $fields as $field ): ?>
                                                <?php if( $field['name']=='flighttime' && $field['value'] ): ?>
                                                    <li class="category-item__service-list-item">
                                                        <span class="category-item__icon category-item__icon--time">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.6" height="20.894" viewBox="0 0 13.6 20.894">
                                                                <g id="Icon-Flugzeit" transform="translate(-26.4 -23.447)">
                                                                    <path id="Pfad_203" data-name="Pfad 203" d="M38.316,41.869V39.053a4.642,4.642,0,0,0-1.974-3.8l-1.833-1.287a.332.332,0,0,1-.08-.462.354.354,0,0,1,.08-.08l1.833-1.287a4.643,4.643,0,0,0,1.974-3.8V25.289m-10.611,0V28.34a4.643,4.643,0,0,0,1.974,3.8l1.833,1.287a.332.332,0,0,1,0,.542l-1.833,1.287a4.645,4.645,0,0,0-1.974,3.8v2.815" transform="translate(0.189 0.316)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                    <path id="Pfad_204" data-name="Pfad 204" d="M27.705,40.061c1.327,0,3.3-1.86,4.3-2.653a1.7,1.7,0,0,1,2,0c1.012.786,2.982,2.658,4.309,2.658m-9.257-9.616c2.653-1.062,4.841,1.211,8-.072M31.623,32.69c.952.242,1.332,1.4,1.387,1.4a2.658,2.658,0,0,1,1.36-1.56" transform="translate(0.189 1.46)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                    <rect id="Rechteck_19" data-name="Rechteck 19" width="12.6" height="1.658" rx="0.268" transform="translate(26.9 42.184)" stroke-width="1" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                                                    <rect id="Rechteck_20" data-name="Rechteck 20" width="12.6" height="1.658" rx="0.268" transform="translate(26.9 23.947)" stroke-width="1" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                    </li> 
                                                <?php endif; ?>
                                                <?php if( $field['name']=='altitude' && $field['value'] ): ?>
                                                    <li class="category-item__service-list-item">
                                                        <span class="category-item__icon category-item__icon--mountain">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="36.076" height="19.557" viewBox="0 0 36.076 19.557">
                                                                <g id="Gruppe_57" data-name="Gruppe 57" transform="translate(-1.45 -14.85)">
                                                                    <path id="Pfad_206" data-name="Pfad 206" d="M9.229,25,2.1,37.751H25.284L19.372,27.318m9.389,10.433h8.114l-4.521-7.94" transform="translate(0 -3.994)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                                                    <path id="Pfad_207" data-name="Pfad 207" d="M20.064,22.165l4.579,1.159L20.7,16.369a2.291,2.291,0,0,0-3.593,0L14.5,21.006l3.246,2.318ZM31.83,20.485,29.859,24.02l2.492,1.739,1.739-.869,3.478.869-2.956-5.274A1.81,1.81,0,0,0,31.83,20.485Z" transform="translate(-5.213 0)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                    </li> 
                                                <?php endif; ?>
                                                <?php if( $field['name']=='distance' && $field['value'] ): ?>
                                                    <li class="category-item__service-list-item">
                                                        <span class="category-item__icon category-item__icon--cart">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="22.099" height="20.693" viewBox="0 0 22.099 20.693">
                                                                <g id="Gruppe_69" data-name="Gruppe 69" transform="translate(-1.5 -3.5)">
                                                                    <path id="Pfad_208" data-name="Pfad 208" d="M16.453,17l3.481,3.481m-3.517.035L19.9,17.035m-6.857,2.673a3.516,3.516,0,0,1,2.391-.949M11.741,23.4a3.517,3.517,0,0,0,.176-1.02v-.105a3.519,3.519,0,0,1,.316-1.512M8.752,25.791a3.516,3.516,0,0,0,2.321-1.231m-6.33,1.231H7.415M2,25.791H3.407" transform="translate(0 -8.429)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                    <path id="Pfad_209" data-name="Pfad 209" d="M23.1,6.11V23.693l-7.736-2.11-5.626,2.11L2,21.583V4L9.736,6.11,15.363,4Z" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                                                </g>
                                                            </svg>                                  
                                                        </span>
                                                        <span class="category-item__icon-text"><?php echo $field['value'];?></span>
                                                    </li> 
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                        <h2 class="category-item__title"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="category-item__places">
                                        <span class="category-item__places-bold">Fluggebiete:</span> 
                                        <?php foreach( get_field('places') as $place ): ?>
                                            <a target="_blank" href="<?php echo $place['value']; ?>" class="category-item__places-item"><?php echo $place['label']; ?></a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="category-item__text">
                                        <?php the_content();?>   
                                    </div>
                                    <p class="category-item__big-text"><?php the_field('price'); ?></p>
                                    <?php if(the_field('preiszusatz') !== NULL): ?>
                                        <p class="category-item__medium-text"><?php the_field('preiszusatz'); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php endwhile; ?>
                             </div>
                    </section>
                    
                    <?php else:
                        echo 'No posts found';
                    endif;
                        wp_reset_query();
                    }}?>
         <?php } ?>
            <section class="layout-bg">
                <div class="title-h2">
                    <p class="title-h2__preline"><?php echo $cat_subtitle_box ?></p>
                    <h2 class="title-h2__title"><?php echo $cat_title_box ?></h2>
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
        <?php } else { ?>
        <div>there are no categories found</div>
    <?php } ?>
   <?php
}

ow_categories_with_subcategories_and_posts( 'category', 'post', $current_category );

?>
<?php get_footer(); ?> 