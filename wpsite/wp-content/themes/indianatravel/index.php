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
    <div class="main-header-text">
      
    </div>
  </div>
</section>

<section class="section-60 main-content">
  <div class="container">
    <div class="wrapper">
      <h1 class="content-title"><?php the_title(); ?></h1>
      <?php the_content(); ?> 
    </div><!--wrapper-->
  </div><!--container-->
</section>

<?php
get_footer();
?>
