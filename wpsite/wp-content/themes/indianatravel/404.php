<?php
/**
 * 404 Page template file *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>

<section class="main-content">
  <div class="container section-100">
    <div class="wrapper">
      <h1 class="content-title">404 ERROR</h1>
      <h2>SORRY, THIS PAGE DOESN'T EXIST</h2>
      <p>&nbsp;</p>
      <a href="<?php echo get_home_url(); ?>" class="btn btn-default">VIEW HOME PAGE</a>
            
    </div>
  </div>  
</section>

<?php get_footer(); ?>