<div class="grid-container filter">
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
                    echo "<div class='filter__button-wrapper'><button class='filter__button ". $activeClassName ."' data-filter-target='".$term->slug."'><?xml version='1.0' encoding='utf-8'?>
                    <div class='filter__arrow'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='12.5' height='12.5' viewBox='0 0 12.5 12.5'>
                        <path class='st0' id='Shape' d='M0,0H12V12' transform='translate(0 0.5)' fill='none' stroke='#fff' stroke-miterlimit='10' stroke-width='1'/>
                        </svg>

                        <svg xmlns='http://www.w3.org/2000/svg' width='15.707' height='15.707' viewBox='0 0 15.707 15.707'>
                        <path class='st0' id='Shape' d='M15,0,0,15' transform='translate(0.354 0.354)' fill='none' stroke='#fff' stroke-miterlimit='10' stroke-width='1'/>
                        </svg>
                    </div>
                    <svg class='filter__x' data-name='x' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 26.22 26.22'>
                    <title>x</title>
                    <line class='filter__xline' x1='0.07' y1='0.07' x2='26.15' y2='26.15' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                    <line class='filter__xline' x1='0.07' y1='26.15' x2='26.15' y2='0.07' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                  </svg>". $term->name . "</button></div>";
                }
            }
        }?>
    </div>
</div>