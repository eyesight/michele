<div class="grid-container filter">
    <div class="logo-content">
        <a href="<?php echo site_url() ?>"class="logo-content__link">
            <img class="logo-content__img desktop-only" src="<?php echo get_template_directory_uri(); ?>/dist/svg/logo-large.min.svg"/>
            <img class="logo-content__img logo-content__img--small mobile-only" src="<?php echo get_template_directory_uri(); ?>/dist/svg/logo.min.svg"/>
        </a>
    </div>
    <div class="filter__wrapper">
        <?php
        $taxonomy = array();
        $terms = get_terms( $taxonomy );
        $count = count($terms);
        $activeClassName = '';
       
        if ( $count > 0 ){
            foreach ( $terms as $term ) {
                if($term->taxonomy === 'category'){
                    if($cat === $term->term_id){
                        $activeClassName = 'active';
                    } else{
                        $activeClassName = '';
                    }
                    echo "<button class='filter__button ". $activeClassName ."' data-filter-target='".$term->slug."'><?xml version='1.0' encoding='utf-8'?>
                    <svg class='filter__arrow' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
                         viewBox='0 0 24 24' xml:space='preserve'>
                         <g><polyline class='st0' points='7,5 19,5 19,17'/><line class='st0' x1='19' y1='5' x2='4' y2='20'/></g>
                    </svg>
                    <svg class='filter__x' data-name='x' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 26.22 26.22'>
                    <title>x</title>
                    <line class='filter__xline' x1='0.07' y1='0.07' x2='26.15' y2='26.15' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                    <line class='filter__xline' x1='0.07' y1='26.15' x2='26.15' y2='0.07' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                  </svg>". $term->name . "</button>";
                }
            }
        }?>
    </div>
</div>