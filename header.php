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
    $body_header_color = get_field('header-color');

    // Output the value inside the body element
    if (!empty($body_background_color) && !is_front_page() && !is_category()) {
        echo '--mim-background-color:' . esc_attr($body_background_color) . ';';
    }

    if (!empty($body_text_color) && !is_front_page() && !is_category()) {
      echo '--mim-text-color:' . esc_attr($body_text_color) . ';';
    }

    if (!empty($body_header_color) && !is_front_page() && !is_category()) {
      echo '--mim-header-color:' . esc_attr($body_header_color) . ';';
    }
  ?>">
  <header class="header">
    <div class="header__container">
        <a class="header__logo" href="<?php echo site_url() ?>">
          <svg class="mi-logo" data-name="Ebene 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.18 50.46">
            <path d="M275.04,23.73c-1.11-6.09-4.91-10.62-11.47-10.62s-10.16,4.39-10.75,11.14c-.98-6.36-4.78-11.14-11.53-11.14-7.21,0-10.81,5.31-10.81,13.11v23.59h6.55v-22.28c0-5.7,2.69-8.85,7.4-8.85s8.32,3.15,8.32,8.85v22.28h6.55v-22.28c0-5.7,2.69-8.85,7.4-8.85s8.32,3.15,8.32,8.85v22.28h6.55V13.77h-6.55v9.96Z" fill="#fff"/>
            <path d="M278.2.18c-2.62,0-4.85,2.23-4.85,4.85,0,2.75,2.23,4.98,4.85,4.98,2.75,0,4.98-2.23,4.98-4.98s-2.23-4.85-4.98-4.85Z" fill="#fff"/>
            <path d="M98.49,33.43c0,7.67-5.24,11.47-11.47,11.47s-10.16-3.8-10.16-11.47V13.77h-6.55v20.97c0,9.76,4.91,15.73,13.76,15.73,8.12,0,13.1-5.24,14.41-12.91v12.25h6.55V13.77h-6.55v19.66Z" fill="#fff"/>
            <path d="M164.03,0c-2.75,0-4.98,2.23-4.98,4.85,0,2.75,2.23,4.98,4.98,4.98s4.85-2.23,4.85-4.98-2.23-4.85-4.85-4.85Z" fill="#fff"/>
            <rect x="160.69" y="13.76" width="6.55" height="36.04" fill="#fff"/>
            <path d="M194.23,13.11c-11.27,0-19.33,8.58-19.33,18.68s8.06,18.67,19.33,18.67,19.33-8.58,19.33-18.67-8.06-18.68-19.33-18.68ZM194.23,44.37c-7.14,0-12.45-5.37-12.45-12.58s5.31-12.58,12.45-12.58,12.45,5.37,12.45,12.58-5.31,12.58-12.45,12.58Z" fill="#fff"/>
            <path d="M144.84,28.18c-1.31-8.45-6.16-15.07-15.33-15.07-10.42,0-17.69,8.58-17.69,18.68s7.27,18.67,17.69,18.67c9.17,0,14.02-6.62,15.33-15.07v14.42h6.55V1.32h-6.55v26.87ZM131.8,44.57c-8.12,0-13.1-5.57-13.1-12.78s4.98-12.78,13.1-12.78,13.04,5.57,13.04,12.78-4.91,12.78-13.04,12.78Z" fill="#fff"/>
            <path d="M44.28,37.36c0,7.8,4.29,13.11,11.5,13.11,5.15,0,8.16-2.79,9.76-6.93.18-.46.33-.97.47-1.47.3-1.03.46-2.19.46-2.19l-1.18-.02c-1.07,3.4-3.71,5.23-7.22,5.23-4.69,0-7.24-3.23-7.24-9.05v-17.02h13.21v-5.25h-13.2V.49l-6.55,2.58v10.7h-9.47c-.34-2.78-1.85-6.55-4.4-8.85C27.25,2.04,22.85.03,17.65.03,7.26.03,0,6.24,0,15.12c0,6.56,4.62,10.91,13.74,12.92l7.47,1.7c5.64,1.27,7.93,3.3,7.95,7,.03,5.15-5.03,7.91-10.8,7.91-6.11,0-10.33-3.65-10.97-9.08l-.06-.55-6.14,1.55.08.44c1.36,8.04,7.92,13.44,17.16,13.44,10.31,0,17.14-5.88,17.14-14.63,0-6.4-3.95-10.3-12.43-12.27l-7.47-1.7c-6.49-1.51-9.26-3.78-9.26-7.59,0-5.04,4.52-8.43,11.25-8.43,7.77,0,13.67,4.88,14.11,11.87l2.11,1.31h0s10.4,0,10.4,0v18.34Z" fill="#fff"/>
          </svg>
        </a>
        
        <?php get_template_part( 'template-parts/content/content-categorieList' ); ?>
      </div>
    </div>
  </header>
  <div class="header-placeholder"></div>
