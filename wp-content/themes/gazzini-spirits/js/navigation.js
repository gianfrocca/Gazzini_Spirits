/**
 * Navigation functionality for Gazzini Spirits Theme
 */

(function($) {
    'use strict';

    // Mobile menu toggle
    const mobileMenuButton = '<button class="mobile-menu-toggle" aria-label="Menu"><span></span><span></span><span></span></button>';

    $(document).ready(function() {
        // Add mobile menu button
        if ($(window).width() <= 768) {
            $('.main-navigation').before(mobileMenuButton);
        }

        // Toggle mobile menu
        $(document).on('click', '.mobile-menu-toggle', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('active');
            $('body').toggleClass('menu-open');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });

        // Add submenu indicators
        $('.main-navigation .menu-item-has-children > a').append('<span class="submenu-indicator"></span>');

        // Toggle submenus on mobile
        $('.main-navigation .menu-item-has-children > a').on('click', function(e) {
            if ($(window).width() <= 768) {
                e.preventDefault();
                $(this).parent().toggleClass('submenu-open');
                $(this).next('.sub-menu').slideToggle();
            }
        });

        // Highlight current menu item
        const currentUrl = window.location.href;
        $('.main-navigation a').each(function() {
            if (this.href === currentUrl) {
                $(this).addClass('active');
                $(this).parents('.menu-item').addClass('current-menu-ancestor');
            }
        });
    });

    // Responsive menu on window resize
    $(window).on('resize', function() {
        if ($(window).width() > 768) {
            $('.mobile-menu-toggle').removeClass('active');
            $('.main-navigation').removeClass('active');
            $('body').removeClass('menu-open');
            $('.sub-menu').removeAttr('style');
        } else {
            if ($('.mobile-menu-toggle').length === 0) {
                $('.main-navigation').before(mobileMenuButton);
            }
        }
    });

})(jQuery);
