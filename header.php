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
      <h1 class="header__logo"><a href="<?php echo site_url() ?>">michele imhof</a></h1>
      <div class="header__nav">
        <nav class="main-navigation">
          <?php wp_nav_menu( array( 
            'theme_location' => 'main-menu',
            'container'       => '',
            'menu_id'         => '',
            'menu_class'      => 'main-navigation__menu' 
          )); ?>
        </nav> 
      </div>
    </div>
  </header>
