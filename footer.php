<?php 
    $locations = get_nav_menu_locations(); //get all menu locations
    $menuL = wp_get_nav_menu_object($locations['footer-menu']);//get the menu object
    $menuR = wp_get_nav_menu_object($locations['footer-right-menu']);//get the menu object
?>
</main>
<footer class="footer">
    <div class="footer__top">
        <div class="footer__left">
            <h4 class="footer__h4 title-h4"><?php echo $menuL->name; ?></h4>
            <nav class="footer__left-nav">
                <?php
                    wp_nav_menu([
                      'theme_location' => 'footer-menu',
                      'container'      => 'ul',
                      'menu_id'        => 'footer-nav',
                      'menu_class'     => 'footer__left-ul',
                      'walker'         => new FooterNavWalker(),
                    ]);
                ?>
            </nav>
        </div>
        <div class="footer__center">
            <nav class="footer__center-nav">
                <?php
                    wp_nav_menu( [
                      'theme_location' => 'footer-center-menu',
                      'container'      => 'ul',
                      'menu_id'        => 'footer-center-nav',
                      'menu_class'     => 'footer__center-ul',
                      'walker'         => new FooterNavWalker(),
                    ] );
                ?>
            </nav>
        </div>
        <div class="footer__right">
            <h4 class="footer__h4 title-h4"><?php echo $menuR->name; ?></h4>
            <nav class="footer__right-nav">
                <?php
                    wp_nav_menu( [
                      'theme_location' => 'footer-right-menu',
                      'container'      => 'ul',
                      'menu_id'        => 'footer-right-nav',
                      'menu_class'     => 'footer__right-ul',
                      'walker'         => new FooterNavWalker(),
                    ] );
                ?>
            </nav>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="footer__bottom-left">
            <?php
              if(is_active_sidebar('copyright')){
                  dynamic_sidebar('copyright');
              }
            ?>
            <div class="footer__service-nav">
                <?php
                    wp_nav_menu( [
                      'theme_location' => 'footer-bottom-menu',
                      'container'      => 'ul',
                      'menu_id'        => 'footer-bottom-nav',
                      'menu_class'     => 'footer__bottom-ul',
                      'walker'         => new FooterNavWalker(),
                    ] );
                ?>
            </div>
        </div>
        <?php blabla
          if(is_active_sidebar('footer-link')){
              dynamic_sidebar('footer-link');
          }
        ?>
    </div> 
</footer>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>