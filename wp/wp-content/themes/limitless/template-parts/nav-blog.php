<div class="header-nav grid grid-cols-12 gap-0 md:gap-12">
    <div class="logo col-span-6 relative top-2 md:-top-[0.25rem] md:col-span-3 z-20">
        <a href="/"><img class="w-auto h-[26px]" src="<?= img_path(
          'img-logo-light.svg'
        ) ?>" alt="Limitless" />
        </a>
    </div>

    <!-- Desktop Navigation -->
    <div id="desktop-menu" class="nav hidden lg:block col-span-6 md:col-span-9 text-right">
        <ul>
            <li class="pricing inline ml-8">
                <a
                class="text-white/50 font-medium text-sm hover:text-white/100 transition-all"
                href="/#pricing"
                >Pricing</a
                >
            </li>
            <li class="how-it-works inline ml-8">
                <a
                class="text-white/50 font-medium text-sm hover:text-white/100 transition-all"
                href="/#how-it-works"
                >How It Works</a
                >
            </li>
            <li class="case-studies inline ml-8">
                <div class="group inline relative group">
                    <a
                        class="text-white/50 font-medium text-sm hover:text-white/100 transition-all inline-flex items-center pb-3 group-hover:text-white/100"
                        href="/#"
                        >Case Studies</a
                    >
                    
                    <ul
                        class="desktop-case-studies-options ml-4 mt-2 absolute hidden group-hover:block group-hover:pr-8 text-left -left-4 top-4 w-[11rem]"
                    >
                        <li>
                        <a
                            class="font-medium text-sm text-white/50 hover:text-white/100 transition-all block mb-1"
                            href="/mybite/"
                            >— Mybite</a
                        >
                        </li>
                        <li>
                        <a
                            class="font-medium text-sm text-white/50 hover:text-white/100 transition-all block"
                            href="/platinum-pets/"
                            >— Platinum Pets</a
                        >
                        </li>
                    </ul>
                </div>
            </li>
            <li class="blog inline ml-8">
                <a
                class="text-white font-medium text-sm hover:text-white/100 transition-all"
                href="/blog/"
                >Blog</a
                >
            </li>
            <li class="faq inline ml-8">
                <a
                class="text-white/50 font-medium text-sm hover:text-white/100 transition-all"
                href="/#faq"
                >FAQ</a
                >
            </li>
        </ul>
    </div>

    <!-- Mobile Navigation -->
    <div class="nav col-span-6 md:col-span-9 lg:hidden flex justify-end">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="block text-white hover:text-white/50 transition-all relative">
            <img src="<?= img_path('img-nav-open.svg') ?>" />
        </button>

        <button id="close-mobile-menu-btn" class="hidden text-white hover:text-white/50 transition-all z-20">
            <img src="<?= img_path('img-nav-close.svg') ?>" />
        </button>

        <!-- Mobile Overlay Menu -->
        <div id="mobile-menu" class="hidden fixed inset-0 z-10 bg-black overflow-hidden">
            <ul class="flex flex-col text-center pt-[50%]">
                <li class="mb-4">
                    <a class="text-white font-medium text-xl hover:text-white/50 transition-all" href="/#pricing">Pricing</a>
                </li>
                <li class="mb-4">
                    <a class="text-white font-medium text-xl hover:text-white/50 transition-all" href="/#how-it-works">How It Works</a>
                </li>
                <li class="mb-4">
                    <a class="text-white font-medium text-xl hover:text-white/100 transition-all case-studies-link" href="/#">Case Studies</a>
                
                    <ul class="case-studies-options hidden ml-4 mt-2">
                        <li class="mb-2">
                            <a class="text-white/50 font-medium text-xl hover:text-white/100 transition-all" href="/mybite/">Mybite</a>
                        </li>
                        <li>
                            <a class="text-white/50 font-medium text-xl hover:text-white/100 transition-all" href="/platinum-pets/">Platinum Pets</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <a class="text-white font-medium text-xl hover:text-white/50 transition-all" href="/blog/">Blog</a>
                </li>
                <li>
                    <a class="text-white font-medium text-xl hover:text-white/50 transition-all" href="/#faq">FAQ</a>
                </li>
            </ul>

            <p class="text-white text-center mt-[10%] opacity-40"><a class="text-[1.5rem]" href="mailto:contact@limitless.email">contact@limitless.email</a></p>

            <p class="text-white text-center mt-6 text-gradient opacity-40">
            <a href="https://twitter.com/limitlessemail">
                <svg
                    class="w-10 h-auto block mx-auto"
                    xmlns="http://www.w3.org/2000/svg"
                    xml:space="preserve"
                    viewBox="0 0 248 204"
                >
                <path
                    fill="#fff"
                    d="M221.95 51.29c.15 2.17.15 4.34.15 6.53 0 66.73-50.8 143.69-143.69 143.69v-.04c-27.44.04-54.31-7.82-77.41-22.64 3.99.48 8 .72 12.02.73 22.74.02 44.83-7.61 62.72-21.66-21.61-.41-40.56-14.5-47.18-35.07 7.57 1.46 15.37 1.16 22.8-.87-23.56-4.76-40.51-25.46-40.51-49.5v-.64c7.02 3.91 14.88 6.08 22.92 6.32C11.58 63.31 4.74 33.79 18.14 10.71c25.64 31.55 63.47 50.73 104.08 52.76-4.07-17.54 1.49-35.92 14.61-48.25 20.34-19.12 52.33-18.14 71.45 2.19 11.31-2.23 22.15-6.38 32.07-12.26-3.77 11.69-11.66 21.62-22.2 27.93 10.01-1.18 19.79-3.86 29-7.95-6.78 10.16-15.32 19.01-25.2 26.16z"
                    />
                </svg>
            </a>
            </p>
        </div>
    </div>
</div>
</div>