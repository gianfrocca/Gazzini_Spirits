<?php
/**
 * Template per la homepage
 *
 * @package Gazzini_Spirits
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1><?php _e('Gazzini Spirits 1891', 'gazzini-spirits'); ?></h1>
            <p class="tagline"><?php _e('Tradizione Italiana, Passione Artigianale', 'gazzini-spirits'); ?></p>
            <p><?php _e('Dal 1891 produciamo liquori e distillati di eccellenza, unendo ricette tradizionali e innovazione.', 'gazzini-spirits'); ?></p>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="cta-button"><?php _e('Scopri i Nostri Prodotti', 'gazzini-spirits'); ?></a>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section">
        <div class="container">
            <h2 class="section-title"><?php _e('Le Nostre Specialità', 'gazzini-spirits'); ?></h2>

            <?php if (function_exists('woocommerce_content')) : ?>
                <div class="products-grid">
                    <?php
                    echo do_shortcode('[products limit="4" columns="2" orderby="popularity" visibility="featured"]');
                    ?>
                </div>
            <?php else : ?>
                <!-- Placeholder prodotti se WooCommerce non è attivo -->
                <div class="products-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <span style="font-size: 5rem;">🍸</span>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php _e('Gin Botanico Gazzini', 'gazzini-spirits'); ?></h3>
                            <p class="product-price">€42,00</p>
                            <p class="product-description">
                                <?php _e('Un gin premium che celebra le botaniche italiane. Note di ginepro, agrumi e erbe aromatiche in perfetto equilibrio.', 'gazzini-spirits'); ?>
                            </p>
                            <button class="add-to-cart"><?php _e('Acquista Ora', 'gazzini-spirits'); ?></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <span style="font-size: 5rem;">🥃</span>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php _e('Fernet Gazzini Classico', 'gazzini-spirits'); ?></h3>
                            <p class="product-price">€35,00</p>
                            <p class="product-description">
                                <?php _e('Il nostro Fernet storico, prodotto secondo la ricetta originale del 1891. 27 erbe e spezie selezionate.', 'gazzini-spirits'); ?>
                            </p>
                            <button class="add-to-cart"><?php _e('Acquista Ora', 'gazzini-spirits'); ?></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <span style="font-size: 5rem;">🍸</span>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php _e('Gin Riserva Oro', 'gazzini-spirits'); ?></h3>
                            <p class="product-price">€65,00</p>
                            <p class="product-description">
                                <?php _e('Gin invecchiato in botti di rovere per 12 mesi. Edizione limitata con note di vaniglia e caramello.', 'gazzini-spirits'); ?>
                            </p>
                            <button class="add-to-cart"><?php _e('Acquista Ora', 'gazzini-spirits'); ?></button>
                        </div>
                    </div>

                    <div class="product-card">
                        <div class="product-image">
                            <span style="font-size: 5rem;">🥃</span>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php _e('Fernet Riserva 1891', 'gazzini-spirits'); ?></h3>
                            <p class="product-price">€58,00</p>
                            <p class="product-description">
                                <?php _e('Fernet premium invecchiato 18 mesi. Produzione limitata per veri intenditori.', 'gazzini-spirits'); ?>
                            </p>
                            <button class="add-to-cart"><?php _e('Acquista Ora', 'gazzini-spirits'); ?></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="cta-button"><?php _e('Vedi Tutti i Prodotti', 'gazzini-spirits'); ?></a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="about-content">
            <span class="year-badge">1891</span>
            <h2><?php _e('Una Storia di Passione', 'gazzini-spirits'); ?></h2>
            <p>
                <?php _e('Da oltre 130 anni la famiglia Gazzini produce liquori e distillati di eccellenza, seguendo le ricette tramandate di generazione in generazione.', 'gazzini-spirits'); ?>
            </p>
            <p>
                <?php _e('Ogni bottiglia che produciamo è il risultato di una sapiente combinazione tra tradizione artigianale e moderne tecniche di distillazione, per garantire sempre la massima qualità.', 'gazzini-spirits'); ?>
            </p>
            <p>
                <?php _e('Il nostro Gin e il nostro Fernet sono ambasciatori del gusto italiano nel mondo, apprezzati dai più esigenti intenditori.', 'gazzini-spirits'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/chi-siamo/')); ?>" class="cta-button"><?php _e('La Nostra Storia', 'gazzini-spirits'); ?></a>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section" style="padding: 4rem 0; background: white;">
        <div class="container">
            <h2 class="section-title"><?php _e('I Nostri Valori', 'gazzini-spirits'); ?></h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🌿</div>
                    <h3><?php _e('Ingredienti Naturali', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Utilizziamo solo botaniche e ingredienti naturali selezionati, senza additivi artificiali.', 'gazzini-spirits'); ?></p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">⚗️</div>
                    <h3><?php _e('Metodo Artigianale', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Ogni prodotto è realizzato seguendo metodi tradizionali con attenzione ai dettagli.', 'gazzini-spirits'); ?></p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏆</div>
                    <h3><?php _e('Eccellenza Italiana', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Rappresentiamo il meglio della tradizione distillatoria italiana nel mondo.', 'gazzini-spirits'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section" style="background: linear-gradient(135deg, #1a3a2e 0%, #6b1f3a 100%); color: white; padding: 4rem 0; text-align: center;">
        <div class="container">
            <h2 style="color: #d4af37; margin-bottom: 1rem;"><?php _e('Rimani Aggiornato', 'gazzini-spirits'); ?></h2>
            <p style="margin-bottom: 2rem; font-size: 1.1rem;">
                <?php _e('Iscriviti alla nostra newsletter per ricevere offerte esclusive e novità sui nostri prodotti.', 'gazzini-spirits'); ?>
            </p>
            <form style="max-width: 500px; margin: 0 auto; display: flex; gap: 1rem;">
                <input type="email" placeholder="<?php _e('La tua email', 'gazzini-spirits'); ?>" style="flex: 1; padding: 1rem; border: none; border-radius: 50px;">
                <button type="submit" class="cta-button"><?php _e('Iscriviti', 'gazzini-spirits'); ?></button>
            </form>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
