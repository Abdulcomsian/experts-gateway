var windowWidth = $(window).width();
var navigateTestimonials;
var currentTestimonial = $('.testimonial-wrap .item:first-child');
var nextTestimonial = currentTestimonial.next();

$(document).ready(function() {
var min = 3;
var max = 15;
// and the formula is:
var random = Math.floor(Math.random() * (max - min + 1)) + min;
 $('#lawyercount').text(random +' lawyers online');
    $('.toggle-drawer').on('click', function(e) {
        e.preventDefault();

        if($(this).hasClass('open')) {
            $('.drawer').slideUp();
            $(this).removeClass('open');
        } else {
            $('.drawer').slideDown();
            $(this).addClass('open');
        }
    });

    $('ul.menu li.sub-menu > a.toggle').on('click', function(e) {
        e.preventDefault();

        if($(this).hasClass('active')) {
            $(this).removeClass('active').siblings('ul').slideUp();
            $(this).find('i').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
        } else {
            $(this).addClass('active').siblings('ul').slideDown();
            $(this).find('i').html('<span class="glyphicon glyphicon-triangle-top"></span>');
        }
    });

    if($('.account .sidebar').length > 0) {
        if(windowWidth > 767) {
            $('.account .sidebar').css('min-height', $(document).height() - 311 );
        } else {
            $('.account .sidebar').removeAttr('style');
        }
    }

    $('.table-hover tbody tr.linked').on('click', function(e) {
        var url = $(this).attr('data-url');
        window.location.href = url;
    });

    startTestimonialNavigation();

    $('.nav-item').on('click', function() {
        clearInterval(navigateTestimonials);

        nextTestimonial = $('.testimonial-wrap .item:nth-child('+ $(this).attr('data-pos') +')');
        navigateTestimonial();

        startTestimonialNavigation();
    });

});

function navigateTestimonial() {
    if(nextTestimonial.length == 0) {
        nextTestimonial = $('.testimonial-wrap .item:first-child');
    }

    currentTestimonial.fadeOut(function() {
        $(this).removeClass('active');
        $('.testimonial-nav .nav-item').removeClass('active');

        var height = nextTestimonial.height() + 30;
        $('.testimonial-wrap').animate({height: height}, 250);
        $('.testimonial-nav .nav-item:nth-child('+ nextTestimonial.attr('data-pos') +')').addClass('active');

        nextTestimonial.fadeIn(function() {
            $(this).addClass('active');

            currentTestimonial = nextTestimonial;
            nextTestimonial = currentTestimonial.next();
        });
    });
}

function startTestimonialNavigation() {
    clearInterval(navigateTestimonials);
    navigateTestimonials = setInterval(function() {
        navigateTestimonial();
    }, 5000);
}

$(window).resize(function() {
    windowWidth = $(window).width();

    if(windowWidth > 767) {
        $('.account .sidebar').css('min-height', $(document).height() - 311 );
    } else {
        $('.account .sidebar').removeAttr('style');
    }
})
