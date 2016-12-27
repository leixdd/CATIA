/* jshint browser: true, devel: true*/
/*jshint latedef: true */

(function ($) {

    $(document).ready(function () {

        var t = setInterval(function () {
            $(".slide ul").animate({
                marginLeft: -1214
            }, 10, function () {
                $(this).find("li:last").after($(this).find("li:first"));
                $(this).css({
                    marginLeft: 0
                });
            });
        }, 5000);

        // Add scrollspy to <body>
        $('body').scrollspy({
            target: ".navbar",
            offset: 50
        });

        $(".scroll-up a").on('click', function (event) {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        });


        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });



    });



})(jQuery);