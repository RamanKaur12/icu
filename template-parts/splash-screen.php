
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
