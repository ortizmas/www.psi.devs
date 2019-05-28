(function($) {
    "use strict";
    $(window).on('load', function() {
        var loading = $('.loading');
        loading.delay(1000).fadeOut(1000);
    });
    $(document).ready(function() {
        // if ($('header').hasClass('sticky')) {
        //     $("header.sticky").clone(true).addClass('cloned').insertAfter("header.sticky").removeClass('header-transparent text-white');
        //     var stickyHeader = document.querySelector(".sticky.cloned");
        //     var stickyHeaderHeight = $("header.sticky").height();
        //     var headroom = new Headroom(stickyHeader, {
        //         "offset": stickyHeaderHeight + 100,
        //         "tolerance": 0
        //     });
        //     $(window).bind("load resize", function(e) {
        //         var winWidth = $(window).width();
        //         if (winWidth > 1200) {
        //             headroom.init();
        //         } else if (winWidth < 1200) {
        //             headroom.destroy();
        //         }
        //     });
        // }
        // if ($("nav#main-mobile-nav").length > 0) {
        //     function mmenuInit() {
        //         if ($(window).width() <= '1024') {
        //             $("#main-menu").clone().addClass("mmenu-init").prependTo("#main-mobile-nav").removeAttr('id').removeClass('navbar-nav mx-auto').find('li').removeAttr('class').find('a').removeAttr('class data-toggle aria-haspopup aria-expanded').siblings('ul.dropdown-menu').removeAttr('class');
        //             var main_menu = $('nav#main-mobile-nav');
        //             main_menu.mmenu({
        //                 extensions: ['fx-menu-zoom', 'position-right'],
        //                 counters: true
        //             }, {
        //                 offCanvas: {
        //                     pageSelector: ".wrapper"
        //                 }
        //             });
        //             var menu_toggler = $("#mobile-nav-toggler");
        //             var menu_API = main_menu.data("mmenu");
        //             menu_toggler.on("click", function() {
        //                 menu_API.open();
        //             });
        //             menu_API.bind("open:finish", function() {
        //                 setTimeout(function() {
        //                     menu_toggler.addClass("is-active");
        //                 }, 100);
        //             });
        //             menu_API.bind("close:finish", function() {
        //                 setTimeout(function() {
        //                     menu_toggler.removeClass("is-active");
        //                 }, 100);
        //             });
        //         }
        //     }
        //     mmenuInit();
        //     $(window).resize(function() {
        //         mmenuInit();
        //     });
        // }
        // var button = $('.btn-effect');
        // $(button).on('click', function(e) {
        //     $('.ripple').remove();
        //     var posX = $(this).offset().left,
        //         posY = $(this).offset().top,
        //         buttonWidth = $(this).width(),
        //         buttonHeight = $(this).height();
        //     $(this).prepend("<span class='ripple'></span>");
        //     if (buttonWidth >= buttonHeight) {
        //         buttonHeight = buttonWidth;
        //     } else {
        //         buttonWidth = buttonHeight;
        //     }
        //     var x = e.pageX - posX - buttonWidth / 2;
        //     var y = e.pageY - posY - buttonHeight / 2;
        //     $('.ripple').css({
        //         width: buttonWidth,
        //         height: buttonHeight,
        //         top: y + 'px',
        //         left: x + 'px'
        //     }).addClass("rippleEffect");
        // });
        // var pxShow = 100;
        // var scrollSpeed = 500;
        // $(window).scroll(function() {
        //     if ($(window).scrollTop() >= pxShow) {
        //         $("#backtotop").addClass('visible');
        //     } else {
        //         $("#backtotop").removeClass('visible');
        //     }
        // });
        // $('#backtotop a').on('click', function() {
        //     $('html, body').animate({
        //         scrollTop: 0
        //     }, scrollSpeed);
        //     return false;
        // });
        // var search_btn = $('.extra-nav .toggle-search');
        // var general_searchform = $('.general-search-wrapper');
        // var search_close = $('.general-search-wrapper .toggle-search');
        // search_btn.on('click', function() {
        //     general_searchform.addClass('open');
        // });
        // search_close.on('click', function() {
        //     general_searchform.removeClass('open');
        // });

        // if ($("#fullscreen-slider").length > 0) {
        //     var tpj = jQuery;
        //     var revapi24;
        //     tpj(document).ready(function() {
        //         if (tpj("#fullscreen-slider").revolution == undefined) {
        //             revslider_showDoubleJqueryError("#fullscreen-slider");
        //         } else {
        //             revapi24 = tpj("#fullscreen-slider").show().revolution({
        //                 sliderType: "standard",
        //                 jsFileLocation: "assets/revolution/js/",
        //                 sliderLayout: "fullscreen",
        //                 dottedOverlay: "none",
        //                 delay: 9000,
        //                 spinner: 'spinner2',
        //                 navigation: {
        //                     keyboardNavigation: "on",
        //                     keyboard_direction: "horizontal",
        //                     mouseScrollNavigation: "off",
        //                     mouseScrollReverse: "default",
        //                     onHoverStop: "off",
        //                     touch: {
        //                         touchenabled: "off",
        //                         swipe_threshold: 75,
        //                         swipe_min_touches: 1,
        //                         swipe_direction: "vertical",
        //                         drag_block_vertical: false
        //                     },
        //                     bullets: {
        //                         enable: true,
        //                         hide_onmobile: true,
        //                         hide_under: 1024,
        //                         style: "uranus",
        //                         hide_onleave: false,
        //                         direction: "vertical",
        //                         h_align: "right",
        //                         v_align: "center",
        //                         h_offset: 30,
        //                         v_offset: 0,
        //                         space: 20,
        //                         tmp: '<span class="tp-bullet-inner"></span>'
        //                     }
        //                 },
        //                 viewPort: {
        //                     enable: true,
        //                     outof: "wait",
        //                     visible_area: "80%"
        //                 },
        //                 responsiveLevels: [1200, 992, 768, 480],
        //                 visibilityLevels: [1200, 992, 768, 480],
        //                 gridwidth: [1200, 992, 768, 480],
        //                 lazyType: "single",
        //                 parallax: {
        //                     type: "scroll",
        //                     origo: "enterpoint",
        //                     speed: 400,
        //                     levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        //                 },
        //                 disableProgressBar: "on",
        //                 shadow: 0,
        //                 spinner: "off",
        //                 stopLoop: "on",
        //                 stopAfterLoops: 1,
        //                 stopAtSlide: 1,
        //                 shuffle: "off",
        //                 autoHeight: "off",
        //                 hideThumbsOnMobile: "off",
        //                 hideSliderAtLimit: 0,
        //                 hideCaptionAtLimit: 0,
        //                 hideAllCaptionAtLilmit: 0,
        //                 debugMode: false,
        //                 fallbacks: {
        //                     simplifyAll: "off",
        //                     nextSlideOnWindowFocus: "off",
        //                     disableFocusListener: false,
        //                 }
        //             });
        //         }
        //     });
        // };
        // if ($("#fullwidth-slider").length > 0) {
        //     var tpj = jQuery;
        //     var revapi24;
        //     tpj(document).ready(function() {
        //         if (tpj("#fullwidth-slider").revolution == undefined) {
        //             revslider_showDoubleJqueryError("#fullwidth-slider");
        //         } else {
        //             revapi24 = tpj("#fullwidth-slider").show().revolution({
        //                 sliderType: "hero",
        //                 jsFileLocation: "assets/revolution/js/",
        //                 sliderLayout: "fullwidth",
        //                 dottedOverlay: "none",
        //                 delay: 9000,
        //                 spinner: 'off',
        //                 navigation: {},
        //                 viewPort: {
        //                     enable: true,
        //                     outof: "wait",
        //                     visible_area: "80%"
        //                 },
        //                 responsiveLevels: [1200, 992, 768, 480],
        //                 visibilityLevels: [1200, 992, 768, 480],
        //                 gridwidth: [1200, 992, 768, 480],
        //                 gridheight: [600, 600, 500, 400],
        //                 lazyType: "none",
        //                 parallax: {
        //                     type: "scroll",
        //                     origo: "enterpoint",
        //                     speed: 400,
        //                     levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        //                 },
        //                 disableProgressBar: "on",
        //                 shadow: 0,
        //                 spinner: "off",
        //                 stopLoop: "on",
        //                 stopAfterLoops: 1,
        //                 stopAtSlide: 1,
        //                 shuffle: "off",
        //                 autoHeight: "off",
        //                 hideThumbsOnMobile: "off",
        //                 hideSliderAtLimit: 0,
        //                 hideCaptionAtLimit: 0,
        //                 hideAllCaptionAtLilmit: 0,
        //                 debugMode: false,
        //                 fallbacks: {
        //                     simplifyAll: "off",
        //                     nextSlideOnWindowFocus: "off",
        //                     disableFocusListener: false,
        //                 }
        //             });
        //         }
        //     });
        // };
        // if ($("#hero-slider").length > 0) {
        //     var tpj = jQuery;
        //     var revapi24;
        //     tpj(document).ready(function() {
        //         if (tpj("#hero-slider").revolution == undefined) {
        //             revslider_showDoubleJqueryError("#hero-slider");
        //         } else {
        //             revapi24 = tpj("#hero-slider").show().revolution({
        //                 sliderType: "hero",
        //                 jsFileLocation: "assets/revolution/js/",
        //                 sliderLayout: "fullwidth",
        //                 dottedOverlay: "none",
        //                 delay: 9000,
        //                 spinner: 'off',
        //                 navigation: {},
        //                 viewPort: {
        //                     enable: true,
        //                     outof: "wait",
        //                     visible_area: "80%"
        //                 },
        //                 responsiveLevels: [1200, 992, 768, 480],
        //                 visibilityLevels: [1200, 992, 768, 480],
        //                 gridwidth: [1200, 992, 768, 480],
        //                 gridheight: [700, 700, 600, 500],
        //                 lazyType: "none",
        //                 parallax: {
        //                     type: "scroll",
        //                     origo: "enterpoint",
        //                     speed: 400,
        //                     levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        //                 },
        //                 disableProgressBar: "on",
        //                 shadow: 0,
        //                 spinner: "off",
        //                 stopLoop: "on",
        //                 stopAfterLoops: 1,
        //                 stopAtSlide: 1,
        //                 shuffle: "off",
        //                 autoHeight: "off",
        //                 hideThumbsOnMobile: "off",
        //                 hideSliderAtLimit: 0,
        //                 hideCaptionAtLimit: 0,
        //                 hideAllCaptionAtLilmit: 0,
        //                 debugMode: false,
        //                 fallbacks: {
        //                     simplifyAll: "off",
        //                     nextSlideOnWindowFocus: "off",
        //                     disableFocusListener: false,
        //                 }
        //             });
        //         }
        //     });
        // };
        // if ($("#hero-slider2").length > 0) {
        //     var tpj = jQuery;
        //     var revapi24;
        //     tpj(document).ready(function() {
        //         if (tpj("#hero-slider2").revolution == undefined) {
        //             revslider_showDoubleJqueryError("#hero-slider2");
        //         } else {
        //             revapi24 = tpj("#hero-slider2").show().revolution({
        //                 sliderType: "hero",
        //                 jsFileLocation: "assets/revolution/js/",
        //                 sliderLayout: "fullwidth",
        //                 dottedOverlay: "none",
        //                 delay: 9000,
        //                 spinner: 'off',
        //                 navigation: {},
        //                 viewPort: {
        //                     enable: true,
        //                     outof: "wait",
        //                     visible_area: "80%"
        //                 },
        //                 responsiveLevels: [1200, 992, 768, 480],
        //                 visibilityLevels: [1200, 992, 768, 480],
        //                 gridwidth: [1200, 992, 768, 480],
        //                 gridheight: [700, 700, 600, 500],
        //                 lazyType: "none",
        //                 parallax: {
        //                     type: "scroll",
        //                     origo: "enterpoint",
        //                     speed: 400,
        //                     levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50],
        //                 },
        //                 disableProgressBar: "on",
        //                 shadow: 0,
        //                 spinner: "off",
        //                 stopLoop: "on",
        //                 stopAfterLoops: 1,
        //                 stopAtSlide: 1,
        //                 shuffle: "off",
        //                 autoHeight: "off",
        //                 hideThumbsOnMobile: "off",
        //                 hideSliderAtLimit: 0,
        //                 hideCaptionAtLimit: 0,
        //                 hideAllCaptionAtLilmit: 0,
        //                 debugMode: false,
        //                 fallbacks: {
        //                     simplifyAll: "off",
        //                     nextSlideOnWindowFocus: "off",
        //                     disableFocusListener: false,
        //                 }
        //             });
        //         }
        //     });
        // };
        // $(".signUpClick").on('click', function() {
        //     $('.signin-wrapper, .forgetpassword-wrapper').fadeOut(300);
        //     $('.signup-wrapper').delay(300).fadeIn();
        // });
        // $(".signInClick").on('click', function() {
        //     $('.forgetpassword-wrapper, .signup-wrapper').fadeOut(300);
        //     $('.signin-wrapper').delay(300).fadeIn();
        // });
        // $(".forgetPasswordClick").on('click', function() {
        //     $('.signup-wrapper, .signin-wrapper').fadeOut(300);
        //     $('.forgetpassword-wrapper').delay(300).fadeIn();
        // });
        // $(".cancelClick").on('click', function() {
        //     $('.forgetpassword-wrapper, .signup-wrapper').fadeOut(300);
        //     $('.signin-wrapper').delay(300).fadeIn();
        // });
        $('body').magnificPopup({
            type: 'image',
            delegate: 'a.mfp-gallery',
            fixedContentPos: true,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: true,
            removalDelay: 0,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true
            },
            callbacks: {
                buildControls: function() {
                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                }
            }
        });
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });
        $('.mfp-image').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            image: {
                verticalFit: true
            }
        });
        $('.image-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled: true
            },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            retina: {
                ratio: 1,
                replaceSrc: function(item, ratio) {
                    return item.src.replace(/\.\w+$/, function(m) {
                        return '@2x' + m;
                    });
                }
            }
        });

        $('.play-video, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        var latest_movies = $('section.latest-movies .latest-movies-slider');
        latest_movies.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 10
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        
        var latest_tvshows = $('section.latest-tvshows .latest-tvshows-slider');
        latest_tvshows.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 10
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        var latest_releases = $('.latest-releases-slider');
        latest_releases.owlCarousel({
            loop: true,
            margin: 30,
            stagePadding: 20,
            autoplay: false,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
                1500: {
                    items: 5,
                }
            }
        });

        var recommended = $('section.recommended-movies .recommended-slider');
        recommended.owlCarousel({
            loop: true,
            margin: 15,
            autoplay: false,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 10
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

    });
})(jQuery);