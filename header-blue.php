<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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