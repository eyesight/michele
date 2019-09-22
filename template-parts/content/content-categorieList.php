<div class="filter filter__bottom">
    <?php
    $terms = get_terms( $taxonomy );
    $count = count($terms);
    if ( $count > 0 ){
        foreach ( $terms as $term ) {
            if($term->taxonomy === 'category'){
                echo "<button class='filter__button' data-filter-target='".$term->name."'>". $term->name . ",</button>";
            }
        }
    }?>
</div>