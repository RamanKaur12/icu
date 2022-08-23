<?php /* Template Name: Tools page */ 
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
<div class="about-page-content content-with">
    <div class="side-bar">
       <div class="sidbar-content">
        <div class="social-icons">
                <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
        </div>
            <h3><?php the_field('sidebar_tool_page_text'); ?></h3>
            <ul class="navigation">
                <li class="links" ><a href="#Icueview" class="first-section-tool"><?php the_field('tool_page_section_reference_1'); ?></a></li>
                <li class="links" ><a href="#IcueBook" class="semi-first-section-tool"><?php the_field('tool_page_section_reference_2'); ?></a></li>
                <li class="links" ><a href="#icuelink" class="second-section-tool"><?php the_field('tool_page_section_reference_3'); ?></a></li>
                <li class="links" ><a href="#cuechart" class="third-section-tool"><?php the_field('tool_page_section_reference_4'); ?></a></li>
                <li class="links" ><a href="#icuemap" class="fourth-section-tool"><?php the_field('tool_page_section_reference_5'); ?></a></li>
                <li class="links" ><a shref="#careers" class="fifth-section-tool"><?php the_field('tool_page_section_reference_6'); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="main-content" data-aos="fade-up" data-aos-duration="1000">
        <section class="about-page-banner" id="about-page-banner">
           <h2><?php the_field('technology-text_tool'); ?></h2>
        </section>

        <section id="Icueview" class="Icueview page-section side-bars">
           <div class="Icontent">
            <div class="section-heading">
                <h2><?php the_field('icueview_heading'); ?></h2>
            </div>
            <div class="paragraph_text-content-repeater">
                <?php
                if( have_rows('icueview_text_repeater') ):
                    ?><div class="icueview-paragraph owl-carousel owl-theme"><?php
                        while( have_rows('icueview_text_repeater') ) : the_row();
                        ?><div class="owl-each-paragraph"><?php
                            $sub_value = get_sub_field('paragraph_repeater');
                            echo $sub_value
                        ?> </div> <?php
                        endwhile;
                    ?> </div> <?php
                else :
                endif;?>
                <div id="counter" class="counter"></div>
            </div>
            <div class="image-pdf-col">
                <div class="pdf-section">
                    <?php
                    if( get_field('icueview_pdf') ):?>
                        <a href="<?php the_field('icueview_pdf'); ?>" download>
                            <img src="<?php the_field('icueview_pdf_image'); ?>" />
                            <div class="description">
                                <div class="text-desc">
                                    <p><?php the_field('icueview_small_text_description'); ?></p>
                                    <h5><?php the_field('icueview_medium_text_description'); ?></h5>
                                </div>
                                <div class="icon-desc">
                                    <img src="<?php the_field('icueview_pdf_icon'); ?>" />
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="image-section">
                    <?php 
                    $icueview_image_right = get_field('icueview_image_right');
                    if( !empty( $icueview_image_right ) ): ?>
                        <img src="<?php echo esc_url($icueview_image_right['url']); ?>" alt="<?php echo esc_attr($icueview_image_right['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="accordion-content-repeater">
                <div id="accordion" class="accordion accordion-content">
                    <?php
                    if( have_rows('icueview_accordion') ):
                        ?><div class="accordions-content"><?php
                            while( have_rows('icueview_accordion') ) : the_row();
                            ?>
                            <div class="each-accordion"><?php
                                $accordion_number_index_acrd = get_sub_field('accordion_number_index_acrd');
                                $accordion_header = get_sub_field('accordion_header');
                                $accordion_content = get_sub_field('accordion_content');
                                ?>
                                <div class="link">
                                    <p><?php echo $accordion_number_index_acrd ?></p>
                                    <h3><?php echo $accordion_header ?></h3>
                                </div>
                                <div class="submenu">
                                    <div class="content-submenu">
                                        <?php echo  $accordion_content ?>
                                    </div>
                                </div>
                            </div> <?php
                            endwhile;
                        ?> </div> <?php
                    else :
                    endif;?>
                </div>
            </div>
            <div class="explore_link">
                <?php 
                $icueview_link_explore = get_field('icueview_link_explore');
                if( $icueview_link_explore ): 
                    $icueview_link_explore_url = $icueview_link_explore['url'];
                    $icueview_link_explore_title = $icueview_link_explore['title'];
                    $icueview_link_explore_target = $icueview_link_explore['target'] ? $icueview_link_explore['target'] : '_self';
                    ?>
                    <a class="button" href="<?php echo esc_url( $icueview_link_explore_url ); ?>" target="<?php echo esc_attr( $icueview_link_explore_target ); ?>"><?php echo esc_html( $icueview_link_explore_title ); ?></a>
                <?php endif; ?>
            </div>
           </div>
        </section>

        <section id="IcueBook" class="IcueBook page-section side-bars">
            <div class="Icontent">
                <div class="section-heading">
                    <h2><?php the_field('icuebook_heading'); ?></h2>
                </div>
                <div class="paragraph_text-content-repeater">
                    <?php
                    if( have_rows('icuebook_text_repeater') ):
                        ?><div class="icueBook-paragraph owl-carousel owl-theme"><?php
                            while( have_rows('icuebook_text_repeater') ) : the_row();
                            ?><div class="owl-each-paragraph"><?php
                                $sub_value = get_sub_field('paragraph_repeater');
                                echo $sub_value
                            ?> </div> <?php
                            endwhile;
                        ?> </div> <?php
                    else :
                    endif;?>
                    <div id="counter_2" class="counter"></div>
                </div>
                <div class="image-pdf-col">
                    <div class="image-section">
                        <?php 
                        $icuebook_image_right = get_field('icuebook_image_right');
                        if( !empty( $icuebook_image_right ) ): ?>
                            <img src="<?php echo esc_url($icuebook_image_right['url']); ?>" alt="<?php echo esc_attr($icuebook_image_right['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="pdf-section">
                        <?php
                        if( get_field('icuebook_pdf') ):?>
                            <a href="<?php the_field('icuebook_pdf'); ?>" download>
                                <img src="<?php the_field('icuebook_pdf_image'); ?>" />
                                <div class="description">
                                    <div class="text-desc">
                                        <p><?php the_field('icuebook_small_text_description'); ?></p>
                                        <h5><?php the_field('icuebook_medium_text_description'); ?></h5>
                                    </div>
                                    <div class="icon-desc">
                                        <img src="<?php the_field('icueview_pdf_icon'); ?>" />
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="explore_link">
                    <?php 
                    $icuebook_link_explore = get_field('icuebook_link_explore');
                    if( $icuebook_link_explore ): 
                        $icuebook_link_explore_url = $icuebook_link_explore['url'];
                        $icuebook_link_explore_title = $icuebook_link_explore['title'];
                        $icuebook_link_explore_target = $icuebook_link_explore['target'] ? $icuebook_link_explore['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url( $icuebook_link_explore_url ); ?>" target="<?php echo esc_attr( $icuebook_link_explore_target ); ?>"><?php echo esc_html( $icuebook_link_explore_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section id="icuelink" class="icuelink page-section side-bars">
            <div class="Icontent">
                <div class="section-heading">
                    <h2><?php the_field('icuelink_heading'); ?></h2>
                </div>
                <div class="paragraph_text-content-repeater">
                    <?php
                    if( have_rows('icuelink_text_repeater') ):
                        ?><div class="icuelink-paragraph owl-carousel owl-theme"><?php
                            while( have_rows('icuelink_text_repeater') ) : the_row();
                            ?><div class="owl-each-paragraph"><?php
                                $sub_value = get_sub_field('paragraph_repeater');
                                echo $sub_value
                            ?> </div> <?php
                            endwhile;
                        ?> </div> <?php
                    else :
                    endif;?>
                    <div id="counter_3" class="counter"></div>
                </div>
                <div class="image-pdf-col">
                    <div class="pdf-section">
                        <?php
                        if( get_field('icuelink_pdf') ):?>
                            <a href="<?php the_field('icuelink_pdf'); ?>" download>
                                <img src="<?php the_field('icuelink_pdf_image'); ?>" />
                                <div class="description">
                                    <div class="text-desc">
                                        <p><?php the_field('icuelink_small_text_description_'); ?></p>
                                        <h5><?php the_field('icuelink_medium_text_description'); ?></h5>
                                    </div>
                                    <div class="icon-desc">
                                        <img src="<?php the_field('icueview_pdf_icon'); ?>" />
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="image-section">
                        <?php 
                        $icuelink_image_right = get_field('icuelink_image_right');
                        if( !empty( $icuelink_image_right ) ): ?>
                            <img src="<?php echo esc_url($icuelink_image_right['url']); ?>" alt="<?php echo esc_attr($icuelink_image_right['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="explore_link">
                    <?php 
                    $icuelink_link_explore = get_field('icuelink_link_explore');
                    if( $icuelink_link_explore ): 
                        $icuelink_link_explore_url = $icuelink_link_explore['url'];
                        $icuelink_link_explore_title = $icuelink_link_explore['title'];
                        $icuelink_link_explore_target = $icuelink_link_explore['target'] ? $icuelink_link_explore['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url( $icuelink_link_explore_url ); ?>" target="<?php echo esc_attr( $icuelink_link_explore_target ); ?>"><?php echo esc_html( $icuelink_link_explore_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section id="cuechart" class="cuechart page-section side-bars">
            <div class="Icontent">
                <div class="section-heading">
                    <h2><?php the_field('cuechart_heading'); ?></h2>
                </div>
                <div class="paragraph_text-content-repeater">
                    <?php
                    if( have_rows('cuechart_text_repeater') ):
                        ?><div class="cuechart-paragraph owl-carousel owl-theme"><?php
                            while( have_rows('cuechart_text_repeater') ) : the_row();
                            ?><div class="owl-each-paragraph"><?php
                                $sub_value = get_sub_field('paragraph_repeater');
                                echo $sub_value
                            ?> </div> <?php
                            endwhile;
                        ?> </div> <?php
                    else :
                    endif;?>
                    <div id="counter_4" class="counter"></div>
                </div>
                <div class="image-pdf-col">
                    
                    <div class="pdf-section">
                        <?php
                        if( get_field('cuechart_pdf') ):?>
                            <a href="<?php the_field('cuechart_pdf'); ?>" download>
                                <img src="<?php the_field('cuechart_pdf_image'); ?>" />
                                <div class="description">
                                    <div class="text-desc">
                                        <p><?php the_field('cuechart_small_text_description'); ?></p>
                                        <h5><?php the_field('cuechart_medium_text_description'); ?></h5>
                                    </div>
                                    <div class="icon-desc">
                                        <img src="<?php the_field('icueview_pdf_icon'); ?>" />
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="image-section">
                        <?php 
                        $cuechart_image_right = get_field('cuechart_image_right');
                        if( !empty( $cuechart_image_right ) ): ?>
                            <img src="<?php echo esc_url($cuechart_image_right['url']); ?>" alt="<?php echo esc_attr($cuechart_image_right['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div class="accordion-content-repeater">
                    <h2 class="how_to_cuechart"><?php the_field('cuechart_how_to_cuechart'); ?></h2>
                    <div id="accordions" class="accordion accordion-content">
                        <?php
                        if( have_rows('cuechart_accordion') ):
                            ?><div class="accordions-content"><?php
                                while( have_rows('cuechart_accordion') ) : the_row();
                                ?>
                                <div class="each-accordion"><?php
                                    $accordion_number_index_acrd = get_sub_field('accordion_number_index_acrd');
                                    $accordion_header = get_sub_field('accordion_header');
                                    $accordion_content = get_sub_field('accordion_content');
                                    ?>
                                    <div class="link">
                                        <p><?php echo $accordion_number_index_acrd ?></p>
                                        <h3><?php echo $accordion_header ?></h3>
                                    </div>
                                    <div class="submenu">
                                        <div class="content-submenu">
                                            <?php echo  $accordion_content ?>
                                        </div>
                                    </div>
                                </div> <?php
                                endwhile;
                            ?> </div> <?php
                        else :
                        endif;?>
                    </div>
                </div>
                <div class="whatarethrmain">
                    <div class="text-left">
                        <h3><?php the_field('cuechart_whatarethrmain_text_left'); ?></h3>
                    </div>
                    <div class="text-right">
                        <?php the_field('cuechart_whatarethrmain_text_right'); ?>
                    </div>
                </div>
                <div class="explore_link">
                    <?php 
                    $cuechart_link_explore = get_field('cuechart_link_explore');
                    if( $cuechart_link_explore ): 
                        $cuechart_link_explore_url = $cuechart_link_explore['url'];
                        $cuechart_link_explore_title = $cuechart_link_explore['title'];
                        $cuechart_link_explore_target = $cuechart_link_explore['target'] ? $cuechart_link_explore['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url( $cuechart_link_explore_url ); ?>" target="<?php echo esc_attr( $cuechart_link_explore_target ); ?>"><?php echo esc_html( $cuechart_link_explore_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        
        <section id="icuemap" class="icuemap page-section side-bars">
        <div class="Icontent">
                <div class="section-heading">
                    <h2><?php the_field('icuemap_heading'); ?></h2>
                </div>
                <div class="paragraph_text-content-repeater">
                    <?php
                    if( have_rows('icuemap_text_repeater') ):
                        ?><div class="icuemap-paragraph owl-carousel owl-theme"><?php
                            while( have_rows('icuemap_text_repeater') ) : the_row();
                            ?><div class="owl-each-paragraph"><?php
                                $sub_value = get_sub_field('paragraph_repeater');
                                echo $sub_value;
                                $icuemap_how_use = get_field('icuemap_how_use');
                                if( $icuemap_how_use ): 
                                    $icuemap_how_use_url = $icuemap_how_use['url'];
                                    $icuemap_how_use_title = $icuemap_how_use['title'];
                                    $icuemap_how_use_target = $icuemap_how_use['target'] ? $icuemap_how_use['target'] : '_self';
                                    ?>
                                    <a class="button how_to_cuechart" href="<?php echo esc_url( $icuemap_how_use_url ); ?>" target="<?php echo esc_attr( $icuemap_how_use_target ); ?>"><?php echo esc_html( $icuemap_how_use_title ); ?></a>
                                <?php endif; ?>
                             </div> <?php
                            endwhile;
                        ?> </div> <?php
                    else :
                    endif;?>
                    <div id="counter_5" class="counter"></div>
                </div>
                <div class="image-pdf-col">
                    
                    <div class="pdf-section">
                        <?php
                        if( get_field('icuemap_pdf') ):?>
                            <a href="<?php the_field('icuemap_pdf'); ?>" download>
                                <img src="<?php the_field('icuemap_pdf_image'); ?>" />
                                <div class="description">
                                    <div class="text-desc">
                                        <p><?php the_field('icuemap_small_text_description'); ?></p>
                                        <h5><?php the_field('icuemap_medium_text_description'); ?></h5>
                                    </div>
                                    <div class="icon-desc">
                                        <img src="<?php the_field('icueview_pdf_icon'); ?>" />
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="image-section">
                        <?php 
                        $icuemap_image_right = get_field('icuemap_image_right');
                        if( !empty( $icuemap_image_right ) ): ?>
                            <img src="<?php echo esc_url($icuemap_image_right['url']); ?>" alt="<?php echo esc_attr($icuemap_image_right['alt']); ?>" />
                        <?php endif; ?>
                        <h4><?php the_field('icuemap_text_right'); ?></h4>
                    </div>
                </div>
                <div class="whatarethrmain">
                    <div class="text-left">
                        <h3><?php the_field('icuemap_whatarethrmain_text_left'); ?></h3>
                    </div>
                    <div class="text-right">
                        <?php the_field('icuemap_whatarethrmain_text_right'); ?>
                    </div>
                </div>
                <div class="explore_link">
                    <?php 
                    $icuemap_link_explore = get_field('icuemap_link_explore');
                    if( $icuemap_link_explore ): 
                        $icuemap_link_explore_url = $icuemap_link_explore['url'];
                        $icuemap_link_explore_title = $icuemap_link_explore['title'];
                        $icuemap_link_explore_target = $icuemap_link_explore['target'] ? $icuemap_link_explore['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url( $icuemap_link_explore_url ); ?>" target="<?php echo esc_attr( $icuemap_link_explore_target ); ?>"><?php echo esc_html( $icuemap_link_explore_title ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- <section id="icuerious-dashboard" class="cuechart page-section side-bars">
           <h2>
            <?php // the_field('technology-text_tool'); ?>
        </h2>
        </section> -->

    </div>
</div>
<?php get_footer();?>
