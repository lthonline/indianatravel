<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="google-site-verification" content="NXpb_CqOp3mFr-_LyF_VrlaUjHoPxPvFYgvNAG4f3w8" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <style type="text/css">
      <!--
      .main-menu ul li{ display: inline; padding: 20px 40px;}
      -->
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116976795-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'UA-116976795-1');
   </script>
   
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
   <?php if(is_page(201)): ?>
   fbq('track', 'Lead');   
   <?php endif; ?>
   </script>
   <noscript>
   <img height="1" width="1" 
   src="https://www.facebook.com/tr?id=464683187320676&ev=PageView
   &noscript=1"/>
   </noscript>
<!-- End Facebook Pixel Code -->
  </head>
  <body <?php body_class(); ?>>
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script> 
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="tel:+912261742222" rel="nofollow"><span class="fa fa-phone-square btn-phone"></span></a>
          <a class="navbar-brand" href="<?php echo get_home_url() ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
            wp_nav_menu( array(
                'menu'              => 'header-menu',
                'theme_location'    => 'header-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
        <ul class="hidden-xs hidden-sm hidden-md social-links">
            <li><a href="javascript:void(0);" title="9167232993" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
            <li><a href="https://www.facebook.com/travelbyindiana/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/TravelByIndiana"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/travelbyindiana/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            <li><a href="https://www.linkedin.com/company/travelbyindiana"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        </ul>
      </div><!-- /.container-fluid -->
    </nav>
    