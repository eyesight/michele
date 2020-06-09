<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class('blue'); ?>> 
  <div class="wrapper" data-barba="wrapper">
    <div class="container" data-barba="container">
  <div class="blue">
    <header class="header header--close-button">
      <button class="close-button">
          <a class="close-button__link" onclick="history.back();">
              <span class="close-button__line close-button__line--1"></span>
              <span class="close-button__line close-button__line--2"></span>
          </a>
      </button>
  </header>
  <main class="content">