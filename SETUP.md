# 🍸 Gazzini Spirits 1891 - Guida Setup WordPress

## Benvenuto

Questa è la guida completa per l'installazione e la configurazione del sito WordPress di **Gazzini Spirits 1891**, specializzati nella produzione di liquori e distillati artigianali premium (Gin e Fernet) dal 1891.

---

## 📋 Indice

1. [Requisiti di Sistema](#requisiti-di-sistema)
2. [Installazione WordPress](#installazione-wordpress)
3. [Configurazione Database](#configurazione-database)
4. [Attivazione Tema](#attivazione-tema)
5. [Installazione Plugin](#installazione-plugin)
6. [Configurazione WooCommerce](#configurazione-woocommerce)
7. [Creazione Pagine](#creazione-pagine)
8. [Configurazione Menu](#configurazione-menu)
9. [Personalizzazione](#personalizzazione)
10. [Risoluzione Problemi](#risoluzione-problemi)

---

## 🔧 Requisiti di Sistema

### Server Requirements
- **PHP**: 7.4 o superiore (consigliato 8.0+)
- **MySQL**: 5.7 o superiore / MariaDB 10.3+
- **HTTPS**: Raccomandato per sicurezza e-commerce
- **Memory Limit**: Minimo 256MB (consigliato 512MB)
- **Upload Max Size**: Minimo 64MB

### WordPress
- **Versione**: 6.0 o superiore
- **Lingua**: Italiano (it_IT)

### Plugin Obbligatori
- **WooCommerce**: 7.0 o superiore
- **Contact Form 7** (opzionale ma consigliato)

---

## 📦 Installazione WordPress

### 1. Download WordPress

```bash
# Scarica l'ultima versione di WordPress in italiano
wget https://it.wordpress.org/latest-it_IT.tar.gz

# Estrai l'archivio
tar -xzf latest-it_IT.tar.gz

# Copia i file nella directory web
cp -r wordpress/* /percorso/del/tuo/sito/
```

### 2. Copia i File del Tema

```bash
# Copia il tema Gazzini nella directory themes di WordPress
cp -r wp-content/themes/gazzini-spirits /percorso/wordpress/wp-content/themes/

# Copia il plugin di setup prodotti
cp wp-content/plugins/gazzini-products-setup.php /percorso/wordpress/wp-content/plugins/
```

### 3. Imposta i Permessi

```bash
# Imposta i permessi corretti
sudo chown -R www-data:www-data /percorso/del/tuo/sito/
sudo find /percorso/del/tuo/sito/ -type d -exec chmod 755 {} \;
sudo find /percorso/del/tuo/sito/ -type f -exec chmod 644 {} \;
```

---

## 🗄️ Configurazione Database

### 1. Crea il Database

```sql
-- Accedi a MySQL
mysql -u root -p

-- Crea il database
CREATE DATABASE gazzini_spirits_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Crea l'utente
CREATE USER 'gazzini_user'@'localhost' IDENTIFIED BY 'PASSWORD_SICURA';

-- Assegna i privilegi
GRANT ALL PRIVILEGES ON gazzini_spirits_db.* TO 'gazzini_user'@'localhost';

-- Applica le modifiche
FLUSH PRIVILEGES;

-- Esci
EXIT;
```

### 2. Configura wp-config.php

Modifica il file `wp-config.php` con le credenziali del database:

```php
define( 'DB_NAME', 'gazzini_spirits_db' );
define( 'DB_USER', 'gazzini_user' );
define( 'DB_PASSWORD', 'LA_TUA_PASSWORD' );
define( 'DB_HOST', 'localhost' );
```

### 3. Genera Salt Keys

Visita: https://api.wordpress.org/secret-key/1.1/salt/

Copia e incolla le chiavi generate nel file `wp-config.php`.

---

## 🎨 Attivazione Tema

### 1. Accedi al Pannello Admin

Vai su: `https://tuosito.com/wp-admin`

### 2. Attiva il Tema

1. Vai su **Aspetto → Temi**
2. Trova "Gazzini Spirits 1891"
3. Clicca su **Attiva**

### 3. Verifica Font

I font Google (Playfair Display e Lato) vengono caricati automaticamente dal tema.

---

## 🔌 Installazione Plugin

### Plugin Obbligatori

#### 1. WooCommerce

```bash
# Via WordPress Admin
1. Vai su Plugin → Aggiungi nuovo
2. Cerca "WooCommerce"
3. Installa e Attiva

# Oppure via WP-CLI
wp plugin install woocommerce --activate
```

#### 2. Gazzini Products Setup

```bash
# Attiva il plugin di setup (già copiato)
1. Vai su Plugin → Plugin installati
2. Trova "Gazzini Products Setup"
3. Clicca su Attiva
```

#### 3. Plugin Consigliati (Opzionali)

- **Contact Form 7**: Per form contatti avanzati
- **Yoast SEO**: Per ottimizzazione SEO
- **WP Rocket**: Per caching e performance
- **Wordfence Security**: Per sicurezza
- **UpdraftPlus**: Per backup automatici

---

## 🛒 Configurazione WooCommerce

### 1. Setup Wizard

Al primo accesso, WooCommerce mostrerà un wizard di setup:

1. **Dettagli Negozio**
   - Indirizzo: Via della Distilleria, 1891
   - Città: [La tua città]
   - CAP: [Il tuo CAP]
   - Paese: Italia

2. **Settore**
   - Seleziona: "Alimentari e bevande"

3. **Tipi di Prodotto**
   - Seleziona: "Prodotti fisici"

4. **Dettagli Business**
   - Compila secondo la tua attività

5. **Tema**
   - Salta (stai già usando il tema Gazzini)

### 2. Configurazione Manuale

#### Impostazioni Generali

```
WooCommerce → Impostazioni → Generali

Valuta: EUR (€)
Paese/Regione di vendita: Italia
Località di spedizione: Italia
Abilita tasse: Sì
```

#### Impostazioni Prodotti

```
WooCommerce → Impostazioni → Prodotti

Shop Page: Crea una pagina "Shop"
Unità di peso: kg
Dimensioni: cm
```

#### Impostazioni Spedizione

```
WooCommerce → Impostazioni → Spedizione

Zona di spedizione: Italia
Metodi:
- Spedizione gratuita (per ordini > €50)
- Tariffa fissa: €6.90
```

#### Impostazioni Pagamento

```
WooCommerce → Impostazioni → Pagamenti

Abilita:
- Bonifico bancario
- PayPal
- Stripe (richiede plugin)
```

### 3. Setup Prodotti Automatico

1. Vai su **Gazzini Setup** nel menu admin
2. Clicca su **"Avvia Setup Prodotti"**
3. Verifica che siano stati creati:
   - 3 Categorie (Gin, Fernet, Edizioni Limitate)
   - 4 Prodotti di esempio

### 4. Configurazione Tasse

```
WooCommerce → Impostazioni → Imposte

Abilita tasse: Sì
I prezzi inseriti includono IVA: Sì

Aliquote standard:
- Italia: 22%
```

---

## 📄 Creazione Pagine

### Pagine Obbligatorie

Crea le seguenti pagine:

#### 1. Homepage (già configurata)
- Template: Front Page (automatico)

#### 2. Chi Siamo
```
Titolo: Chi Siamo
Template: Chi Siamo
Permalink: /chi-siamo/
```

#### 3. Contatti
```
Titolo: Contatti
Template: Contatti
Permalink: /contatti/
```

#### 4. Shop (WooCommerce)
```
Titolo: I Nostri Prodotti
WooCommerce → Impostazioni → Prodotti → Shop page
```

#### 5. Carrello (WooCommerce)
```
Titolo: Carrello
Auto-creata da WooCommerce
```

#### 6. Checkout (WooCommerce)
```
Titolo: Checkout
Auto-creata da WooCommerce
```

#### 7. Account (WooCommerce)
```
Titolo: Il Mio Account
Auto-creata da WooCommerce
```

#### 8. Privacy Policy
```
Titolo: Privacy Policy
Contenuto: [Inserisci la tua privacy policy]
```

#### 9. Termini e Condizioni
```
Titolo: Termini e Condizioni
Contenuto: [Inserisci i tuoi termini]
```

---

## 🧭 Configurazione Menu

### 1. Menu Principale

```
Aspetto → Menu → Crea nuovo menu

Nome: Menu Principale
Posizione: Primary

Voci:
- Home
- Chi Siamo
- I Nostri Prodotti (Shop)
- Contatti
- Carrello
```

### 2. Menu Footer

```
Nome: Menu Footer
Posizione: Footer

Voci:
- Chi Siamo
- Privacy Policy
- Termini e Condizioni
- Spedizioni e Resi
- FAQ
```

---

## 🎨 Personalizzazione

### 1. Logo

```
Aspetto → Personalizza → Identità del sito → Logo

Carica il tuo logo (consigliato: 350x100px, PNG con sfondo trasparente)
```

### 2. Colori Brand

I colori sono già configurati nel tema:

```css
Dark Green: #1a3a2e
Gold: #d4af37
Cream: #f4f1e8
Burgundy: #6b1f3a
Copper: #b87333
```

### 3. Widget Footer

```
Aspetto → Widget

Footer Area 1: Widget Text con informazioni azienda
Footer Area 2: Menu navigazione
Footer Area 3: Contatti
```

### 4. Homepage Settings

```
Impostazioni → Lettura

La tua home page visualizza: Una pagina statica
Homepage: [Seleziona la homepage]
```

---

## 📧 Configurazione Email

### 1. SMTP Setup (Consigliato)

Installa **WP Mail SMTP**:

```
Plugin → Aggiungi nuovo → "WP Mail SMTP"

Configura con:
- Gmail
- SendGrid
- Amazon SES
```

### 2. Email WooCommerce

```
WooCommerce → Impostazioni → Email

Personalizza:
- "Da" nome: Gazzini Spirits 1891
- "Da" indirizzo: info@gazzinispirits.com
- Colore base: #1a3a2e
```

---

## 🔒 Sicurezza

### Best Practices

1. **Installa Wordfence Security**
2. **Limita tentativi di login**
3. **Abilita 2FA per admin**
4. **Backup regolari** (UpdraftPlus)
5. **Mantieni WordPress e plugin aggiornati**
6. **Usa HTTPS** (certificato SSL)

### File .htaccess

Aggiungi al tuo `.htaccess`:

```apache
# Blocca accesso a file sensibili
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

# Protezione wp-config.php
<files wp-config.php>
    order allow,deny
    deny from all
</files>
```

---

## 🚀 Performance

### 1. Caching

Installa **WP Rocket** o **W3 Total Cache**

### 2. Ottimizzazione Immagini

- Usa **Smush** o **ShortPixel**
- Comprimi le immagini prodotto

### 3. CDN

Considera l'uso di Cloudflare per:
- Caching globale
- SSL gratuito
- Protezione DDoS

---

## 📱 Responsive Testing

Testa il sito su:

- Desktop (1920px, 1366px, 1024px)
- Tablet (768px)
- Mobile (375px, 414px)

Tools consigliati:
- Chrome DevTools
- BrowserStack
- Google Mobile-Friendly Test

---

## ✅ Checklist Pre-Launch

- [ ] WordPress installato e configurato
- [ ] Database creato e connesso
- [ ] Tema Gazzini attivato
- [ ] WooCommerce installato e configurato
- [ ] Prodotti creati (Gin e Fernet)
- [ ] Pagine create (Home, Chi Siamo, Contatti, Shop)
- [ ] Menu configurati
- [ ] Logo caricato
- [ ] SMTP configurato
- [ ] SSL attivo (HTTPS)
- [ ] Backup configurato
- [ ] Security plugin installato
- [ ] Google Analytics configurato
- [ ] Testing responsive completato
- [ ] Metodi di pagamento testati
- [ ] Processo checkout testato
- [ ] Email transazionali testate

---

## 🆘 Risoluzione Problemi

### Errore "Errore nello stabilire una connessione al database"

```
1. Verifica credenziali in wp-config.php
2. Controlla che MySQL sia in esecuzione
3. Verifica permessi utente database
```

### White Screen of Death

```
1. Disabilita tutti i plugin
2. Attiva tema default (Twenty Twenty-Three)
3. Controlla error_log di PHP
4. Aumenta memory_limit
```

### Immagini non visualizzate

```
1. Verifica permessi wp-content/uploads (755)
2. Rigenera thumbnail: Plugin → Regenerate Thumbnails
```

### WooCommerce non funziona

```
1. WooCommerce → Stato → Tools → Clear template cache
2. Verifica che le pagine WooCommerce siano impostate
3. Permalink: Impostazioni → Permalink → Salva
```

---

## 📞 Supporto

Per supporto tecnico:

- **Email**: supporto@gazzinispirits.com
- **Documentazione WordPress**: https://wordpress.org/support/
- **Documentazione WooCommerce**: https://woocommerce.com/documentation/

---

## 📝 Note Importanti

### Compliance Legale

⚠️ **IMPORTANTE**: Vendita di alcolici

- Verifica età cliente (+18)
- Privacy policy conforme GDPR
- Cookie policy
- Termini e condizioni di vendita
- Licenze necessarie per vendita alcolici

### SEO

Dopo il lancio:
1. Registra sito su Google Search Console
2. Invia sitemap XML
3. Configura Google My Business
4. Ottimizza meta title e description

---

## 🎉 Conclusione

Il tuo sito Gazzini Spirits 1891 è pronto!

Visita il tuo sito e inizia a vendere i tuoi fantastici Gin e Fernet!

---

**Versione Documentazione**: 1.0.0
**Ultimo Aggiornamento**: 2025-11-18
**Tema**: Gazzini Spirits 1891 v1.0.0
