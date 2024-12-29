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
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/favicon/favicon.ico">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?> style="
    <?php
    // Retrieve the value of the custom field
    $body_background_color = get_field('background-color');
    $body_text_color = get_field('text-color');

    // Output the value inside the body element
    if (!empty($body_background_color) && !is_front_page() && !is_category()) {
        echo '--mim-background-color:' . esc_attr($body_background_color) . ';';
    }

    if (!empty($body_text_color) && !is_front_page() && !is_category()) {
      echo '--mim-text-color:' . esc_attr($body_text_color) . ';';
    }
  ?>">
  <header class="header">
    <div class="header__container">
        <a class="header__logo" href="<?php echo site_url() ?>">
        <svg class="mi-logo" preserveAspectRatio="xMidYMid meet" data-bbox="0 0 283.5 51.6" viewBox="0 0 283.5 51.6" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-label="">
            <g>
                <path fill="#ffffff" d="M275.9 24.2c-1.1-6.1-4.9-10.7-11.5-10.7s-10.2 4.4-10.8 11.2c-1-6.4-4.8-11.2-11.6-11.2s-10.9 5.3-10.9 13.2v23.7h6.6V28c0-5.7 2.7-8.9 7.4-8.9s8.4 3.2 8.4 8.9v22.4h6.6V28c0-5.7 2.7-8.9 7.4-8.9s8.4 3.2 8.4 8.9v22.4h6.6V14.2h-6.6v10Z" data-color="1"></path>
                <path fill="#ffffff" d="M278.5 10.2c2.8 0 5-2.2 5-5s-2.2-4.9-5-4.9-4.9 2.2-4.9 4.9 2.2 5 4.9 5Z" data-color="1"></path>
                <path fill="#ffffff" d="M97.8 34.4c0 7.7-5.3 11.5-11.5 11.5s-10.2-3.8-10.2-11.5V14.7h-6.6v21.1c0 9.8 4.9 15.8 13.8 15.8s13.2-5.3 14.5-13v12.3h6.6V14.7h-6.6v19.8Z" data-color="1"></path>
                <path fill="#ffffff" d="M164.2 0c-2.8 0-5 2.2-5 4.9s2.2 5 5 5 4.9-2.2 4.9-5-2.2-4.9-4.9-4.9Z" data-color="1"></path>
                <path fill="#ffffff" d="M167.4 13.8v36.3h-6.6V13.8h6.6z" data-color="1"></path>
                <path fill="#ffffff" d="M194.6 13.2c-11.3 0-19.4 8.6-19.4 18.8s8.1 18.8 19.4 18.8S214 42.2 214 32s-8.1-18.8-19.4-18.8Zm0 31.4c-7.2 0-12.5-5.4-12.5-12.7s5.3-12.7 12.5-12.7 12.5 5.4 12.5 12.7-5.3 12.7-12.5 12.7Z" data-color="1"></path>
                <path fill="#ffffff" d="M144.4 28.5c-1.3-8.5-6.2-15.2-15.4-15.2s-17.8 8.6-17.8 18.8 7.3 18.8 17.8 18.8 14.1-6.7 15.4-15.2v14.5h6.6V1.5h-6.6v27ZM131.3 45c-8.2 0-13.2-5.6-13.2-12.9s5-12.9 13.2-12.9 13.1 5.6 13.1 12.9S139.5 45 131.3 45Z" data-color="1"></path>
                <path fill="#ffffff" d="m52.7.6-6.6 2.6v11.7H35.9C34.8 8.2 27.8.8 17.8.8S0 7 0 15.9s4.7 11 13.8 13l7.5 1.7c5.7 1.3 8 3.3 8 7s-4.1 8-9.9 8-9.9-3.7-10.5-9.1V36l-6.2 1.6v.4c1.4 8.1 8.2 13.5 16.8 13.5s16.2-5.9 16.2-14.7-4-10.4-12.5-12.3l-7.5-1.7c-6.5-1.5-9.3-3.8-9.3-7.6s4.5-8.5 11.3-8.5S33.6 11.6 34 18.6l1.3.7h10.8V42c0 4.7 2.1 9 7.3 9s8.3-3 9.2-11.9h-1.1c-.9 5.9-2.9 7.5-5 7.5-3.2 0-3.8-2.4-3.8-4.5V19.4h11.6v-4.3H52.7V.6Z" data-color="1"></path>
            </g>
        </svg>
        </a>
        
        <?php get_template_part( 'template-parts/content/content-categorieList' ); ?>
      </div>
    </div>
  </header>
  <div class="header-placeholder"></div>
