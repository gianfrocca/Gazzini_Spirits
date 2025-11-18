    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php _e('Gazzini Spirits 1891', 'gazzini-spirits'); ?></h3>
                <p><?php _e('Produttori di liquori e distillati artigianali di alta qualità dal 1891.', 'gazzini-spirits'); ?></p>
                <p><?php _e('Tradizione italiana, passione artigianale.', 'gazzini-spirits'); ?></p>
            </div>

            <div class="footer-section">
                <h3><?php _e('Link Utili', 'gazzini-spirits'); ?></h3>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                    ));
                } else {
                    echo '<ul>';
                    echo '<li><a href="' . esc_url(home_url('/chi-siamo/')) . '">' . __('Chi Siamo', 'gazzini-spirits') . '</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/shop/')) . '">' . __('I Nostri Prodotti', 'gazzini-spirits') . '</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/contatti/')) . '">' . __('Contatti', 'gazzini-spirits') . '</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/privacy-policy/')) . '">' . __('Privacy Policy', 'gazzini-spirits') . '</a></li>';
                    echo '</ul>';
                }
                ?>
            </div>

            <div class="footer-section">
                <h3><?php _e('Contatti', 'gazzini-spirits'); ?></h3>
                <ul>
                    <li><?php _e('Email:', 'gazzini-spirits'); ?> <a href="mailto:info@gazzinispirits.com">info@gazzinispirits.com</a></li>
                    <li><?php _e('Tel:', 'gazzini-spirits'); ?> <a href="tel:+390123456789">+39 012 345 6789</a></li>
                    <li><?php _e('Indirizzo: Via della Distilleria, 1891', 'gazzini-spirits'); ?></li>
                    <li><?php _e('Italia', 'gazzini-spirits'); ?></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3><?php _e('Seguici', 'gazzini-spirits'); ?></h3>
                <ul class="social-links">
                    <li><a href="#" target="_blank" rel="noopener">Facebook</a></li>
                    <li><a href="#" target="_blank" rel="noopener">Instagram</a></li>
                    <li><a href="#" target="_blank" rel="noopener">LinkedIn</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Tutti i diritti riservati.', 'gazzini-spirits'); ?></p>
            <p class="age-notice"><?php _e('Bevi responsabilmente. La vendita di alcolici è vietata ai minori di 18 anni.', 'gazzini-spirits'); ?></p>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
