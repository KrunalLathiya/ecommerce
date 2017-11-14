
jQuery(document).ready(function ($) {

// Fixa navbar ao ultrapassa-lo
    $(window).bind('scroll', function () {
        var navHeight = $(".topbar").height();
        var stickyheight = $('#nav').height();
        if ($(window).scrollTop() > navHeight) {
            $('#nav').addClass('header-stickey');
            $('.wrapper').css('padding-top', stickyheight + 5);
        } else {
            $('#nav').removeClass('header-stickey');
            $('.wrapper').css('padding-top', '0px');
        }
        if ($(window).scrollTop() > (navHeight + 50)) {
            $('#nav').addClass('shrink');
        } else {
            $('#nav').removeClass('shrink');
        }
    });

    $(".search_drop").click(function () {
        $(".search_section").slideToggle();
        return false;
    });

// Back scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back_scroll').fadeIn();
        } else {
            $('#back_scroll').fadeOut();
        }
    });
    $('#back_scroll').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

//Search box toggle
    $(document).ready(function () {
        $(".search_drop").click(function () {
            $(".header-search").slideToggle();
            return false;
        });
    });

//    For the Second level Dropdown menu, highlight the parent
    $(document).ready(function () {
        $(".dropdown-menu")
                .mouseenter(function () {
                    $(this).parent('li').addClass('active');
                })
                .mouseleave(function () {
                    $(this).parent('li').removeClass('active');
                });
    });

// Dropdownsubmenu onclick

});


(function ($) {
    $(document).ready(function () {
        $('ul.multi-level [data-toggle=dropdown]').on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);