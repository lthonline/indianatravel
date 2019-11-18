<?php
/**
 * Blog summary page template *
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

<section class="main-content">
    <div class="container">
        <div class="wrapper">
            <h1 class="content-title"><?php the_title(); ?></h1>
            <?php the_content(); ?> 
        </div><!--wrapper-->
    </div><!--container-->
</section>

<div class="container">
    <section class="blog-feed">
        <div class="row two-columns">
            <div class="main-column col-md-8">
                <div class="blog-feed">
                    <h3>Recent Posts</h3>
                    <div class="blog-feed-posts">
                        <div class="row">
                            <?php
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $blogs = new WP_Query(array(
                                'post_type' => 'blog_type',
                                'post_status' => 'publish',
                                'posts_per_page' => 12,
                                'paged' => $paged
                            ));
                            $loopCounter = 1;
                            if (!empty($blogs)):
                                while ($blogs->have_posts()): $blogs->the_post();
                                    if ($loopCounter % 3 == 0):
                                        ?>
                                        <div class="col-md-12">
                                            <article class="row entry" itemscope itemtype="http://schema.org/Article">
                                                <div class="entry-content">
                                                    <div class="entry-thumb">
                                                        <?php
                                                        $blogPhoto = get_field('header_image_field');
                                                        if (!empty($blogPhoto)):
                                                            $altText = $blogPhoto['title'];
                                                            $photoUrl = $blogPhoto['sizes']['medium_large'];
                                                            $photoWidth = $blogPhoto['sizes']['medium_large-width'];
                                                            $photoHeight = $blogPhoto['sizes']['medium_large-height'];
                                                            ?>
                                                            <a href="<?php the_permalink(); ?>"><img class="wp-post-image" src="<?php echo $photoUrl; ?>" width="<?php echo $photoWidth; ?>" height="<?php echo $photoHeight; ?>" alt="<?php echo $altText; ?>" /></a>
                                                            <?php
                                                        else:
                                                            ?>
                                                            <img class="img-responsive" src="http://via.placeholder.com/768x420?text=Blog+Image" width="768" height="420" alt="" />
                                                        <?php
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="entry-date date updated">
                                                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="dateCreated">
                                                            <?php echo get_the_date('j F Y'); ?>
                                                        </time>
                                                    </div>
                                                    <h2 class="entry-title" style="min-height: 23px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    <div class="entry-summary">
                                                        <?php the_excerpt(); ?>                                                  
                                                    </div>
                                                    <div class="entry-meta">
                                                        <div class="entry-author">by <span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <?php
                                    else:
                                        ?>
                                        <div class="col-md-6">
                                            <article class="row entry" itemscope itemtype="http://schema.org/Article">
                                                <div class="entry-content">
                                                    <div class="entry-thumb">
                                                        <?php
                                                        $blogPhoto = get_field('header_image_field');
                                                        if (!empty($blogPhoto)):
                                                            $altText = $blogPhoto['title'];
                                                            $photoUrl = $blogPhoto['sizes']['medium_large'];
                                                            $photoWidth = $blogPhoto['sizes']['medium_large-width'];
                                                            $photoHeight = $blogPhoto['sizes']['medium_large-height'];
                                                            ?>
                                                            <a href="<?php the_permalink(); ?>"><img class="wp-post-image" src="<?php echo $photoUrl; ?>" width="<?php echo $photoWidth; ?>" height="<?php echo $photoHeight; ?>" alt="<?php echo $altText; ?>" /></a>
                                                            <?php
                                                        else:
                                                            ?>
                                                            <img class="img-responsive" src="http://via.placeholder.com/768x420?text=Blog+Image" width="768" height="420" alt="" />
                                                        <?php
                                                        endif;
                                                        ?>
                                                    </div>
                                                    <div class="entry-date">
                                                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="dateCreated">
                                                            <?php echo get_the_date('j F Y'); ?>
                                                        </time>
                                                    </div>
                                                    <h2 class="entry-title" style="min-height: 23px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    <div class="entry-summary">
                                                        <?php the_excerpt(); ?>                                                  
                                                    </div>
                                                    <div class="entry-meta">
                                                        <div class="entry-author">by <span class="vcard author"><span class="fn"><?php the_author(); ?></span></span></div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php
                                    endif;
                                    ?>

                                    <?php
                                    $loopCounter++;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <?php
                        echo '<div class="pagination-wrapper clearfix"><div class="pagination">';
                        echo paginate_links(array(
                            'total' => $blogs->max_num_pages
                        ));
                        echo '</div></div>';
                        ?>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <aside class="col-md-4">
                <!--<div class="sidebar-block sidebar-borders">
                    <div class="widget widget-bordered widget_text">
                        <h3 class="widget-title"><span>     </span></h3>
                        <div class="textwidget">
                            
                        </div>
                    </div>
                    <div class="widget widget-bordered widget_nav_menu">
                       <h3 class="widget-title"><span>     </span></h3>
                        <div class="menu-social-container">
                            <ul id="menu-social-1" class="menu">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-130">  </li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </aside>
            <!-- End Sidebar -->
        </div>
    </section>
</div>

<?php
get_footer();
?>
