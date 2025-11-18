/**
 * Gazzini Age Verification - JavaScript
 * Gestione verifica età con cookie/sessionStorage
 */

(function($) {
    'use strict';

    const GazziniAge = {

        /**
         * Inizializzazione
         */
        init: function() {
            // Verifica se il plugin è abilitato
            if (typeof gazziniAge === 'undefined' || gazziniAge.enabled !== '1') {
                return;
            }

            // Verifica se l'utente è già stato verificato
            if (this.isVerified()) {
                return;
            }

            // Mostra l'age gate
            this.show();

            // Bind eventi
            this.bindEvents();
        },

        /**
         * Verifica se l'utente ha già confermato l'età
         */
        isVerified: function() {
            // Controlla cookie
            if (this.getCookie(gazziniAge.cookieName) === '1') {
                return true;
            }

            // Controlla sessionStorage
            if (sessionStorage.getItem(gazziniAge.cookieName) === '1') {
                return true;
            }

            return false;
        },

        /**
         * Mostra l'age gate
         */
        show: function() {
            const $overlay = $('#gazzini-age-gate');

            // Mostra con fade in
            $overlay.fadeIn(300);

            // Blocca lo scroll del body
            $('body').css('overflow', 'hidden');

            // Focus sul primo bottone (accessibilità)
            setTimeout(function() {
                $('#gazzini-age-confirm').focus();
            }, 400);

            // Impedisci la chiusura con ESC (deve confermare)
            $(document).on('keydown.agegate', function(e) {
                if (e.keyCode === 27) { // ESC
                    e.preventDefault();
                }
            });
        },

        /**
         * Nascondi l'age gate
         */
        hide: function() {
            const $overlay = $('#gazzini-age-gate');

            // Nascondi con fade out
            $overlay.fadeOut(300, function() {
                // Rimuovi dal DOM
                $(this).remove();
            });

            // Riabilita lo scroll
            $('body').css('overflow', '');

            // Rimuovi event listener ESC
            $(document).off('keydown.agegate');
        },

        /**
         * Bind degli eventi
         */
        bindEvents: function() {
            const self = this;

            // Click su "Sì, ho 18 anni"
            $('#gazzini-age-confirm').on('click', function() {
                self.confirmAge();
            });

            // Click su "No, ho meno di 18 anni"
            $('#gazzini-age-deny').on('click', function() {
                self.denyAge();
            });

            // Enter key sul checkbox
            $('#gazzini-remember-me').on('keypress', function(e) {
                if (e.keyCode === 13) {
                    $(this).prop('checked', !$(this).prop('checked'));
                }
            });

            // Previeni la chiusura cliccando fuori
            $('#gazzini-age-gate').on('click', function(e) {
                if (e.target === this) {
                    // Shake animation per indicare che non può chiudere
                    $('.gazzini-age-modal').addClass('shake');
                    setTimeout(function() {
                        $('.gazzini-age-modal').removeClass('shake');
                    }, 500);
                }
            });
        },

        /**
         * Conferma età (Sì)
         */
        confirmAge: function() {
            const $button = $('#gazzini-age-confirm');
            const remember = $('#gazzini-remember-me').is(':checked');

            // Loading state
            $button.addClass('loading').prop('disabled', true);

            // Salva in sessionStorage (sempre)
            sessionStorage.setItem(gazziniAge.cookieName, '1');

            // Se "ricordami" è selezionato, salva anche nel cookie
            if (remember && gazziniAge.rememberEnabled === '1') {
                this.setCookie(gazziniAge.cookieName, '1', parseInt(gazziniAge.cookieDays));
            }

            // Invia al server (opzionale - per analytics/logging)
            this.sendToServer('yes', remember, function(success) {
                if (success) {
                    // Nascondi il modal
                    setTimeout(function() {
                        GazziniAge.hide();
                    }, 300);
                } else {
                    // Anche se fallisce il server, permetti l'accesso (fallback client-side)
                    setTimeout(function() {
                        GazziniAge.hide();
                    }, 300);
                }
            });
        },

        /**
         * Nega età (No)
         */
        denyAge: function() {
            const $button = $('#gazzini-age-deny');
            const $denied = $('#gazzini-age-denied');
            const $buttons = $('.gazzini-age-buttons');
            const $remember = $('.gazzini-age-remember');

            // Loading state
            $button.addClass('loading').prop('disabled', true);

            // Nascondi bottoni e checkbox
            $buttons.fadeOut(300);
            $remember.fadeOut(300);

            // Mostra messaggio di negazione
            setTimeout(function() {
                $denied.fadeIn(300);
            }, 350);

            // Invia al server (per logging)
            this.sendToServer('no', false, function() {
                // Dopo 3 secondi, reindirizza o chiudi
                setTimeout(function() {
                    // Opzione 1: Reindirizza a una pagina esterna
                    // window.location.href = 'https://www.salute.gov.it';

                    // Opzione 2: Chiudi la finestra (se aperta da popup)
                    if (window.opener) {
                        window.close();
                    } else {
                        // Opzione 3: Torna indietro nella cronologia
                        window.history.back();
                    }
                }, 3000);
            });
        },

        /**
         * Invia verifica al server via AJAX
         */
        sendToServer: function(verified, remember, callback) {
            if (typeof gazziniAge === 'undefined') {
                callback(false);
                return;
            }

            $.ajax({
                url: gazziniAge.ajaxurl,
                type: 'POST',
                data: {
                    action: 'verify_age',
                    nonce: gazziniAge.nonce,
                    verified: verified,
                    remember: remember ? '1' : '0'
                },
                success: function(response) {
                    callback(response.success);
                },
                error: function() {
                    // Fallback: permetti comunque (client-side già salvato)
                    callback(true);
                }
            });
        },

        /**
         * Imposta cookie
         */
        setCookie: function(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/;SameSite=Strict";
        },

        /**
         * Leggi cookie
         */
        getCookie: function(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');

            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1, c.length);
                }
                if (c.indexOf(nameEQ) === 0) {
                    return c.substring(nameEQ.length, c.length);
                }
            }
            return null;
        },

        /**
         * Cancella cookie (per testing)
         */
        clearCookie: function(name) {
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
            sessionStorage.removeItem(name);
        }
    };

    /**
     * Inizializza quando il DOM è pronto
     */
    $(document).ready(function() {
        GazziniAge.init();
    });

    /**
     * Esponi globalmente per debug (console)
     */
    window.GazziniAge = GazziniAge;

})(jQuery);

/**
 * Debug console commands:
 *
 * Per testare, apri la console del browser e usa:
 *
 * - GazziniAge.clearCookie('gazzini_age_verified')  // Cancella verifica
 * - GazziniAge.show()                                // Mostra il popup
 * - GazziniAge.hide()                                // Nascondi il popup
 * - GazziniAge.isVerified()                          // Controlla se verificato
 */
