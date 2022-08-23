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

</div><!-- #page -->

<?php wp_footer(); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.9/fullpage.min.js" integrity="sha512-JSVRnP8UFs0ieN/cvP9v4vmW1CotIaEKKN7W+4JaKNrllZolTv2aJfVGn4BFdfZ1jRZxgTAAaXWdlZbEm9iwFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.19/jquery.scrollify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="https://unpkg.com/in-view@0.6.1/dist/in-view.min.js"></script>


<script src="<?php echo get_template_directory_uri()  ?>/js/custom-fullpage.js"></script>



<script>
    //jQuery(document).ready(function() {
    jQuery(window).on("load", function() {
        setTimeout(function() {
            jQuery(".page-loader").fadeOut('slow');
        }, 500);
    });
</script>



<script>
    jQuery(document).ready(function() {
        jQuery(".banner-slider").owlCarousel({
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000,
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

        /*var owl = $('.service-slider');
        jQuery(".service-slider").owlCarousel({
            loop: true,
            nav: true,
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
         
         owl.on('mousewheel', '.service-slider', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });*/


        /*jQuery(".sliderservice").hover(
            function() {
                jQuery(this).addClass("class_name_of_div");
                owl.on('mousewheel', '.owl-stage', function(e) { 
            if (e.deltaY > 0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            } 
        });
            },
            function() {
                jQuery(this).removeClass("class_name_of_div");
            }
        );*/





        jQuery(".testimonial").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4000,
        });

        jQuery(".brand-logo").owlCarousel({
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 6000,
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
    });
</script>

<script>
    $(document).ready(function() {
		window.location.replace("#");

// slice off the remaining '#' in HTML5:    
if (typeof window.history.replaceState == 'function') {
  history.replaceState({}, '', window.location.href.slice(0, -1));
}

        $('#fullpage').fullpage({
            sectionsColor: ['#1bfc9b'],
            anchors: ['firstPage1', 'firstPage2', 'firstPage3', 'firstPage4', 'firstPage5', 'firstPage6', 'firstPage7', 'firstPage8'],
            menu: '#menu',
			autoScrolling:true,
	        scrollHorizontally: false,
            css3: true,
            // easingcss3:'linear',
            scrollOverflow: true,
            normalScrollElements: '.sliderservice',
            offsetSections: true,
            offsetSectionsKey: 'Y29kZXBlbi5pb196MDZiMlptYzJWMFUyVmpkR2x2Ym5NPWhPNA==',
            // offsetSections: true,

            onLeave: function(origin, destination, direction) {  
            //      if (destination == 2) {   
            //           setTimeout(function(){   
            //          $("#section0").remove(); 
			//  		jQuery("#fullpage").removeAttr("style");
            //   },3000);  
            //  jQuery('#section1').addClass('custom-height');  
            //    }

            
            jQuery("#section0").each(function() {
                var val = jQuery(this).find("active");
                jQuery("#section0").css("display", "block");
                
            });


            jQuery(".section-none").each(function() {
                
                var val = jQuery(this).find("active");
                jQuery("#section0").css({"opacity" : "0","height" : "0", "transition" : "0.7s ease"}).removeClass("active").addClass("section-banner");
                jQuery('#masthead').addClass('test');
            });
                if (destination == 1) {
                    jQuery('#masthead').removeClass('test');
                } else {
                    jQuery('#masthead').addClass('test');
                }

            },


            
            // afterResize: function() {
            //     console.log("ss");
            // }

        });

    });

    

    $(document).ready(function() {


        $(".first-section").click(function() {
            $('html, body').animate({
                scrollTop: $(".overview").offset().top - 130
            }, 200);
        });


        $(".second-section").click(function() {
            $('html, body').animate({
                scrollTop: $(".leadership-team").offset().top - 100
            }, 200);
        });

        $(".third-section").click(function() {
            $('html, body').animate({
                scrollTop: $("#Advisors").offset().top - 100
            }, 200);
        });



        $(".fourth-section").click(function() {
            $('html, body').animate({
                scrollTop: $("#key-milestone").offset().top - 150
            }, 200);
        });


        $(".main_services li a").click(function() {
            $('body').animate({
                scrollTop: $("article + .active").offset().top - 100
            }, 500);
        });

    });

(function( $ ) {
    
$(document).ready(function () {
  var owl = $(".service-slider");

  owl.owlCarousel({
    center: true,
    nav: true,
   loop: true,
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
    URLhashListener: true,
    autoplayHoverPause: true,
    startPosition: "URLHash"
  });

  owl.on("mousewheel", ".owl-stage", function (e) {
    if (e.originalEvent.wheelDelta > 0) {
      owl.trigger("next.owl");
    } else {
      owl.trigger("prev.owl");
    }
    e.preventDefault();
  });

  
});
    // Your jQuery code here, using the $
})( jQuery );



    
</script>


</body>

</html>