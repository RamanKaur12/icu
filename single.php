<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
                            <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
                    </div>
                    <div class="icon-location">
                        <?php 
                                    $location_link = get_field('location-link', 'options');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><img class="loc-icon" src="<?php the_field('location_icon', 'options'); ?>" alt=""><?php echo esc_html( $link_title ); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

	<main id="primary" class="site-main category-page content-with ">

        <div class="sidebar">
            <div class="social-icons">
                    <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
            </div>
            <div class="icon-location">
                <?php
                    $location_link = get_field('location-link', 'options');
                    $link_url = $location_link['url'];
                    $link_title = $location_link['title'];
                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                    ?>
                <a href="<?php echo esc_url($link_url); ?>" target="blank"><img class="loc-icon" src="<?php the_field('location_icon', 'options'); ?>" alt=""><?php echo esc_html($link_title); ?></a>
            </div>
            <div class="categories">
				<div class="category-link">
				<?php
				$category = get_the_category(); 
				$category_parent_id = $category[0]->category_parent;
				if ( $category_parent_id != 0 ) {
					$category_parent = get_term( $category_parent_id, 'category' );
				?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/<?php echo $category_parent->slug; ?>">
						<?php 
							// echo $category_parent->slug; WWWW
						?>
						<span class="icons-index"> <h3>Index</h3> </span> 
					</a><?php
				} else {
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>/category/<?php echo $category[0]->slug; ?>">
                    <span class="icons-index"> <h3>Index</h3> </span> </a>
					<?php
				}
				?>
			</div>
				

			<div class="next-prev-btn">
				
			</div>
                <?php
                previous_post_link( '%link', 'service_category', true, ' ', 'post_format' );

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'icuerious' ) . '</span> <span class="nav-title" ></span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'icuerious' ) . '</span> <span class="nav-title" title="%title"></span>',
                    )
                );?>
                <div class="download-btn">
                    <a href="#" >Download</a>
                </div>
                <div class="comments descktop">
                    <h2>Comments</h2>
                    <?php
                    while ( have_posts() ) :
                        the_post();
                            comments_template();
                    endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>

        <div class="the-category">
            <div class="main-page-text">
                <?php if ( get_field('main_header_paragraph', 'option')): ?>
                    <p><?php the_field('main_header_paragraph', 'option'); ?></p>
                <?php endif ?>
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
                            get_template_part( 'template-parts/content-single', get_post_type() );
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

            <div class="comments mobile">
                <h2>Comments</h2>
                <?php
                while ( have_posts() ) :
                    the_post();
                        comments_template();
                endwhile; // End of the loop.
                ?>
            </div>
            <div class="whole-form">
                <div class="overlay"></div>
                <div class="download_form" id="the-form">
                    <?php echo do_shortcode( '[contact-form-7 id="716" title="Download pdf form"]' ); ?>
                </div>
            </div>
            
        </div>

	</main><!-- #main -->
<script>
   $('.download-btn').on('click', function(e) {
      e.preventDefault();
      $('#the-form').addClass('is-visible');
      $('.Download-form').addClass('forms');
      $('.overlay').addClass('show');
    });
    
    jQuery('.whole-form>.overlay.show').click(function(){
      jQuery('.whole-form>.overlay').removeClass('show');
      jQuery('.whole-form>.download_form').removeClass('is-visible');
    });
</script>
<?php
get_footer();
