<?php
    $all_posts = new WP_Query(array(
        'meta_key' => 'date',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    ));

    $idOfFrontpage = (int)get_option( 'page_on_front' );
    $sizeOfArray = sizeof($all_posts->posts)-1;

    foreach($all_posts->posts as $key => $value) {
        if($value->ID == $post->ID){
            if($key === 0){
                $prevID = $idOfFrontpage;
                $nextID = $all_posts->posts[$key + 1]->ID;
            }else if($key === $sizeOfArray){
                $prevID = $all_posts->posts[$key - 1]->ID;
                $nextID = $idOfFrontpage;
            }else{
                $prevID = $all_posts->posts[$key - 1]->ID;
                $nextID = $all_posts->posts[$key + 1]->ID; 
            }
            break;
        }
    }
    ?>
    <div class="content prev-next">
    <?php if($prevID === $idOfFrontpage): ?>
        <div class="prev-next__arrow prev-next__left">
            <span class="prev">
                <a href="<?= get_the_permalink($prevID) ?>" rel="prev">zurück zur Übersicht</a>
            </span>
        </div>
    <?php elseif($prevID): ?>
        <div class="prev-next__arrow prev-next__left">
            <span class="prev">
                <a href="<?= get_the_permalink($prevID) ?>" rel="prev"><?= get_the_title($prevID) ?></a>
            </span>
        </div>
    <?php endif; ?>
    <?php if($nextID === $idOfFrontpage): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?= get_the_permalink($nextID) ?>" rel="next">zurück zur Übersicht</a>
            </span>
        </div>
    <?php elseif($nextID): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?= get_the_permalink($nextID) ?>" rel="next"><?= get_the_title($nextID) ?></a>
            </span>
        </div>
        
    <?php endif; ?>
</div>  