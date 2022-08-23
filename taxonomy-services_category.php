<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icuerious
 */

get_header();
?>
<section>
    <div class="mobile-deader">
        <div class="hpb-row-1">
            <div class="col-2">
                <div class="mobile-social-banner">
                    <h2><?php the_field('right-text-mobile', 'options'); ?></h2>
                    <div class="search-form"><?php dynamic_sidebar( 'header-search' ); ?></div>
                </div>
                <div class="social-link">
                    <div class="social-icons">
                            <a href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                            <a href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                            <a href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
                    </div>
                    <div class="icon-location">
                        <?php 
                                    $location_link = get_field('location-link', 'options');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><img class="loc-icon" src="<?php the_field('location_icon', 'options'); ?>" alt=""><?php echo esc_html( $link_title ); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
	<main id="primary" class="site-main category-page content-with ">
<h1>this is for services
    
</h1>
        <div class="sidebar">
            <div class="social-icons">
                    <a href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                    <a href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                    <a href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
            </div>
            <div class="icon-location">
                <?php
                    $location_link = get_field('location-link', 'options');
                    $link_url = $location_link['url'];
                    $link_title = $location_link['title'];
                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><img class="loc-icon" src="<?php the_field('location_icon', 'options'); ?>" alt=""><?php echo esc_html($link_title); ?></a>
                </div>
            <div class="categories">
               <?php echo do_shortcode( '[displaycategory]' ); ?>
            </div>
        </div>

        <div class="the-category">
            <div class="main-page-text">
            <?php if ( get_field('main_header_paragraph', 'option')): ?>
                    <p><?php the_field('main_header_paragraph', 'option'); ?></p>
                <?php endif ?>
            </div>

            <div class="sort_by">
                <P class="sort-by-text">Sort By</P>
                <?php echo do_shortcode('[sorting]')?>
            </div>

            <div class="links-arrangement">
                <div class="title">
                    <h3>title</h3>
                </div>
                <div class="description">
                    <h3>description</h3>
                </div>
                <div class="category">
                    <h3>category</h3>
                </div>
            </div>

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                ?>
                <div id="accordion" class="accordion">
                    <?php
                while ( have_posts() ) :
                   the_post();
                   ?><?php
                            get_template_part( 'template-parts/content-category', get_post_type() );
                        ?><?php
                    
                 
                endwhile;
                ?>
                </div>
                <?php
                the_posts_navigation();

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

            
        </div>

	</main><!-- #main -->

<?php
get_footer();
