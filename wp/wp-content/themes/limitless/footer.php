	<!-- Footer -->
    <div class="footer mx-auto bg-black text-center py-12 md:py-20"> 
        <div class="footer-cta">
            <a class="inline-block mb-4" href="/">
                <img
                    class="block mx-auto w-auto h-[24px]"
                    src="<?= img_path('img-logo-light.svg') ?>"
                    alt="Limitless"
                />
            </a>

            <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-medium text-white mb-16 tracking-tighter mx-0">
                Unlimited email design.
                <span class="block">One low-priced subscription.</span>
            </h1>
        </div>

        <?php get_template_part('template-parts/logo-cloud'); ?>
    </div>
</body>

<?php wp_footer(); ?>

</html>
