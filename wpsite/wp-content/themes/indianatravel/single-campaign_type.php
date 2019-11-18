<?php
/**
 * Campaign page template file *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>

<?php
// Start the loop.
while (have_posts()) : the_post();
$headerimg = get_field('header_image_field');
?>
<section class="campaign-banner" style="background-image: url('<?php echo $headerimg["url"]; ?>');">
  <div class="benner-text-wrapper">
     <h1><?php the_field('banner_title'); ?></h1>
     <span class="banner-subtitle"><?php the_field('banner_subtitle'); ?></span>
     <a href="tel:<?php the_field('phone_number'); ?>" rel="nofollow" class="btn campaign-btn">Call Now</a>
  </div>
</section>
<section class="section-20">
   <div class="main-content">
      <div class="container">
         <div class="wrapper">
            <div class="col-sm-8 landing-pg-content no-padding">
               <?php the_content(); ?>               
            </div>

            <div class="col-sm-4">
               <div class="landing-pg-form">
                  <h2>REQUEST A CALL-BACK</h2>
                  <?php echo do_shortcode('[contact-form-7 id="211" title="Campaign Contact Form"]') ?>               
               </div>               
            </div>

         </div><!--wrapper-->
      </div><!--container-->
   </div><!--main content-->
</section>

<?
endwhile;
?>

<?php
get_footer();
?>
