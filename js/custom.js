$(document).ready(function () {
  /*$('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,listMonth'
    },
    defaultView: 'agendaWeek',
    slotDuration: '01:00:00',
    allDaySlot: false,
    locale: 'de',
      buttonIcons: true, // show the prev/next text
      weekNumbers: false,
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: './events.php'
    });*/


  $(document).on("scroll", onScroll);

    //smoothscroll
    $('a[href^="/#"]').on('click', function (e) {
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
  });

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
