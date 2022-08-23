<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package icuerious
 */

?>

<footer id="colophon" class="site-footer">
    <div class="footer-container">
        <div class="row-1">
            <div class="col-1"><?php dynamic_sidebar( 'footer-col-1' ); ?></div>
            <div class="col-2"><?php dynamic_sidebar( 'footer-col-2' ); ?></div>
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
</div><!-- #page -->

<?php wp_footer(); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="https://unpkg.com/in-view@0.6.1/dist/in-view.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>







<script>
   //jQuery(document).ready(function() {
     jQuery(window).on("load", function () {
    setTimeout(function () {
            jQuery(".page-loader").fadeOut('slow'); 
        }, 500);
    });
    
</script>



<script>
    
    jQuery(document).ready(function() {
        $('.download-btn').on('click', function(e) {
      e.preventDefault();
      $('#the-form').addClass('is-visible');
      $('.Download-form').addClass('forms');
      $('.overlay').addClass('show');
    });
    
    jQuery('.whole-form>.overlay.show').click(function(){
      jQuery('.whole-form>.overlay').removeClass('show');
      jQuery('.whole-form>.download_form').removeClass('is-visible');
    });
        jQuery(".banner-slider").owlCarousel({
            loop: true,
            nav: true,
            autoplay:true,
            autoplayTimeout:2000,
            navText: [" ", " "],
            responsive: {
                0: {
                    items: 1,
                },
                767: {
                    items: 1,
                },
            },
        });

        var owl = $('.service-slider');
        jQuery(".service-slider").owlCarousel({
            loop: false,
            nav: true,
            autoplay:true,
            autoplayTimeout:2000,
            navText: [" ", " "],
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                900: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });

        jQuery(".testimonial").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            autoplay:true,
            autoplayTimeout:2000,
        });

        jQuery(".brand-logo").owlCarousel({
            loop: true,
            nav: true,
            navText: [" ", " "],
            autoplay:true,
            autoplayTimeout:2000,
            responsive: {
                0: {
                    items: 1,
                },
                767: {
                    items: 1,
                },
            },
        });

        jQuery(".listing_content").owlCarousel({
            loop: false,
            nav: true,
            navText: [" ", " "],
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
        jQuery(".icueview-paragraph").owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            onInitialized  : counter, //When the plugin has initialized.
            onTranslated : counter, //When the translation of the stage has finished.
            responsive: {
                0: {
                    items: 1,
                    margin: 50,
                },
                1024: {
                    items: 1,
                    margin: 0,
                }
            },
        });
        function counter(event) {
        var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
        
        // it loop is true then reset counter from 1
        if(item > items) {
            item = item - items
        }
        $('#counter').html(""+item+"/"+items)
        }

        jQuery(".icueBook-paragraph").owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            onInitialized  : counter2, //When the plugin has initialized.
            onTranslated : counter2, //When the translation of the stage has finished.
            responsive: {
                0: {
                    items: 1,
                    margin: 20,
                }
            },
        });
        function counter2(event) {
        var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
        
        // it loop is true then reset counter from 1
        if(item > items) {
            item = item - items
        }
        $('#counter_2').html(""+item+"/"+items)
        }

        jQuery(".icuelink-paragraph").owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            onInitialized  : counter3, //When the plugin has initialized.
            onTranslated : counter3, //When the translation of the stage has finished.
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
        function counter3(event) {
        var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
        
        // it loop is true then reset counter from 1
        if(item > items) {
            item = item - items
        }
        $('#counter_3').html(""+item+"/"+items)
        }

        jQuery(".cuechart-paragraph").owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            onInitialized  : counter4, //When the plugin has initialized.
            onTranslated : counter4, //When the translation of the stage has finished.
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
        function counter4(event) {
        var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
        
        // it loop is true then reset counter from 1
        if(item > items) {
            item = item - items
        }
        $('#counter_4').html(""+item+"/"+items)
        }

        jQuery(".icuemap-paragraph").owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            onInitialized  : counter5, //When the plugin has initialized.
            onTranslated : counter5, //When the translation of the stage has finished.
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
        function counter5(event) {
        var element   = event.target;         // DOM element, in this example .owl-carousel
            var items     = event.item.count;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
        
        // it loop is true then reset counter from 1
        if(item > items) {
            item = item - items
        }
        $('#counter_5').html(""+item+"/"+items)
        }
    });

</script>

      <script>


$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: ['#1bfc9b'],
				anchors: ['firstPage1', 'firstPage2'],
				menu: '#menu',
				css3: true,
                // easingcss3:'linear',
        scrollOverflow: true,
        offsetSections: true,
			  offsetSectionsKey: 'Y29kZXBlbi5pb196MDZiMlptYzJWMFUyVmpkR2x2Ym5NPWhPNA==',
        offsetSections: true,

        onLeave: function(origin, destination, direction) {

    console.log(destination);

    if(destination == 1){
    jQuery('#masthead').removeClass('test');
        }
    else{
        jQuery('#masthead').addClass('test');
    }

  },
    afterResize: function() {
console.log("ss");
  }
			});
		});


        $(document).ready(function() {



            $(".first-section").click(function() {
  $('html, body').animate({
    scrollTop: $(".overview").offset().top- 130
  }, 200);
});

            $(".semi-first-section").click(function() {
  $('html, body').animate({
    scrollTop: $(".core-value").offset().top- 130
  }, 200);
});


        $(".second-section").click(function() {
  $('html, body').animate({
    scrollTop: $(".leadership-team").offset().top- 100
  }, 200);
});

$(".third-section").click(function() {
  $('html, body').animate({
    scrollTop: $("#Advisors").offset().top- 100
  }, 200);
});



$(".fourth-section").click(function() {
  $('html, body').animate({
    scrollTop: $("#key-milestone").offset().top- 150
  }, 200);
});


$(".fifth-section").click(function() {
  $('html, body').animate({
    scrollTop: $("#careers").offset().top- 100
  }, 200);
});

$(".fifth-section").click(function() {
  $('html, body').animate({
    scrollTop: $(".each-service-post").offset().top- 100
  }, 200);
});


// Tool page sidebar space on click link

$(".first-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".Icueview").offset().top- 130
  }, 200);
});

$(".semi-first-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".IcueBook").offset().top- 130
  }, 200);
});

$(".second-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".icuelink").offset().top- 130
  }, 200);
});

$(".third-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".cuechart").offset().top- 130
  }, 200);
});

$(".fourth-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".icuemap").offset().top- 130
  }, 200);
});

$(".fifth-section-tool").click(function() {
  $('html, body').animate({
    scrollTop: $(".icuemap").offset().top- 130
  }, 200);
});
$(".value1").click(function() {
  $('html, body').animate({
    scrollTop: $("#one").offset().top- 130
  }, 200);
});
$(".value2").click(function() {
  $('html, body').animate({
    scrollTop: $("#two").offset().top- 130
  }, 200);
});
$(".value3").click(function() {
  $('html, body').animate({
    scrollTop: $("#three").offset().top- 130
  }, 200);
});

});




</script>


</body>

</html>
