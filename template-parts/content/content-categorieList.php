<div class="grid-container filter">
    <?php
        if(is_active_sidebar('pretitle-front')){
            dynamic_sidebar('pretitle-front');
        }
    ?>
    <div class="filter__wrapper">
        <?php
        $terms = get_terms( $taxonomy );
        $count = count($terms);
        if ( $count > 0 ){
            foreach ( $terms as $term ) {
                if($term->taxonomy === 'category'){
                    echo "<button class='filter__button' data-filter-target='".$term->name."'>". $term->name . "<svg class='filter__x' data-name='x' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 26.22 26.22'>
                    <title>x</title>
                    <line class='filter__xline' x1='0.07' y1='0.07' x2='26.15' y2='26.15' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                    <line class='filter__xline' x1='0.07' y1='26.15' x2='26.15' y2='0.07' style='fill: none;stroke: #0013ff;stroke-miterlimit: 10;stroke-width: 1px'/>
                  </svg></button>";
                }
            }
        }?>
    </div>
</div>