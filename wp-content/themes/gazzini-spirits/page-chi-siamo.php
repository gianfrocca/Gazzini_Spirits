<?php
/**
 * Template Name: Chi Siamo
 * Template per la pagina "Chi Siamo"
 *
 * @package Gazzini_Spirits
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Chi Siamo -->
    <section class="hero-section" style="padding: 6rem 0;">
        <div class="hero-content">
            <span class="year-badge" style="font-size: 3rem; background: var(--gazzini-gold); color: var(--gazzini-dark-green); padding: 1rem 2rem; border-radius: 50px; display: inline-block; margin-bottom: 2rem;">1891</span>
            <h1><?php _e('La Storia di Gazzini Spirits', 'gazzini-spirits'); ?></h1>
            <p class="tagline"><?php _e('Oltre 130 anni di tradizione artigianale', 'gazzini-spirits'); ?></p>
        </div>
    </section>

    <!-- Storia -->
    <section style="padding: 4rem 0; background: white;">
        <div class="container" style="max-width: 900px;">
            <h2 class="section-title"><?php _e('Le Nostre Origini', 'gazzini-spirits'); ?></h2>

            <div style="margin-top: 3rem; line-height: 1.8;">
                <p style="font-size: 1.2rem; margin-bottom: 2rem;">
                    <?php _e('Nel 1891, in una piccola distilleria nel cuore dell\'Italia, Giuseppe Gazzini iniziò a produrre liquori artigianali seguendo ricette che aveva appreso durante i suoi viaggi attraverso le Alpi e la regione mediterranea.', 'gazzini-spirits'); ?>
                </p>

                <p style="margin-bottom: 2rem;">
                    <?php _e('La sua passione per le botaniche locali e la dedizione alla qualità lo portarono a creare quello che sarebbe diventato il leggendario Fernet Gazzini, una ricetta segreta che include 27 erbe e spezie accuratamente selezionate.', 'gazzini-spirits'); ?>
                </p>

                <p style="margin-bottom: 2rem;">
                    <?php _e('Generazione dopo generazione, la famiglia Gazzini ha preservato e perfezionato queste ricette tradizionali, pur abbracciando le innovazioni nelle tecniche di distillazione. Oggi, la quinta generazione della famiglia continua questa orgogliosa tradizione.', 'gazzini-spirits'); ?>
                </p>

                <p style="margin-bottom: 2rem;">
                    <?php _e('Nel corso degli anni, abbiamo ampliato la nostra produzione per includere una linea di Gin premium, che celebra le botaniche italiane con la stessa dedizione e attenzione ai dettagli che hanno reso famoso il nostro Fernet.', 'gazzini-spirits'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section style="padding: 4rem 0; background: var(--gazzini-cream);">
        <div class="container">
            <h2 class="section-title"><?php _e('I Nostri Momenti Storici', 'gazzini-spirits'); ?></h2>

            <div style="max-width: 900px; margin: 3rem auto;">
                <div class="timeline-item" style="padding: 2rem; margin-bottom: 2rem; background: white; border-left: 4px solid var(--gazzini-gold); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;">1891</h3>
                    <h4><?php _e('La Fondazione', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Giuseppe Gazzini fonda la distilleria e crea la ricetta originale del Fernet Gazzini.', 'gazzini-spirits'); ?></p>
                </div>

                <div class="timeline-item" style="padding: 2rem; margin-bottom: 2rem; background: white; border-left: 4px solid var(--gazzini-gold); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;">1923</h3>
                    <h4><?php _e('Espansione Nazionale', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Il Fernet Gazzini diventa uno dei liquori più apprezzati in tutta Italia.', 'gazzini-spirits'); ?></p>
                </div>

                <div class="timeline-item" style="padding: 2rem; margin-bottom: 2rem; background: white; border-left: 4px solid var(--gazzini-gold); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;">1965</h3>
                    <h4><?php _e('Modernizzazione', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Investimento in nuovi alambicchi in rame mantenendo i metodi tradizionali di produzione.', 'gazzini-spirits'); ?></p>
                </div>

                <div class="timeline-item" style="padding: 2rem; margin-bottom: 2rem; background: white; border-left: 4px solid var(--gazzini-gold); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;">2005</h3>
                    <h4><?php _e('Nascita del Gin Botanico', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Lanciamo la nostra prima linea di Gin premium utilizzando botaniche italiane.', 'gazzini-spirits'); ?></p>
                </div>

                <div class="timeline-item" style="padding: 2rem; margin-bottom: 2rem; background: white; border-left: 4px solid var(--gazzini-gold); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;">2018</h3>
                    <h4><?php _e('Riserve Speciali', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Introduzione delle Riserve invecchiate in botti di rovere: Gin Riserva Oro e Fernet Riserva 1891.', 'gazzini-spirits'); ?></p>
                </div>

                <div class="timeline-item" style="padding: 2rem; background: white; border-left: 4px solid var(--gazzini-burgundy); border-radius: 5px;">
                    <h3 style="color: var(--gazzini-burgundy); margin-bottom: 0.5rem;"><?php echo date('Y'); ?></h3>
                    <h4><?php _e('Oggi', 'gazzini-spirits'); ?></h4>
                    <p><?php _e('Continuiamo a produrre liquori di eccellenza, onorando la tradizione mentre guardiamo al futuro.', 'gazzini-spirits'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Il Nostro Processo -->
    <section style="padding: 4rem 0; background: white;">
        <div class="container">
            <h2 class="section-title"><?php _e('Il Nostro Metodo', 'gazzini-spirits'); ?></h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🌿</div>
                    <h3><?php _e('Selezione', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Scegliamo personalmente ogni singola botanica, privilegiando fornitori locali e ingredienti di stagione.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">⚗️</div>
                    <h3><?php _e('Distillazione', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Utilizziamo alambicchi tradizionali in rame e distilliamo in piccoli lotti per garantire la massima qualità.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🛢️</div>
                    <h3><?php _e('Invecchiamento', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Le nostre riserve riposano in botti di rovere selezionate, sviluppando complessità e carattere unici.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 4rem; margin-bottom: 1rem;">🍾</div>
                    <h3><?php _e('Imbottigliamento', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Ogni bottiglia viene riempita, tappata e etichettata a mano nella nostra distilleria.', 'gazzini-spirits'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valori -->
    <section style="padding: 4rem 0; background: linear-gradient(135deg, var(--gazzini-dark-green) 0%, var(--gazzini-burgundy) 100%); color: white;">
        <div class="container" style="max-width: 900px; text-align: center;">
            <h2 style="color: var(--gazzini-gold); margin-bottom: 2rem;"><?php _e('I Nostri Valori', 'gazzini-spirits'); ?></h2>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem; margin-top: 3rem;">
                <div>
                    <h3 style="color: var(--gazzini-gold);"><?php _e('Tradizione', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Preserviamo le ricette e i metodi tramandati da oltre 130 anni di storia familiare.', 'gazzini-spirits'); ?></p>
                </div>

                <div>
                    <h3 style="color: var(--gazzini-gold);"><?php _e('Qualità', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Non scendiamo mai a compromessi sulla qualità degli ingredienti e del processo produttivo.', 'gazzini-spirits'); ?></p>
                </div>

                <div>
                    <h3 style="color: var(--gazzini-gold);"><?php _e('Innovazione', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Sperimentiamo continuamente nuove ricette rispettando sempre la nostra eredità.', 'gazzini-spirits'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="padding: 4rem 0; background: var(--gazzini-cream); text-align: center;">
        <div class="container">
            <h2><?php _e('Scopri i Nostri Prodotti', 'gazzini-spirits'); ?></h2>
            <p style="font-size: 1.2rem; margin: 2rem 0;">
                <?php _e('Assapora la tradizione in ogni goccia', 'gazzini-spirits'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="cta-button"><?php _e('Vai allo Shop', 'gazzini-spirits'); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
