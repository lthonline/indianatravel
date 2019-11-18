<?php
/**
 * Leisure Travel page template *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>
<?php
global $wp_query;

$headerimg = get_field('header_image_field', $wp_query->post->ID);
?>
<section class="main-header" style="background-image: url('<?php echo $headerimg["url"]; ?>');">
  <div class="header-text-wrapper hidden-xs">
    <div class="main-header-text" style="text-indent:-9999em;">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</section>

<section class="section-60 main-content">
  <div class="container">
    <div class="wrapper">
      <h1 class="content-title"><?php the_title(); ?></h1>      
    </div><!--wrapper-->
  </div><!--container-->
</section>

<section class="clearfix">
   <div class="container">
      <?php
      $testimonials = new WP_Query(array(
              'post_type' => 'testimonial_type',
              'post_status' => 'publish',
              'posts_per_page' => 10
          ));
      $testimonialCounter = 1;
      if(!empty($testimonials)) :
         while($testimonials->have_posts()) : $testimonials->the_post();
      ?>
      <blockquote class="blockquote">
         <?php the_title('<h2>','</h2>'); ?>
         <?php the_content(); ?>
         <footer class="blockquote-footer"><cite title="<?php the_field('testimonial_footer_line'); ?>"><?php the_field('testimonial_footer_line'); ?></cite></footer>
      </blockquote>
      <?php      
         endwhile;         
      endif;
      ?>
   </div>
</section>

<?php
get_footer();
?>
