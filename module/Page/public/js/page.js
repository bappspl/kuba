//$("#full-img-slide").backstretch([
//    "img/image-1.jpg"
//], {
//    fade: 750,
//    duration: 6000
//});
$(document).ready(function(){
    $(function(){
        var shrinkHeader = 250;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if ( scroll >= shrinkHeader ) {
                $('.top-navbar').addClass('shrink-nav');
            }
            else {
                $('.top-navbar').removeClass('shrink-nav');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    $('#newsletter').submit(function(e) {
        e.preventDefault();
        var email = $('#newsletter input[type="email"]').val();
        $.ajax({
            type: "POST",
            url: "/save-new-subscriber",
            dataType : 'json',
            data: {
                email: email
            },
            success: function(json)
            {
                $('#newsletter input[type="email"]').val('');
                $('#newsletterModal').modal('show');
            }
        });
    });

    if ($('.zoom-gallery').length > 0){
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title'); // + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }

        });
    }

    if ($('#contact-form').length > 0){
        $('#contact-form').submit(function (e) {
            e.preventDefault();

            var name = $('#contact-form input[name="name"]').val();
            var email = $('#contact-form input[name="email"]').val();
            var text = $('#contact-form textarea[name="text"]').val();

            $.ajax({
                type: "POST",
                url: "/contact-form",
                dataType : 'json',
                data: {
                    name: name,
                    email: email,
                    text: text
                },
                success: function(json)
                {
                    $('#contact-form input[name="name"]').val('');
                    $('#contact-form input[name="email"]').val('');
                    $('#contact-form textarea[name="text"]').val('');
                    $('#contactModal').modal('show');
                }
            });
        });
    }
});