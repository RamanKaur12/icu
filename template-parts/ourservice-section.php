<section class="our-service">
        <div class="our-service-container content-with">
            <div class="service-row-1">
                <div class="col">
                    <h2><?php the_field('service_heading'); ?></h2>
                    <div class="btn-cta desktop">

                            <?php 
                                $service_btn = get_field('service-btn-link');
                                $link_url = $service_btn['url'];
                                $link_title = $service_btn['title'];
                                $link_target = $service_btn['target'] ? $link['target'] : '_self';
                            ?>
                            <a href="<?php echo esc_url( $link_url ); ?>" class="btns" alt="<?php echo esc_attr( $link_target ); ?>"> <span> <?php echo esc_html( $link_title ); ?> </span></a>
                    </div>
                </div>
            </div>
            <div class="service-row-2">
                <div class="col-space-start"></div>
                        <?php $args = array( 'post_type' => 'our_service','order'=> 'ASC', 'posts_per_page' => 10 );
                        $loop = new WP_Query( $args ); ?>

                <div class="sliderservice">
                    <div class="service-slider owl-carousel owl-theme">

                    <?php while ( $loop->have_posts() ) : $loop->the_post();?>

                    <div class="cols col-1">
                    <div class="num"><p><?php the_field('numbers_slider', $post->ID); ?></p></div>
                        <div class="title"><?php the_title( sprintf( '<h3 class="title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?></div>
                        <div class="text"> 
                            <?php  the_excerpt();?>
                        </div>
                        <div class="Learn-more-btn" ><a href="<?php echo get_home_url(); ?>/service"><?php the_field('learn_more'); ?></a></div>
                    </div>
                    <?php wp_reset_postdata()?>
                    <?php endwhile;?>
                    
                </div>
                
            </div>
            <div class="col-space-end"></div>
            <div class="btn-cta mobile-btn">

                <?php 
                    $service_btn = get_field('service-btn-link');
                    $link_url = $service_btn['url'];
                    $link_title = $service_btn['title'];
                    $link_target = $service_btn['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="btns" alt="<?php echo esc_attr( $link_target ); ?>"> <span> <?php echo esc_html( $link_title ); ?> </span></a>
                </div>
        </div>
</section>