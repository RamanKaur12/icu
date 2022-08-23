<?php /* Template Name: about us page */ 
?>
<?php get_header(); ?>

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
                            <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>" ><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>" ><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                            <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>" ><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
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
<div class="about-page-content content-with">
    <div class="side-bar">
       <div class="sidbar-content">
        <div class="social-icons">
                <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
        </div>
            <h3><?php the_field('sidebar_about_us_text'); ?></h3>
            <ul class="navigation">
                <li class="links" ><a href="#overview" class="first-section"><?php the_field('about_us_section_reference_1'); ?></a></li>
                <li class="links" ><a href="#core-value" class="semi-first-section"><?php the_field('about_us_section_reference_1semi'); ?></a></li>
                <li class="links" ><a href="#leadership-team" class="second-section"><?php the_field('about_us_section_reference_2'); ?></a></li>
                <li class="links" ><a href="#Advisors" class="third-section"><?php the_field('about_us_section_reference_3'); ?></a></li>
                <li class="links" ><a href="#key-milestone" class="fourth-section"><?php the_field('about_us_section_reference_4'); ?></a></li>
                <li class="links" ><a shref="#careers" class="fifth-section"><?php the_field('about_us_section_reference_5'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="main-content" data-aos="fade-up" data-aos-duration="2000">
        <section class="about-page-banner" id="about-page-banner">
           <h2><?php the_field('technology-text_about'); ?></h2>
        </section>

        <section id="overview" class="overview page-section firstsection" data-aos="fade-up">
            <div class="overview-about">
                <h2><?php the_field('about_title_main_content'); ?></h2>
                <?php the_field('about _title_paragraph_text'); ?>
            </div>
            <div class="overview-vision" data-aos="fade-up" data-aos-duration="2000">
                <div class="contentvission-misssiion">
                    <div class="vision">
                        <h2><?php the_field('title_heading_mission'); ?></h2>
                        <?php the_field('title_paragraph_mission'); ?>
                    </div>
                    <div class="mission">
                        <h2><?php the_field('title_heading_vision'); ?></h2>
                        <?php the_field('title_paragraph_vision'); ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="core-value" class="core-value page-section side-bars" data-aos="fade-up">
            <div class="wraapper">
                <nav id="nav">
                    <ul>
                        <li><a href="#one" class="core value1"><?php the_field('core_value_text'); ?></a></li>
                        <li><a href="#two" class="core value2"><?php the_field('our_pillar_text'); ?></a></li>
                        <li><a href="#three" class="core value3"><?php the_field('lever_to_evoke'); ?></a></li>
                    </ul>
                </nav>
                <div class="sections">
                    <section id="one" class="images_scrool">
                    <img src="<?php the_field('core_value_image'); ?>" alt="">
                    </section>
                    <section id="two" class="images_scrool" >
                    <img src="<?php the_field('our_pillar_image'); ?>" alt="">
                    </section>
                    <section id="three"  class="images_scrool">
                    <img src="<?php the_field('lever_to_evoke_image'); ?>" alt="">
                    </section>
                </div>
            </div>
        </section>
        <section class="leadership-team page-section secondsection" id="leadership-team" >
            <div class="overview-note" data-aos="fade-up">
            <h2><?php the_field('note_little_text'); ?></h2>
                <?php the_field('note_paragraph_text'); ?>
            </div>
            <?php if( have_rows('repaeter_leader_team') ):?>
                    <?php while( have_rows('repaeter_leader_team') ) : the_row(); ?>
                    <div class="each-leader " data-aos="fade-up" data-aos-duration="2000">
                        <?php $image_leader = get_sub_field('image-leader'); ?>
                        <?php $heading_leader = get_sub_field('heading_leader'); ?>
                        <?php $sub_heading_leader = get_sub_field('sub_heading_leader'); ?>
                        <?php $paragraph_leader_text = get_sub_field('paragraph_leader_text'); ?>

                        <div class="profile">
                            <div class="image">
                                <img src="<?php echo $image_leader; ?>" alt="">
                            </div>
                            <div class="texts">
                                <h2><?php echo $heading_leader; ?></h2>
                                <h3><?php echo $sub_heading_leader; ?></h3>
                            </div>
                        </div>
                        <div class="paragraph-text">
                        <?php echo $paragraph_leader_text; ?>
                        </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                
                <?php endif; ?>
        </section>

        <section class="Advisors page-section thirdsection" id="Advisors" data-aos="fade-up" data-aos-duration="2000">
            <?php if( have_rows('advisors_repeater_field') ):?>
                    <?php while( have_rows('advisors_repeater_field') ) : the_row(); ?>
                <div class="each-advisor" data-aos="fade-up" data-aos-duration="2000">
                        <?php $advisors_image = get_sub_field('advisors_image'); ?>
                        <?php $advisors_head_name_title = get_sub_field('advisors_head_name_title'); ?>
                        <?php $advisors_1_paragraph = get_sub_field('advisors_1_paragraph'); ?>
                        <?php $advisors_2_paragraph = get_sub_field('advisors_2_paragraph'); ?>

                        <div class="profile">
                            <div class="image" >
                                <img src="<?php echo $advisors_image; ?>" alt="">
                            </div>
                            <div class="texts">
                                <h2><?php echo $advisors_head_name_title; ?></h2>
                                <h3><?php echo $advisors_1_paragraph; ?></h3>
                            </div>
                        </div>
                        <div class="paragraph-text">
                        <?php echo $advisors_2_paragraph; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php else : ?>
                
                <?php endif; ?>
        </section>

        <section class="key-milestone page-section fourthsection" id="key-milestone" data-aos="fade-up" data-aos-duration="2000">

            <?php if( have_rows('listing_content') ): ?>
                <div class="listing_content owl-carousel owl-theme">
                <?php while( have_rows('listing_content') ): the_row(); ?>
                    <div class="year-millestone">
                        <div class="circle">
                            <?php the_sub_field('listings'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
            
        </section>

        <section class="careers page-section fifthsection" id="careers" >
            <div class="career-content" >
                <div class="profile career">
                    <div class="image" >
                        <img src="<?php the_field('career_image'); ?>" alt="">
                    </div>
                    <div class="texts" >
                        <h2><?php  the_field('carreer_heading_text'); ?></h2>
                        <h3><?php  the_field('profile_paragraph_text'); ?></h3>
                    </div>
                </div>
                <div class="paragraph-text">
                    <?php the_field('career_content_text'); ?>
                </div>
                <div class="icons-link">
                    <div class="image">
                        <img src="<?php the_field('big_arrow'); ?>" alt="">
                    </div>
                    <div class="link">
                    <?php 
                        $link = get_field('current_oppening_text');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        <p><?php the_field('click_to_explore_text'); ?></p>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php get_footer();?>
