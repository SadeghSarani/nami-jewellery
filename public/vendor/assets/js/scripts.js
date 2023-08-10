function reloadCaptcha() {
    $.ajax({
        url: BASE_URL + '/get-new-captcha',
        type: 'GET',
        data: {},
        success: function (data) {
            $('img.captcha').attr('src', data.captcha);
        }
    });
}

function block(el) {
    var block_ele = $(el);

    // Block Element
    block_ele.block({
        message: '<div class="mdi mdi-refresh icon-spin text-primary"></div>',
        overlayCSS: {
            backgroundColor: '#fff',
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none'
        }
    });
}

function unblock(el) {
    $(el).unblock();

    setTimeout(function () {
        $('[data-toggle="popover"]').popover();
    }, 200);
}

$.ajaxSetup({
    error: function (data) {
        reloadCaptcha();

        if (data.status == 403) {
            toastr.error('اجازه ی دسترسی ندارید', 'خطا', {
                positionClass: 'toast-bottom-left',
                containerId: 'toast-bottom-left'
            });
            return;
        } else if (data.status == 429) {
            toastr.error(
                'تعداد درخواست ها بیش از حد مجاز است لطفا پس از دقایقی مجدد تلاش کنید',
                'خطا',
                {
                    positionClass: 'toast-bottom-left',
                    containerId: 'toast-bottom-left'
                }
            );
            return;
        } else if (data.status == 401) {
            toastr.error('لطفا وارد حساب کاربری خود شوید', {
                positionClass: 'toast-bottom-left',
                containerId: 'toast-bottom-left'
            });
            return;
        } else if (data.status == 500) {
            toastr.error('خطایی در سرور رخ داده است', 'خطا', {
                positionClass: 'toast-bottom-left',
                containerId: 'toast-bottom-left'
            });
            return;
        } else if (!data.responseJSON.errors) {
            toastr.error('خطایی رخ داده است', 'خطا', {
                positionClass: 'toast-bottom-left',
                containerId: 'toast-bottom-left'
            });
            return;
        }

        for (var key in data.responseJSON.errors) {
            // skip loop if the property is from prototype
            if (!data.responseJSON.errors.hasOwnProperty(key)) continue;

            var obj = data.responseJSON.errors[key];
            for (var prop in obj) {
                // skip loop if the property is from prototype
                if (!obj.hasOwnProperty(prop)) continue;

                toastr.error(obj[prop], 'خطا', {
                    positionClass: 'toast-bottom-left',
                    containerId: 'toast-bottom-left'
                });
            }
        }
    }
});

$(document).on('click', '#checkout-link', function () {
    $('#checkout-form').trigger('submit');
});

$('[data-toggle="popover"]').popover();

$('#province').change(function () {
    $('#city').empty();
    $('#city').append('<option value="">انتخاب کنید</option>');
    $('#city').trigger('change');
    $('.custom-select-ui select').niceSelect('update');

    if (!$(this).val()) {
        return;
    }

    var id = $(this).find(':selected').val();

    $.ajax({
        type: 'get',
        url: '/province/get-cities',
        data: {id: id},
        success: function (data) {
            $(data).each(function () {
                $('#city').append(
                    '<option value="' +
                        $(this)[0].id +
                        '">' +
                        $(this)[0].name +
                        '</option>'
                );
            });

            $('.custom-select-ui select').niceSelect('update');
        },
        beforeSend: function () {
            //
        }
    });
});

// **************  search
$('header.main-header .search-area form.search input').keyup(
    delay(function (e) {
        var q = $(this).val();
        q = $.trim(q);

        if (!q) {
            $(
                'header.main-header .search-area form.search .search-result'
            ).removeClass('open');
            $(
                'header.main-header .search-area form.search .close-search-result'
            ).removeClass('show');
            return;
        }

        $.ajax({
            url: '/search',
            type: 'POST',
            data: {
                q: q
            },
            success: function (data) {
                $(
                    'header.main-header .search-area form.search .search-result'
                ).removeClass('open');
                $(
                    'header.main-header .search-area form.search .search-result ul'
                ).empty();
                $(
                    'header.main-header .search-area form.search .close-search-result'
                ).removeClass('show');

                if (data.length) {
                    $(data).each(function (index, el) {
                        $(
                            'header.main-header .search-area form.search .search-result ul'
                        ).append(
                            `<li class="d-flex p-2 px-3">
                                <div>
                                    <img src="${el.image}" alt="${el.title}">
                                </div>
                                <div class="search-result-text">
                                    <div class="search-result-body">
                                        <a class="mr-3" href="${el.link}">${el.title}</a>
                                        <span class="text-muted mr-3">${el.category}</span>
                                    </div>
                                </div>
                                <div class="box-search-price">
                                    <span class="ml-3">${el.price}</span>
                                    <a href="${el.link}" class="d-flex align-items-center">
                                        <i class="mdi mdi-eye text-center search-icon "></i>
                                    </a>
                                </div>
                            </li>`
                        );
                    });
                    // Otherwise show it
                    $(
                        'header.main-header .search-area form.search .search-result'
                    ).addClass('open');
                    $(
                        'header.main-header .search-area form.search .close-search-result'
                    ).addClass('show');
                }
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader(
                    'X-CSRF-TOKEN',
                    $('meta[name="csrf-token"]').attr('content')
                );
            },
            error: function () {
                //
            }
        });
    }, 300)
);

$('header.main-header .search-area form.search .close-search-result').on(
    'click',
    function () {
        $(this).removeClass('show');
        $(
            'header.main-header .search-area form.search .search-result'
        ).removeClass('open');
    }
);

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

$('img.captcha').on('click', reloadCaptcha);

if (typeof $.lazyLoadXT != 'undefined') {
    $.lazyLoadXT.onload.addClass = 'animated fadeIn lazyLoadXT-completed';
    $.lazyLoadXT.selector = 'img[data-src]:not(.lazyLoadXT-completed)';

    setInterval(() => {
        $(window).lazyLoadXT();
    }, 1500);

    $(document).on('lazyerror', function (e, el) {
        $(el).attr('data-src', '');
    });
}

function inputFilter(e) {
    var key = e.keyCode || e.which;

    if (
        (!e.shiftKey && !e.altKey && !e.ctrlKey && key >= 48 && key <= 57) ||
        (key >= 96 && key <= 105) ||
        key == 8 ||
        key == 9 ||
        key == 13 ||
        key == 37 ||
        key == 39
    ) {
    } else {
        return false;
    }

    if ($(e.target).val().length > 0) {
        $(e.target).val('');
    }
}

jQuery.fn.activationCodeInput = function (options) {
    var defaults = {
        number: 4,
        length: 1
    };
    var settings = $.extend({}, defaults, options);

    return this.each(function () {
        var self = $(this);
        var activationCode = $('<div />').addClass('activation-code');
        var placeHolder = self.attr('placeholder');
        activationCode.append($('<span />').text(placeHolder));
        self.replaceWith(activationCode);
        activationCode.append(self);

        var activationCodeInputs = $('<div />').addClass(
            'activation-code-inputs'
        );

        for (var i = 1; i <= settings.number; i++) {
            activationCodeInputs.append(
                $('<input />').attr({
                    maxLength: settings.length,
                    onkeydown: 'return inputFilter(event)',
                    oncopy: 'return false',
                    onpaste: 'return false',
                    oncut: 'return false',
                    ondrag: 'return false',
                    ondrop: 'return false',
                    type: 'number'
                })
            );
        }

        activationCode.prepend(activationCodeInputs);

        activationCode.on('click touchstart', function (event) {
            if (!activationCode.hasClass('active')) {
                activationCode.addClass('active');
                setTimeout(function () {
                    activationCode
                        .find('.activation-code-inputs input:first-child')
                        .focus();
                }, 200);
            }
        });

        activationCode
            .find('.activation-code-inputs')
            .on('keyup input', 'input', function (event) {
                if (
                    $(this).val().toString().length == settings.length ||
                    event.keyCode == 39
                ) {
                    $(this).next().focus();
                    if ($(this).val().toString().length) {
                        $(this).css('border-color', '#46b2f0');
                    }
                }
                if (event.keyCode == 8 || event.keyCode == 37) {
                    $(this).prev().focus();
                    if (!$(this).val().toString().length) {
                        $(this).css('border-color', '#ccc');
                    }
                }
                var value = '';
                activationCode
                    .find('.activation-code-inputs input')
                    .each(function () {
                        value += $(this).val().toString();
                    });
                self.attr({
                    value: value
                });
            });

        $(document).on('click touchstart', function (e) {
            if (
                !$(e.target).parent().is(activationCode) &&
                !$(e.target).is(activationCode) &&
                !$(e.target).parent().parent().is(activationCode)
            ) {
                var hide = true;

                activationCode
                    .find('.activation-code-inputs input')
                    .each(function () {
                        if ($(this).val().toString().length) {
                            hide = false;
                        }
                    });
                if (hide) {
                    activationCode.removeClass('active');
                } else {
                    activationCode.addClass('active');
                }
            }
        });
    });
};

function number_format(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

let intervals = {};

$('.product-special-end-date').each(function (index, el) {
    // Set the date we're counting down to
    var countDownDate = new Date($(el).data('date')).getTime();

    // Update the count down every 1 second
    let x = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(
            (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        $(el).find('[data-days]').text(days);
        $(el).find('[data-hours]').text(hours);
        $(el).find('[data-minutes]').text(minutes);
        $(el).find('[data-seconds]').text(seconds);

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(intervals[index]);
            $(el);
        }
    }, 1000);

    intervals[index] = x;
});
