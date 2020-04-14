<section class="layout-bg">
        <div class="layout-bg__inner" data-sticky-container>
            <div class="scroll-element">
                <a href="<?php echo get_category_link(get_field('category-information-front'));?>" data-sticky-class="scroll-element__link--sticky" class="scroll-element__link"> 
                    <h3 class="scroll-element__title"><?php the_field('list-reasons-title');?></h3>
                    <button class="scroll-element__button">
                        <span class="scroll-element__button-text">Warum ich fliege</span><span class="scroll-element__button-arrow"></span>
                    </button>
                </a>
                <div class="scroll-element__list">
                    <?php the_field('list-reasons');?>
                </div>
            </div>
        </div>
    </section>