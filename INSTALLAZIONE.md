# 🔄 Guida Installazione su WordPress Esistente

## Opzione 1: Installazione Manuale (Consigliata)

### Passo 1: Backup del Sito Esistente

```bash
# 1. Backup del database
mysqldump -u username -p database_name > backup_$(date +%Y%m%d).sql

# 2. Backup dei file
tar -czf wordpress_backup_$(date +%Y%m%d).tar.gz /path/to/wordpress/

# OPPURE usa un plugin:
# UpdraftPlus, BackupBuddy, Duplicator
```

### Passo 2: Copia il Tema

```bash
# Via FTP/SFTP o File Manager del tuo hosting:

# 1. Carica la cartella del tema
/wp-content/themes/gazzini-spirits/

# 2. Mantieni i tuoi temi esistenti (non cancellarli!)
```

### Passo 3: Copia il Plugin

```bash
# Carica il plugin di setup prodotti
/wp-content/plugins/gazzini-products-setup.php
```

### Passo 4: Attiva il Tema

```
1. Accedi a WordPress Admin (tuosito.com/wp-admin)
2. Vai su: Aspetto → Temi
3. Troverai "Gazzini Spirits 1891"
4. Clicca su "Attiva"
```

### Passo 5: Installa WooCommerce (se non ce l'hai già)

```
1. Plugin → Aggiungi nuovo
2. Cerca "WooCommerce"
3. Installa e Attiva
4. Completa il Setup Wizard
```

### Passo 6: Attiva il Plugin Setup Prodotti

```
1. Plugin → Plugin installati
2. Trova "Gazzini Products Setup"
3. Clicca "Attiva"
4. Vai su "Gazzini Setup" nel menu laterale
5. Clicca "Avvia Setup Prodotti"
```

### Passo 7: Crea le Pagine

```
1. Pagine → Aggiungi nuova

Crea:
- Titolo: "Chi Siamo" → Template: Chi Siamo → Pubblica
- Titolo: "Contatti" → Template: Contatti → Pubblica

2. Imposta la Homepage
   Impostazioni → Lettura
   - Seleziona: "Una pagina statica"
   - Homepage: Seleziona una pagina esistente o creane una nuova
```

### Passo 8: Configura i Menu

```
Aspetto → Menu

Menu Principale:
- Home
- Chi Siamo
- Prodotti (Shop)
- Contatti
- Carrello

Assegna a: "Menu Principale"
```

---

## Opzione 2: Via FTP/cPanel

### Se usi cPanel File Manager:

```
1. Accedi a cPanel
2. File Manager
3. Vai in /public_html/wp-content/themes/
4. Carica la cartella "gazzini-spirits"
5. Vai in /public_html/wp-content/plugins/
6. Carica "gazzini-products-setup.php"
7. Torna su WordPress Admin e attiva
```

### Se usi FileZilla/FTP:

```
1. Connettiti al tuo server FTP
2. Naviga in: /wp-content/themes/
3. Carica la cartella: gazzini-spirits/
4. Naviga in: /wp-content/plugins/
5. Carica il file: gazzini-products-setup.php
6. Attiva da WordPress Admin
```

---

## Opzione 3: Via WP-CLI (Per Utenti Avanzati)

```bash
# Carica i file via FTP prima, poi:

# Attiva il tema
wp theme activate gazzini-spirits

# Attiva WooCommerce (se non installato)
wp plugin install woocommerce --activate

# Attiva il plugin setup
wp plugin activate gazzini-products-setup
```

---

## 🔧 Configurazione Post-Installazione

### 1. Verifica Permalink

```
Impostazioni → Permalink
Seleziona: "Nome articolo"
Salva
```

### 2. Configura WooCommerce

```
WooCommerce → Impostazioni

Generale:
- Valuta: EUR (€)
- Paese: Italia

Prodotti:
- Shop page: Seleziona/crea pagina "Prodotti"

Spedizione:
- Zona: Italia
- Metodo: Tariffa fissa €6.90
- Spedizione gratuita per ordini > €50

Pagamenti:
- Abilita i metodi desiderati
```

### 3. Setup Prodotti

```
Vai su: Gazzini Setup (menu laterale)
Clicca: "Avvia Setup Prodotti"

Questo creerà:
✅ 3 Categorie (Gin, Fernet, Edizioni Limitate)
✅ 4 Prodotti di esempio
```

---

## ⚠️ Note Importanti

### Cosa Succede ai Tuoi Contenuti Esistenti?

✅ **NON vengono toccati!**
- I tuoi post rimangono
- Le tue pagine rimangono
- I tuoi utenti rimangono
- Il tuo database rimane
- I tuoi altri temi rimangono (puoi sempre tornare indietro)

### Compatibilità

Il tema Gazzini è compatibile con:
- ✅ WordPress 6.0+
- ✅ PHP 7.4+
- ✅ WooCommerce 7.0+
- ✅ Plugin standard WordPress

### Se Qualcosa Va Storto

```
1. Torna al tema precedente:
   Aspetto → Temi → Attiva il tuo tema precedente

2. Ripristina il backup:
   Usa il backup fatto al Passo 1

3. Disattiva il plugin:
   Plugin → Disattiva "Gazzini Products Setup"
```

---

## 🎨 Personalizzazione

### Aggiungi il Tuo Logo

```
Aspetto → Personalizza → Identità del sito
Carica logo (consigliato: 350x100px PNG)
```

### Modifica Colori (Opzionale)

Il tema usa colori predefiniti, ma puoi modificarli in:
```
/wp-content/themes/gazzini-spirits/style.css

Cerca le variabili CSS:
:root {
    --gazzini-dark-green: #1a3a2e;
    --gazzini-gold: #d4af37;
    ...
}
```

---

## ✅ Checklist Installazione

- [ ] Backup completo effettuato
- [ ] Tema gazzini-spirits caricato
- [ ] Plugin gazzini-products-setup caricato
- [ ] WooCommerce installato e attivato
- [ ] Tema Gazzini attivato
- [ ] Plugin Setup attivato
- [ ] Prodotti creati (via Gazzini Setup)
- [ ] Pagine Chi Siamo e Contatti create
- [ ] Menu configurato
- [ ] Permalink salvati
- [ ] WooCommerce configurato
- [ ] Logo caricato
- [ ] Test del sito effettuato

---

## 🆘 Problemi Comuni

### "Errore critico nel sito"
```
Causa: Incompatibilità PHP o plugin conflitto
Soluzione:
1. Accedi via FTP
2. Rinomina /wp-content/themes/gazzini-spirits/
3. Il tema precedente si riattiverà
4. Controlla PHP version (minimo 7.4)
```

### "Pagina bianca dopo attivazione"
```
Causa: Memory limit basso
Soluzione:
Aggiungi in wp-config.php:
define('WP_MEMORY_LIMIT', '256M');
```

### "WooCommerce non funziona"
```
Soluzione:
WooCommerce → Stato → Tools
Clicca: "Clear template cache"
Poi: Impostazioni → Permalink → Salva
```

---

## 📞 Supporto

Se hai problemi:
1. Controlla i log: WP Admin → Strumenti → Salute del sito
2. Verifica requisiti: PHP 7.4+, WP 6.0+
3. Testa con tutti i plugin disattivati (tranne WooCommerce)

---

**La tua installazione WordPress esistente rimarrà intatta!**
Stai semplicemente aggiungendo un nuovo tema. 👍
