<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package icuerious
 */

?>
<!doctype html>
<html class="home" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">-->

<link rel="stylesheet" href="https://alvarotrigo.com/fullPage/jquery.fullPage.css">

		<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page-loader">
    <section class="splash-screen" id="splash_screen"> 
            <div class="splash-screen-container">
                <div class="ss-row-1 content-padding-splash-screen  content-with">
                    <!-- <div class="col-logo first">
                        <span class="space"></span>
                    <div class="each-letter i"><img src="./wp-content/uploads/2022/05/i.png" alt=""></div>
                    <div class="each-letter c"><img src="./wp-content/uploads/2022/05/c.png" alt=""></div>
                    <div class="each-letter u"><img src="./wp-content/uploads/2022/05/u.png" alt=""></div>
                    <div class="each-letter e"><img src="./wp-content/uploads/2022/05/e.png" alt=""></div><br>
                    <div class="each-letter r"><img src="./wp-content/uploads/2022/05/r.png" alt=""></div>
                    <div class="each-letter i2"><img src="./wp-content/uploads/2022/05/i2.png" alt=""></div>
                    <div class="each-letter o"><img src="./wp-content/uploads/2022/05/o.png" alt=""></div>
                    <div class="each-letter u-1"><img src="./wp-content/uploads/2022/05/u-1.png" alt=""></div>
                    <div class="each-letter s"><img src="./wp-content/uploads/2022/05/s.png" alt=""></div>
                    <div class="each-letter tm" ><img src="./wp-content/uploads/2022/05/tm.png" alt=""></div>
                    
                    </div> -->
                



                    <div class="col-logo">
                        <img class="each-letter" src="<?php the_field('splashscreen-img', 'option'); ?>" alt="">   
                    </div>
                    <div class="col-subtext-logo">

                    <h2><?php the_field('right-text', 'option'); ?></h2>
                    </div>
                </div>

                <div class="ss-row-2 content-padding-splash-screen  content-with" >
                    <div class="links col-location">
                        <?php 
                            $location_link = get_field('location_link_splah', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>

                    </div>
                    <div class="links col-contact-info">
                    <?php 
                            $location_link = get_field('number-usa', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                        <?php 
                            $location_link = get_field('number-in', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
                    <div class="links col-email-addresse">
                        
                        <?php 
                            $location_link = get_field('email-link', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                    </div>
                </div>
                <div class="mobile-text ss-row-2 content-padding-splash-screen  content-with" >
                 
                    <div class="links col-contact-info">
                    <?php 
                            $location_link = get_field('number-usa', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                        <?php 
                            $location_link = get_field('number-in', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>

                    <div class="links col-location">
                    <img class="" src="<?php the_field('location_icon_mobile', 'option'); ?>" alt="">   
                      
                        <?php 
                            $location_link = get_field('location_link_splah', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                    </div>

                    <div class="links col-email-addresse">
                    <img class="" src="<?php the_field('email-icon_mobile', 'option'); ?>" alt=""> 
                    <?php 
                            $location_link = get_field('email-link', 'option');
                            $link_url = $location_link['url'];
                            $link_title = $location_link['title'];
                            $link_target = $location_link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                    </div>
                </div>
                <div class="mobile-text firmm-consultation">
                    <h2><?php the_field('right-text_mobile', 'option'); ?></h2>
                </div>
                <div class="ss-row-3">
                    <div class="container ">
                        <div class="links ss-sub-row-1  content-with">
                            <div class="social-icons">
                                <a href="<?php the_field('facebook-menu_link', 'options'); ?>"><img src="<?php the_field('facebook_splash_screen', 'option'); ?>" alt=""></a>
                                <a href="<?php the_field('twitter-menu_link', 'options'); ?>"><img src="<?php the_field('twitter_splash_screen', 'option'); ?>" alt=""></a>
                                <a href="<?php the_field('linklnd-menu_link', 'options'); ?>"><img src="<?php the_field('linklnd_splash_screen', 'option'); ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="links ss-sub-row-2">
                            <div class="containder content-with">
                                <div class="ss-sub-row-2-contact-info  ">
                                <?php 
                                    $location_link = get_field('number-in', 'option');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                        
                                    <?php 
                                    $location_link = get_field('number-usa', 'option');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                                
                                    </div>
                                    <div class="links ss-sub-row-2-email-addresse">
                                    <?php 
                                    $location_link = get_field('email-link', 'option');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php wp_body_open(); ?>
<div id="page" class="site">

		<div class="cursor"></div>
