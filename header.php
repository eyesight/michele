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
          <svg class="mi-logo" id="Gruppe_236" data-name="Gruppe 236" xmlns="http://www.w3.org/2000/svg" width="146.115" height="25.19" viewBox="0 0 146.115 25.19">
            <path id="Pfad_261" data-name="Pfad 261" d="M20.31,22.794c-1.186,0-2.441-.994-2.441-3.052V7.675h4.255V6.733H17.869V1.24h-.837L14.521,6.733H11.26v.942h3.278v11.91a4.726,4.726,0,0,0,4.83,5.231c2.773,0,4.656-2.005,4.429-6.975h-.7C23.1,20.6,22.525,22.794,20.31,22.794Z" transform="translate(7.696 0.352)" />
            <path id="Pfad_262" data-name="Pfad 262" d="M51.13.79H44.8v.645l2.93.994v9.853a7.429,7.429,0,0,0-7.394-5.633c-4.761,0-8.266,3.575-8.266,9.242s3.488,9.26,8.266,9.26a7.464,7.464,0,0,0,7.394-5.685V24.7h6.243V24l-2.842-.924ZM42.777,22.849c-3.261.575-6.225-1.936-6.975-6.208S36.97,8.986,40.231,8.41s6.26,1.744,6.975,6.1v.14C48.026,18.961,45.9,22.309,42.777,22.849Z" transform="translate(23.175 0.017)" />
            <path id="Pfad_263" data-name="Pfad 263" d="M51.6,4.39H45.34V5.1l2.895.924V20.4l-2.895.924v.715H54.5v-.715L51.6,20.4Z" transform="translate(33.045 2.695)" />
            <path id="Pfad_264" data-name="Pfad 264" d="M48.893,4.256a1.936,1.936,0,0,0,2.058-1.971A2.005,2.005,0,0,0,48.893.332,1.953,1.953,0,0,0,46.8,2.285a1.9,1.9,0,0,0,2.093,1.971Z" transform="translate(34.13 -0.327)" />
            <path id="Pfad_265" data-name="Pfad 265" d="M82.425,4.254A1.936,1.936,0,0,1,80.35,2.284,2.005,2.005,0,0,1,82.425.331a1.971,1.971,0,0,1,2.005,1.953,1.918,1.918,0,0,1-2.005,1.971Z" transform="translate(59.086 -0.326)" />
            <path id="Pfad_266" data-name="Pfad 266" d="M60.946,4.154a9.26,9.26,0,1,0,9.574,9.207,9.155,9.155,0,0,0-9.574-9.207Zm1.412,17.089c-3.278.575-5.946-1.744-6.871-6.975s.82-8.213,4.1-8.806,5.964,1.639,6.871,6.871-.767,8.318-4.1,9Z" transform="translate(37.999 2.512)" />
            <path id="Pfad_267" data-name="Pfad 267" d="M37.531,4.39H31.289V5.1l2.895.942v8.248c0,3.488-1.866,6.243-5.109,6.243-2.546,0-3.941-1.639-3.941-4.639V4.39H18.89V5.1l2.895.942v9.87c0,4.325,2.215,6.5,5.859,6.5H27.8a6.435,6.435,0,0,0,6.33-4.516v4.081h6.278v-.663l-2.93-.924Z" transform="translate(13.371 2.695)" />
            <path id="Pfad_268" data-name="Pfad 268" d="M17.148,15.278a6,6,0,0,0-2.284-2.267,19.182,19.182,0,0,0-2.947-1.378A50.082,50.082,0,0,1,4.785,8.582,3.488,3.488,0,0,1,3.424,5.9,4.046,4.046,0,0,1,4.07,3.769,5.789,5.789,0,0,1,8.76,1.642a5.231,5.231,0,0,1,3.819,1.43l3.3,5.877h.785V.892h-.75L14.846,2.409A11.562,11.562,0,0,0,8.429.56,9.835,9.835,0,0,0,2.692,2.3,6.086,6.086,0,0,0,.39,6.8a5.894,5.894,0,0,0,2.651,4.987,19.374,19.374,0,0,0,2.372,1.238c3.3,1.482,5.231,2.127,5.231,2.127a9.329,9.329,0,0,1,3.017,1.866,3.993,3.993,0,0,1,1.064,1.5A3.924,3.924,0,0,1,15,20.266a3.749,3.749,0,0,1-.82,1.988A5.894,5.894,0,0,1,9.231,24a7.673,7.673,0,0,1-4.9-2.11c-.977-1.744-1.953-3.4-2.93-5.075H.582v8.056h.75L2.4,23.335A13.6,13.6,0,0,0,9.179,25.34a11.335,11.335,0,0,0,4.342-.732,7.429,7.429,0,0,0,2.738-1.848,6.3,6.3,0,0,0,1.657-4.412A6.173,6.173,0,0,0,17.148,15.278Z" transform="translate(-0.39 -0.154)" />
            <path id="Pfad_269" data-name="Pfad 269" d="M97.606,5.274v-.7h-6.33V7.157a6.854,6.854,0,0,0-.593-.767,6.051,6.051,0,0,0-4.726-2.25,5.946,5.946,0,0,0-5.493,3.7,7.308,7.308,0,0,0-.889-1.29,7.273,7.273,0,0,0-.785-.82A5.772,5.772,0,0,0,74.744,4.14a5.946,5.946,0,0,0-5.964,5.946V20.55l-2.651.924v.715h8.719v-.68L72.2,20.584V9.93a5.232,5.232,0,0,1,.192-1.221,3.243,3.243,0,0,1,.488-1.029,3.871,3.871,0,0,1,3.1-1.535,3.924,3.924,0,0,1,2.529.942,4.726,4.726,0,0,1,.75.837,4.1,4.1,0,0,1,.715,2.2h0V20.584l-2.651.924v.715h8.719v-.715l-2.7-.924V9.947a4.586,4.586,0,0,1,.209-1.221,3.487,3.487,0,0,1,.558-1.064,3.976,3.976,0,0,1,3.1-1.517,4.15,4.15,0,0,1,1.133.174,4.638,4.638,0,0,1,2.2,1.569,5.353,5.353,0,0,1,.61,1.151V20.584l-2.581.942v.715h8.946v-.715l-2.947-.942V6.2Z" transform="translate(48.509 2.509)" />
          </svg>
        </a>
        <?php wp_nav_menu( array( 
          'theme_location' => 'main-menu',
          'container'       => '',
          'menu_id'         => '',
          'menu_class'      => 'header__navigation' 
        )); ?>
      </div>
    </div>
  </header>
