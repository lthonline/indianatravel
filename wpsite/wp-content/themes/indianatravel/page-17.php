<?php
/**
 * Experience page template *
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
      <?php the_content(); ?> 
    </div><!--wrapper-->
  </div><!--container-->
</section>

<section>
  <?php
  $experiences = new WP_Query(array(
              'post_type' => 'experiences',
              'post_status' => 'publish',
              'posts_per_page' => -1
          ));
  
  
  $corpcounter = 1;
  if (!empty($experiences)) :
    while ($experiences->have_posts()): $experiences->the_post();
        
        $isshow = get_field('is_active_field');
        $ishomepost = get_field('is_home_page_field');
        if ($isshow == 1) :
          if(empty($ishomepost)) :
          ?>
          <div class="col-sm-4 col-md-4 travel-item">
            <a class="inline cboxElement" href="#corporate_box_<?php echo $corpcounter; ?>">
              <?php
              $corpphoto = get_field('experiences_image_field');
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
          <div style="display:none">
            <div id="corporate_box_<?php echo $corpcounter; ?>" style="padding:10px; background:#fff;">
              <?php 
                if(!empty($corpphoto)){
                  $widephotourl = $corpphoto['url']; 
                }
              ?>
              <img class="img-responsive" src="<?php echo $widephotourl; ?>" alt="<?php echo $alt; ?>" width="800" height="600">
              <p><strong><?php the_title(); ?></strong></p>
              <?php the_content(); ?>
            </div>
          </div>
          <?php
          endif;
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
