<?php
/**
 * Plugin Name: Gazzini Age Verification
 * Plugin URI: https://gazzinispirits.com
 * Description: Sistema di verifica età (+18) obbligatorio per la vendita di bevande alcoliche. Conforme alle normative italiane.
 * Version: 1.0.0
 * Author: Gazzini Spirits
 * Author URI: https://gazzinispirits.com
 * License: GPL v2 or later
 * Text Domain: gazzini-age
 */

if (!defined('ABSPATH')) {
    exit;
}

class Gazzini_Age_Verification {

    /**
     * Età minima richiesta
     */
    const MINIMUM_AGE = 18;

    /**
     * Cookie name
     */
    const COOKIE_NAME = 'gazzini_age_verified';

    /**
     * Cookie expiration (in days)
     */
    const COOKIE_EXPIRATION = 30;

    /**
     * Costruttore
     */
    public function __construct() {
        // Aggiungi script e stili frontend
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));

        // Aggiungi HTML del modal al footer
        add_action('wp_footer', array($this, 'render_age_gate'));

        // Aggiungi menu admin
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Registra settings
        add_action('admin_init', array($this, 'register_settings'));

        // AJAX handler per verifica età
        add_action('wp_ajax_verify_age', array($this, 'ajax_verify_age'));
        add_action('wp_ajax_nopriv_verify_age', array($this, 'ajax_verify_age'));
    }

    /**
     * Enqueue script e stili
     */
    public function enqueue_scripts() {
        // Stili
        wp_enqueue_style(
            'gazzini-age-verification',
            plugin_dir_url(__FILE__) . 'age-verification.css',
            array(),
            '1.0.0'
        );

        // Script
        wp_enqueue_script(
            'gazzini-age-verification',
            plugin_dir_url(__FILE__) . 'age-verification.js',
            array('jquery'),
            '1.0.0',
            true
        );

        // Localizza script
        wp_localize_script('gazzini-age-verification', 'gazziniAge', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('gazzini_age_nonce'),
            'cookieName' => self::COOKIE_NAME,
            'cookieDays' => self::COOKIE_EXPIRATION,
            'minimumAge' => self::MINIMUM_AGE,
            'enabled' => get_option('gazzini_age_enabled', '1'),
            'rememberEnabled' => get_option('gazzini_age_remember', '1'),
        ));
    }

    /**
     * Renderizza l'age gate modal
     */
    public function render_age_gate() {
        // Verifica se è abilitato
        if (get_option('gazzini_age_enabled', '1') !== '1') {
            return;
        }

        // Testo personalizzabile
        $title = get_option('gazzini_age_title', __('Benvenuto su Gazzini Spirits 1891', 'gazzini-age'));
        $message = get_option('gazzini_age_message', __('Questo sito contiene informazioni su bevande alcoliche.', 'gazzini-age'));
        $question = get_option('gazzini_age_question', __('Hai almeno 18 anni?', 'gazzini-age'));
        $yes_text = get_option('gazzini_age_yes', __('Sì, ho 18 anni o più', 'gazzini-age'));
        $no_text = get_option('gazzini_age_no', __('No, ho meno di 18 anni', 'gazzini-age'));
        $remember_text = get_option('gazzini_age_remember_text', __('Ricordami per 30 giorni', 'gazzini-age'));
        $deny_message = get_option('gazzini_age_deny', __('Siamo spiacenti, devi avere almeno 18 anni per accedere a questo sito.', 'gazzini-age'));

        ?>
        <div id="gazzini-age-gate" class="gazzini-age-overlay" style="display: none;">
            <div class="gazzini-age-modal">
                <div class="gazzini-age-content">
                    <!-- Logo/Icona -->
                    <div class="gazzini-age-icon">
                        <span class="age-badge">1891</span>
                    </div>

                    <!-- Titolo -->
                    <h2 class="gazzini-age-title"><?php echo esc_html($title); ?></h2>

                    <!-- Messaggio -->
                    <p class="gazzini-age-message"><?php echo esc_html($message); ?></p>

                    <!-- Domanda -->
                    <p class="gazzini-age-question"><strong><?php echo esc_html($question); ?></strong></p>

                    <!-- Checkbox Ricordami -->
                    <?php if (get_option('gazzini_age_remember', '1') === '1') : ?>
                        <div class="gazzini-age-remember">
                            <label>
                                <input type="checkbox" id="gazzini-remember-me" value="1">
                                <?php echo esc_html($remember_text); ?>
                            </label>
                        </div>
                    <?php endif; ?>

                    <!-- Bottoni -->
                    <div class="gazzini-age-buttons">
                        <button type="button" id="gazzini-age-confirm" class="gazzini-age-btn gazzini-age-btn-yes">
                            <?php echo esc_html($yes_text); ?>
                        </button>
                        <button type="button" id="gazzini-age-deny" class="gazzini-age-btn gazzini-age-btn-no">
                            <?php echo esc_html($no_text); ?>
                        </button>
                    </div>

                    <!-- Messaggio di negazione (nascosto di default) -->
                    <div id="gazzini-age-denied" class="gazzini-age-denied" style="display: none;">
                        <p><?php echo esc_html($deny_message); ?></p>
                    </div>

                    <!-- Legal notice -->
                    <div class="gazzini-age-legal">
                        <small>
                            <?php _e('La vendita e il consumo di bevande alcoliche sono vietati ai minori di 18 anni.', 'gazzini-age'); ?>
                            <br>
                            <?php _e('Bevi responsabilmente.', 'gazzini-age'); ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * AJAX handler per verifica età
     */
    public function ajax_verify_age() {
        check_ajax_referer('gazzini_age_nonce', 'nonce');

        $verified = isset($_POST['verified']) && $_POST['verified'] === 'yes';
        $remember = isset($_POST['remember']) && $_POST['remember'] === '1';

        if ($verified) {
            // Imposta cookie se "ricordami" è selezionato
            if ($remember && get_option('gazzini_age_remember', '1') === '1') {
                $expiration = time() + (self::COOKIE_EXPIRATION * DAY_IN_SECONDS);
                setcookie(self::COOKIE_NAME, '1', $expiration, '/');
            }

            wp_send_json_success(array(
                'message' => __('Verifica completata', 'gazzini-age')
            ));
        } else {
            wp_send_json_error(array(
                'message' => __('Accesso negato', 'gazzini-age')
            ));
        }
    }

    /**
     * Aggiungi menu admin
     */
    public function add_admin_menu() {
        add_options_page(
            __('Verifica Età', 'gazzini-age'),
            __('Verifica Età', 'gazzini-age'),
            'manage_options',
            'gazzini-age-verification',
            array($this, 'admin_page')
        );
    }

    /**
     * Registra settings
     */
    public function register_settings() {
        register_setting('gazzini_age_settings', 'gazzini_age_enabled');
        register_setting('gazzini_age_settings', 'gazzini_age_remember');
        register_setting('gazzini_age_settings', 'gazzini_age_title');
        register_setting('gazzini_age_settings', 'gazzini_age_message');
        register_setting('gazzini_age_settings', 'gazzini_age_question');
        register_setting('gazzini_age_settings', 'gazzini_age_yes');
        register_setting('gazzini_age_settings', 'gazzini_age_no');
        register_setting('gazzini_age_settings', 'gazzini_age_remember_text');
        register_setting('gazzini_age_settings', 'gazzini_age_deny');
    }

    /**
     * Pagina admin
     */
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Impostazioni Verifica Età', 'gazzini-age'); ?></h1>

            <form method="post" action="options.php">
                <?php
                settings_fields('gazzini_age_settings');
                do_settings_sections('gazzini_age_settings');
                ?>

                <table class="form-table">
                    <tr>
                        <th scope="row"><?php _e('Abilita Verifica Età', 'gazzini-age'); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="gazzini_age_enabled" value="1" <?php checked(get_option('gazzini_age_enabled', '1'), '1'); ?>>
                                <?php _e('Mostra il popup di verifica età', 'gazzini-age'); ?>
                            </label>
                            <p class="description"><?php _e('Obbligatorio per la vendita di alcolici in Italia', 'gazzini-age'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Abilita "Ricordami"', 'gazzini-age'); ?></th>
                        <td>
                            <label>
                                <input type="checkbox" name="gazzini_age_remember" value="1" <?php checked(get_option('gazzini_age_remember', '1'), '1'); ?>>
                                <?php _e('Permetti agli utenti di salvare la verifica per 30 giorni', 'gazzini-age'); ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Titolo', 'gazzini-age'); ?></th>
                        <td>
                            <input type="text" name="gazzini_age_title" value="<?php echo esc_attr(get_option('gazzini_age_title', __('Benvenuto su Gazzini Spirits 1891', 'gazzini-age'))); ?>" class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Messaggio', 'gazzini-age'); ?></th>
                        <td>
                            <textarea name="gazzini_age_message" rows="3" class="large-text"><?php echo esc_textarea(get_option('gazzini_age_message', __('Questo sito contiene informazioni su bevande alcoliche.', 'gazzini-age'))); ?></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Domanda', 'gazzini-age'); ?></th>
                        <td>
                            <input type="text" name="gazzini_age_question" value="<?php echo esc_attr(get_option('gazzini_age_question', __('Hai almeno 18 anni?', 'gazzini-age'))); ?>" class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Testo Bottone "Sì"', 'gazzini-age'); ?></th>
                        <td>
                            <input type="text" name="gazzini_age_yes" value="<?php echo esc_attr(get_option('gazzini_age_yes', __('Sì, ho 18 anni o più', 'gazzini-age'))); ?>" class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Testo Bottone "No"', 'gazzini-age'); ?></th>
                        <td>
                            <input type="text" name="gazzini_age_no" value="<?php echo esc_attr(get_option('gazzini_age_no', __('No, ho meno di 18 anni', 'gazzini-age'))); ?>" class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Testo "Ricordami"', 'gazzini-age'); ?></th>
                        <td>
                            <input type="text" name="gazzini_age_remember_text" value="<?php echo esc_attr(get_option('gazzini_age_remember_text', __('Ricordami per 30 giorni', 'gazzini-age'))); ?>" class="regular-text">
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><?php _e('Messaggio di Negazione', 'gazzini-age'); ?></th>
                        <td>
                            <textarea name="gazzini_age_deny" rows="2" class="large-text"><?php echo esc_textarea(get_option('gazzini_age_deny', __('Siamo spiacenti, devi avere almeno 18 anni per accedere a questo sito.', 'gazzini-age'))); ?></textarea>
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>

            <hr>

            <h2><?php _e('Normativa Italiana', 'gazzini-age'); ?></h2>
            <div class="notice notice-info inline">
                <p>
                    <strong><?php _e('Requisiti legali:', 'gazzini-age'); ?></strong><br>
                    <?php _e('In Italia, la vendita di bevande alcoliche ai minori di 18 anni è vietata (Legge n. 125/2001).', 'gazzini-age'); ?><br>
                    <?php _e('Questo sistema di verifica età aiuta a garantire la conformità alla normativa.', 'gazzini-age'); ?>
                </p>
                <p>
                    <strong><?php _e('Note importanti:', 'gazzini-age'); ?></strong>
                </p>
                <ul>
                    <li><?php _e('✓ Il sistema blocca l\'accesso finché l\'utente non conferma di avere 18+ anni', 'gazzini-age'); ?></li>
                    <li><?php _e('✓ La verifica può essere salvata per 30 giorni (cookie)', 'gazzini-age'); ?></li>
                    <li><?php _e('✓ Gli utenti che rifiutano vengono bloccati', 'gazzini-age'); ?></li>
                    <li><?php _e('✓ Messaggio di disclaimer legale sempre visibile', 'gazzini-age'); ?></li>
                </ul>
            </div>

            <h2><?php _e('Privacy & Cookie', 'gazzini-age'); ?></h2>
            <div class="notice notice-warning inline">
                <p>
                    <?php _e('Ricorda di aggiungere nella tua Cookie Policy:', 'gazzini-age'); ?>
                </p>
                <p>
                    <em>"Utilizziamo un cookie tecnico per ricordare la verifica dell'età. Questo cookie ha durata di 30 giorni e contiene solo un valore di conferma (1=verificato). Non raccogliamo informazioni personali tramite questo cookie."</em>
                </p>
            </div>
        </div>

        <style>
            .notice.inline {
                padding: 12px;
                margin-top: 10px;
            }
            .notice.inline ul {
                margin-left: 20px;
            }
        </style>
        <?php
    }
}

// Inizializza il plugin
new Gazzini_Age_Verification();
