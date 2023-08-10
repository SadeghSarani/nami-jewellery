$(document).ready(function (l) {
    // **************  fixed header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $('header.main-header.js-fixed-header').addClass('fixed');
            $('header.main-header.js-fixed-topbar').addClass(
                'fixed fixed-topbar'
            );
        } else {
            $('header.main-header.js-fixed-header').removeClass('fixed');
            $('header.main-header.js-fixed-topbar').removeClass(
                'fixed fixed-topbar'
            );
        }
    });

    // **************  category slider
    $('.category-slider').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 2
            },
            768: {
                items: 4,
                slideBy: 2
            },
            992: {
                items: 6,
                slideBy: 3
            },
            1400: {
                items: 8,
                slideBy: 4
            }
        }
    });
    // ************** carousel-products
    $('.carousel-products').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        // autoWidth: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: false,
        stagePadding: 1,
        responsiveClass: true,
        responsive: {
            0: {
                items: 3,
                slideBy: 1
            },
            576: {
                items: 4,
                slideBy: 1
            },
            768: {
                items: 6,
                slideBy: 1
            },
            991: {
                items: 7,
                slideBy: 1
            },
            992: {
                items: 3,
                slideBy: 1
            },
            1400: {
                items: 6,
                slideBy: 1
            }
        }
    });

    /* **************  tooltip */
    $('[data-toggle="tooltip"]').tooltip();

    /* **************  product-carousel */
    /* carousel-lg */
    $('.carousel-lg').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 3,
                slideBy: 2
            },
            1200: {
                items: 4,
                slideBy: 3
            },
            1400: {
                items: 4,
                slideBy: 4
            }
        }
    });
    /* carousel-thumbnails */
    $('.carousel-thumbnails').owlCarousel({
        rtl: true,
        margin: 10,
        nav: false,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 1
            },
            992: {
                items: 3,
                slideBy: 1
            },
            1200: {
                items: 4,
                slideBy: 1
            },
            1400: {
                items: 4,
                slideBy: 1
            }
        }
    });

    /* profile-order-steps */
    $('.profile-order-steps').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 3,
                slideBy: 2
            },
            1200: {
                items: 3,
                slideBy: 3
            },
            1400: {
                items: 3,
                slideBy: 4
            }
        }
    });
    /* carousel-sm */
    $('.carousel-sm').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 9,
                slideBy: 2
            },
            1200: {
                items: 9,
                slideBy: 3
            },
            1400: {
                items: 7,
                slideBy: 4
            }
        }
    });
    /* carousel-md */
    $('.carousel-md').owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 4,
                slideBy: 2
            },
            1200: {
                items: 4,
                slideBy: 3
            },
            1400: {
                items: 5,
                slideBy: 4
            }
        }
    });

    /* ************** suggestion-slider */
    $('#suggestion-slider').owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: true,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar
    });

    function startProgressBar() {
        // apply keyframe animation
        $('.slide-progress').css({
            width: '100%',
            transition: 'width 5000ms'
        });
    }

    function resetProgressBar() {
        $('.slide-progress').css({
            width: 0,
            transition: 'width 0s'
        });
    }

    /* ************** product-gallery */
    var e = document;
    $('.product-carousel').owlCarousel({
        rtl: true,
        items: 1,
        loop: false,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-compact-right"></i>',
            '<i class="bi bi-chevron-compact-left"></i>'
        ],
        onTranslate: function (t) {
            var a = t.item.index,
                e = l('.product-gallery .owl-item')
                    .eq(a)
                    .find('[data-owl]')
                    .attr('data-owl');
            l('.product-thumbnails li ').removeClass('active'),
                l('[href="#' + e + '"]')
                    .parent()
                    .addClass('active'),
                l('[data-owl="' + e + '"]')
                    .parent()
                    .addClass('active');
        }
    });

    if ($.fancybox != undefined) {
        $.fancybox.defaults.hash = false;
        $('.gallery-item').fancybox({
            // hash: true,
            loop: true,
            keyboard: true,
            clickContent: false,
            afterShow: function (e, b) {
                $(
                    `.product-thumbnails .owl-thumbnail[data-slide="${e.currIndex}"]`
                ).trigger('click');
            }
        });
    }

    $('.owl-thumbnail').click(function (e) {
        e.preventDefault();
        var slide = $(this).data('slide');

        $('.product-gallery .product-carousel').trigger(
            'to.owl.carousel',
            slide
        );
    });

    /* ************** sidebar-sticky */
    if ($('.container .sticky-sidebar').length) {
        $('.container .sticky-sidebar').theiaStickySidebar({
            additionalMarginTop: 20
        });
    }

    /* ************** product-params */
    $(document).on('click', '.product-params .sum-more', function () {
        var sumaryBox = $(this).parents('.product-params');
        sumaryBox.toggleClass('active');

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);
    });

    /* ************** horizontal-menu */
    $('.ah-tab-wrapper').horizontalmenu({
        itemClick: function (item) {
            $('.ah-tab-content-wrapper .ah-tab-content').removeAttr(
                'data-ah-tab-active'
            );
            $(
                '.ah-tab-content-wrapper .ah-tab-content:eq(' +
                    $(item).index() +
                    ')'
            ).attr('data-ah-tab-active', 'true');
            return false; //if this finction return true then will be executed http request
        }
    });

    /* ************** shopping */
    $('#btn-checkout-contact-location').click(function () {
        $('.checkout-address').addClass('show');
        $('.checkout-contact-content').addClass('hidden');
    });

    $('#cancel-change-address-btn').click(function () {
        $('.checkout-address').removeClass('show');
        $('.checkout-contact-content').removeClass('hidden');
    });

    /* ************** nice-select */
    if ($('.custom-select-ui').length) {
        $('.custom-select-ui select').niceSelect();
    }

    /* ************** back-to-top */
    $('.back-to-top a').click(function () {
        $('body,html').animate(
            {
                scrollTop: 0
            },
            700
        );
        return false;
    });

    /* ************** responsive-header */
    $('header.main-header button.btn-menu').click(function () {
        $('header.main-header .side-menu').addClass('open');
        $('header.main-header .overlay-side-menu').addClass('show');
    });

    $('header.main-header .overlay-side-menu.show').click(function () {
        $(this).removeClass('show');
        $('header.main-header .side-menu').removeClass('open');
    });
    $('button.btn-menu').on('click', function () {
        $('.overlay-side-menu').fadeIn(200);
        $('header.main-header .side-menu').addClass('open');
    });

    $('.overlay-side-menu').on('click', function () {
        if ($('header.main-header .side-menu').hasClass('open')) {
            $('header.main-header .side-menu').removeClass('open');
        }
        $(this).fadeOut(200);
    });
    $('header.main-header .side-menu li.active')
        .addClass('open')
        .children('ul')
        .show();
    $('header.main-header .side-menu li.sub-menu> a').on('click', function () {
        $(this).removeAttr('href');
        var e = $(this).parent('li');
        if (e.hasClass('open')) {
            e.removeClass('open');
            e.find('li').removeClass('open');
            e.find('ul').slideUp(400);
        } else {
            e.addClass('open');
            e.children('ul').slideDown(400);
            e.siblings('li').children('ul').slideUp(400);
            e.siblings('li').removeClass('open');
        }
    });

    /* ************** colorswitch */
    if ($('#colorswitch-option').length) {
        $('#colorswitch-option button').on('click', function () {
            $('#colorswitch-option ul').toggleClass('show');
        });
        $('#colorswitch-option ul li').on('click', function () {
            $('#colorswitch-option ul li').removeClass('active');
            $(this).addClass('active');
            var colorPath = $(this).attr('data-path');
            $('#colorswitch').attr('href', colorPath);
        });
    }

    /* ************** megamenu */

    $('.f-menu > li').hover(function () {
        $(this)
            .closest('.list-item')
            .find('.f-menu > li')
            .removeClass('active');
        $(this).addClass('active');
    });

    $('.list-item.list-item-has-children.position-static').hover(function () {
        $('.main-content').append('<div class="trasparent-background"></div>');
        setTimeout(function () {
            $('.trasparent-background').css('opacity', '1');
        }, 20);
    });

    $('.list-item.list-item-has-children.position-static').mouseleave(
        function () {
            $('.trasparent-background').remove();
        }
    );

    $(document).on('click', '.add-to-cart-single', function () {
        var btn = this;

        $.ajax({
            type: 'POST',
            url: $(btn).data('action'),
            data: {
                quantity: 1
            },
            success: function (data) {
                if (data.status == 'success') {
                    Swal.fire({
                        type: 'success',
                        title: 'با موفقیت اضافه شد',
                        text: 'محصول مورد نظر با موفقیت به سبد خرید شما اضافه شد برای رزرو محصول سفارش خود را نهایی کنید.',
                        confirmButtonText: 'باشه',
                        footer: '<h5><a href="/cart">مشاهده سبد خرید</a></h5>'
                    });

                    $('#cart-list-item').replaceWith(data.cart);
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'خطا',
                        text: data.message,
                        confirmButtonText: 'باشه',
                        footer: '<h5><a href="/cart">مشاهده سبد خرید</a></h5>'
                    });
                }
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader(
                    'X-CSRF-TOKEN',
                    $('meta[name="csrf-token"]').attr('content')
                );
                block(btn.closest('.cart'));
            },
            complete: function () {
                unblock(btn.closest('.cart'));
            }
        });
    });
});
