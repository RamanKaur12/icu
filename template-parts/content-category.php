<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icuerious
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="link">
        <!-- the title of single blog page -->
        <div class="post-titles">
          <h3> <span class="numerootation"><?php the_field('field_numerotation'); ?></span> <?php the_title();?> </h3>
        </div>

        <!-- the description of single blog page -->
        <div class="description">
            <h2><?php the_field('add_blog_description'); ?></h2>
        </div>
        <!-- get the subtitlof the post  -->
        <div class="display-child-category desktop-category">
            <?php
                $categories = get_the_category();
                foreach( $categories as $category ) {
                If ( $category->parent > 0 ) { 
                $child_cat_ID[] =  $category->term_id; 
                }
                } 
                If ( empty($child_cat_ID)) { 
                echo get_the_category_list( ' , ', '' );
                } else { 
                    
                $child_cat_IDs = implode(', ', $child_cat_ID);
                echo '<div class="post-categories"> <h4>';
                wp_list_categories( array(
                        'separator' => ' ',
                        'style'     => '',   
                        'include' =>  $child_cat_IDs 
                    ) );
                echo '</h4> </div>';
                }  
            ?>
        </div>
        <!-- get the subtitlof the post  -->
   
    </div>

    <ul class="submenu"> 
        <div class="content-submenu">
        <div class="display-child-category mobile-category">
            <?php
                $categories = get_the_category();
                foreach( $categories as $category ) {
                If ( $category->parent > 0 ) { 
                $child_cat_ID[] =  $category->term_id; 
                }
                } 
                If ( empty($child_cat_ID)) { 
                echo get_the_category_list( ' , ', '' );
                } else { 
                    
                $child_cat_IDs = implode(', ', $child_cat_ID);
                echo '<div class="post-categories"> <h4>';
                wp_list_categories( array(
                        'separator' => ' ',
                        'style'     => '',   
                        'include' =>  $child_cat_IDs 
                    ) );
                echo '</h4> </div>';
                }  
            ?>
        </div>
            <div class="under-title"></div>
            <div class="under-description">
                <div class="post-toggle-descrip">
                    <?php the_field('add_blog_short_description'); ?>
                </div>
                
                <div class="post-link">
                    <a href="<?php echo esc_url( get_permalink()); ?>"> <span class="icon"><img src="https://zeroguess.us/n03/icuerious/wp-content/uploads/2022/07/↗-See-Full-Report.png"></span> See Full Report</a>
                </div>
            </div>

            <div class="under-category">
                <div class="puublish-date">
                    <span class="entry-date"><span class="tdx"> Date Published: </span><?php echo get_the_date(); ?></span>
                </div>
            </div>
        </div>
    </ul>
</article><!-- #post-<?php the_ID(); ?> -->
