<?php /* Template Name: Service us page */ 
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

<div class="heade-part content-with">
 
</div>

<div class="service-pages display-all-the-service content-with">


    <div class="floating-service" id="float">
        <img src="https://zeroguess.us/n03/icuerious/wp-content/uploads/2022/07/icons8-double-left-24-1.png" alt="">
    </div>
    <div class="sidebar" id="mobile-sidebar">
        <div class="sidbar-content">
            <div class="soc-loc">
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
            </div>
            <h2 class="side-title">service</h2>
            <div class="categories">
                <div id="accordions" class="accordion">
                    <?php wp_nav_menu(
                        array (
                            'menu'            => 'service menus',
                            'container'            => 'div',
                            'container_class'      => 'service_menu_class',
                            'container_id'         => 'service_memu_id',
                            'container_aria_label' => 'menu_service',
                            'menu_class'           => 'menu',
                            'menu_id'              => '',
                            'echo'                 => true,
                            'fallback_cb'          => 'wp_page_menu',
                            'before'               => '',
                            'after'                => '',
                            'link_before'          => '',
                            'link_after'           => '',
                            'items_wrap'           => '<ul id="%1$s" class="service_menus">%3$s</ul>',
                            'item_spacing'         => 'preserve',
                            'depth'                => 0,
                            'walker'               => '',
                            'theme_location'       => '',
                        )
                    );?>
                </div>
            </div>
        </div>
    </div>
    <div class="the-category">
        
        <div class="main-page-text">
            <h2><?php the_field('technology_text_service'); ?></h2>
        </div>
        <div class="main-category">
            <!-- // Check rows exists. -->
            <?php $outs = array(); if( have_rows('all_services') ):  $i = 0;    ?>

                <!-- // Loop through rows. -->
                <div id="accordion" class="accordion service-content-accordion">
                    <?php while( have_rows('all_services') ) : the_row(); ob_start(); $i++;
                    // Load sub field value.
                    $main_content_text = get_sub_field('main_content_text');
                    $service_name = get_sub_field('service_name');?>

                    <article id="<?php echo $service_name; ?>" class="each-service-post">
                        <div class="link single-post-page">
                        <!-- the title of single blog page -->
                            <div class="post-titles">
                                <h3><?php echo $service_name?> </h3>
                            </div>
                        </div>
                        <ul class="submenu" id="service_submenu"> 
                            <div class="content-submenu single-post-pdf">
                                <div class="the-content">
                                <?php echo $main_content_text; ?>
                                </div>

                                <div class="key-differentiators">

                                    <?php
                                    $value = get_sub_field( "key__differentiators_heading_title" );

                                    if( $value ) {?>

                                        <h4><?php echo $value; ?></h4> <?php
                                    } else {
                                        
                                    }

                                        if( have_rows('key__differentiators') ):
                                            while( have_rows('key__differentiators') ) : the_row();
                                                $list_text = get_sub_field('key_differentiators_content_list_type');?>
                                                <ul>
                                                    <li><?php echo $list_text ?></li>
                                                </ul>
                                            <?php    
                                            endwhile;
                                        else :
                                        endif;
                                    ?>
                                </div>

                                <div class="the-sample-section expertise-faq">
                                    <?php
                                        $sampleText = get_sub_field( "sample_heading_title" );

                                        if( $sampleText ) {?>
                                            <h4 class="no-space"><?php echo $sampleText; ?></h4><?php
                                        } else {
                                            
                                        }
                                    ?>
                                    <div id="Samples">
                                        <?php
                                        if( have_rows('sample_pdf_box') ):
                                            $count = 0;
                                            while( have_rows('sample_pdf_box') ) : the_row();
                                                $text_under_icon = get_sub_field('text_under_icon');
                                                $sub_text_under_icon = get_sub_field('sub_text_under_icon');
                                                $pdf_link = get_sub_field('pdf_link');
                                                $box_icon = get_sub_field('box_icon');?>
                                                
                                                <div class="box box-1 <?php if (!$count) { ?>active<?php } ?>" >
                                                <?php if( $pdf_link ): ?>
                                                    <a href="<?php echo $pdf_link ?>" download><img src="<?php echo $box_icon ?>" alt=""></a>
                                                <?php endif; ?>
                                                    <div class="txt">
                                                        <p><?php echo $text_under_icon ?></p>
                                                        <p><?php echo $sub_text_under_icon ?></p>
                                                    </div>
                                                </div>
                                            <?php    
                                            $count++;
                                            endwhile;
                                        else :
                                        endif; 
                                        ?>
                                    </div>
                                </div>

                                <div class="faq-section">
                                    <?php
                                        $faqText = get_sub_field( "faq_heading_title" );

                                        if( $faqText ) {?>
                                            <h4 class="FAQ"><?php echo $faqText; ?></h4><?php
                                        } else {
                                            
                                        }
                                    ?>

                                    <div id="" class="Accordions"><?php
                                        if( have_rows('faq_content') ):
                                                while( have_rows('faq_content') ) : the_row();
                                                    $faq_numerotation = get_sub_field('faq_numerotation');
                                                    $faq_title = get_sub_field('faq_title');
                                                    $faq_content = get_sub_field('faq_content');
                                                    ?>
                                                        <div class="Accordion_item">
                                                                <div class="title_tab"> 
                                                                    <p class="title"><span class="num"><?php echo $faq_numerotation ?></span> <?php echo $faq_title ?></p>
                                                                </div>
                                                                <div class="inner_content">
                                                                    <p class="">
                                                                        <?php echo $faq_content ?>
                                                                    </p>
                                                                </div> 
                                                        </div>
                                                <?php    
                                                endwhile;
                                            else :
                                            endif;
                                        ?>
                                    </div>
                                </div>


                                
                            </div>
                        </ul>
                        <!-- // End loop. -->
                    </article>
                    <?php $outs[] = ob_get_clean(); endwhile; ?>
                
                    <?php
                    // No value.
                    else :
                        // Do something...
                    endif;
                    $outs = array_reverse($outs);
                        echo implode($outs);
                    ?>
                </div>
            </div>
    </div>
</div>


<?php get_footer();?>
