<?php
/**
 * Template Name: Contatti
 * Template per la pagina Contatti
 *
 * @package Gazzini_Spirits
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Contatti -->
    <section class="hero-section" style="padding: 4rem 0;">
        <div class="hero-content">
            <h1><?php _e('Contattaci', 'gazzini-spirits'); ?></h1>
            <p class="tagline"><?php _e('Siamo qui per rispondere alle tue domande', 'gazzini-spirits'); ?></p>
        </div>
    </section>

    <!-- Form e Info Contatti -->
    <section style="padding: 4rem 0; background: white;">
        <div class="container" style="max-width: 1200px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 4rem;">

                <!-- Form Contatti -->
                <div>
                    <h2 style="margin-bottom: 2rem;"><?php _e('Inviaci un Messaggio', 'gazzini-spirits'); ?></h2>

                    <form id="contact-form" style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div>
                            <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                                <?php _e('Nome e Cognome *', 'gazzini-spirits'); ?>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                                style="width: 100%; padding: 1rem; border: 2px solid var(--gazzini-cream); border-radius: 5px; font-size: 1rem;"
                            >
                        </div>

                        <div>
                            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                                <?php _e('Email *', 'gazzini-spirits'); ?>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                                style="width: 100%; padding: 1rem; border: 2px solid var(--gazzini-cream); border-radius: 5px; font-size: 1rem;"
                            >
                        </div>

                        <div>
                            <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                                <?php _e('Telefono', 'gazzini-spirits'); ?>
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                style="width: 100%; padding: 1rem; border: 2px solid var(--gazzini-cream); border-radius: 5px; font-size: 1rem;"
                            >
                        </div>

                        <div>
                            <label for="subject" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                                <?php _e('Oggetto *', 'gazzini-spirits'); ?>
                            </label>
                            <select
                                id="subject"
                                name="subject"
                                required
                                style="width: 100%; padding: 1rem; border: 2px solid var(--gazzini-cream); border-radius: 5px; font-size: 1rem;"
                            >
                                <option value=""><?php _e('Seleziona un\'opzione', 'gazzini-spirits'); ?></option>
                                <option value="info"><?php _e('Richiesta Informazioni', 'gazzini-spirits'); ?></option>
                                <option value="ordine"><?php _e('Domande su Ordini', 'gazzini-spirits'); ?></option>
                                <option value="distributore"><?php _e('Diventare Distributore', 'gazzini-spirits'); ?></option>
                                <option value="visita"><?php _e('Visita alla Distilleria', 'gazzini-spirits'); ?></option>
                                <option value="altro"><?php _e('Altro', 'gazzini-spirits'); ?></option>
                            </select>
                        </div>

                        <div>
                            <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">
                                <?php _e('Messaggio *', 'gazzini-spirits'); ?>
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                                style="width: 100%; padding: 1rem; border: 2px solid var(--gazzini-cream); border-radius: 5px; font-size: 1rem; resize: vertical;"
                            ></textarea>
                        </div>

                        <div style="font-size: 0.9rem; color: #666;">
                            <?php _e('* Campi obbligatori', 'gazzini-spirits'); ?>
                        </div>

                        <button type="submit" class="cta-button" style="width: 100%; cursor: pointer; border: none;">
                            <?php _e('Invia Messaggio', 'gazzini-spirits'); ?>
                        </button>
                    </form>
                </div>

                <!-- Informazioni Contatto -->
                <div>
                    <h2 style="margin-bottom: 2rem;"><?php _e('Informazioni di Contatto', 'gazzini-spirits'); ?></h2>

                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        <div style="padding: 2rem; background: var(--gazzini-cream); border-radius: 10px;">
                            <h3 style="color: var(--gazzini-burgundy); margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem;">
                                <span style="font-size: 1.5rem;">📍</span>
                                <?php _e('Sede Principale', 'gazzini-spirits'); ?>
                            </h3>
                            <p style="margin: 0;">
                                <?php _e('Via della Distilleria, 1891', 'gazzini-spirits'); ?><br>
                                <?php _e('12345 Città (Provincia)', 'gazzini-spirits'); ?><br>
                                <?php _e('Italia', 'gazzini-spirits'); ?>
                            </p>
                        </div>

                        <div style="padding: 2rem; background: var(--gazzini-cream); border-radius: 10px;">
                            <h3 style="color: var(--gazzini-burgundy); margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem;">
                                <span style="font-size: 1.5rem;">📧</span>
                                <?php _e('Email', 'gazzini-spirits'); ?>
                            </h3>
                            <p style="margin: 0;">
                                <strong><?php _e('Info Generali:', 'gazzini-spirits'); ?></strong><br>
                                <a href="mailto:info@gazzinispirits.com">info@gazzinispirits.com</a><br><br>
                                <strong><?php _e('Vendite:', 'gazzini-spirits'); ?></strong><br>
                                <a href="mailto:vendite@gazzinispirits.com">vendite@gazzinispirits.com</a><br><br>
                                <strong><?php _e('Supporto:', 'gazzini-spirits'); ?></strong><br>
                                <a href="mailto:supporto@gazzinispirits.com">supporto@gazzinispirits.com</a>
                            </p>
                        </div>

                        <div style="padding: 2rem; background: var(--gazzini-cream); border-radius: 10px;">
                            <h3 style="color: var(--gazzini-burgundy); margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem;">
                                <span style="font-size: 1.5rem;">📞</span>
                                <?php _e('Telefono', 'gazzini-spirits'); ?>
                            </h3>
                            <p style="margin: 0;">
                                <a href="tel:+390123456789">+39 012 345 6789</a><br>
                                <?php _e('Lun-Ven: 9:00 - 18:00', 'gazzini-spirits'); ?>
                            </p>
                        </div>

                        <div style="padding: 2rem; background: var(--gazzini-cream); border-radius: 10px;">
                            <h3 style="color: var(--gazzini-burgundy); margin-bottom: 1rem; display: flex; align-items: center; gap: 1rem;">
                                <span style="font-size: 1.5rem;">👥</span>
                                <?php _e('Social Media', 'gazzini-spirits'); ?>
                            </h3>
                            <div style="display: flex; gap: 1rem;">
                                <a href="#" style="font-size: 1.5rem;">Facebook</a>
                                <a href="#" style="font-size: 1.5rem;">Instagram</a>
                                <a href="#" style="font-size: 1.5rem;">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Orari Visite -->
    <section style="padding: 4rem 0; background: var(--gazzini-cream);">
        <div class="container" style="max-width: 900px; text-align: center;">
            <h2 class="section-title"><?php _e('Visita la Nostra Distilleria', 'gazzini-spirits'); ?></h2>

            <p style="font-size: 1.2rem; margin: 2rem 0;">
                <?php _e('Offriamo tour guidati della distilleria con degustazione dei nostri prodotti.', 'gazzini-spirits'); ?>
            </p>

            <div style="background: white; padding: 3rem; border-radius: 10px; margin-top: 2rem;">
                <h3 style="margin-bottom: 2rem;"><?php _e('Orari dei Tour', 'gazzini-spirits'); ?></h3>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; text-align: left;">
                    <div>
                        <h4 style="color: var(--gazzini-burgundy);"><?php _e('Martedì - Venerdì', 'gazzini-spirits'); ?></h4>
                        <p>14:00 - 16:00 - 18:00</p>
                    </div>

                    <div>
                        <h4 style="color: var(--gazzini-burgundy);"><?php _e('Sabato', 'gazzini-spirits'); ?></h4>
                        <p>10:00 - 12:00 - 14:00 - 16:00</p>
                    </div>

                    <div>
                        <h4 style="color: var(--gazzini-burgundy);"><?php _e('Domenica e Lunedì', 'gazzini-spirits'); ?></h4>
                        <p><?php _e('Chiuso', 'gazzini-spirits'); ?></p>
                    </div>
                </div>

                <p style="margin-top: 2rem; font-weight: 600;">
                    <?php _e('Prenotazione obbligatoria - Durata: 90 minuti - Costo: €25 a persona', 'gazzini-spirits'); ?>
                </p>

                <a href="mailto:visite@gazzinispirits.com" class="cta-button" style="margin-top: 2rem; display: inline-block;">
                    <?php _e('Prenota un Tour', 'gazzini-spirits'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section style="padding: 4rem 0; background: white;">
        <div class="container" style="max-width: 900px;">
            <h2 class="section-title"><?php _e('Domande Frequenti', 'gazzini-spirits'); ?></h2>

            <div style="margin-top: 3rem;">
                <div style="margin-bottom: 2rem; padding: 2rem; border: 2px solid var(--gazzini-cream); border-radius: 10px;">
                    <h3 style="color: var(--gazzini-burgundy);"><?php _e('Quali sono i tempi di consegna?', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('I nostri ordini vengono spediti in 2-3 giorni lavorativi. La spedizione è gratuita per ordini superiori a €50.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="margin-bottom: 2rem; padding: 2rem; border: 2px solid var(--gazzini-cream); border-radius: 10px;">
                    <h3 style="color: var(--gazzini-burgundy);"><?php _e('Posso restituire un prodotto?', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Sì, offriamo resi entro 30 giorni dall\'acquisto per prodotti non aperti. Contattaci per maggiori informazioni.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="margin-bottom: 2rem; padding: 2rem; border: 2px solid var(--gazzini-cream); border-radius: 10px;">
                    <h3 style="color: var(--gazzini-burgundy);"><?php _e('Sono interessato a diventare distributore', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Fantastico! Inviaci un\'email a vendite@gazzinispirits.com con informazioni sulla tua attività.', 'gazzini-spirits'); ?></p>
                </div>

                <div style="padding: 2rem; border: 2px solid var(--gazzini-cream); border-radius: 10px;">
                    <h3 style="color: var(--gazzini-burgundy);"><?php _e('Offrite degustazioni private?', 'gazzini-spirits'); ?></h3>
                    <p><?php _e('Sì, organizziamo eventi di degustazione privati per gruppi. Contattaci per discutere i dettagli.', 'gazzini-spirits'); ?></p>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
// Form submission handling
document.getElementById('contact-form')?.addEventListener('submit', function(e) {
    e.preventDefault();

    // Qui aggiungi la logica per inviare il form via AJAX
    // Per ora mostriamo solo un messaggio di conferma

    alert('<?php _e('Grazie per il tuo messaggio! Ti risponderemo al più presto.', 'gazzini-spirits'); ?>');

    // Reset form
    this.reset();
});
</script>

<?php
get_footer();
