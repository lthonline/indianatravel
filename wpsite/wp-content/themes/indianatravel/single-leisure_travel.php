<?php
/**
 * Single Leisure Page Template *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>
<?php
global $wp_query;
$headerimg = get_field('leisure_travel_image_field', $wp_query->post->ID);
?>
<?php if(!empty($headerimg)) { ?>
<section class="main-header" style="background-image: url('<?php echo $headerimg["url"]; ?>');"></section> 
<?php } else { ?> 
<section class="main-header" style="background-image: url('http://via.placeholder.com/1280x350?text=Blog+Image');"></section> 
<?php } ?>

<section class="section-60 main-content">
   <div class="container">
      <h1 class="content-title"><?php the_title(); ?></h1>
      <?php the_content(); ?> 
   </div>
</section>

<div class="clearfix"></div>
<?php
get_footer();
?>