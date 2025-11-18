<?php
/**
 * Gazzini Spirits 1891 Theme Functions
 *
 * @package Gazzini_Spirits
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Costanti del tema
 */
define('GAZZINI_VERSION', '1.0.0');
define('GAZZINI_THEME_DIR', get_template_directory());
define('GAZZINI_THEME_URI', get_template_directory_uri());

/**
 * Setup del tema
 */
function gazzini_theme_setup() {
    // Supporto per traduzioni
    load_theme_textdomain('gazzini-spirits', GAZZINI_THEME_DIR . '/languages');

    // Supporto per feed automatici
    add_theme_support('automatic-feed-links');

    // Supporto per title tag
    add_theme_support('title-tag');

    // Supporto per immagini in evidenza
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 600, true);

    // Dimensioni immagini personalizzate per i prodotti
    add_image_size('gazzini-product-thumb', 400, 500, true);
    add_image_size('gazzini-product-large', 800, 1000, true);
    add_image_size('gazzini-hero', 1920, 800, true);

    // Supporto per HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));

    // Supporto per formati post
    add_theme_support('post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
    ));

    // Supporto per logo personalizzato
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 350,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Supporto per WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Menu di navigazione
    register_nav_menus(array(
        'primary'   => __('Menu Principale', 'gazzini-spirits'),
        'footer'    => __('Menu Footer', 'gazzini-spirits'),
        'social'    => __('Menu Social', 'gazzini-spirits'),
    ));

    // Supporto per editor visuale
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');

    // Supporto per colori personalizzati
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Dark Green', 'gazzini-spirits'),
            'slug'  => 'dark-green',
            'color' => '#1a3a2e',
        ),
        array(
            'name'  => __('Gold', 'gazzini-spirits'),
            'slug'  => 'gold',
            'color' => '#d4af37',
        ),
        array(
            'name'  => __('Burgundy', 'gazzini-spirits'),
            'slug'  => 'burgundy',
            'color' => '#6b1f3a',
        ),
        array(
            'name'  => __('Cream', 'gazzini-spirits'),
            'slug'  => 'cream',
            'color' => '#f4f1e8',
        ),
    ));
}
add_action('after_setup_theme', 'gazzini_theme_setup');

/**
 * Registrazione aree widget
 */
function gazzini_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principale', 'gazzini-spirits'),
        'id'            => 'sidebar-1',
        'description'   => __('Sidebar principale del sito', 'gazzini-spirits'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 1', 'gazzini-spirits'),
        'id'            => 'footer-1',
        'description'   => __('Prima area del footer', 'gazzini-spirits'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 2', 'gazzini-spirits'),
        'id'            => 'footer-2',
        'description'   => __('Seconda area del footer', 'gazzini-spirits'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Area 3', 'gazzini-spirits'),
        'id'            => 'footer-3',
        'description'   => __('Terza area del footer', 'gazzini-spirits'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Shop Sidebar', 'gazzini-spirits'),
        'id'            => 'shop-sidebar',
        'description'   => __('Sidebar per le pagine shop WooCommerce', 'gazzini-spirits'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'gazzini_widgets_init');

/**
 * Enqueue degli script e degli stili
 */
function gazzini_scripts() {
    // Font Google
    wp_enqueue_style('gazzini-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Lato:wght@300;400;700&display=swap',
        array(),
        null
    );

    // Stile principale
    wp_enqueue_style('gazzini-style', get_stylesheet_uri(), array(), GAZZINI_VERSION);

    // Script principale
    wp_enqueue_script('gazzini-script',
        GAZZINI_THEME_URI . '/js/main.js',
        array('jquery'),
        GAZZINI_VERSION,
        true
    );

    // Script per navigazione
    wp_enqueue_script('gazzini-navigation',
        GAZZINI_THEME_URI . '/js/navigation.js',
        array('jquery'),
        GAZZINI_VERSION,
        true
    );

    // Localizzazione script
    wp_localize_script('gazzini-script', 'gazziniAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('gazzini-nonce'),
    ));

    // Script per commenti
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'gazzini_scripts');

/**
 * Personalizzazioni WooCommerce
 */
function gazzini_woocommerce_setup() {
    // Numero di prodotti per pagina
    add_filter('loop_shop_per_page', function() {
        return 12;
    });

    // Numero di prodotti correlati
    add_filter('woocommerce_output_related_products_args', function($args) {
        $args['posts_per_page'] = 3;
        $args['columns'] = 3;
        return $args;
    });
}
add_action('after_setup_theme', 'gazzini_woocommerce_setup');

/**
 * Modifica il numero di colonne prodotti
 */
function gazzini_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'gazzini_loop_columns');

/**
 * Aggiungi badge "Dal 1891" ai prodotti
 */
function gazzini_product_badge() {
    echo '<span class="gazzini-badge">Dal 1891</span>';
}
add_action('woocommerce_before_shop_loop_item_title', 'gazzini_product_badge', 5);

/**
 * Personalizza il testo "Aggiungi al carrello"
 */
function gazzini_custom_add_to_cart_text() {
    return __('Acquista Ora', 'gazzini-spirits');
}
add_filter('woocommerce_product_single_add_to_cart_text', 'gazzini_custom_add_to_cart_text');
add_filter('woocommerce_product_add_to_cart_text', 'gazzini_custom_add_to_cart_text');

/**
 * Aggiungi informazioni sulla consegna
 */
function gazzini_delivery_info() {
    echo '<div class="gazzini-delivery-info">';
    echo '<p><strong>' . __('Spedizione gratuita', 'gazzini-spirits') . '</strong> ' . __('per ordini superiori a €50', 'gazzini-spirits') . '</p>';
    echo '<p>' . __('Consegna in 2-3 giorni lavorativi', 'gazzini-spirits') . '</p>';
    echo '</div>';
}
add_action('woocommerce_before_add_to_cart_form', 'gazzini_delivery_info');

/**
 * Aggiungi messaggio età legale
 */
function gazzini_age_verification_notice() {
    if (is_shop() || is_product()) {
        echo '<div class="age-verification-notice" style="background: #6b1f3a; color: white; padding: 1rem; text-align: center; margin-bottom: 2rem;">';
        echo '<p style="margin: 0;"><strong>' . __('Attenzione:', 'gazzini-spirits') . '</strong> ' . __('La vendita di alcolici è vietata ai minori di 18 anni.', 'gazzini-spirits') . '</p>';
        echo '</div>';
    }
}
add_action('woocommerce_before_main_content', 'gazzini_age_verification_notice', 5);

/**
 * Breadcrumbs personalizzati
 */
function gazzini_breadcrumbs() {
    if (function_exists('woocommerce_breadcrumb')) {
        woocommerce_breadcrumb(array(
            'delimiter'   => ' / ',
            'wrap_before' => '<nav class="gazzini-breadcrumbs"><div class="container">',
            'wrap_after'  => '</div></nav>',
            'before'      => '',
            'after'       => '',
            'home'        => __('Home', 'gazzini-spirits'),
        ));
    }
}

/**
 * Aggiungi classe body personalizzata
 */
function gazzini_body_classes($classes) {
    if (is_woocommerce()) {
        $classes[] = 'gazzini-shop';
    }
    if (is_front_page()) {
        $classes[] = 'gazzini-home';
    }
    return $classes;
}
add_filter('body_class', 'gazzini_body_classes');

/**
 * Shortcode per mostrare i prodotti in evidenza
 */
function gazzini_featured_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 4,
        'columns' => 2,
    ), $atts);

    return do_shortcode('[products limit="' . $atts['limit'] . '" columns="' . $atts['columns'] . '" visibility="featured"]');
}
add_shortcode('gazzini_featured', 'gazzini_featured_products_shortcode');

/**
 * Aggiungi metabox personalizzato per informazioni prodotto
 */
function gazzini_product_metabox() {
    add_meta_box(
        'gazzini_product_details',
        __('Dettagli Prodotto Gazzini', 'gazzini-spirits'),
        'gazzini_product_metabox_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'gazzini_product_metabox');

function gazzini_product_metabox_callback($post) {
    wp_nonce_field('gazzini_product_metabox', 'gazzini_product_metabox_nonce');

    $alcohol_content = get_post_meta($post->ID, '_gazzini_alcohol_content', true);
    $aging_time = get_post_meta($post->ID, '_gazzini_aging_time', true);
    $tasting_notes = get_post_meta($post->ID, '_gazzini_tasting_notes', true);

    ?>
    <p>
        <label for="gazzini_alcohol_content"><strong><?php _e('Gradazione Alcolica (%)', 'gazzini-spirits'); ?></strong></label><br>
        <input type="text" id="gazzini_alcohol_content" name="gazzini_alcohol_content" value="<?php echo esc_attr($alcohol_content); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="gazzini_aging_time"><strong><?php _e('Tempo di Invecchiamento', 'gazzini-spirits'); ?></strong></label><br>
        <input type="text" id="gazzini_aging_time" name="gazzini_aging_time" value="<?php echo esc_attr($aging_time); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="gazzini_tasting_notes"><strong><?php _e('Note di Degustazione', 'gazzini-spirits'); ?></strong></label><br>
        <textarea id="gazzini_tasting_notes" name="gazzini_tasting_notes" rows="5" style="width: 100%;"><?php echo esc_textarea($tasting_notes); ?></textarea>
    </p>
    <?php
}

/**
 * Salva i metadati del prodotto
 */
function gazzini_save_product_metabox($post_id) {
    if (!isset($_POST['gazzini_product_metabox_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['gazzini_product_metabox_nonce'], 'gazzini_product_metabox')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['gazzini_alcohol_content'])) {
        update_post_meta($post_id, '_gazzini_alcohol_content', sanitize_text_field($_POST['gazzini_alcohol_content']));
    }
    if (isset($_POST['gazzini_aging_time'])) {
        update_post_meta($post_id, '_gazzini_aging_time', sanitize_text_field($_POST['gazzini_aging_time']));
    }
    if (isset($_POST['gazzini_tasting_notes'])) {
        update_post_meta($post_id, '_gazzini_tasting_notes', sanitize_textarea_field($_POST['gazzini_tasting_notes']));
    }
}
add_action('save_post', 'gazzini_save_product_metabox');

/**
 * Mostra i dettagli personalizzati nella pagina prodotto
 */
function gazzini_display_custom_product_details() {
    global $post;

    $alcohol_content = get_post_meta($post->ID, '_gazzini_alcohol_content', true);
    $aging_time = get_post_meta($post->ID, '_gazzini_aging_time', true);
    $tasting_notes = get_post_meta($post->ID, '_gazzini_tasting_notes', true);

    if ($alcohol_content || $aging_time || $tasting_notes) {
        echo '<div class="gazzini-product-details">';

        if ($alcohol_content) {
            echo '<div class="detail-item"><strong>' . __('Gradazione:', 'gazzini-spirits') . '</strong> ' . esc_html($alcohol_content) . '%</div>';
        }

        if ($aging_time) {
            echo '<div class="detail-item"><strong>' . __('Invecchiamento:', 'gazzini-spirits') . '</strong> ' . esc_html($aging_time) . '</div>';
        }

        if ($tasting_notes) {
            echo '<div class="detail-item tasting-notes"><strong>' . __('Note di Degustazione:', 'gazzini-spirits') . '</strong><p>' . esc_html($tasting_notes) . '</p></div>';
        }

        echo '</div>';
    }
}
add_action('woocommerce_single_product_summary', 'gazzini_display_custom_product_details', 25);

/**
 * Rimuovi tab WooCommerce non necessari
 */
function gazzini_remove_product_tabs($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}
add_filter('woocommerce_product_tabs', 'gazzini_remove_product_tabs', 98);

/**
 * Supporto per excerpt nei prodotti
 */
function gazzini_woocommerce_excerpt_length() {
    return 20;
}
add_filter('woocommerce_short_description_length', 'gazzini_woocommerce_excerpt_length');
