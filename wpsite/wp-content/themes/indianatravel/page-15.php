<?php
/**
 * Corporate Travel page template *
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
        <div class="about-content"><?php the_field('summary_field', $wp_query->post->ID); ?></div>  
        <div id="read-more-corporate"><div class="about-content"><?php the_content(); ?></div></div>  
        <button id="corporate-expand" class="btn btn-default">Read More</button>

    </div><!--wrapper-->
  </div><!--container-->
</section>

<section>
  <?php
  $corporates = new WP_Query(array(
              'post_type' => 'corporate_travel',
              'post_status' => 'publish',
              'posts_per_page' => 6
          ));
  $corpcounter = 1;
  if (!empty($corporates)) :
    while ($corporates->have_posts()): $corporates->the_post();
      $isshow = get_field('is_active_field');
      if ($isshow == 1) :
        ?>
        <div class="col-sm-4 col-md-4 travel-item">
           <a href="<?php the_permalink(); ?>">
            <?php
            $corpphoto = get_field('corporate_image_field');
            if (!empty($corpphoto)) {
              $url = $corpphoto['url'];
              $title = $corpphoto['title'];
              $alt = $corpphoto['alt'];
              $size = 'thumb500X400';
              $thumb = $corpphoto['sizes'][$size];
              $width = $corpphoto['sizes'][$size . '-width'];
              $height = $corpphoto['sizes'][$size . '-height'];
            }
            ?> 
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            <div class="travel-box">
              <div class="travel-desc">
                <div class="text center-block">
                  <h2><?php the_title(); ?></h2>
                  <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                  <span>View</span>
                </div>
              </div>
            </div>
          </a>
        </div>        
        <?php
      endif;
      $corpcounter = $corpcounter + 1;
    endwhile;
  endif;
  ?>  
</section>
<div class="clearfix"></div>
<?php
get_footer();
?>
