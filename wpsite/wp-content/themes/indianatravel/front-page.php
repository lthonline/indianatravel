<?php
/**
 * Front page template file *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>

<div id="carousel-example" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
    $counter = 1;
    $slider = new WP_Query(array(
                'post_type' => 'home_slider',
                'post_status' => 'publish',
                'posts_per_page' => -1
            ));
    while ($slider->have_posts()): $slider->the_post();
      $isactiveslider = get_field('is_active_slide_field');
      if (!empty($isactiveslider) && $isactiveslider == 1):
        $sliderimg = get_field('slider_image_field');
        ?>    
        <div class="item<?php if ($counter == 1): ?> active <?php endif; ?>" style="background-image: url(<?php echo $sliderimg['url']; ?>);">
        <?php if ($counter == 1): ?>
          <div class="slider-content hidden-xs">
           <h1 class="slider-text">
             <span>WELCOME TO</span>
             INDIANA TRAVEL SERVICES
           </h1>
          </div> 
        <?php endif; ?>
        </div>
        <?php
      endif;
      $counter = $counter + 1;
    endwhile;
    ?>  
  </div>  
  <a class="left carousel-control" href="#carousel-example" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#carousel-example" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<?php global $wp_query; ?>

<section class="section-120">
  <div class="container">
    <div class="center-block wrap-600 clearfix">
      <div class="service-box-wrap">
        <div class="text-center center-block service-box box-1">
          <div class="service-content"><h2><?php the_field('service_title_field_1', $wp_query->post->ID); ?></h2><p><?php the_field('service_text_field_1', $wp_query->post->ID); ?></p></div>
          <figure><img src="<?php echo get_template_directory_uri(); ?>/images/services-img.jpg"></figure>            
        </div>
        <div class="service-icons icon-1"><i class="icon glyphicon icon-post-bar"></i></div>
      </div>

      <div class="service-box-wrap">
        <div class="text-center service-box box-2">
          <div class="service-content"><h2><?php the_field('service_title_field_2', $wp_query->post->ID); ?></h2><p><?php the_field('service_text_field_2', $wp_query->post->ID); ?></p></div>              
          <figure><img src="<?php echo get_template_directory_uri(); ?>/images/services-img.jpg"></figure>            
        </div>
        <div class="service-icons icon-2"><i class="icon glyphicon glyphicon-briefcase
"></i></div>
      </div>

      <div class="service-box-wrap">
        <div class="text-center service-box box-3">
          <div class="service-content"><h2><?php the_field('service_title_field_3', $wp_query->post->ID); ?></h2><p><?php the_field('service_text_field_3', $wp_query->post->ID); ?></p></div>              
          <figure><img src="<?php echo get_template_directory_uri(); ?>/images/services-img.jpg"></figure>            
        </div>
        <div class="service-icons icon-3"><i class="icon glyphicon glyphicon-map-marker"></i></div>
      </div>
    </div>
  </div>      
</section>


<section class="main-content section-10">
  <h1 class="content-title"><?php the_field('journey_section_title', $wp_query->post->ID); ?></h1>
  <div class="about-content"><?php the_field('journey_section_summary', $wp_query->post->ID); ?></div>  
  <div id="read-more-journey"><div class="about-content"><?php the_field('journey_section_body', $wp_query->post->ID); ?></div></div>  
  <button id="journey-expand" class="btn btn-default">Read More</button>
</section>

<hr class="divide-sec">

<section class="main-content">
  <div class="container">
    <h1 class="content-title">Featured Destinations</h1>
    <p>Our top picks of the season are-now, more than ever-easier to reach, explore, and enjoy.<br />These are the hottest destinations of the year curated by our team of experts…</p>
    <div class="wrapper clearfix section-10">
      <?php
      $query = new WP_Query(array(
                  'post_type' => 'featured_destination',
                  'post_status' => 'publish',
                  'posts_per_page' => -1
              ));
      $counter = 1;
      while ($query->have_posts()): $query->the_post();

        $isactive = get_field('is_active_field');
        if (!empty($isactive) && $isactive == 1) :
          ?>
          <div class="col-sm-6 col-md-4 featured-item">
            <a class="inline cboxElement" href="#featuredbox_<?php echo $counter; ?>">
              <?php
              $image = get_field('home-featured-destinations-img');
              if (!empty($image)) :
                // vars
                $url = $image['url'];
                $title = $image['title'];
                $alt = $image['alt'];
                $caption = $image['caption'];

                // thumbnail
                $size = 'thumbnail';
                $thumb = $image['sizes'][$size];
                $width = $image['sizes'][$size . '-width'];
                $height = $image['sizes'][$size . '-height'];
                ?>
                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                <?php
              endif;
              ?>
              <h2 class="featured-title"><?php the_title(); ?></h2>
              <div class="content-box">
                <p><?php the_excerpt(); ?></p>
                <span>Read more</span>
              </div>
            </a>
          </div>
          <div style="display:none">
            <div id="featuredbox_<?php echo $counter; ?>" style="padding:10px; background:#fff;">
              <?php
              $bigimage = get_field('home-featured-destinations-img');
              if (!empty($bigimage)):
                // vars
                $bigurl = $bigimage['url'];
                $bigtitle = $bigimage['title'];
                $bigalt = $bigimage['alt'];
                $bigcaption = $bigimage['caption'];

                // thumbnail
                $bigsize = 'full';
                $bigthumb = $bigimage['sizes'][$bigsize];
                $bigwidth = $bigimage['sizes'][$bigsize . '-width'];
                $bigheight = $bigimage['sizes'][$bigsize . '-height'];
              endif;
              ?>
              <img src="<?php echo $bigurl; ?>" alt="<?php echo $bigalt; ?>" width="<?php echo $bigwidth; ?>" height="<?php echo $bigheight; ?>" class="img-responsive" />  
              <h2 class="featured-subtitle"><?php the_title(); ?></h2>
              <?php the_content(); ?>
            </div>
          </div>
          <?php
          $counter = $counter + 1;
        endif;
      endwhile;
      ?>  
    </div>
  </div>
</section>

<section class="main-content section-10">
  <a name="aboutsection" style="display:block; position: absolute; top: -100px; width: 30px; height: 30px;"></a>
  <h1 class="content-title"><?php the_field('about_section_title_field', $wp_query->post->ID); ?></h1>
  <div class="about-content"><?php the_field('about_section_main_text_field', $wp_query->post->ID); ?></div>  
  <div id="read-more-about"><div class="about-content"><?php the_field('about_section_readmore_text_field', $wp_query->post->ID); ?></div></div>  
  <button id="about-expand" class="btn btn-default">Read More</button>
</section>


<section class="form-content main-content">
  <div class="container">
    <h1 class="content-title">Connect with Experts</h1>
    <?php echo do_shortcode('[contact-form-7 id="64" title="Home Contact Form" html_id="home-contact" html_class="form-inline"]'); ?>
  </div>
</section>

<section class="section-40 main-content">
  <div class="container">
    <h1 class="content-title">Exclusive Experience Highlights</h1>
    <p>Highlights from some of our favourite customized client experiences!</p>
    <div class="wrapper clearfix section-40">
      <?php
      $expquery = new WP_Query(array(
                  'post_type' => 'experiences',
                  'post_status' => 'publish',
                  'posts_per_page' => -1
              ));
      while ($expquery->have_posts()): $expquery->the_post();
        $ishomeitem = get_field('is_home_page_field');
        if (!empty($ishomeitem) && $ishomeitem == 1):
          ?>
          <div class="col-sm-6 col-md-4 exclusive-item">
            <?php
            $expimg = get_field('experiences_image_field');
            if (!empty($expimg)):
              // vars
              $expurl = $expimg['url'];
              $exptitle = $expimg['title'];
              $expalt = $expimg['alt'];
              $expcaption = $expimg['caption'];

              // thumbnail
              $expsize = 'experience-home-image';
              $expthumb = $expimg['sizes'][$expsize];
              $expwidth = $expimg['sizes'][$expsize . '-width'];
              $expheight = $expimg['sizes'][$expsize . '-height'];
            endif;
            ?>
            <img src="<?php echo $expurl; ?>" alt="<?php echo $expurl; ?>" width="<?php echo $expwidth; ?>" height="<?php echo $expheight; ?>" />
            <div class="content-box">
              <div class="content-desc">
                <h2 class="exp-heading"><?php the_title(); ?></h2>
                <span><?php $subtitle = get_field('sub_heading_field'); echo $subtitle; ?></span>
              </div>
            </div>
          </div>      
          <?php
        endif;
      endwhile;
      ?>  
    </div>
  </div>
</section>

<?php get_footer(); ?>
