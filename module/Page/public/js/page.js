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
});