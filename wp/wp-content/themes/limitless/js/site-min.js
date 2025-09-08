$(document).ready(function () {
  var e = $('#mobile-menu-btn'),
    o = $('#close-mobile-menu-btn'),
    a = $('#mobile-menu'),
    n = $('.case-studies-link'),
    i = $('.case-studies-options');
  (e.on('click', function () {
    (a.fadeToggle(250),
      $('body').addClass('no-scroll'),
      e.addClass('hidden'),
      o.removeClass('hidden'));
  }),
    o.on('click', function () {
      (a.fadeOut(250),
        $('body').removeClass('no-scroll'),
        e.removeClass('hidden'),
        o.addClass('hidden'));
    }),
    e.is(':visible') ? o.addClass('hidden') : e.addClass('hidden'),
    n.on('click', function (e) {
      (e.preventDefault(), i.slideToggle(250));
    }),
    $('#mobile-menu a')
      .not('.case-studies-link')
      .on('click', function (e) {
        var o = $(this).attr('href');
        o.startsWith('#') &&
          (e.preventDefault(),
          a.fadeOut(250),
          $('body').removeClass('no-scroll'),
          $('html, body').animate({ scrollTop: $(o).offset().top }, 1e3));
      }),
    $(window).on('load', function () {
      var e = [],
        o = [];
      function a(n) {
        var i = o[n],
          l = e[n];
        (i.wrap.css('top', '0px'),
          i.wrap.animate({ top: -i.height + 'px' }, l, 'linear', function () {
            a(n);
          }));
      }
      $('.column-scroll').each(function (a) {
        var n = $(this).find('.viewport').find('.image-wrap'),
          i = n.find('img').first();
        ((o[a] = { wrap: n, height: i.height() }), (e[a] = 12e3 * Math.random() + 15e3));
      });
      for (var n = 0; n < o.length; n++) a(n);
    }),
    $('.faq-toggle').click(function () {
      var e = $(this);
      (e.closest('.faq-question').next('.faq-answer').slideToggle(), e.find('img').toggle());
    }),
    $('#open-modal-1').click(function (e) {
      (e.preventDefault(), $('#waitlist-overlay').show(), $('body').addClass('modal-open'));
    }),
    $('#open-modal-2').click(function (e) {
      (e.preventDefault(), $('#waitlist-overlay').show(), $('body').addClass('modal-open'));
    }),
    $('#open-modal-3').click(function (e) {
      (e.preventDefault(), $('#waitlist-overlay').show(), $('body').addClass('modal-open'));
    }),
    $('#close-modal').click(function () {
      ($('#waitlist-overlay').hide(), $('body').removeClass('modal-open'));
    }),
    $('#waitlist-overlay').click(function (e) {
      e.target === this && ($(this).hide(), $('body').removeClass('modal-open'));
    }));
});
