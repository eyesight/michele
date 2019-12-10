<footer class="footer">
  <div class="footer__container">
    <div class="footer__left">
      <?php
        if(is_active_sidebar('footer-adress')){
            dynamic_sidebar('footer-adress');
        }
      ?>
    </div>
    <div class="footer__center">
        <?php wp_nav_menu( array( 
          'theme_location' => 'social-menu',
          'container' => '',
          'menu_id' => '',
          'menu_class' => 'footer__menu',
          'link_before' => '<span>',
          'link_after' => '</span>'
        )); ?>
    </div>
    <div class="footer__right">
      <?php wp_nav_menu( array( 
          'theme_location' => 'footer-menu',
          'container' => '',
          'menu_id' => '',
          'menu_class' => 'footer__menu-right',
        )); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>