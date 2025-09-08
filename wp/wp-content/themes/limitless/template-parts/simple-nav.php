<div class="header w-full flex justify-between items-center">
    <div class="logo">
        <a href="/">
            <img 
                class="w-auto h-[24px]" 
                src="<?= is_single() || is_archive()
                    ? img_path('img-logo-dark.svg')
                    : img_path('img-logo-light.svg') ?>" 
                alt="Limitless" 
            />
        </a>
    </div>

    <div class="navigation">
        <a class="text-sm font-semibold <?= is_single() || is_archive()
            ? 'text-black'
            : 'text-white' ?> hover:<?= is_single() || is_archive()
     ? 'text-black/80'
     : 'text-white/80' ?> transition" href="/blog">Our blog</a>
    </div>
</div>