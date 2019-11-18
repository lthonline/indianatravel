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
        <div class="about-content"><?php the_field('summary_field', $wp_query->post->ID); ?></div>  
        <div id="read-more-leisure"><div class="about-content"><?php the_content(); ?></div></div>  
        <button id="leisure-expand" class="btn btn-default">Read More</button>

    </div><!--wrapper-->
  </div><!--container-->
</section>

<?php
$leisures = new WP_Query(array(
            'post_type' => 'leisure_travel',
            'post_status' => 'publish',
            'posts_per_page' => 4
        ));
if (!empty($leisures)):
  ?>  
  <section>
    <div class="container">
      <div class="wrapper">
        <?php
        $leiscounter = 1;
        while ($leisures->have_posts()): $leisures->the_post();
          ?>
          <div class="col-sm-6 leisure-item">
             <a href="<?php the_permalink(); ?>">
              <?php
              $leisurephoto = get_field('leisure_travel_image_field');
              if (!empty($leisurephoto)) {
                $leiphotourl = $leisurephoto['url'];
                $leiphototitle = $leisurephoto['title'];
                $leiphotoalt = $leisurephoto['alt'];
                $leiphotocaption = $leisurephoto['caption'];

                // thumbnail
                $leiphotosize = 'thumb500X400';
                $leiphotothumb = $leisurephoto['sizes'][$leiphotosize];
                $leiphotowidth = $leisurephoto['sizes'][$leiphotosize . '-width'];
                $leiphotoheight = $leisurephoto['sizes'][$leiphotosize . '-height'];
              }
              ?>
              <img src="<?php echo $leiphotourl; ?>" alt="<?php echo $leiphotoalt; ?>" width="<?php echo $leiphotowidth; ?>" height="<?php echo $leiphotoheight; ?>" />
              <div class="leisure-box">
                <div class="leisure-desc">
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
          $leiscounter = $leiscounter + 1;
        endwhile;
        ?>  
      </div>
    </div>
  </section>
  <?php
endif;
?>

<?php
get_footer();
?>
