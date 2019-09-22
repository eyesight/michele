<footer class="footer">
  <div class="footer__left">
  <?php
    if(is_active_sidebar('footer-adress')){
    dynamic_sidebar('footer-adress');
    }
  ?>
  </div>
  <div class="footer_center">
      <?php wp_nav_menu( array( 
        'theme_location' => 'social-menu',
        'container'       => '',
        'menu_id'         => '',
        'menu_class'      => 'footer__menu' 
      )); ?>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>