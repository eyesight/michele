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
<div class="prev-next">
    <div class="content prev-next__wrapper">
    <?php if($prevID === -1): ?>
        <div class="prev-next__arrow prev-next__left">
            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <polyline class="st0" points="10,20 2,12 10,4 "/>
                <line class="st0" x1="3" y1="12" x2="23" y2="12"/>
            </svg>
            <span class="prev">
                <a href="<?php echo get_home_url(); ?>" rel="prev">zurück zur Übersicht</a>
            </span>
        </div>
    <?php elseif($prevID): ?>
        <div class="prev-next__arrow prev-next__left">
            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <polyline class="st0" points="10,20 2,12 10,4 "/>
                <line class="st0" x1="3" y1="12" x2="23" y2="12"/>
            </svg>
            <span class="prev">
                <a href="<?php echo get_the_permalink($prevID) ?>" rel="prev"><?php echo get_the_title($prevID) ?></a>
            </span>
        </div>
    <?php endif; ?>
    <button class="totop">
        <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
            <g>
                <polyline class="st0" points="14,20 22,12 14,4 	"/>
                <line class="st0" x1="21" y1="12" x2="1" y2="12"/>
            </g>
        </svg>
        <span class="totop__text">
            to top
        </span>
    </button>
    <?php if($nextID === -1): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?php echo get_home_url(); ?>" rel="next">zurück zur Übersicht</a>
            </span>
            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <g>
                    <polyline class="st0" points="14,20 22,12 14,4 	"/>
                    <line class="st0" x1="21" y1="12" x2="1" y2="12"/>
                </g>
            </svg>
        </div>
    <?php elseif($nextID): ?>
        <div class="prev-next__arrow prev-next__right">
            <span class="next">
                <a href="<?php echo get_the_permalink($nextID) ?>" rel="next"><?php echo get_the_title($nextID) ?></a>
            </span>
            <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                <g>
                    <polyline class="st0" points="14,20 22,12 14,4 	"/>
                    <line class="st0" x1="21" y1="12" x2="1" y2="12"/>
                </g>
            </svg>
        </div>
    <?php endif; ?>
    </div>
</div>  