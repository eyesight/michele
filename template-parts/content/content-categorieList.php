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
                    echo "<button class='filter__button' data-filter-target='".$term->name."'><span>". $term->name . "</span></button>";
                }
            }
        }?>
    </div>
</div>