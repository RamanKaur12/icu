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
                            <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
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
	<main id="primary" class="site-main category-page service-category content-with ">
    <div class="floating-service" id="float">
                <img src="https://zeroguess.us/n03/icuerious/wp-content/uploads/2022/07/icons8-double-left-24-1.png" alt="">
            </div>
        <div class="sidebar" id="mobile-sidebar">
        
            <div class="social-icons">
                    <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
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
            <h2 class="side-title">service</h2>
            <div class="categories">
                <div id="accordions" class="accordion">
                        <?php
                        $args = array(
                            'taxonomy' => 'service_category',
                            'orderby' => 'date',
                            'order'   => 'ASC',
                            'hide_empty' => false,
                                );
                        $cats = get_categories($args);
                        ?> <?php
                            foreach($cats as $cat) { 
                                ?>
                            <div class="each-service">
                                <div class="link project-categories">
                               <?php $cat_link = get_category_link($cat->cat_ID);
                                    echo '<a href="'.$cat_link.'">'.$cat->name.'</a>'; ?>
                                </div>
                                <?php
                                $post_type = 'our_service';
                                $taxonomy = 'service_category';
                                $args = [
                                    'post_type' => $post_type,
                                    'posts_per_page' => -1,
                                    'orderby' => 'date',
                                    'order'   => 'ASC',
                                    'tax_query' => [
                                        [
                                            'taxonomy' => 'service_category',
                                            'terms' => $cat->term_id,
                                        ],
                                    ],
                                ];

                                $query = new WP_Query($args); ?>
                                <ul class="submenu"> 
                                    <div class="content-submenu"><?php
                                        if( $query->have_posts() ) {

                                            while( $query->have_posts() ) {
                                                $query->the_post();
                                                $post_img = get_the_post_thumbnail_url(); ?>
                                            
                                                    <p><a href="<?php get_post_permalink(the_permalink()) ?>"><?php the_title(); ?></p></a>
                                            <?php 
                                            }
                                        }?>
                                    </div>
                                </ul>
                            </div><?php
                            }?>
                </div>
			</div>
        </div>

        <div class="the-category">
            <div class="main-page-text">
                <?php if ( get_field('main_header_paragraph', 'option')): ?>
                    <p><?php the_field('main_header_paragraph', 'option'); ?></p>
                <?php endif ?>
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
                            get_template_part( 'template-parts/content-service', get_post_type() );
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
