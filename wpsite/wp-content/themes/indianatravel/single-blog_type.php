<?php
/**
 * Blog page template *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 */
get_header();
?>
<?php
global $wp_query;
?>
<div class="container">
    <div class="row two-columns">
        <div class="main-column col-md-8">
            <div class="single-entry">
                <div class="single-entry-header">
                    <div class="single-entry-meta">
                        <div class="single-entry-date">
                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="dateCreated"><?php echo get_the_date('j F Y'); ?></time>
                        </div>
                    </div>                
                    <h1 class="single-entry-title"><?php the_title(); ?></h1>
                    <div class="clearfix"></div>
                    <div class="single-entry-thumb">
                        <?php
                        $blogPhoto = get_field('header_image_field');
                        if (!empty($blogPhoto)):
                            $altText = $blogPhoto['title'];
                            $photoUrl = $blogPhoto['sizes']['medium_large'];
                            $photoWidth = $blogPhoto['sizes']['medium_large-width'];
                            $photoHeight = $blogPhoto['sizes']['medium_large-height'];
                            ?>
                            <img class="img-responsive" src="<?php echo $photoUrl; ?>" width="<?php echo $photoWidth; ?>" height="<?php echo $photoHeight; ?>" alt="<?php echo $altText; ?>" />
                            <?php
                        else:
                            ?>
                            <img class="img-responsive" src="http://via.placeholder.com/768x420?text=Blog+Image" width="768" height="420" alt="" />
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="single-content">
                        <?php the_content(); ?> 
                    </div>
                    <div class="single-entry-footer">
                        <div class="single-entry-meta">
                            <div class="single-entry-author">
                                <span>Author: </span>
                                <span class="author_name">
                                    <span class="fn"><?php the_author(); ?></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row social-share-wrapper">
                        <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <aside class="col-md-4">
            <div class="latest-blog-feed single-sidebar-borders single-sidebar-block">
                <h3>Latest Blogs</h3>
                <div class="latest-post">
                    <ul class="blog-link-list">
                        <?php
                        $blogs = new WP_Query(array(
                            'post_type' => 'blog_type',
                            'posts_per_page' => 5,
                            'post__not_in' => array($post->ID)
                        ));
                        ?>
                        <?php if ($blogs->have_posts()) : ?>
                            <?php while ($blogs->have_posts()) : $blogs->the_post(); ?>

                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>                    
                </div>
            </div>
        </aside>
    </div>
</div>

<div class="clearfix"></div>
<div id="BlogFormHolder" class="hide">    
    <div class="container">
        <span id="btnCloseBlogForm" class="glyphicon glyphicon-remove-circle"></span>
        <span class="blog-form-title">ENJOY READING OUR BLOG? SIGN UP FOR MORE!</span>
        <?php echo do_shortcode('[contact-form-7 id="377" html_class="form-inline" title="Blog Subscription Form"]'); ?>
    </div>
</div>
<?php
get_footer();
?>
