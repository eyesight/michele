<div class="tiles-wrapper">
<?php foreach ($subcats as $sc) {?> 
    <div class="tile">
        <a class="tile__link" href="<?php echo get_category_link($sc->parent) . "#" . $sc->slug ?>">
            <div class="tile__image-wrapper">
                <img class="tile__image" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($sc->term_id); ?>" />
                <div class="tile__icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="98" height="98" viewBox="0 0 98 98">
                        <g data-name="Gruppe 116" transform="translate(2 2)">
                        <circle data-name="Ellipse 14" class="icon-sun" cx="22" cy="22" r="22" transform="translate(24.609 25)"/>
                        <path data-name="Pfad 238" class="icon-sun" d="M49,2V14.533m0,68.933V96M96,49H83.467M14.533,49H2M15.787,15.787,24.56,24.56M73.44,73.44l8.773,8.773m0-66.427L73.44,24.56M24.56,73.44l-8.773,8.773" transform="translate(-2 -2)"/>
                        </g>
                    </svg>
                    <figcaption class="tile__image-figcaption">
                        <?php echo $sc->name ?>
                    </figcaption>
                </div>
            </div>
            <div class="tile__text-wrapper">
                <h3 class="tile__title"><?php the_field('front-text-flights', $sc) ?></h3>
            </div>
            <button class="tile__button">
                <span class="tile__button-text">Flüge ansehen</span><span class="tile__button-arrow"></span>
            </button>
        </a>
    </div>

    <?php }?>
    <div class="tile tile--large">
        <a class="tile__link" href="#">
            <div class="tile__image-wrapper">
                <img class="tile__image" src="http://placekitten.com/400/300" />
                <div class="tile__icon-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="98" height="98" viewBox="0 0 98 98">
                        <g data-name="Gruppe 116" transform="translate(2 2)">
                        <circle data-name="Ellipse 14" class="icon-sun" cx="22" cy="22" r="22" transform="translate(24.609 25)"/>
                        <path data-name="Pfad 238" class="icon-sun" d="M49,2V14.533m0,68.933V96M96,49H83.467M14.533,49H2M15.787,15.787,24.56,24.56M73.44,73.44l8.773,8.773m0-66.427L73.44,24.56M24.56,73.44l-8.773,8.773" transform="translate(-2 -2)"/>
                        </g>
                    </svg>
                    <figcaption class="tile__image-figcaption">
                        Klassische Tandemflüge
                    </figcaption>
                </div>
            </div>
            <div class="tile__text-wrapper">
                <h3 class="tile__title">Mach deine ersten Flugerfahrungen.</h3>
            </div>
            <button class="tile__button">
                <span class="tile__button-text">Flüge ansehen</span><span class="tile__button-arrow"></span>
            </button>
        </a>
    </div>
</div>