<?php
    $all_posts = new WP_Query(array(
        'meta_key' => 'date',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    ));

    $idOfFrontpage = (int)get_option( 'page_on_front' );
    $sizeOfArray = sizeof($all_posts->posts)-1;
    $prevID = 0;
    $nextID = 0;

    foreach($all_posts->posts as $key => $value) {
        if($value->ID == $post->ID){
            if($key === 0){
                $prevID = -1;
                $nextID = $all_posts->posts[$key + 1]->ID;
            }else if($key === $sizeOfArray){
                $prevID = $all_posts->posts[$key - 1]->ID;
                $nextID = -1;
            }else{
                $prevID = $all_posts->posts[$key - 1]->ID;
                $nextID = $all_posts->posts[$key + 1]->ID; 
            }
            break;
        }
    }
    ?>
<div class="content prev-next">
    <?php if($prevID === -1): ?>
        <div class="prev-next__arrow prev-next__left">
            <span class="prev">
                <a href="<?php echo get_home_url(); ?>" rel="prev">zurück zur Übersicht</a>
            </span>
        </div>
    <?php elseif($prevID): ?>
        <div class="prev-next__arrow prev-next__left">
            <span class="prev">
                <a href="<?php echo get_the_permalink($prevID) ?>" rel="prev"><?php echo get_the_title($prevID) ?></a>
            </span>
        </div>
    <?php endif; ?>
    <button class="totop">
        <span class="totop__text">
            to top
        </span>
    </button>
    <?php if($nextID === -1): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?php echo get_home_url(); ?>" rel="next">zurück zur Übersicht</a>
            </span>
        </div>
    <?php elseif($nextID): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?php echo get_the_permalink($nextID) ?>" rel="next"><?php echo get_the_title($nextID) ?></a>
            </span>
        </div>
    <?php endif; ?>
</div>  