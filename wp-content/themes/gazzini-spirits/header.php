<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('Vai al contenuto', 'gazzini-spirits'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <div class="site-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                            <span class="since">DAL 1891</span>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => function() {
                        echo '<ul id="primary-menu">';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/chi-siamo/')) . '">Chi Siamo</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/shop/')) . '">Prodotti</a></li>';
                        echo '<li><a href="' . esc_url(home_url('/contatti/')) . '">Contatti</a></li>';
                        if (function_exists('WC')) {
                            echo '<li><a href="' . esc_url(wc_get_cart_url()) . '">Carrello (' . WC()->cart->get_cart_contents_count() . ')</a></li>';
                        }
                        echo '</ul>';
                    }
                ));
                ?>
            </nav><!-- #site-navigation -->

            <?php if (function_exists('WC')) : ?>
                <div class="header-cart">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-icon">
                        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                        <?php _e('Carrello', 'gazzini-spirits'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
