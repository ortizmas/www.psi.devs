
(function($) {
    'use strict';
    
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 100) {
          $(".nav-bar").addClass("bg-menu-top");
        } else {
          $(".nav-bar").removeClass("bg-menu-top");
        }
    });

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                  scrollTop: (target.offset().top - 56)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $('.js-scroll-trigger').click(function() {
        $('.navbar-collapse').collapse('hide');
    });

      // Activate scrollspy to add active class to navbar items on scroll
    $('body').scrollspy({
        target: '#mainNav',
        offset: 56
    });

    // Main Navigation
    $( '.hamburger-menu' ).on( 'click', function() {
        $(this).toggleClass('open');
        $('.site-navigation').toggleClass('show');
    });

    /*Multilevel menu */
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });

        return false;
    });

    // Testimonial Slider
    var swiper = new Swiper('.testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        effect: 'fade',
        speed: 800,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        }
    });

    var swiper = new Swiper('.swiper-sobre-jt', {
      direction: 'horizontal',
      effect: 'cube',
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: false,
      },
    });

    $('.gallery-wrap').masonry({
        itemSelector: '.gallery-grid'
    });

    // Accordion & Toggle
    $('.accordion-wrap.type-accordion').collapsible({
        accordion: true,
        contentOpen: 0,
        arrowRclass: 'arrow-r',
        arrowDclass: 'arrow-d'
    });

    $('.accordion-wrap .entry-title').on('click', function() {
        $('.accordion-wrap .entry-title').removeClass('active');
        $(this).addClass('active');
    });

})(jQuery);

//Data filter trainees
! function(d) {
    var c = "portfilter";
    var b = function(e) {
        this.$element = d(e);
        this.stuff = d("[data-tag]");
        this.target = this.$element.data("target") || ""
    };
    b.prototype.filter = function(g) {
        var e = [],
        f = this.target;
        this.stuff.fadeOut("fast").promise().done(function() {
            d(this).each(function() {
                if (d(this).data("tag") == f || f == "all") {
                    e.push(this)
                }
            });
            d(e).show()
        })
    };
    var a = d.fn[c];
    d.fn[c] = function(e) {
        return this.each(function() {
            var g = d(this),
            f = g.data(c);
            if (!f) {
                g.data(c, (f = new b(this)))
            }
            if (e == "filter") {
                f.filter()
            }
        })
    };
    d.fn[c].defaults = {};
    d.fn[c].Constructor = b;
    d.fn[c].noConflict = function() {
        d.fn[c] = a;
        return this
    };
    d(document).on("click.portfilter.data-api", "[data-toggle^=portfilter]", function(f) {
        d(this).portfilter("filter")
    })
}(window.jQuery);

//Data filter para jovens com emprego
! function(d) {
    var c = "empregadosfilter";
    var b = function(e) {
        this.$element = d(e);
        this.stuff = d("[data-tags]");
        this.target = this.$element.data("target") || ""
    };
    b.prototype.filterjt = function(g) {
        var e = [],
        f = this.target;
        this.stuff.fadeOut("fast").promise().done(function() {
            d(this).each(function() {
                if (d(this).data("tags") == f || f == "all") {
                    e.push(this)
                }
            });
            d(e).show()
        })
    };
    var a = d.fn[c];
    d.fn[c] = function(e) {
        return this.each(function() {
            var g = d(this),
            f = g.data(c);
            if (!f) {
                g.data(c, (f = new b(this)))
            }
            if (e == "filterjt") {
                f.filterjt()
            }
        })
    };
    d.fn[c].defaults = {};
    d.fn[c].Constructor = b;
    d.fn[c].noConflict = function() {
        d.fn[c] = a;
        return this
    };
    d(document).on("click.empregadosfilter.data-api", "[data-toggle^=empregadosfilter]", function(f) {
        d(this).empregadosfilter("filterjt")
    })
}(window.jQuery);