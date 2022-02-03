<div class="tiles-wrapper">
<?php foreach ($subcats as $sc) {?> 
    <div class="tile">
        <a class="tile__link" href="<?php echo get_category_link($sc->parent) . "#" . $sc->slug ?>">
            <div class="tile__image-wrapper">
                <img class="tile__image" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url($sc->term_id); ?>" />
                <div class="tile__icon-wrapper">
                    <?php if (get_field('icons_for_cat', $sc)) echo get_field('icons_for_cat', $sc, false); ?>
                    <figcaption class="tile__image-figcaption">
                        <?php echo $sc->name ?>
                    </figcaption>
                </div>
            </div>
            <div class="tile__text-wrapper">
                <h3 class="tile__title"><?php the_field('front-text-flights', $sc) ?></h3>
            </div>
            <button class="tile__button">hello
                <span class="tile__button-text"><?php the_field('button-text-with-arrow') ?></span><span class="tile__button-arrow"></span>
            </button>
        </a>
    </div>

    <?php }?>
    <div class="tile tile--large">
        <a class="tile__link" href="<?php the_field('tile-large-front-link');?>">
            <div class="tile__image-wrapper">
                <img class="tile__image" src="<?php the_field('tile-large-front-image');?>" />
                <div class="tile__icon-wrapper">
                    <?php if (get_field('tile-large-icon')) echo get_field('tile-large-icon', get_the_id(), false); ?>
                    <figcaption class="tile__image-figcaption">
                        <?php the_field('tile-large-front');?> 
                    </figcaption>
                </div>
            </div>
            <div class="tile__text-wrapper">
                <h3 class="tile__title"><?php the_field('tile-large-front-text');?> </h3>
            </div>
            <button class="tile__button">
                <span class="tile__button-text"><?php the_field('tile-large-front-button-text-with-arrow');?></span><span class="tile__button-arrow"></span>
            </button>
        </a>
    </div>
</div>
<div class="icon-full-with">
    <svg class="icon-content-with__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1367.731 207.876">
        <g class="montains" transform="translate(0.295 -1974.056)">
            <path class="montain__path" data-name="Pfad 364" d="M-9514,20376.93l247.46,76.4,427.468-124.9,243.231,170.346,230.739-109.631,218.258,63.521" transform="translate(9514 -18318)" fill="none" stroke="#020440" stroke-width="2"/>
            <path class="montain__bird montain__bird1" data-name="Pfad 365" d="M-10871.733,17628.254s14.063,2.684,19.373,13.016a53.508,53.508,0,0,1,27.058-13.016" transform="translate(11310 -15631)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
            <path class="montain__bird montain__bird2" data-name="Pfad 367" d="M-10871.733,17628.254s8.092,1.648,11.148,8a29.864,29.864,0,0,1,15.568-8" transform="translate(11236 -15585.984)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
            <path class="montain__bird montain__bird3" data-name="Pfad 366" d="M-10834.986,17628.254s-11.13,2.123-15.332,10.3a42.35,42.35,0,0,0-21.414-10.3" transform="translate(11350.999 -15610.285)" fill="none" stroke="#020440" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
            <g class="montain__paraglider" data-name="Gruppe 257" transform="translate(132 874.859)">
            <g class="montain__paraglider-inner" data-name="Gruppe 148" transform="translate(1008.225 2046.854)">
                <g class="montain__glider1" data-name="Ebene 2" transform="translate(-279.225 -946.713)">
                <path id="Pfad_247" data-name="Pfad 247" d="M-278.944-907.672s.277-18.848,15.661-29.658,24.253-10.256,35.063-8.177,20.511,7.484,21.343,16.908-.794,8.271-.794,8.271a34.721,34.721,0,0,1-4.7-.989c-.906-.412-1.978-1.648-3.708-4.12S-227.119-939.612-230-939.282s-19.778,8.241-28.183,20.354-11.949,18.047-12.526,19.283a3.291,3.291,0,0,1-3.956,1.566C-276.481-898.573-280.284-899.33-278.944-907.672Z" transform="translate(279.225 946.713)" fill="#fff" stroke="#020440" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g class="montain__glider2" data-name="Ebene 3" transform="translate(-230.295 -942.476)">
                <path id="Pfad_248" data-name="Pfad 248" d="M-99.094-928.148a99.79,99.79,0,0,1,11.317-3.01s5.2,2.5,7.113,4.735S-75.847-921.5-76-914.418c0,0,.142,3.093.041,3.412s-.4,1.6-.4,1.6-.317.439-.626.391-4.014-.756-4.269-.839a5.725,5.725,0,0,1-2.093-1.575c-.758-.932-5.969-7.789-7.689-9.68s-4.964-5.51-6.46-6.18a5.531,5.531,0,0,0-1.966-.659C-99.946-927.834-99.094-928.148-99.094-928.148Z" transform="translate(99.612 931.158)" fill="#020440" stroke="#020440" stroke-miterlimit="10" stroke-width="2"/>
                </g>
            </g>
            <circle class="montain__pilot" data-name="Ellipse 26" cx="5" cy="5" r="5" transform="translate(772 1149)" fill="#020440"/>
            </g>
        </g>
    </svg>
</div>
<div class="tiles-wrapper">
    <div class="tile tile--without-image">
        <a class="tile__link" href="<?php echo get_category_link(get_field('category-with-icon'));?>">
            <div class="tile__text-wrapper">
                <p class="tile__preline"><?php echo get_cat_name(get_field('category-with-icon'));?></p>
                <h3 class="tile__title"><?php the_field('tile-icon-text');?></h3>
            </div>
            <button class="tile__button">
                <span class="tile__button-text"><?php the_field('tile-icon-button-text-with-arrow');?></span><span class="tile__button-arrow"></span>
            </button>
        </a>
    </div>
</div>