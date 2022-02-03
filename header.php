<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src='https://www.googletagmanager.com/gtag/js?id=UA-158008354-1'></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-158008354-1');
    </script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header class="header">
    <div class="header__container">
        <a class="header__logo" href="<?php echo site_url() ?>"></a>
        <?php wp_nav_menu( array( 
          'theme_location' => 'main-menu',
          'container'       => '',
          'menu_id'         => '',
          'menu_class'      => 'header__navigation' 
        )); ?>
        <div class="animated-text">
          <div class="animated-text__inner">
            <?php
              if(is_active_sidebar('headertext')){
                  dynamic_sidebar('headertext');
              }
            ?>
        </div>
      </div>
    </div>
  </header>
