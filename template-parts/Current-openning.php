<?php /* Template Name: Current openning */ 
?>
<?php get_header(); ?>


<section>
    <div class="main-content content-with">
        <div class="head-part">
            <div class="text-left opnig-text"><h2><?php the_field('header_text'); ?></h2></div>
            <div class="social-icons">
                    <a target="blank" href="<?php the_field('facebook_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('facebook_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('twitter_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('twitter_icon_general', 'options'); ?>" alt=""></a>
                    <a target="blank" href="<?php the_field('linklnd_link_general', 'options'); ?>" target="blank"><img src="<?php the_field('linkldn_icon_general', 'options'); ?>" alt=""></a>
            </div>
        </div>
        <div class="accordion-part">
            <section class="cur-ope">
                <div class="mobile-expertise-faq accordion" id="faq">
                    <?php if( have_rows('accordion_content') ): ?>
                        <?php while( have_rows('accordion_content') ) : the_row(); ?>
                            <section class="opennings">
                                <?php $number_index_acrd = get_sub_field('number_index_acrd'); ?>
                                <?php $position_text_acrd = get_sub_field('position_text_acrd'); ?>
                                <?php $years_experience_acrd = get_sub_field('years_experience_acrd'); ?>
                                <?php $content_acrd = get_sub_field('content_acrd'); ?>
                                <div class="link left-right">
                                    <div class="left-acrd">
                                        <span class="num"><?php echo $number_index_acrd; ?></span><?php echo $position_text_acrd; ?>
                                    </div>
                                    <div class="right-acrd">
                                        <p class="mobile-faq-menu"><?php echo $years_experience_acrd; ?></p>
                                    </div>
                                </div>

                                <div class="right-acrd submenu">
                                    <div class="mobile-faq-panel">
                                        <div class="expertise-faq">
                                            <div class="text-content" >
                                                <?php echo $content_acrd; ?>
                                            </div>

                                            <div class="faq-btn download-btn">
                                                <?php 
                                                    $button_cta = get_field('apply_now_btn_acrd');
                                                    $link_url = $button_cta['url'];
                                                    $link_title = $button_cta['title'];
                                                    $link_target = $button_cta['target'] ? $link['target'] : '_self';
                                                ?>
                                                <div class="btn-cta"><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="faq-btns"> <span><?php echo esc_html( $link_title ); ?>Apply Now</span></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </section>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <?php endif; ?>
                    <div class="whole-form">
                        <div class="overlay"></div>
                        <div class="download_form" id="the-form">
                            <?php echo do_shortcode( '[contact-form-7 id="845" title="apply for career"]' ); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>


<?php get_footer();?>