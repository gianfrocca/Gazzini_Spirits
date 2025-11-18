/**
 * Main JavaScript file for Gazzini Spirits Theme
 */

(function($) {
    'use strict';

    // Smooth scrolling for anchor links
    $('a[href*="#"]').on('click', function(e) {
        if (this.hash !== '') {
            e.preventDefault();
            const hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 100
            }, 800);
        }
    });

    // Add to cart animation
    $(document).on('click', '.add-to-cart, .add_to_cart_button', function() {
        $(this).addClass('loading');

        setTimeout(function() {
            $('.cart-count').addClass('bounce');
            setTimeout(function() {
                $('.cart-count').removeClass('bounce');
            }, 500);
        }, 500);
    });

    // Sticky header on scroll
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // Product image hover effect
    $('.product-card').hover(
        function() {
            $(this).find('.product-image').css('transform', 'scale(1.05)');
        },
        function() {
            $(this).find('.product-image').css('transform', 'scale(1)');
        }
    );

    // Age verification (optional - can be enhanced)
    function checkAge() {
        if (!sessionStorage.getItem('ageVerified')) {
            // Here you can add an age verification modal
            // For now, we just set it as verified
            sessionStorage.setItem('ageVerified', 'true');
        }
    }

    // Initialize
    $(document).ready(function() {
        checkAge();

        // Animate elements on scroll
        $(window).on('scroll', function() {
            $('.product-card').each(function() {
                const bottom_of_object = $(this).offset().top + $(this).outerHeight() / 4;
                const bottom_of_window = $(window).scrollTop() + $(window).height();

                if (bottom_of_window > bottom_of_object) {
                    $(this).addClass('fade-in');
                }
            });
        });
    });

    // Newsletter form submission
    $('#newsletter-form').on('submit', function(e) {
        e.preventDefault();

        const email = $(this).find('input[type="email"]').val();

        // Add your AJAX call here to handle newsletter subscription
        console.log('Newsletter subscription:', email);

        // Show success message
        alert('Grazie per esserti iscritto alla nostra newsletter!');
        $(this).find('input[type="email"]').val('');
    });

})(jQuery);
