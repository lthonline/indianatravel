<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">        
        <!-- Facebook Pixel Code -->
         <script>
         !function(f,b,e,v,n,t,s)
         {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
         n.callMethod.apply(n,arguments):n.queue.push(arguments)};
         if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
         n.queue=[];t=b.createElement(e);t.async=!0;
         t.src=v;s=b.getElementsByTagName(e)[0];
         s.parentNode.insertBefore(t,s)}(window,document,'script',
         'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '464683187320676'); 
         fbq('track', 'PageView');
         </script>
         <noscript>
         <img height="1" width="1" 
         src="https://www.facebook.com/tr?id=464683187320676&ev=PageView
         &noscript=1"/>
         </noscript>
         <!-- End Facebook Pixel Code -->
        <?php
        while ( have_posts() ) : the_post();
            the_field('newsletter_bootstrap_link');
            the_field('newsletter_head_section');
        endwhile;
        ?>
    </head>
    <body>       
    <?php

    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    ?>
    </body>
<html>    
