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
<html <?php language_attributes(); ?>>

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
        <header id="masthead" class="site-header">
            <div class="content-header-global">
                <div class="top-header-bar top-bar-menu ss-sub-row-2">
                    <div class="ss-sub-row-2-contact-info">
                        <?php 
							$phone_number_india = get_field('phone_number_india', 'options');
							if( $phone_number_india ): 
								$link_url = $phone_number_india['url'];
								$link_title = $phone_number_india['title'];
								$link_target = $phone_number_india['target'] ? $phone_number_india['target'] : '_self';
								?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>

                        <?php 
							$phone_number_us = get_field('phone_number_us', 'options');
							if( $phone_number_us ): 
								$link_url = $phone_number_us['url'];
								$link_title = $phone_number_us['title'];
								$link_target = $phone_number_us['target'] ? $phone_number_us['target'] : '_self';
								?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="ss-sub-row-2-email-addresse">
                        <?php 
							$email_addresse = get_field('email_addresse', 'options');
							if( $email_addresse ): 
								$link_url = $email_addresse['url'];
								$link_title = $email_addresse['title'];
								$link_target = $email_addresse['target'] ? $email_addresse['target'] : '_self';
								?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="content-header ">
                    <div class="logo-search">
                        <div class="site-branding">
                            <?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else :
							
								?>
                            <!-- <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> -->
                            <?php
							endif;
							$icuerious_description = get_bloginfo( 'description', 'display' );
							if ( $icuerious_description || is_customize_preview() ) :
								?>
                            <p class="site-description"><?php echo $icuerious_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                        <div class="logo-full-menus-mobile">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php the_field('logo_full_menu', 'options'); ?>" alt="">
                            </a>
                        </div>
                        <div class="search-form"><?php dynamic_sidebar( 'header-search' ); ?></div>
                    </div>
                    <div class="container-nav">
                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggles" aria-controls="primary-menu" aria-expanded="false">
                                <span class="first-line"></span>
                                <span class="first-line-2"></span>
                                <span class="first-line-3"></span>
                            </button>
                            <!-- <div class="text text-mobile"><p><?php the_field('responsiveness_mobile_text_for_menu', 'options'); ?></p></div> -->

                            <div class="text text-mobile">
                                <p><?php echo get_the_title(); ?> </p>
                            </div>

                        </nav><!-- #site-navigation -->
                        <div class="downloadable-content">


                            <div class="social-contact">
                                <?php if( get_field('brochure_files', 'options') ): ?>
                                <a href="<?php the_field('brochure_files', 'options'); ?>" download>
                                    <div class="icons">

                                        <?php if( get_field('brochure_image-1', 'options') ): ?>
                                        <img src="<?php the_field('brochure_image-1', 'options'); ?>" />
                                        <?php endif; ?>

                                        <?php if( get_field('brochure_image-2', 'options') ): ?>
                                        <img src="<?php the_field('brochure_image-2', 'options'); ?>" />
                                        <?php endif; ?>


                                    </div>
                                    <div class="text">
                                        <p>
                                            <?php the_field('responsiveness_mobile_text_for_download_brochure', 'options'); ?>
                                        </p>
                                    </div>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="full-menu">
                        <div class="full-menu-container">
                            <div class="top-bar-menu ss-sub-row-2">
                                <div class="ss-sub-row-2-contact-info">
                                    <?php 
											$phone_number_india = get_field('phone_number_india', 'options');
											if( $phone_number_india ): 
												$link_url = $phone_number_india['url'];
												$link_title = $phone_number_india['title'];
												$link_target = $phone_number_india['target'] ? $phone_number_india['target'] : '_self';
												?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                    <?php 
											$phone_number_us = get_field('phone_number_us', 'options');
											if( $phone_number_us ): 
												$link_url = $phone_number_us['url'];
												$link_title = $phone_number_us['title'];
												$link_target = $phone_number_us['target'] ? $phone_number_us['target'] : '_self';
												?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="ss-sub-row-2-email-addresse">
                                    <?php 
											$email_addresse = get_field('email_addresse', 'options');
											if( $email_addresse ): 
												$link_url = $email_addresse['url'];
												$link_title = $email_addresse['title'];
												$link_target = $email_addresse['target'] ? $email_addresse['target'] : '_self';
												?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="rows-cols">

                                <div class="lg-col-1">
                                    <div class="first-col-row-1">
                                        <?php
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'menu-1',
                                                    'menu_id'        => 'primary-menu',
                                                )
                                            );
								        ?>
                                        <div class="scl-icons">
                                            <div class="text-mobile-scl">
                                                <h2><?php the_field('text-mobile-scl', 'options'); ?></h2>
                                            </div>
                                            <div class="social-icons">
                                                <a href="<?php the_field('facebook-menu_link', 'options'); ?>"><img src="<?php the_field('facebook-menu_icon', 'options'); ?>" alt=""></a>
                                                <a href="<?php the_field('twitter-menu_link', 'options'); ?>"><img src="<?php the_field('twitter-menu_icon', 'options'); ?>" alt=""></a>
                                                <a href="<?php the_field('linklnd-menu_link', 'options'); ?>"><img src="<?php the_field('linklnd-menu_icon', 'options'); ?>" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="second-col-row-2">
                                        <div class="sm-col-left">

                                            <?php if( get_field('menu_icons', 'options') ): ?>
                                            <img src="<?php the_field('menu_icons', 'options'); ?>" />
                                            <?php endif; ?>
                                            <p><?php the_field('reserve_text_menu', 'options'); ?></p>
                                        </div>
                                        <div class="sm-col-righ">
                                            <img src="<?php the_field('location_icon_menu', 'options'); ?>" alt="">
                                            <?php 
														$location_text_menu = get_field('location_text_menu', 'options');
														if( $location_text_menu ): 
															$link_url = $location_text_menu['url'];
															$link_title = $location_text_menu['title'];
															$link_target = $location_text_menu['target'] ? $location_text_menu['target'] : '_self';
															?>
                                            <a href="<?php echo esc_url( $link_url ); ?>" target="blank"><?php echo esc_html( $link_title ); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg-col-2">
                                    <div class="sm-row-1">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if( get_field('technology_logo', 'options') ): ?>
                                            <img src="<?php the_field('technology_logo', 'options'); ?>" />
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="sm-row-2">
                                        <h3><?php the_field('technology_text_menu', 'options'); ?></h3>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="footer-container menu-mobile">
                            <div class="row-1">
                                <div class="col-1"><?php dynamic_sidebar( 'footer-col-1' ); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
