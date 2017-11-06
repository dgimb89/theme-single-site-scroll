(function($){

    $(function(){

// fit footer
(function(main, meta, fn){

    if (!main.length) return;

    fn = function() {

        main.css('min-height','');

        meta = document.body.getBoundingClientRect();

        if (meta.height < window.innerHeight) {
            main.css('min-height', (main.outerHeight() + (window.innerHeight - meta.height))+'px');
        }

        return fn;
    };

    UIkit.$win.on('load resize', fn());

})($('#tm-main'));

});

    $(document).on("scroll", onScroll);

//smoothscroll
$('a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    $(document).off("scroll");

    $('a').each(function () {
        $(this).removeClass('active');
    })
    $(this).addClass('active');

    var target = this.hash,
    menu = target;
    $target = $(target);
    $('html, body').stop().animate({
        'scrollTop': $target.offset().top+2
    }, 500, 'swing', function () {
        window.location.hash = target;
        $(document).on("scroll", onScroll);
    });
});

})(jQuery);

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('nav a[href^="#"]').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('nav a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}
