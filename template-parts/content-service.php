<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package icuerious
 */
// $categories = get_the_category();
//     echo '<ul>';
//     echo "hello";
// foreach($categories as $category){
//     $parent = $category->parent;
//     if($category->parent == 0){
//     }
//     else{
//         wp_list_categories("child_of=$parent&title_li");
//     }
// }
//     echo '</ul>';
$url = $_SERVER['REQUEST_URI'];
$url = explode("/",$url);
$selected_service = $url[4];
$selected_service = str_replace("-", " ", $selected_service);
?>
<input type="hidden" id="selected_servive" value="<?php if(isset($selected_service)) {
    echo $selected_service;
} else {
    echo '';
} ?>"/>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="link single-post-page">
        <!-- the title of single blog page -->
        <div class="post-titles">
          <h3><?php the_title();?> </h3>
        </div>
    </div>

    <ul class="submenu"> 
        <div class="content-submenu single-post-pdf">
            <div class="the-content">
                <?php the_content()?>
            </div>

            <div class="key-differentiators">

                <?php
                $value = get_field( "key__differentiators_heading_title" );

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
                    $sampleText = get_field( "sample_heading_title" );

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
                    $faqText = get_field( "faq_heading_title" );

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
    

               
</article><!-- #post-<?php the_ID(); ?> -->
