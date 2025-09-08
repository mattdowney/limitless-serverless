$(document).ready(function () {
  // Responsive navigation
  var mobileMenuBtn = $('#mobile-menu-btn');
  var closeMobileMenuBtn = $('#close-mobile-menu-btn');
  var mobileMenu = $('#mobile-menu');
  var caseStudiesLink = $('.case-studies-link');
  var caseStudiesOptions = $('.case-studies-options');

  mobileMenuBtn.on('click', function () {
    mobileMenu.fadeToggle(250);
    $('body').addClass('no-scroll');
    mobileMenuBtn.addClass('hidden');
    closeMobileMenuBtn.removeClass('hidden');
  });

  closeMobileMenuBtn.on('click', function () {
    mobileMenu.fadeOut(250);
    $('body').removeClass('no-scroll');
    mobileMenuBtn.removeClass('hidden');
    closeMobileMenuBtn.addClass('hidden');
  });

  // Additional code to handle initial visibility
  if (mobileMenuBtn.is(':visible')) {
    closeMobileMenuBtn.addClass('hidden');
  } else {
    mobileMenuBtn.addClass('hidden');
  }

  caseStudiesLink.on('click', function (e) {
    e.preventDefault();
    caseStudiesOptions.slideToggle(250);
  });

  // Smooth scrolling to anchor links
  $('#mobile-menu a')
    .not('.case-studies-link')
    .on('click', function (e) {
      var target = $(this).attr('href');
      if (target.startsWith('#')) {
        e.preventDefault();
        mobileMenu.fadeOut(250);
        $('body').removeClass('no-scroll');
        $('html, body').animate(
          {
            scrollTop: $(target).offset().top,
          },
          1000
        );
      }
    });

  // Case studies
  $(window).on('load', function () {
    var speeds = [];
    var images = [];

    // Generate random speeds for each column
    $('.column-scroll').each(function (index) {
      var viewport = $(this).find('.viewport');
      var wrap = viewport.find('.image-wrap');
      var img = wrap.find('img').first();

      images[index] = { wrap: wrap, height: img.height() };
      speeds[index] = Math.random() * 12000 + 15000; // Animation durations between 5000 and 10000ms
    });

    function animateImage(index) {
      var image = images[index];
      var speed = speeds[index];

      // Reset position
      image.wrap.css('top', '0px');

      // Animate
      image.wrap.animate({ top: -image.height + 'px' }, speed, 'linear', function () {
        animateImage(index); // When the animation completes, start it again
      });
    }

    // Start animations
    for (var i = 0; i < images.length; i++) {
      animateImage(i);
    }
  });

  // FAQ
  $('.faq-toggle').click(function () {
    var $faqToggle = $(this);
    var $faqAnswer = $faqToggle.closest('.faq-question').next('.faq-answer');

    // Toggle the visibility of the FAQ answer
    $faqAnswer.slideToggle();

    // Toggle the visibility of the open/close icons
    $faqToggle.find('img').toggle();
  });

  // Waitlist modal
  $('body').on('click', '.waitlist-launch, [id^="open-modal"]', function (e) {
    e.preventDefault();
    $('#waitlist-overlay').show();
    $('.waitlist-modal').addClass('active');
    $('body').addClass('modal-open');
  });

  // Close the modal when clicking the close button
  $('#close-modal').on('click', function () {
    $('.waitlist-modal').removeClass('active');
    $('#waitlist-overlay').hide();
    $('body').removeClass('modal-open');
  });

  // Close the modal when clicking outside the modal content
  $('#waitlist-overlay').on('click', function (e) {
    if (e.target === this) {
      $('.waitlist-modal').removeClass('active');
      $(this).hide();
      $('body').removeClass('modal-open');
    }
  });
});
