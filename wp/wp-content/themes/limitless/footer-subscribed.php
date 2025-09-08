<?=
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Limitless
 */
?>

	<!-- Footer -->
    <div class="footer container box-dark mx-auto mb-4 lg:mb-12 p-8 lg:py-24 text-center">
      <div class="footer-cta">
        <a class="inline-block mb-6" href="/">
          <img
            class="block mx-auto w-auto h-[28px]"
            src="<?= img_path('img-logo-light.svg') ?>"
            alt="Limitless"
          />
        </a>

        <h1
          class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-medium text-white mb-10 tracking-tighter mx-0"
        >
          Unlimited email design.
          <span class="block">One low-priced subscription.</span>
        </h1>

        <a class="button-blue" href="/#pricing">Get started</a>
      </div>

      <div class="hero-logo-cloud mt-12 lg:mt-16 mb-12 lg:mb-0">
        <div class="mx-auto px-6 lg:px-8">
          <div
            class="mx-auto mt-6 grid items-center grid-cols-2 lg:grid-cols-5 gap-0 md:gap-12 xl:gap-16 w-full xl:w-3/4"
          >
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain"
              src="<?= img_path('img-articulate.svg') ?>"
              alt="Articulate"
            />
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain"
              src="<?= img_path('img-mailchimp.svg') ?>"
              alt="Mailchimp"
            />
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain"
              src="<?= img_path('img-microsoft.svg') ?>"
              alt="Microsoft"
            />
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain"
              src="<?= img_path('img-mybite.svg') ?>"
              alt="Mybite"
            />
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain block lg:hidden"
              src="<?= img_path('img-stubhub.svg') ?>"
              alt="StubHub"
            />
            <img
              class="col-span-1 xs:w-full sm:w-2/3 lg:w-full mx-auto lg:mx-0 mb-3 lg:mb-0 object-contain"
              src="<?= img_path('img-uber.svg') ?>"
              alt="Uber"
            />
          </div>
        </div>
      </div>
    </div>
  </body>

  <!-- Cal element-click embed code begins -->
  <script type="text/javascript">
    (function (C, A, L) {
      let p = function (a, ar) {
        a.q.push(ar);
      };
      let d = C.document;
      C.Cal =
        C.Cal ||
        function () {
          let cal = C.Cal;
          let ar = arguments;
          if (!cal.loaded) {
            cal.ns = {};
            cal.q = cal.q || [];
            d.head.appendChild(d.createElement("script")).src = A;
            cal.loaded = true;
          }
          if (ar[0] === L) {
            const api = function () {
              p(api, arguments);
            };
            const namespace = ar[1];
            api.q = api.q || [];
            typeof namespace === "string"
              ? (cal.ns[namespace] = api) && p(api, ar)
              : p(cal, ar);
            return;
          }
          p(cal, ar);
        };
    })(window, "https://app.cal.com/embed/embed.js", "init");
    Cal("init", { origin: "https://app.cal.com" });

    // Important: Please add following attributes to the element you want to open Cal on click
    // `data-cal-link="limitless-email/30min"`
    // `data-cal-config='{"layout":"month_view"}'`

    Cal("ui", {
      styles: { branding: { brandColor: "#000000" } },
      hideEventTypeDetails: false,
      layout: "month_view",
    });
  </script>
  <!-- Cal element-click embed code ends -->

  <script
      src="https://openpanel.dev/op.js"
      defer
      async></script>
    <script>
        window.op = window.op || function (...args) { (window.op.q = window.op.q || []).push(args); };
        window.op('ctor', {
          clientId: '593c28ec-ea83-4dfa-b5fa-d37e177acd66',
          trackScreenViews: true,
          trackOutgoingLinks: true,
          trackAttributes: true,
        });
    </script>

<?php wp_footer(); ?>

</html>
