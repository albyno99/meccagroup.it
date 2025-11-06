# Mecca Group - Sito Web Aziendale

Un sito web moderno e multilingue per Mecca Group, azienda specializzata in autotrasporti e materiali edili.

## 🚀 Caratteristiche

### ✨ Design e UX
- **Design moderno e responsive** - Ottimizzato per tutti i dispositivi
- **Animazioni fluide** - Transizioni CSS e JavaScript per un'esperienza coinvolgente
- **Interfaccia pulita** - Layout minimalista con focus sui contenuti
- **Gradients e colori aziendali** - Palette colori coerente con l'identità del brand

### 🌍 Sistema Multilingue
- **Rilevamento automatico lingua** - Basato sul browser dell'utente
- **Lingua italiana** per browser italiani
- **Lingua inglese** per tutti gli altri browser
- **Selettore lingua** nel header con bandiere SVG
- **URL SEO-friendly** con prefissi `/it/` e `/en/`

### 🎯 SEO Ottimizzato al 1000%
- **Meta tag dinamici** per ogni pagina e lingua
- **Structured Data (Schema.org)** per migliore indicizzazione
- **Open Graph tags** per social media
- **Twitter Cards** per condivisioni Twitter
- **Canonical URLs** e hreflang per gestione multilingue
- **Sitemap XML** generata dinamicamente
- **Meta descriptions** ottimizzate per ogni pagina

### 🍪 Cookie Compliance & GDPR
- **Banner cookie interattivo** conforme alle normative EU
- **Gestione granulare consensi** - Necessari vs Analytics
- **Pannello impostazioni avanzate** per utenti
- **Persistenza preferenze** con localStorage
- **Pagine legali complete** - Privacy, Cookie Policy, Terms of Service
- **Sistema multilingue** per banner e preferenze

### 📱 Responsive Design
- **Mobile-first approach** con CSS Grid e Flexbox
- **Breakpoints ottimizzati** per dispositivi mobili, tablet e desktop
- **Touch-friendly** con pulsanti e menu ottimizzati per touch
- **Performance mobile** ottimizzata

## 📂 Struttura del Progetto

```
meccagroup.it/
├── index.php              # Homepage multilingue
├── about-us.php           # Chi siamo
├── services.php           # Servizi
├── contact.php            # Contatti con form
├── process-contact.php    # Processamento form contatti
├── terms-of-service.php   # Termini e condizioni
├── privacy-policy.php     # Informativa privacy GDPR
├── cookie-policy.php      # Cookie policy e gestione
├── 404.php               # Pagina errore 404
├── 500.php               # Pagina errore 500
├── sitemap.xml           # Sitemap XML con pagine legali
├── .htaccess             # Configurazione Apache
│
├── includes/
│   ├── language.php      # Sistema di gestione lingue
│   ├── header.php        # Header comune con traduzioni cookie
│   └── footer.php        # Footer con link legali
│
├── lang/
│   ├── it.php           # Traduzioni italiane (+ cookie/legal)
│   └── en.php           # Traduzioni inglesi (+ cookie/legal)
│
├── css/
│   └── style.css        # Stili CSS + cookie banner & pagine legali
│
├── js/
│   ├── script.js        # JavaScript principale
│   ├── contact.js       # JavaScript pagina contatti
│   └── cookies.js       # Gestione cookie e consensi GDPR
│
└── media/
    ├── flag-it.svg      # Bandiera italiana
    ├── flag-en.svg      # Bandiera inglese
    └── ...              # Altre immagini
```

## 🔧 Tecnologie Utilizzate

### Backend
- **PHP 7+** per la gestione server-side
- **Sistema di gestione lingue** personalizzato
- **Form processing** con validazione e invio email

### Frontend
- **HTML5** semantico con accessibilità
- **CSS3** con variabili CSS e moderne tecniche di layout
- **JavaScript ES6+** per interattività e gestione cookie
- **Google Fonts** (Montserrat) per tipografia
- **Sistema cookie GDPR** completamente custom

### Compliance & Legal
- **GDPR compliant** - Gestione consensi e diritti utente
- **Cookie Law EU** - Banner e gestione preferenze
- **Termini e condizioni** personalizzati per l'azienda
- **Privacy policy** dettagliata con procedure e diritti
- **Accessibilità web** secondo standard WCAG

### SEO e Performance
- **Apache .htaccess** per ottimizzazioni server
- **Gzip compression** per file statici
- **Browser caching** configurato
- **Security headers** implementati

## 🌐 Sistema di Traduzione

Il sistema di traduzione è basato su una classe PHP che:

1. **Rileva automaticamente la lingua** dal browser
2. **Carica il file di traduzione** appropriato
3. **Genera meta tag SEO** specifici per lingua
4. **Crea structured data** localizzati
5. **Gestisce fallback** alla lingua italiana

### Utilizzo delle Traduzioni

```php
// Utilizzare in qualsiasi pagina PHP
echo t('chiave_traduzione');

// Esempio
echo t('nav_home');        // Output: "Home" o "Casa"
echo t('meta_description'); // Meta description localizzata
```

## 📋 Caratteristiche delle Pagine

### 🏠 Homepage (index.php)
- Hero section con video/immagine di sfondo
- Sezione servizi con preview
- Statistiche aziendali animate
- Integrazione Instagram
- Call-to-action ottimizzate

### 👥 Chi Siamo (about-us.php)
- Storia dell'azienda con timeline
- Valori aziendali con cards
- Statistiche e numeri
- Team presentation

### 🚛 Servizi (services.php)
- Due divisioni principali: Autotrasporti e Materiali Edili
- Elenco dettagliato caratteristiche
- Processo di lavoro step-by-step
- Vantaggi competitivi

### 📞 Contatti (contact.php)
- Form di contatto avanzato con validazione
- Mappa Google integrata
- Informazioni di contatto
- FAQ section interattiva
- Gestione errori e conferme

## 🛠️ Setup e Installazione

### Requisiti
- Web server con supporto PHP 7+
- Supporto per .htaccess (Apache)
- Supporto per invio email PHP

### Installazione
1. Carica tutti i file sul server web
2. Configura le email in `process-contact.php`
3. Verifica che .htaccess sia attivo
4. Testa il sistema di lingua
5. Aggiorna le coordinate Google Maps se necessario

### Configurazione Email
In `process-contact.php` modificare:
```php
$to = 'info@meccagroup.it';  // Email destinatario
```

## 🎨 Customizzazione

### Colori del Brand
Le variabili CSS sono definite in `:root`:
```css
:root {
    --primary-color: #1a365d;
    --secondary-color: #2c5aa0;
    --accent-color: #e53e3e;
    --gradient-primary: linear-gradient(135deg, #1a365d 0%, #2c5aa0 100%);
}
```

### Aggiungere Nuove Traduzioni
1. Aggiungi la chiave in `lang/it.php` e `lang/en.php`
2. Usa `t('nuova_chiave')` nelle pagine PHP

### Personalizzare Meta Tag
Modifica il metodo `generateMetaTags()` in `includes/language.php`

## 📊 Performance e SEO

### Ottimizzazioni Implementate
- ✅ Compressione Gzip
- ✅ Cache del browser
- ✅ Immagini ottimizzate
- ✅ CSS e JS minificati
- ✅ Lazy loading
- ✅ Structured data
- ✅ Meta tag dinamici
- ✅ URL semantici

### Risultati Attesi
- **PageSpeed Score**: 90+
- **SEO Score**: 100/100
- **Accessibility Score**: 95+
- **Best Practices**: 100/100

## 🔒 Sicurezza

### Misure Implementate
- Security headers in .htaccess
- Protezione file sensibili
- Validazione input form
- Sanitizzazione dati
- Protezione CSRF
- Content Security Policy

## 📱 Compatibilità Browser

### Supporto Completo
- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+

### Supporto Mobile
- iOS Safari 12+
- Chrome Mobile 60+
- Samsung Internet 8+

## 🚀 Deploy e Manutenzione

### Checklist Pre-Deploy
- [ ] Test funzionalità multilingue
- [ ] Verifica form di contatto
- [ ] Test responsive su dispositivi
- [ ] Controllo velocità caricamento
- [ ] Verifica SEO con strumenti

### Manutenzione Periodica
- Backup regolari del database
- Aggiornamenti PHP e server
- Monitoraggio performance
- Aggiornamento contenuti
- Controllo broken links

## 📞 Supporto

Per supporto tecnico o modifiche:
- Email: albertosesia@gmail.com
- Documentazione: Questo README
- Version control: Implementare Git per tracking modifiche

---

**Mecca Group** - Trasporti e Materiali Edili dal 1985