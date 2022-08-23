jQuery(document).ready(function () {
  //open services on hover
  // $(".each-service-post").hover(function () {
  //   if ($(this).hasClass("open")) {
  //     $(this).removeClass("open");
  //     $("#service_submenu").css("display", "none");
  //   } else {
  //     $(this).addClass("open");
  //     $(".each-service.open .submenu").css("display", "block");
  //   }
  // });

  // disable submit btn on post if empty
  $("#submit").attr("disabled", true);

  $(document).ready(function () {
    $("#submit").prop("disabled", true);

    function validateNextButton() {
      var buttonDisabled = $("#comment").val().trim() === "";
      $("#submit").prop("disabled", buttonDisabled);
    }

    $("#comment").on("keyup", validateNextButton);
  });

  //downlaod form for both the single blog pages and the current opening apply now form
  jQuery(".download-btn").on("click", function (e) {
    e.preventDefault();
    jQuery("#the-form").addClass("is-visible");
    jQuery(".Download-form").addClass("forms");
    jQuery(".overlay").addClass("show");
  });

  $(".whole-form .overlay").on("click", function () {
    jQuery(".whole-form>.overlay").removeClass("show");
    jQuery(".whole-form>.download_form").removeClass("is-visible");
  });

  // let menuItems = $(".menu-item-has-children a");
  // let getId = $(".each-service-post").attr("id");

  // menuItems.on("click", function () {
  //   console.log($(getId));
  // });

  // accordion bloog pages categories
  jQuery(".categories li span").click(function () {
    jQuery(".categories li").removeClass("active");
    jQuery(this).parents("li").addClass("active");
  });
  jQuery(
    ".categories .accordion .each-service .link.project-categories a"
  ).click(function () {
    jQuery(".each-service").removeClass("active");
    jQuery(this).parents(".each-service").addClass("active");
    jQuery(
      ".categories .accordion .each-service .link.project-categories a"
    ).removeClass("active");
    jQuery(this).addClass("active");
  });
  if (jQuery("#selected_servive").val() != "") {
    var selected_service = jQuery("#selected_servive").val();
    jQuery(".categories .accordion .each-service").removeClass("active");
    jQuery(
      ".categories .accordion .each-service .link.project-categories a"
    ).removeClass("active");
    jQuery(".categories .accordion .each-service").each(function () {
      var service_name_parent = jQuery(this)
        .find(".link.project-categories a")
        .text();
      // console.log("service_name_parent");
      // console.log(service_name_parent);
      // var service_name_child = jQuery(this).find(".submenu .content-submenu p a").text();
      // console.log("service_name_child");
      // console.log(service_name_child);
      service_name_parent = service_name_parent.toLowerCase();
      // service_name_child = service_name_child.toLowerCase();
      if (selected_service == service_name_parent) {
        jQuery(this).addClass("active");
        jQuery(this).find(".link.project-categories a").addClass("active");
        jQuery(this).find("h1:first").addClass("active");
        jQuery(this)
          .find(".submenu .content-submenu p:first a")
          .addClass("current-service");
      } else {
        jQuery(this)
          .find(".submenu .content-submenu p")
          .each(function () {
            var service_name_child = jQuery(this).find("a").text();
            service_name_child = service_name_child.toLowerCase();
            if (service_name_child == selected_service) {
              jQuery(this).find("a").addClass("current-service");
              jQuery(this).parents(".each-service").addClass("active");
            }
          });
      }
    });
    // jQuery(".selector-adult-col ul").find("li[data-value=" + data[0] + "]").addClass("selected");
  }
  // jQuery(".categories .accordion .each-service link.project-categories a").click(function() {
  //   jQuery(".categories .accordion .each-service,.categories .accordion .each-service .submenu .content-submenu p a,.link.project-categories a").removeClass("active");
  //   jQuery(this).addClass("active");
  //   jQuery(this).parents(".each-service").addClass("active");
  // })
  function setActiveAcrd() {
    if ($(".each-service.active").hasClass("active")) {
      $(".each-service.active").addClass("open");
      $(".each-service.active .submenu").css("display", "block");
    } else {
    }
  }
  // setActiveAcrd();

  function faqAccrd() {
    var $titleTab = $(".title_tab");
    $(".Accordion_item:eq(0)")
      .find(".title_tab")
      .addClass("active")
      .next()
      .stop()
      .slideDown(300);
    $(".Accordion_item:eq(0)")
      .find(".inner_content")
      .find("p")
      .addClass("show");
    $titleTab.on("click", function (e) {
      e.preventDefault();
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this).next().stop().slideUp(300);
        $(this).next().find("p").removeClass("show");
      } else {
        $(this).addClass("active");
        $(this).next().stop().slideDown(300);
        $(this)
          .parent()
          .siblings()
          .children(".title_tab")
          .removeClass("active");
        $(this).parent().siblings().children(".inner_content").slideUp(300);
        $(this)
          .parent()
          .siblings()
          .children(".inner_content")
          .find("p")
          .removeClass("show");
        $(this).next().find("p").addClass("show");
      }
    });
  }
  faqAccrd();

  function addClassToLink() {
    let menuItem = $(".menu-item-has-children a");
    let subLinks = $(".sub-menu a");
    let menuItemsb = $(".menu-item .sub-menu");

    menuItem.addClass("link");
    subLinks.removeClass("link");
    menuItemsb.addClass("submenu");
    menuItemsb.addClass("main_services");
  }

  addClassToLink();

  $(".each-service-post").attr("id", function (_, id) {
    return id.replace(/\s/g, "-");
  });

  $(".each-service-post").attr("id", function (i, id) {
    return id.toLowerCase();
  });

  function realAccordions(x) {
    $(function () {
      var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find(".link");
        // Evento
        links.on(
          "click",
          { el: this.el, multiple: this.multiple },
          this.dropdown
        );
      };

      Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        ($this = $(this)), ($next = $this.next());

        $next.slideToggle();
        $this.parent().toggleClass("open");

        if (!e.data.multiple) {
          $el
            .find(".submenu")
            .not($next)
            .slideUp()
            .parent()
            .removeClass("open");
        }
      };

      var accordion = new Accordion($(x), false);
    });
  }
  function realAccordionss(y) {
    $(function () {
      var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find(".link");
        // Evento
        links.on(
          "click",
          { el: this.el, multiple: this.multiple },
          this.dropdown
        );
      };

      Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        ($this = $(this)), ($next = $this.next());

        $next.slideToggle();
        $this.parent().toggleClass("open");

        if (!e.data.multiple) {
          $el
            .find(".submenus")
            .not($next)
            .slideUp()
            .parent()
            .removeClass("open");
        }
      };

      var accordion = new Accordion($(y), false);
    });
  }
  realAccordions("#accordion");
  realAccordions("#accordions");
  realAccordionss("#faq");
  realAccordionss("#current-opp");

  // disable category link on category page
  $(".display-child-category").click(function () {
    return false;
  });
  $("#sortbox").click(function () {
    $("label.Date").css("display", "none");
  });

  var conceptName = $("#sortbox :selected").text();

  if (conceptName) {
    $("label.Date").css("display", "none");
  } else {
  }

  $(".my-link").click(function () {
    return false;
  });
  // animations
  gsap.registerPlugin(ScrollTrigger);
  var tl = gsap.timeline();

  // function serviceAimation() {
  //   ScrollTrigger.addEventListener(".our_service", () =>
  //     console.log("scrolling ended!")
  //   );
  //   gsap.from(".our_service", {
  //     scrollTrigger: {
  //       duration: 0.5,
  //       trigger: ".our_service",
  //       start: "top 60%",
  //       end: "top 40%",
  //       toggleClass: "activeme",
  //       markers: {
  //         startColor: "purple",
  //         endColor: "fuchsia",
  //         fontSize: "3rem",
  //       },
  //     },
  //   });
  // }

  // serviceAimation();

  function header_anime() {
    tl.from(".col-subtext-logo", {
      duration: 0.5,
      opacity: 0,
      y: -100,
      ease: "ease",
      scale: 0.8,
    });
    tl.from(".each-letter", {
      duration: 0.5,
      opacity: 0,
      y: 50,
      ease: "ease",
      rotateX: 45,
    });

    tl.from(".links", {
      duration: 0.5,
      opacity: 0,
      x: -100,
      ease: "ease",
      scale: 0.8,
      stagger: 0.1,
    });
  }
  header_anime();

  $("#float").click(function () {
    $("#mobile-sidebar").toggleClass("show-sidebar");
    $("#float").toggleClass("opened");
  });

  function currentOpeninganimation() {
    // tl.from(".opnig-text", {
    //   duration: 0.5,
    //   delay: -0.9,
    //   opacity: 0,
    //   y: 50,
    //   ease: "ease",
    //   rotateX: 45,
    //   scale: 0.8,
    // });

    tl.from(".opennings", {
      duration: 0.5,
      delay: -0.5,
      opacity: 0,
      x: -500,
      ease: "ease",
      scale: 0.8,
      stagger: 0.1,
    });
  }
  currentOpeninganimation();

  AOS.init({});

  function fomrWidth() {
    // document.querySelector(".search-form").focus = function () {
    //   var search = document.querySelector(".search-form");
    //   search.classList.toggle("search-width");
    // };
    $(".search-form input")
      .focus(function () {
        $(this).parent().addClass("search-width", 2000);
      })
      .blur(function () {
        $(this).parent().removeClass("search-width", 2000);
      });
  }
  fomrWidth();

  function fixedMenu() {
    var height = $(".splash-screen").height();

    $(window).scroll(function () {
      if ($(this).scrollTop() > height) {
        $("#masthead").addClass("fixed");
      } else {
        $("#masthead").removeClass("fixed");
      }
    });
  }
  // fixedMenu();

  function menuToggle() {
    document.querySelector(".menu-toggles").onclick = function (e) {
      var btn = document.querySelector(".menu-toggles");
      var menu = document.querySelector(".full-menu");
      var fixNav = document.querySelector(".container-nav");
      var mobileLogo = document.querySelector(".logo-full-menus-mobile");
      var background = document.querySelector(".background");

      btn.classList.toggle("is-active");
      menu.classList.toggle("active-menu");
      fixNav.classList.toggle("fix-nav");
      mobileLogo.classList.toggle("show-logo");
      background.classList.toggle("show-bg");
      e.preventDefault();
    };
  }
  menuToggle();

  function scrooltosection() {
    $(".smooth-goto").on("click", function () {
      $("html,body").animate({ scrollTop: targetOffset().top - 000 }, 1000);
      return false;
    });
  }
  scrooltosection();
  function scrooltosection2() {
    $(window)
      .scroll(function () {
        var windscroll = $(window).scrollTop();
        if (windscroll >= 100) {
          $(".page-section").each(function (i) {
            // The number at the end of the next line is how pany pixels you from the top you want it to activate.
            if ($(this).position().top <= windscroll - 0) {
              $(".navigation li.active").removeClass("active");
              $(".main-content .page-section").removeClass("active");
              $(this).addClass("active");
              $(".navigation li").eq(i).addClass("active");
            }
          });
        } else {
          $(".navigation li.active").removeClass("active");
          // $(".navigation li:first").addClass("active");
        }
      })
      .scroll();
  }
  scrooltosection2();

  // add opoen to all first accordion of aeach category post acoordion
  $(".accordion article").last().addClass("open");
  $(".accordion article:last .submenu").css("display", "block");

  $(".accordions-content .each-accordion:nth-child(2)").addClass("open");
  $(".accordions-content .each-accordion:nth-child(2) .submenu").css(
    "display",
    "block"
  );

  // toggle class for each section

  // function sectioToggleClass() {
  //   $(".first-section").click(function () {
  //     $(".firstsection").addClass("space-top");
  //   });
  //   $(".second-section").click(function () {
  //     $(".secondsection").addClass("space-top");
  //   });
  //   $(".third-section").click(function () {
  //     $(".thirdsection").addClass("space-top");
  //   });
  //   $(".fourth-section").click(function () {
  //     $(".fourthsection").addClass("space-top");
  //   });
  //   $(".fifth-section").click(function () {
  //     $(".fifthsection").addClass("space-top");
  //   });
  // }
  // sectioToggleClass();
  /*Cursor Function*/

  var cursor = jQuery(".cursor");

  jQuery(window).mousemove(function (e) {
    cursor.css({
      top: e.clientY - cursor.height() / 2,
      left: e.clientX - cursor.width() / 2,
    });
  });

  jQuery(window)
    .mouseleave(function () {
      cursor.css({
        opacity: "0",
      });
    })
    .mouseenter(function () {
      cursor.css({
        opacity: "1",
      });
    });

  jQuery("a, input, button")
    .mouseenter(function () {
      cursor.css({
        transform: "scale(3.2)",
      });
    })
    .mouseleave(function () {
      cursor.css({
        transform: "scale(1)",
      });
    });

  jQuery(window)
    .mousedown(function () {
      cursor.css({
        transform: "scale(.2)",
      });
    })
    .mouseup(function () {
      cursor.css({
        transform: "scale(1)",
      });
    });

  // accordions services page

  // SideBarAccordions();

  function accordion() {
    $(function () {
      $(".accordion")
        .find(".accordion__title")
        .click(function () {
          // Adds active class
          $(this).toggleClass("open");
          // Expand or collapse this panel
          $(this).next().slideToggle("fast");
          // Hide the other panels
          $(".accordion__content").not($(this).next()).slideUp("fast");
          // Removes active class from other titles
          $(".accordion__title").not($(this)).removeClass("open");
        });
    });
  }
  accordion();

  function accordions() {
    $(".accordion_head").click(function () {
      if ($(".accordion_body").is(":visible")) {
        $(".accordion_body").slideUp(300);
        $(".plusminus").text("+");
      }
      if ($(this).next(".accordion_body").is(":visible")) {
        $(this).next(".accordion_body").slideUp(300);
        $(this).children(".plusminus").text("[+]");
      } else {
        $(this).next(".accordion_body").slideDown(300);
        $(this).children(".plusminus").text("[-]");
      }
    });
  }
  accordions();

  function opensections() {
    $(".patent").click(function () {
      $(".patent-drafting-menu").addClass("active");
      $(".patent-drafting-panel").addClass("show");
    });
  }

  opensections();
});

jQuery(document).ready(function () {
  // button animations
  function btnanimation() {
    const btn = document.querySelector(".btns");
    btn.onmousemove = function (e) {
      const x = e.pageX - btn.offsetLeft;
      const y = e.pageY - btn.offsetTop;

      btn.style.setProperty("--x", x + "px");
      btn.style.setProperty("--y", y + "px");
    };
  }
  btnanimation();

  // function btnanimationfaq() {
  //   const btn = document.querySelector(".faq-btns");
  //   btn.onmousemove = function (e) {
  //     const x = e.pageX - btn.offsetLeft;
  //     const y = e.pageY - btn.offsetTop;

  //     btn.style.setProperty("--x", x + "px");
  //     btn.style.setProperty("--y", y + "px");
  //   };
  // }
  // btnanimationfaq();
});

jQuery(document).ready(function () {
  function sideBarsClasses(menu) {
    let submenu = $(".Patent-Prosecution .submenu");

    if ($(".each-service-post").hasClass("open")) {
      $(menu).addClass("open");
      $(submenu).css("display", "block");
    } else {
    }
  }
  sideBarsClasses(".Patent-Prosecution");
  // if ($(".each-service-post").hasClass("open")) {
  //   jQuery(".submenu").css("display", "block");
  // } else {
  //   jQuery(".submenu").css("display", "none");
  // }

  var last_part = "";
  jQuery(".main_services li a").click(function () {
    jQuery(".main_services li a").removeClass("active");

    jQuery(this).addClass("active");
    jQuery(this).addClass("");
    var oldId = jQuery(this).attr("href");
    var parts = oldId.split("/#");
    var old_last_part = parts[parts.length - 1];
    var last_part = old_last_part.replace("#", "");

    jQuery("body").find("article").removeClass("active");
    jQuery("body").find("article").removeClass("open");
    jQuery('article[id="' + last_part + '"]').addClass("active");
    jQuery("html, body").animate(
      {
        scrollTop: jQuery("article.active").offset().top - 100,
      },
      50
    );
    jQuery("body")
      .find("article .submenu")
      .slideUp("fast", function () {
        jQuery("html, body").animate(
          {
            scrollTop: jQuery("article.active").offset().top - 100,
          },
          50
        );
      });
    jQuery('article[id="' + last_part + '"]').addClass("open");
    jQuery('article[id="' + last_part + '"] .submenu').slideDown("slow");
  });

  $(window)
    .scroll(function () {
      var windscroll = $(window).scrollTop();
      if (windscroll >= 50) {
        $(".images_scrool").each(function (i) {
          // The number at the end of the next line is how pany pixels you from the top you want it to activate.
          if ($(this).position().top <= windscroll + 300) {
            $("#nav li.active").removeClass("active");
            $(".images_scrool.active").removeClass("active");
            $("#nav li").eq(i).addClass("active");
            $(".images_scrool").eq(i).addClass("active");
          }
        });
      } else {
        $("#nav li.active").removeClass("active");
        $(".images_scrool.active").removeClass("active");
        $(".images_scrool:first").addClass("active");
        $("#nav li:first").addClass("active");
      }
    })
    .scroll();
});
