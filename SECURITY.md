# Security Policy

## Segnalare una vulnerabilità

Se hai individuato una vulnerabilità di sicurezza in questo sito o nel suo
codice, per favore **non aprire una issue pubblica**. Inviaci invece una
segnalazione privata via email all'indirizzo:

**[info@albertosesia.it](mailto:info@albertosesia.it)**

### Cosa includere nella segnalazione

Per aiutarci a riprodurre e correggere il problema il più rapidamente
possibile, ti chiediamo di includere quando possibile:

- Una descrizione chiara della vulnerabilità e del suo impatto
- I passi per riprodurla (URL, payload, screenshot)
- La versione/branch del repository su cui è stata individuata
- L'eventuale proof-of-concept (PoC) o exploit
- Il tuo nome o handle se desideri essere accreditato nel fix

### Cosa NON fare

- Non sfruttare la vulnerabilità oltre quanto strettamente necessario
  a dimostrarla
- Non eseguire attacchi DoS o di forza bruta verso il sito di produzione
- Non accedere, modificare o esfiltrare dati di altri utenti
- Non fare test invasivi sul form di contatto in produzione (causerebbero
  l'invio di email reali al team)
- Non rendere pubblica la vulnerabilità prima che sia stata corretta

### Cosa aspettarsi

- **Risposta iniziale**: entro 5 giorni lavorativi dalla segnalazione
- **Triage e valutazione**: entro 14 giorni
- **Fix e disclosure**: tempi proporzionati alla gravità; ti terremo
  aggiornato sull'avanzamento

Apprezziamo la disclosure responsabile e siamo felici di accreditarti
pubblicamente nel commit / changelog del fix, se lo desideri.

## Scope

Il perimetro coperto da questa policy include:

- Il sito web `meccagroup.it` e i suoi sottodomini
- Il codice sorgente di questo repository

Sono **fuori scope**:

- Servizi di terze parti utilizzati dal sito (Google reCAPTCHA, Google Fonts,
  Google Maps, Gmail SMTP) — vanno segnalati direttamente ai rispettivi
  vendor
- Vulnerabilità che richiedono accesso fisico al server o credenziali già
  compromesse
- Best-practice issues senza impatto dimostrabile (es. assenza di un
  header opzionale, configurazioni TLS subottimali con voto SSL Labs ≥ A)

---

# Security Policy (English)

## Reporting a vulnerability

If you discover a security vulnerability in this website or its source
code, please **do not open a public issue**. Instead, send a private report
to:

**[info@albertosesia.it](mailto:info@albertosesia.it)**

### What to include

To help us reproduce and fix the issue as quickly as possible, please
include where possible:

- A clear description of the vulnerability and its impact
- Steps to reproduce (URL, payload, screenshots)
- The version/branch where you found the issue
- A proof-of-concept (PoC) or exploit if available
- Your name or handle if you want to be credited

### What NOT to do

- Do not exploit the vulnerability beyond what is strictly necessary to
  demonstrate it
- Do not run DoS or brute-force attacks against the production site
- Do not access, modify, or exfiltrate data belonging to other users
- Do not run invasive tests on the production contact form (it would send
  real emails to the team)
- Do not disclose the vulnerability publicly before it has been fixed

### What to expect

- **Initial response**: within 5 business days
- **Triage and assessment**: within 14 days
- **Fix and disclosure**: timing scaled to severity; we'll keep you updated

We appreciate responsible disclosure and are happy to publicly credit you
in the fix commit / changelog if you wish.

## Scope

This policy covers:

- The `meccagroup.it` website and its subdomains
- The source code in this repository

The following are **out of scope**:

- Third-party services used by the site (Google reCAPTCHA, Google Fonts,
  Google Maps, Gmail SMTP) — report those directly to the vendor
- Vulnerabilities that require physical access to the server or already
  compromised credentials
- Best-practice issues with no demonstrable impact (e.g. missing optional
  headers, suboptimal TLS configurations rated SSL Labs ≥ A)
