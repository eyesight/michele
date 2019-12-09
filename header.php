<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <nav class="main-navigation__burger mobile-only" data-toggles-nav="main-navigation__ul">
          <span class="main-navigation__line main-navigation__line-1"></span>
          <span class="main-navigation__line main-navigation__line-2"></span>
      </nav>
      <nav class="main-navigation" id="menu-headermenu">
        <?php wp_nav_menu( array( 
          'theme_location' => 'main-menu-mobile',
          'container'       => '',
          'menu_id'         => '',
          'menu_class'      => 'main-navigation__ul' 
        )); ?>
      </nav> 
    </div>
  </header>
