<?php
/**
 * Newsletter page template *
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
    $currentPage = get_query_var('paged');
    $newsletters = new WP_Query(array(
                'post_type' => 'old_newsletters',
                'post_status' => 'publish',
                'posts_per_page' => 9,
                'paged' => $currentPage
            ));
    $newscounter = 1;
    if(!empty($newsletters)):
    ?>    
    <div class="container newsletter-list">
        <ul class="list-group">
            <?php
            while ($newsletters->have_posts()): $newsletters->the_post();
            ?>
            <li class="list-group-item col-md-6 col-md-4">
                <?php
                $mainImage = get_field('header_image_field');                
                $imageUrl = $mainImage['url'];
                $imageWidth = $mainImage['width'];
                $imageHeight = $mainImage['height'];
                ?>
                <a href="<?php the_permalink(); ?>" target="_blank">
                <img class="img-responsive" src="<?php echo $imageUrl ?>" width="<?php echo $imageWidth ?>" height="<?php echo $imageHeight ?>" alt="<?php the_title() ?>>" />
                </a>
                <a href="<?php the_permalink(); ?>" target="_blank"><h2><?php the_title() ?></h2></a>
            </li>
            <?php    
            endwhile;
            ?>
        </ul>
       <div class="pagination">
       <?php 
       echo paginate_links(array(
           'format' => '?paged=%#%',
           'current' => max( 1, get_query_var('paged') ),
           'total' => $newsletters->max_num_pages
       )); ?>
       </dvi>
    </div>    
    <?php    
    endif;
    ?>
</section>    
<div class="clearfix"></div>

<?php
get_footer();
?>
