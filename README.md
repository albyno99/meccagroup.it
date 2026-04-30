# Mecca Group

Sito istituzionale di Mecca Group, azienda di autotrasporti e materiali edili
con sede a Cantarana (AT). Il sito è bilingue (italiano/inglese) e include
una pagina contatti con form lato server.

Repository privato. Per le segnalazioni di sicurezza vedi `SECURITY.md`.

## Stack

PHP "vanilla", senza framework e senza build step. Nessuna dipendenza Composer
e nessuna toolchain JavaScript: i file sono serviti come stanno. L'unica
libreria di terze parti inclusa nel repo è PHPMailer 6.9.x (in
`includes/phpmailer/`), usata per l'invio dei messaggi del form contatti via
SMTP.

Requisiti per girare:

- PHP 7.4 o superiore (consigliato 8.1+)
- Apache con `mod_rewrite`, `mod_headers`, `mod_deflate`, `mod_expires` e
  `AllowOverride All` sulla directory del sito
- Connessione outbound SMTP (porta 587) per Gmail
- HTTPS in produzione (è obbligatorio: il sito impone HSTS via `.htaccess`)

## Sviluppo locale

Non c'è build né `npm install`. Basta un web server PHP nella root:

```bash
php -S localhost:8000
```

Nota che il built-in server di PHP non legge `.htaccess`, quindi in dev:

- gli `ErrorDocument` per 404 / 500 non vengono applicati;
- gli header di sicurezza definiti nel `.htaccess` non vengono emessi;
- file come `.env` sono raggiungibili via HTTP (in produzione Apache li
  blocca).

Per testare le ErrorDocument e gli header di sicurezza, puntare un Apache
locale (MAMP, XAMPP, Docker) alla directory del progetto.

Per forzare la lingua durante lo sviluppo basta passarla come parametro
query: `?lang=it` o `?lang=en`.

## Struttura

```
meccagroup.it/
├── index.php                 Homepage
├── about-us.php              Chi siamo
├── services.php              Servizi (Autotrasporti / Materiali Edili)
├── contact.php               Form di contatto
├── process-contact.php       Endpoint POST del form (JSON)
├── cookie-policy.php
├── privacy-policy.php
├── terms-of-service.php
├── 404.php / 500.php         Mappate via .htaccess ErrorDocument
├── sitemap.xml               Statica
├── robots.txt
├── site.webmanifest
├── .htaccess                 Security headers, HTTPS redirect, deny rules
│
├── includes/
│   ├── language.php          LanguageManager + sessione PHP
│   ├── header.php            Navbar e bridge traduzioni cookie banner
│   ├── footer.php
│   ├── env.php               Parser .env minimale
│   ├── csrf.php              Token CSRF in sessione
│   ├── rate_limit.php        Rate limiter file-based per IP
│   └── phpmailer/            PHPMailer 6.9.x
│
├── lang/
│   ├── it.php                Traduzioni italiane (default)
│   └── en.php                Traduzioni inglesi
│
├── css/style.css
├── js/
│   ├── script.js             Interazioni globali (menu, animazioni)
│   ├── contact.js            Validazione e submit form
│   └── cookies.js            Banner cookie GDPR
└── media/                    Immagini, loghi, bandiere SVG
```

## Sistema di traduzioni

`includes/language.php` espone una classe `LanguageManager` istanziata come
globale `$lang` e una funzione helper `t($chiave, $default = '')`. Le
traduzioni stanno in `lang/it.php` e `lang/en.php` come array PHP semplice.

```php
<?php require_once 'includes/language.php'; ?>
<h1><?php echo t('hero_title_main'); ?></h1>
<a href="<?php echo $lang->getPageUrl('contact'); ?>">
    <?php echo t('nav_contact'); ?>
</a>
```

La lingua viene determinata in quest'ordine: parametro `?lang=`, preferenza
salvata in sessione, header `Accept-Language` del browser. Per
aggiungere una pagina nuova bisogna estendere lo `switch` in
`generateMetaTags()` e la mappa `$pages` in `getPageUrl()` dentro
`LanguageManager`.

Quando si aggiunge una stringa, va inserita in entrambi i file `lang/*.php`.
Se manca, `t()` restituisce stringa vuota.

## Form di contatto

`process-contact.php` riceve la POST e applica, in ordine, questi controlli:
same-origin guard sull'header `Origin`/`Referer`, validazione del token CSRF
in sessione, rate limit di 5 invii per ora per IP, verifica reCAPTCHA v3 con
soglia configurabile, validazione campi più whitelist della lingua. Se tutto
passa, invia due email via PHPMailer/SMTP: una notifica all'azienda e una di
conferma all'utente.

Il rate limiter scrive file JSON in `cache/rate-limit/`. La directory deve
essere scrivibile dall'utente Apache; se non lo è, il limiter va in
fail-open e logga l'errore via `error_log`.

## Configurazione

Le credenziali (SMTP, reCAPTCHA, destinatari) vivono in `.env` nella root.
Il file è gitignored e bloccato da `.htaccess`. Per avviare un'istanza,
copiare `.env.example` in `.env` e compilare i valori.

```
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=
SMTP_PASSWORD=
SMTP_FROM_EMAIL=
SMTP_FROM_NAME="NoReply - MeccaGroup"
CONTACT_TO_EMAIL=
CONTACT_TO_NAME="Mecca Group"
CONTACT_CC_EMAIL=
RECAPTCHA_SECRET=
RECAPTCHA_MIN_SCORE=0.5
```

Il parser è in `includes/env.php` e si auto-carica al primo
`require_once`. Niente Composer, niente librerie esterne.

Per leggere una variabile dal codice:

```php
require_once 'includes/env.php';
$secret = env('RECAPTCHA_SECRET');
$port   = (int) env('SMTP_PORT', 587);
```

## Sicurezza

Il `.htaccess` imposta HSTS, X-Frame-Options, X-Content-Type-Options,
Referrer-Policy, Permissions-Policy, COOP/CORP e una Content Security Policy
in modalità enforcing. Le sorgenti esterne ammesse sono Google reCAPTCHA,
Google Fonts e l'iframe di Google Maps usato in `contact.php`. Aggiungere
nuovi script di terze parti (analytics, tag manager, font CDN diversi,
embed video) richiede di estendere la CSP, altrimenti il browser blocca le
risorse.

Il cookie di sessione `MECCASESSID` è impostato `HttpOnly`, `SameSite=Lax`,
con flag `Secure` automatico su HTTPS. La sessione è avviata centralmente
in `includes/language.php`: non chiamare `session_start()` altrove.

Sul form di contatti, il token CSRF viene generato in sessione tramite
`csrf_token()` (in `includes/csrf.php`) e validato in costant-time con
`hash_equals`. Lato JS non c'è codice dedicato: il token sta in un input
hidden e viene raccolto da `new FormData(form)`.

## Convenzioni

- Niente testo hardcoded nelle pagine: tutto passa da `t('chiave')` con la
  voce in entrambi i file `lang/*.php`.
- I link interni passano sempre da `$lang->getPageUrl('home' | 'about' |
  'services' | 'contact' | 'terms' | 'privacy' | 'cookies')` per preservare
  il parametro lingua.
- `sitemap.xml` è statica: aggiornarla a mano quando si aggiunge una pagina.
- Nessuna minificazione né bundling: CSS e JS sono i file sorgente.

## Licenza

Rilasciato sotto licenza. Vedi `LICENSE.md`.
