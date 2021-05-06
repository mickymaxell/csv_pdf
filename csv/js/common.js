$(document).ready(function () {
    // Bootstrap Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover'
    });

    // Fixed Header on Scroll
    scrollHeaderClass();

    // Multi Level Dropdown
    $('#main_navbar').bootnavbar();
    
    // Notification Slider
    $(".regular").slick({
        autoplay: true,
        speed: 2000,
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
    $(".placement").slick({
        autoplay: true,
        speed: 2000,
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 3
    });
    $(".alumni").slick({
        autoplay: true,
        speed: 2000,
        dots: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 3
    });

    $(window).resize(function () {
        scrollHeaderClass();
    });
});

// Add Class to Header on Scroll
function scrollHeaderClass() {
    if ($('header').length !== 0) {
        var header = $("header");
        var scroll = $(window).scrollTop();
        if (scroll >= 30) {
            header.addClass("fixedHeader");
        } else {
            header.removeClass("fixedHeader");
        }
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 30) {
                header.addClass("fixedHeader");
            } else {
                header.removeClass("fixedHeader");
            }
        });
    }
}