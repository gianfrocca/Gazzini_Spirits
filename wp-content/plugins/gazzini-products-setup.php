<?php
/**
 * Plugin Name: Gazzini Products Setup
 * Plugin URI: https://gazzinispirits.com
 * Description: Plugin per configurare i prodotti iniziali di Gazzini Spirits (Gin e Fernet)
 * Version: 1.0.0
 * Author: Gazzini Spirits
 * Author URI: https://gazzinispirits.com
 * License: GPL v2 or later
 * Text Domain: gazzini-products
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Crea categorie e prodotti di esempio per Gazzini Spirits
 */
class Gazzini_Products_Setup {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'handle_setup'));
    }

    /**
     * Aggiungi menu amministrazione
     */
    public function add_admin_menu() {
        add_menu_page(
            'Gazzini Setup',
            'Gazzini Setup',
            'manage_options',
            'gazzini-setup',
            array($this, 'admin_page'),
            'dashicons-beer',
            30
        );
    }

    /**
     * Pagina amministrazione
     */
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Configurazione Prodotti Gazzini Spirits</h1>

            <?php if (isset($_GET['setup']) && $_GET['setup'] === 'complete') : ?>
                <div class="notice notice-success">
                    <p>Setup completato con successo! Categorie e prodotti creati.</p>
                </div>
            <?php endif; ?>

            <div class="card">
                <h2>Setup Iniziale</h2>
                <p>Clicca il pulsante qui sotto per creare automaticamente:</p>
                <ul>
                    <li>Categorie prodotto (Gin, Fernet)</li>
                    <li>4 prodotti di esempio</li>
                    <li>Attributi prodotto personalizzati</li>
                </ul>

                <form method="post" action="">
                    <?php wp_nonce_field('gazzini_setup', 'gazzini_setup_nonce'); ?>
                    <p>
                        <button type="submit" name="gazzini_setup" class="button button-primary button-large">
                            Avvia Setup Prodotti
                        </button>
                    </p>
                </form>
            </div>

            <div class="card" style="margin-top: 20px;">
                <h2>Informazioni</h2>
                <p><strong>Plugin Version:</strong> 1.0.0</p>
                <p><strong>WordPress Version:</strong> <?php echo get_bloginfo('version'); ?></p>
                <p><strong>WooCommerce:</strong> <?php echo defined('WC_VERSION') ? WC_VERSION : 'Non installato'; ?></p>
            </div>
        </div>

        <style>
            .card {
                background: white;
                border: 1px solid #ccd0d4;
                box-shadow: 0 1px 1px rgba(0,0,0,.04);
                padding: 20px;
                max-width: 800px;
            }
            .card h2 {
                margin-top: 0;
            }
        </style>
        <?php
    }

    /**
     * Gestisci il setup
     */
    public function handle_setup() {
        if (!isset($_POST['gazzini_setup'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['gazzini_setup_nonce'], 'gazzini_setup')) {
            return;
        }

        if (!current_user_can('manage_options')) {
            return;
        }

        // Verifica che WooCommerce sia attivo
        if (!class_exists('WooCommerce')) {
            wp_die('WooCommerce deve essere installato e attivato.');
        }

        // Crea categorie
        $this->create_categories();

        // Crea prodotti
        $this->create_products();

        // Redirect con messaggio di successo
        wp_redirect(add_query_arg('setup', 'complete', admin_url('admin.php?page=gazzini-setup')));
        exit;
    }

    /**
     * Crea categorie prodotto
     */
    private function create_categories() {
        $categories = array(
            array(
                'name' => 'Gin',
                'slug' => 'gin',
                'description' => 'I nostri Gin artigianali premium, prodotti con botaniche italiane selezionate.'
            ),
            array(
                'name' => 'Fernet',
                'slug' => 'fernet',
                'description' => 'Fernet tradizionale secondo la ricetta storica del 1891.'
            ),
            array(
                'name' => 'Edizioni Limitate',
                'slug' => 'edizioni-limitate',
                'description' => 'Produzioni speciali e riserve esclusive.'
            )
        );

        foreach ($categories as $category) {
            if (!term_exists($category['slug'], 'product_cat')) {
                wp_insert_term(
                    $category['name'],
                    'product_cat',
                    array(
                        'slug' => $category['slug'],
                        'description' => $category['description']
                    )
                );
            }
        }
    }

    /**
     * Crea prodotti di esempio
     */
    private function create_products() {
        $products = array(
            array(
                'name' => 'Gin Botanico Gazzini',
                'price' => '42.00',
                'regular_price' => '42.00',
                'description' => 'Il nostro Gin Botanico è il risultato di una ricerca appassionata sulle migliori botaniche italiane. Prodotto in piccoli lotti, questo gin premium celebra le tradizioni distillatorie della nostra famiglia dal 1891.',
                'short_description' => 'Un gin premium che celebra le botaniche italiane. Note di ginepro, agrumi e erbe aromatiche in perfetto equilibrio.',
                'category' => 'gin',
                'sku' => 'GZN-GIN-001',
                'featured' => true,
                'alcohol' => '43',
                'aging' => 'Non invecchiato',
                'tasting' => 'Note di ginepro fresco, scorza di limone, cardamomo e coriandolo. Finale persistente con sentori di erbe mediterranee.'
            ),
            array(
                'name' => 'Fernet Gazzini Classico',
                'price' => '35.00',
                'regular_price' => '35.00',
                'description' => 'Il Fernet Gazzini Classico è prodotto secondo la ricetta originale del 1891, tramandata di generazione in generazione. Un blend perfetto di 27 erbe e spezie selezionate, macerate e distillate secondo il metodo tradizionale.',
                'short_description' => 'Il nostro Fernet storico, prodotto secondo la ricetta originale del 1891. 27 erbe e spezie selezionate.',
                'category' => 'fernet',
                'sku' => 'GZN-FER-001',
                'featured' => true,
                'alcohol' => '39',
                'aging' => '6 mesi',
                'tasting' => 'Intenso e complesso, con note di mirra, zafferano e rabarbaro. Finale amaro equilibrato con sentori di menta e liquirizia.'
            ),
            array(
                'name' => 'Gin Riserva Oro',
                'price' => '65.00',
                'regular_price' => '68.00',
                'sale_price' => '65.00',
                'description' => 'Il Gin Riserva Oro rappresenta l\'eccellenza della nostra produzione. Dopo la distillazione, questo gin viene invecchiato per 12 mesi in piccole botti di rovere francese che precedentemente contenevano Cognac XO. Il risultato è un gin straordinario con note uniche di vaniglia, caramello e spezie.',
                'short_description' => 'Gin invecchiato in botti di rovere per 12 mesi. Edizione limitata con note di vaniglia e caramello.',
                'category' => array('gin', 'edizioni-limitate'),
                'sku' => 'GZN-GIN-RIS-001',
                'featured' => true,
                'alcohol' => '45',
                'aging' => '12 mesi in botti di rovere',
                'tasting' => 'Botaniche classiche arricchite da note di vaniglia bourbon, caramello e miele. Finale lungo e vellutato con tocchi di cannella e noce moscata.'
            ),
            array(
                'name' => 'Fernet Riserva 1891',
                'price' => '58.00',
                'regular_price' => '58.00',
                'description' => 'La Riserva 1891 è il nostro omaggio alla tradizione familiare. Questo Fernet premium viene invecchiato 18 mesi in botti di rovere, sviluppando una complessità e una morbidezza uniche. Produzione limitata a soli 2000 bottiglie numerate all\'anno.',
                'short_description' => 'Fernet premium invecchiato 18 mesi. Produzione limitata per veri intenditori.',
                'category' => array('fernet', 'edizioni-limitate'),
                'sku' => 'GZN-FER-RIS-001',
                'featured' => true,
                'alcohol' => '42',
                'aging' => '18 mesi in botti di rovere',
                'tasting' => 'Profilo aromatico estremamente complesso con 33 botaniche diverse. Note di erbe alpine, spezie orientali e un finale morbido con sentori di cioccolato fondente e caffè.'
            )
        );

        foreach ($products as $product_data) {
            // Verifica se il prodotto esiste già
            $existing = wc_get_product_id_by_sku($product_data['sku']);
            if ($existing) {
                continue;
            }

            // Crea nuovo prodotto
            $product = new WC_Product_Simple();
            $product->set_name($product_data['name']);
            $product->set_slug(sanitize_title($product_data['name']));
            $product->set_regular_price($product_data['regular_price']);

            if (isset($product_data['sale_price'])) {
                $product->set_sale_price($product_data['sale_price']);
                $product->set_price($product_data['sale_price']);
            } else {
                $product->set_price($product_data['price']);
            }

            $product->set_description($product_data['description']);
            $product->set_short_description($product_data['short_description']);
            $product->set_sku($product_data['sku']);
            $product->set_manage_stock(true);
            $product->set_stock_quantity(100);
            $product->set_stock_status('instock');
            $product->set_featured($product_data['featured']);

            // Salva il prodotto
            $product_id = $product->save();

            // Aggiungi categorie
            $categories = is_array($product_data['category']) ? $product_data['category'] : array($product_data['category']);
            $term_ids = array();

            foreach ($categories as $cat_slug) {
                $term = get_term_by('slug', $cat_slug, 'product_cat');
                if ($term) {
                    $term_ids[] = $term->term_id;
                }
            }

            wp_set_object_terms($product_id, $term_ids, 'product_cat');

            // Aggiungi metadati personalizzati
            update_post_meta($product_id, '_gazzini_alcohol_content', $product_data['alcohol']);
            update_post_meta($product_id, '_gazzini_aging_time', $product_data['aging']);
            update_post_meta($product_id, '_gazzini_tasting_notes', $product_data['tasting']);
        }
    }
}

// Inizializza il plugin
new Gazzini_Products_Setup();
