(function($) {
    "use strict"; // Start of use strict
    menuFull();

    $("#mask").delay(500).fadeOut("slow");

    if ($("#slider1").length > 0) {
        $(document).ready(function() {
            jQuery("#slider1").revolution({
                sliderType: "standard",
                jsFileLocation: "../assets/revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        touchOnDesktop: "off",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: true,
                        style: 'uranus',
                        direction: "vertical",
                        h_align: 'right',
                        v_align: 'center',
                        tmp: '<span class="tp-bullet-inner"></span>'
                    }

                },
                responsiveLevels: [1170, 1040, 778, 480],
                visibilityLevels: [1170, 1040, 778, 480],
                gridwidth: [1170, 1040, 778, 480],
                gridheight: [895, 600, 500, 800],
                lazyType: "none",
                parallax: {
                    type: "scroll",
                    origo: "enterpoint",
                    speed: 700,
                    levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 46, 47, 48, 49, 50, 55],
                    type: "scroll",
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        });
    }

    $(".js-loadmore").on("click", function() {
        var i = $(".js-more-items").appendTo($(".grid-gallery"));
        return $(".grid-gallery").isotope("insert", i), e(this).hide(), !1
    })



    $(".js-filters").on("click", "li", function() {
        var i = $(this).attr("data-filter");
        $(".grid-gallery").isotope({
            filter: i
        })
    }).each(function(a, i) {
        var t = $(i);
        t.on("click", "li", function() {
            t.find(".is-checked").removeClass("is-checked"), $(this).addClass("is-checked")
        })
    })


    $('.slide-specialities').slick({
        infinite: true,
        nextArrow: '<a href="javascript:;" class="slick-next bottom mr10"></a>',
        prevArrow: '<a href="javascript:;" class="slick-prev bottom mr10"></a>',
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 910,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.featured-carrusel').slick({
        infinite: true,
        autoplay: true,
        nextArrow: '<a href="javascript:;" class="slick-next bottom mr20"></a>',
        prevArrow: '<a href="javascript:;" class="slick-prev bottom mr20"></a>',
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 910,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.all-testimonials').slick({
        infinite: true,
        nextArrow: '<a href="javascript:;" class="slick-next bottom light mr0"></a>',
        prevArrow: '<a href="javascript:;" class="slick-prev bottom light mr0"></a>',
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('.slide-home').slick({
        infinite: true,
        nextArrow: '<a href="javascript:;" class="slick-next bottom"></a>',
        prevArrow: '<a href="javascript:;" class="slick-prev bottom"></a>',
        dots: true,
        dotsClass: "vertical-dots",
        slidesToShow: 1,
        slidesToScroll: 1
    });
    $('.slide-team').slick({
        infinite: true,
        nextArrow: '<a href="javascript:;" class="slick-next bottom"></a>',
        prevArrow: '<a href="javascript:;" class="slick-prev bottom"></a>',
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 910,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });



    $("body").css("margin-bottom", $("footer").css("height"));
    $('.slide-specialities').find('.sliderslide-content').css("height", $('.slide-specialities').find('.slick-track').css("height"));

    /* ------------------------------- */


})(jQuery); // End of use strict

$(window).on("load", function() {
    VideoInit();
    AOS.init({
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
    });
    $(".grid-gallery").isotope({
        itemSelector: ".grid-item",
        masonry: {
            columnWidth: ".grid-item"
        }
    });
    $(".grid-gallery").lightGallery();
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.timepicker').timepicker({
        'scrollDefault': 'now'
    });
    if ($("section.booking").isInViewport()) {
        $("footer").show();
    } else {
        $("footer").hide();
    }



})
$(".animatedScroll").on("click", function(e) {
    e.preventDefault();
    animateScroll($(this).attr("href"))
})

$("#nav ul li a").on("click", function(e) {
    $("#nav ul li").removeClass("current")
    $(this).parent().addClass("current")
});

function menuFull() {
    $(".trigger-overlay").length > 0 && ($(".trigger-overlay").click(function() {
        return $(".overlay").hasClass("open") ? ($(".overlay").removeClass("open"), $(this).removeClass("is-active")) : ($(".overlay").addClass("open"), $(this).addClass("is-active")), !1
    }), $(".overlay").find("a").on("click", function(e) {
        $(".overlay").removeClass("open"), $(".dropdown-icon").removeClass("is-active")
    }))
}

function animateScroll(sectionScroll) {
    posY = $(sectionScroll).position().top - 120;
    $('html, body').animate({
        scrollTop: posY
    }, 'slow');
}


$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top - 100;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height() - parseFloat($("footer").css("height"));

    return elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {
    AOS.refresh();
    $("body").css("margin-bottom", $("footer").css("height"));
    if ($("section.booking").isInViewport()) {
        $("footer").show();
    } else {
        $("footer").hide();
    }
    if ($(window).scrollTop() >= 85) {
        $("header").addClass("fixed-small")
    } else {
        $("header").removeClass("fixed-small")
    }
});
/*----------------- video -------------------*/
function VideoInit() {
    if ($(".home-section").length > 0) {
        $(".home-section").css({
            "height": $(window).height() + "px"
        });
        $(".home-section .home-content").css({
            "margin-top": ($(window).height() / 3) + "px"
        });

    }
}


/*----------------- portfolio change -------------------*/
function chgMas(cols) {
    $(".grid-portfolio .container-fluid").toggleClass('container-fluid container');

    $("#gll").removeAttr('class');
    $("#gll").attr('class', 'grid-gallery');
    $("#gll").addClass('columns-' + cols);

    $(".grid-gallery").isotope({
        itemSelector: ".grid-item",
        masonry: {
            columnWidth: ".grid-item",
        }
    });
}

function chgMas1(cols) {

    $(".grid-portfolio .container").toggleClass('container container-fluid');

    $("#gll").removeAttr('class');
    $("#gll").attr('class', 'grid-gallery');
    $("#gll").addClass('columns-' + cols);


    $(".grid-gallery").isotope({
        itemSelector: ".grid-item",
        masonry: {
            columnWidth: ".grid-item",
        }
    });
}