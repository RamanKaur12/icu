<?php /* Template Name: home page */
get_header('home');
?>

<body>

    <div id="fullpage">
        <div class="section " id="section0">
            <?php echo do_shortcode('[splashscreen]'); ?>
        </div>

      
        
        <div class="section fp-auto-height section-none" id="section1">
            <section class="home-page-banner">
                <div class="home-page-banner-container content-with">
                    <div class="hpb-row-1">
                        <div class="col-1">
                            <h2><?php the_field('technology-text'); ?></h2>
                        </div>
                        <div class="col-2">
                            <div class="mobile-social-banner">
                                <h2><?php the_field('right-text'); ?></h2>
                                <div class="search-form"><?php dynamic_sidebar('header-search'); ?></div>
                            </div>
                            <div class="social-link">
                                <div class="social-icons-banner">
                                    <?php
                                    $facebook_link = get_field('facebook-link');
                                    if ($facebook_link) : ?>
                                        <a href="<?php echo esc_url($facebook_link); ?>" target="blank"><img src="<?php the_field('facebook'); ?>" alt=""></a>
                                        <?php 
                                    endif; ?>
                                    <?php
                                    $twitter_link = get_field('twitter-link');
                                    if ($twitter_link) : ?>
                                        <a href="<?php echo esc_url($twitter_link); ?>" target="blank"><img src="<?php the_field('twitter'); ?>" alt=""></a>
                                    <?php 
                                    endif; ?>
                                    <?php
                                    $linklnd_link = get_field('linklnd-link');
                                    if ($linklnd_link) : ?>
                                        <a href="<?php echo esc_url($linklnd_link); ?>" target="blank"><img src="<?php the_field('linklnd'); ?>" alt=""></a>
                                    <?php 
                                    endif; ?>
                                </div>
                                <div class="icon-location">
                                    <?php
                                    $location_link = get_field('location-link');
                                    $link_url = $location_link['url'];
                                    $link_title = $location_link['title'];
                                    $link_target = $location_link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="blank"><img class="loc-icon" src="<?php the_field('location_icon', 'options'); ?>" alt=""><?php echo esc_html($link_title); ?></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="section help section-none" id="section2">
            <section class="create-manage content-with">
                <div class="c-m-container">
                    <div class="c-m-row-1">
                        <div class="c-m-colo-1">
                            <h1><?php the_field('heading-text'); ?></h1>
                            <p><?php the_field('banner-text'); ?></p>
                            <?php
                            $button_cta = get_field('button_cta');
                            $link_url = $button_cta['url'];
                            $link_title = $button_cta['title'];
                            $link_target = $button_cta['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="btn-cta"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="btns"> <span><?php echo esc_html($link_title); ?></span></a></div>
                        </div>

                        <?php if (have_rows('first_slider')) : ?>

                            <div class="c-m-colo-2 banner-slider owl-carousel owl-theme">
                                <?php
                                while (have_rows('first_slider')) : the_row();
                                    $imageslider = get_sub_field('image-slider-banner'); ?>
                                    <img src="<?php echo $imageslider; ?> ">
                                <?php
                                endwhile;
                                ?>
                            </div>
                        <?php else :
                        endif;   ?>

                    </div>
                    <div class="c-m-row-2">
                        <h3><?php the_field('banner text under image'); ?></h3>
                    </div>
                    <hr class="black content-with">
                </div>
            </section>
        </div>

        <div class="section section-none" id="section3">

            <section class="number-reviews descktop">
                <div class="nr-container content-with">
                    <div class="cols nr-row-1">
                        <div class="nr-col-1">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-1'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-1'); ?></p>
                                </div>
                            </div>
                            <div class="sub-row"></div>
                        </div>
                        <div class="cols nr-col-2"></div>
                        <div class="cols nr-col-3">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-2'); ?></p>
                                </div>
                            </div>
                            <div class="sub-row"></div>
                        </div>
                        <div class="cols nr-col-4">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-3'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-3'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-5">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-4'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-4'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nr-row-2">
                        <div class="cols nr-col-1">

                        </div>
                        <div class="cols nr-col-2">
                            <div class="sub-row"></div>
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-1-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-1-row-2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-3">

                        </div>
                        <div class="cols nr-col-4">

                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-2-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-2-row-2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-5">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-3-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-3-row-2'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="number-reviews mobile-view">
                <div class="nr-container content-with">
                    <div class="cols nr-row-1">
                        <div class="nr-col-1">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-1'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-1'); ?></p>
                                </div>
                            </div>
                            <div class="sub-row"></div>
                        </div>
                        <div class="cols nr-col-2"></div>
                        <div class="cols nr-col-3">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-3-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-3-row-2'); ?></p>
                                </div>
                            </div>
                            <div class="sub-row"></div>
                        </div>
                        <div class="cols nr-col-4">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-5">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-4'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-4'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nr-row-2">
                        <div class="cols nr-col-1">

                        </div>
                        <div class="cols nr-col-2">
                            <div class="sub-row"></div>
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-2-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-2-row-2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-3">

                        </div>
                        <div class="cols nr-col-4">

                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-1-row-2'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-1-row-2'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cols nr-col-5">
                            <div class="sub-row">
                                <div class="number">
                                    <p><?php the_field('heading-3'); ?></p>
                                </div>
                                <div class="text">
                                    <p><?php the_field('text-3'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--<hr class="black">-->
        </div>

        <div class="section section-none" id="section4">

            <!-- ======================Our Service Section====================== -->

            <?php echo do_shortcode("[ourservice]"); ?>

            <!-- ======================Our Service Section====================== -->

        </div>

        <div class="section section-none" id="section5">

            <section class="we-serve">
                <div class="we-serve-container content-with">
                    <div class="ws-row-1">
                        <div class="ws-col-1">
                            <div class="main-image">
                                <?php if (get_field('global_image')) : ?>
                                    <img src="<?php the_field('global_image'); ?>" />
                                <?php endif; ?>
                                <div class="lildots">
                                    <?php
                                    if (have_rows('icons-imgs-re')) {
                                        while (have_rows('icons-imgs-re')) {
                                            the_row();
                                            $slide_photo = get_sub_field('icons-imgs');
                                            if (!empty($slide_photo)) {
                                    ?>
                                                <img src="<?php echo $slide_photo['url']; ?>" alt="" />
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="ws-col-2">
                            <h3><?php the_field('global_heading_text'); ?></h3>
                            <p><?php the_field('global_text_paragraph'); ?></p>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <div class="section section-none" id="section6">
            <section class="feedback-our-client">
                <div class="feedback-our-client-container content-with">
                    <div class="f-o-c-row-1">
                        <div class="testimonials">
                            <h3><?php the_field('testimonial_heading_title'); ?></h3>

                            <?php if (have_rows('testimonial_repeater')) : ?>

                                <div class="testimonial owl-carousel owl-theme">
                                    <?php
                                    while (have_rows('testimonial_repeater')) : the_row(); ?>
                                        <div class="testimonials-items">
                                            <h4><?php the_sub_field('testimonial_sub_heading'); ?></h4>
                                            <p><?php the_sub_field('testimonial_paragrap_htext'); ?></p>
                                            <p class="testimonial-name"><?php the_sub_field('testimonial_name_description'); ?></p>
                                        </div>
                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                            <?php else :
                            endif;   ?>
                        </div>
                    </div>

                    <div class="f-o-c-row-2">
                        <h3><?php the_field('our_client_heading_title'); ?></h3>

                        <?php if (have_rows('our_client_reaperter')) : ?>
                            <div class="brand-logo owl-carousel owl-theme">
                                <?php
                                while (have_rows('our_client_reaperter')) : the_row(); ?>
                                    <div class="row-1">
                                        <div class="sub-row-1">

                                            <?php $sub_row_1_img_1 = get_sub_field('sub_row_1_img_1'); ?>
                                            <img src="<?php echo $sub_row_1_img_1; ?>" alt="<?php echo $sub_row_1_img_1['alt']; ?>">

                                            <?php $sub_row_1_img_2 = get_sub_field('sub_row_1_img_2'); ?>
                                            <img src="<?php echo $sub_row_1_img_2; ?>" alt="<?php echo $sub_row_1_img_2['alt']; ?>">

                                            <?php $sub_row_1_img_3 = get_sub_field('sub_row_1_img_3'); ?>
                                            <img src="<?php echo $sub_row_1_img_3; ?>" alt="<?php echo $sub_row_1_img_3['alt']; ?>">
                                        </div>

                                        <div class="sub-row-1">

                                            <?php $sub_row_2_img_1 = get_sub_field('sub_row_2_img_1'); ?>
                                            <img src="<?php echo $sub_row_2_img_1; ?>" alt="<?php echo $sub_row_2_img_1['alt']; ?>">

                                            <?php $sub_row_2_img_2 = get_sub_field('sub_row_2_img_2'); ?>
                                            <img src="<?php echo $sub_row_2_img_2; ?>" alt="<?php echo $sub_row_2_img_2['alt']; ?>">

                                            <?php $sub_row_2_img_3 = get_sub_field('sub_row_2_img_3'); ?>
                                            <img src="<?php echo $sub_row_2_img_3; ?>" alt="<?php echo $sub_row_2_img_3['alt']; ?>">

                                        </div>
                                        <div class="sub-row-1">

                                            <?php $sub_row_3_img_1 = get_sub_field('sub_row_3_img_1'); ?>
                                            <img src="<?php echo $sub_row_3_img_1; ?>" alt="<?php echo $sub_row_3_img_1['alt']; ?>">

                                            <?php $sub_row_3_img_2 = get_sub_field('sub_row_3_img_2'); ?>
                                            <img src="<?php echo $sub_row_3_img_2; ?>" alt="<?php echo $sub_row_3_img_2['alt']; ?>">

                                            <?php $sub_row_3_img_3 = get_sub_field('sub_row_3_img_3'); ?>
                                            <img src="<?php echo $sub_row_3_img_3; ?>" alt="<?php echo $sub_row_3_img_3['alt']; ?>">

                                        </div>
                                        <div class="sub-row-1">

                                            <?php $sub_row_4_img_1 = get_sub_field('sub_row_4_img_1'); ?>
                                            <img src="<?php echo $sub_row_4_img_1; ?>" alt="<?php echo $sub_row_4_img_1['alt']; ?>">

                                            <?php $sub_row_4_img_2 = get_sub_field('sub_row_4_img_2'); ?>
                                            <img src="<?php echo $sub_row_4_img_2; ?>" alt="<?php echo $sub_row_4_img_2['alt']; ?>">

                                            <?php $sub_row_4_img_3 = get_sub_field('sub_row_4_img_3'); ?>
                                            <img src="<?php echo $sub_row_4_img_3; ?>" alt="<?php echo $sub_row_4_img_3['alt']; ?>">

                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        <?php else :
                        endif;   ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="section section-none" id="section7">
            <section class="sign-up">
                <div class="sig-up-container content-with">
                    <div class="su-row-1">
                        <div class="s-u-col-1">
                            <h3><?php the_field('header_email_input'); ?> </h3>
                            <div class="s-u-col-2">
                                <?php echo do_shortcode('[mc4wp_form id="71"]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="s-u-row-2">
                        <div class="text"><?php the_field('paragraph_arrow'); ?> </div>
                        <div class="email">
                            <div class="arrow">
                                <?php if (get_field('arrow_image')) : ?>
                                    <img src="<?php the_field('arrow_image'); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="email-address">
                                <?php the_field('email_link'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer id="colophon" class="site-footer home-footer">
                <div class="footer-container">
                    <div class="row-1">
                        <div class="col-1"><?php dynamic_sidebar('footer-col-1'); ?></div>
                        <div class="col-2"><?php dynamic_sidebar('footer-col-2'); ?></div>
                    </div>
                </div>
                <!--<div class="cursor">
                <div class="cursor__ball cursor__ball--big ">
                    <svg height="30" width="30">
                        <circle cx="15" cy="15" r="12" stroke-width="0"></circle>
                    </svg>
                </div>

                <div class="cursor__ball cursor__ball--small">
                    <svg height="10" width="10">
                        <circle cx="5" cy="5" r="4" stroke-width="0"></circle>
                    </svg>
                </div>
            </div>-->
            </footer><!-- #colophon -->
        </div>
    </div>


    <header id="masthead" class="site-header">
        <div class="content-header-global">
            <div class="top-header-bar top-bar-menu ss-sub-row-2">
                <div class="ss-sub-row-2-contact-info">
                    <?php
                    $phone_number_india = get_field('phone_number_india', 'options');
                    if ($phone_number_india) :
                        $link_url = $phone_number_india['url'];
                        $link_title = $phone_number_india['title'];
                        $link_target = $phone_number_india['target'] ? $phone_number_india['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>

                    <?php
                    $phone_number_us = get_field('phone_number_us', 'options');
                    if ($phone_number_us) :
                        $link_url = $phone_number_us['url'];
                        $link_title = $phone_number_us['title'];
                        $link_target = $phone_number_us['target'] ? $phone_number_us['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
                <div class="ss-sub-row-2-email-addresse">
                    <?php
                    $email_addresse = get_field('email_addresse', 'options');
                    if ($email_addresse) :
                        $link_url = $email_addresse['url'];
                        $link_title = $email_addresse['title'];
                        $link_target = $email_addresse['target'] ? $email_addresse['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="content-header ">
                <div class="logo-search">
                    <div class="site-branding">
                        <?php
                        the_custom_logo();
                        if (is_front_page() && is_home()) :
                        ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                        else :
                        ?>
                            <!-- <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p> -->
                        <?php
                        endif;
                        $icuerious_description = get_bloginfo('description', 'display');
                        if ($icuerious_description || is_customize_preview()) :
                        ?>
                            <p class="site-description"><?php echo $icuerious_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                        ?></p>
                        <?php endif; ?>
                    </div><!-- .site-branding -->
                    <div class="logo-full-menus-mobile">
                        <a href="<?php echo esc_url(home_url('/')); ?> ">
                            <img src="<?php the_field('logo_full_menu', 'options'); ?>" alt="">
                        </a>
                    </div>
                    <div class="search-form"><?php dynamic_sidebar('header-search'); ?></div>
                </div>
                <div class="container-nav">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggles" aria-controls="primary-menu" aria-expanded="false">
                            <span class="first-line"></span>
                            <span class="first-line-2"></span>
                            <span class="first-line-3"></span>
                        </button>
                        <div class="text text-mobile">
                            <p><?php the_field('responsiveness_mobile_text_for_menu', 'options'); ?></p>
                        </div>

                    </nav><!-- #site-navigation -->
                    <div class="downloadable-content">

                        <div class="social-contact">
                            <?php if (get_field('brochure_files', 'options')) : ?>
                                <a href="<?php the_field('brochure_files', 'options'); ?>" download>
                                    <div class="icons">

                                        <?php if (get_field('brochure_image-1', 'options')) : ?>
                                            <img src="<?php the_field('brochure_image-1', 'options'); ?>" />
                                        <?php endif; ?>

                                        <?php if (get_field('brochure_image-2', 'options')) : ?>
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
                <div class="background"></div>
                <div class="full-menu">
                    <div class="full-menu-container">
                        <div class="top-bar-menu ss-sub-row-2">
                            <div class="ss-sub-row-2-contact-info">
                                <?php
                                $phone_number_india = get_field('phone_number_india', 'options');
                                if ($phone_number_india) :
                                    $link_url = $phone_number_india['url'];
                                    $link_title = $phone_number_india['title'];
                                    $link_target = $phone_number_india['target'] ? $phone_number_india['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                                <?php
                                $phone_number_us = get_field('phone_number_us', 'options');
                                if ($phone_number_us) :
                                    $link_url = $phone_number_us['url'];
                                    $link_title = $phone_number_us['title'];
                                    $link_target = $phone_number_us['target'] ? $phone_number_us['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="ss-sub-row-2-email-addresse">
                                <?php
                                $email_addresse = get_field('email_addresse', 'options');
                                if ($email_addresse) :
                                    $link_url = $email_addresse['url'];
                                    $link_title = $email_addresse['title'];
                                    $link_target = $email_addresse['target'] ? $email_addresse['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
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

                                        <?php if (get_field('menu_icons', 'options')) : ?>
                                            <img src="<?php the_field('menu_icons', 'options'); ?>" />
                                        <?php endif; ?>
                                        <p><?php the_field('reserve_text_menu', 'options'); ?></p>
                                    </div>
                                    <div class="sm-col-righ">
                                        <img src="<?php the_field('location_icon_menu', 'options'); ?>" alt="">
                                        <?php
                                        $location_text_menu = get_field('location_text_menu', 'options');
                                        if ($location_text_menu) :
                                            $link_url = $location_text_menu['url'];
                                            $link_title = $location_text_menu['title'];
                                            $link_target = $location_text_menu['target'] ? $location_text_menu['target'] : '_self';
                                        ?>
                                            <a href="<?php echo esc_url($link_url); ?>" target="blank"><?php echo esc_html($link_title); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="lg-col-2">
                                <div class="sm-row-1">
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php if (get_field('technology_logo', 'options')) : ?>
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
                            <div class="col-1"><?php dynamic_sidebar('footer-col-1'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php get_footer('home'); ?>