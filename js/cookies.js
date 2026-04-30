// Cookie management JavaScript
(function() {
    'use strict';

    // Cookie utility functions
    const CookieUtils = {
        set: function(name, value, days) {
            let expires = "";
            if (days) {
                const date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Lax";
        },
        
        get: function(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        },
        
        remove: function(name) {
            document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT; SameSite=Lax";
        }
    };

    // Cookie consent management
    const CookieConsent = {
        cookieName: 'mecca_cookie_consent',
        settingsName: 'mecca_cookie_settings',
        
        // Default settings
        defaultSettings: {
            necessary: true,
            analytics: false
        },
        
        init: function() {
            this.loadTranslations();
            
            // Check if consent has been given
            const consent = CookieUtils.get(this.cookieName);
            if (!consent) {
                this.showBanner();
            } else {
                this.loadCookieSettings();
                this.initializeServices();
            }
        },
        
        loadTranslations: function() {
            // Get translations from PHP (inserted by the backend)
            if (typeof window.cookieTranslations === 'undefined') {
                // Fallback translations
                this.translations = {
                    title: 'Questo sito utilizza cookie',
                    message: 'Utilizziamo cookie tecnici e di analytics per migliorare la tua esperienza di navigazione e analizzare il traffico del sito.',
                    accept: 'Accetta tutti',
                    settings: 'Impostazioni',
                    reject: 'Rifiuta',
                    learnMore: 'Scopri di più',
                    settingsTitle: 'Impostazioni Cookie',
                    settingsDescription: 'Scegli quali cookie accettare. Puoi modificare queste impostazioni in qualsiasi momento.',
                    necessaryTitle: 'Cookie Necessari',
                    necessaryDescription: 'Questi cookie sono essenziali per il funzionamento del sito web e non possono essere disabilitati.',
                    analyticsTitle: 'Cookie di Analytics',
                    analyticsDescription: 'Questi cookie ci aiutano a capire come i visitatori interagiscono con il sito web.',
                    save: 'Salva impostazioni',
                    acceptSelected: 'Accetta selezionati'
                };
            } else {
                this.translations = window.cookieTranslations;
            }
        },
        
        showBanner: function() {
            const banner = this.createBanner();
            document.body.appendChild(banner);
            
            // Animate in
            setTimeout(() => {
                banner.classList.add('show');
            }, 100);
        },
        
        createBanner: function() {
            const t = this.translations;
            const self = this;

            const banner = document.createElement('div');
            banner.className = 'cookie-banner';

            const content = document.createElement('div');
            content.className = 'cookie-banner-content';

            const textWrap = document.createElement('div');
            textWrap.className = 'cookie-banner-text';
            const h3 = document.createElement('h3');
            h3.textContent = t.title;
            const p = document.createElement('p');
            p.textContent = t.message;
            textWrap.appendChild(h3);
            textWrap.appendChild(p);

            const actions = document.createElement('div');
            actions.className = 'cookie-banner-actions';

            const makeBtn = function(cls, label, handler) {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = 'cookie-btn ' + cls;
                b.textContent = label;
                b.addEventListener('click', handler);
                return b;
            };

            actions.appendChild(makeBtn('cookie-btn-accept',   t.accept,   function() { self.acceptAll(); }));
            actions.appendChild(makeBtn('cookie-btn-settings', t.settings, function() { self.showSettings(); }));
            actions.appendChild(makeBtn('cookie-btn-reject',   t.reject,   function() { self.rejectAll(); }));

            const learnMore = document.createElement('a');
            learnMore.href = '/cookie-policy.php';
            learnMore.className = 'cookie-learn-more';
            learnMore.target = '_blank';
            learnMore.rel = 'noopener noreferrer';
            learnMore.textContent = t.learnMore;
            actions.appendChild(learnMore);

            content.appendChild(textWrap);
            content.appendChild(actions);
            banner.appendChild(content);

            return banner;
        },
        
        showSettings: function() {
            const currentSettings = this.getCurrentSettings();
            const modal = this.createSettingsModal(currentSettings);
            document.body.appendChild(modal);
            
            // Animate in
            setTimeout(() => {
                modal.classList.add('show');
            }, 100);
        },
        
        createSettingsModal: function(settings) {
            const t = this.translations;
            const self = this;

            const modal = document.createElement('div');
            modal.className = 'cookie-settings-modal';

            const overlay = document.createElement('div');
            overlay.className = 'cookie-settings-overlay';
            overlay.addEventListener('click', function() { self.hideSettings(); });

            const wrap = document.createElement('div');
            wrap.className = 'cookie-settings-content';

            // Header
            const header = document.createElement('div');
            header.className = 'cookie-settings-header';
            const h2 = document.createElement('h2');
            h2.textContent = t.settingsTitle;
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'cookie-settings-close';
            closeBtn.textContent = '×'; // ×
            closeBtn.setAttribute('aria-label', 'Close');
            closeBtn.addEventListener('click', function() { self.hideSettings(); });
            header.appendChild(h2);
            header.appendChild(closeBtn);

            // Body
            const body = document.createElement('div');
            body.className = 'cookie-settings-body';
            const desc = document.createElement('p');
            desc.textContent = t.settingsDescription;
            body.appendChild(desc);

            const makeCategory = function(title, description, checkboxAttrs) {
                const cat = document.createElement('div');
                cat.className = 'cookie-category';
                const head = document.createElement('div');
                head.className = 'cookie-category-header';
                const label = document.createElement('label');
                label.className = 'cookie-toggle';

                const input = document.createElement('input');
                input.type = 'checkbox';
                if (checkboxAttrs.id) input.id = checkboxAttrs.id;
                if (checkboxAttrs.checked) input.checked = true;
                if (checkboxAttrs.disabled) input.disabled = true;

                const slider = document.createElement('span');
                slider.className = 'toggle-slider';
                const labelText = document.createElement('span');
                labelText.className = 'toggle-label';
                labelText.textContent = title;

                label.appendChild(input);
                label.appendChild(slider);
                label.appendChild(labelText);
                head.appendChild(label);

                const descEl = document.createElement('p');
                descEl.className = 'cookie-category-description';
                descEl.textContent = description;

                cat.appendChild(head);
                cat.appendChild(descEl);
                return cat;
            };

            body.appendChild(makeCategory(
                t.necessaryTitle,
                t.necessaryDescription,
                { checked: true, disabled: true }
            ));
            body.appendChild(makeCategory(
                t.analyticsTitle,
                t.analyticsDescription,
                { id: 'analytics-toggle', checked: !!settings.analytics }
            ));

            // Footer
            const footer = document.createElement('div');
            footer.className = 'cookie-settings-footer';

            const makeBtn = function(cls, label, handler) {
                const b = document.createElement('button');
                b.type = 'button';
                b.className = 'cookie-btn ' + cls;
                b.textContent = label;
                b.addEventListener('click', handler);
                return b;
            };

            footer.appendChild(makeBtn('cookie-btn-accept',    t.save,           function() { self.saveSettings(); }));
            footer.appendChild(makeBtn('cookie-btn-secondary', t.acceptSelected, function() { self.acceptSelected(); }));

            wrap.appendChild(header);
            wrap.appendChild(body);
            wrap.appendChild(footer);

            modal.appendChild(overlay);
            modal.appendChild(wrap);

            return modal;
        },
        
        hideSettings: function() {
            const modal = document.querySelector('.cookie-settings-modal');
            if (modal) {
                modal.classList.remove('show');
                setTimeout(() => {
                    modal.remove();
                }, 300);
            }
        },
        
        hideBanner: function() {
            const banner = document.querySelector('.cookie-banner');
            if (banner) {
                banner.classList.remove('show');
                setTimeout(() => {
                    banner.remove();
                }, 300);
            }
        },
        
        acceptAll: function() {
            const settings = {
                necessary: true,
                analytics: true
            };
            
            this.saveConsentSettings(settings);
            this.hideBanner();
            this.initializeServices();
        },
        
        rejectAll: function() {
            const settings = {
                necessary: true,
                analytics: false
            };
            
            this.saveConsentSettings(settings);
            this.hideBanner();
            this.initializeServices();
        },
        
        saveSettings: function() {
            const analyticsToggle = document.getElementById('analytics-toggle');
            const settings = {
                necessary: true,
                analytics: analyticsToggle ? analyticsToggle.checked : false
            };
            
            this.saveConsentSettings(settings);
            this.hideSettings();
            this.hideBanner();
            this.initializeServices();
        },
        
        acceptSelected: function() {
            this.saveSettings();
        },
        
        saveConsentSettings: function(settings) {
            CookieUtils.set(this.cookieName, 'true', 365);
            CookieUtils.set(this.settingsName, JSON.stringify(settings), 365);
        },
        
        getCurrentSettings: function() {
            const stored = CookieUtils.get(this.settingsName);
            if (stored) {
                try {
                    return JSON.parse(stored);
                } catch (e) {
                    return this.defaultSettings;
                }
            }
            return this.defaultSettings;
        },
        
        loadCookieSettings: function() {
            this.currentSettings = this.getCurrentSettings();
        },
        
        initializeServices: function() {
            const settings = this.getCurrentSettings();
            
            // Initialize analytics if allowed
            if (settings.analytics) {
                this.initGoogleAnalytics();
            }
        },
        
        initGoogleAnalytics: function() {
            // Add Google Analytics initialization here if needed
            // Example:
            // window.gtag = window.gtag || function() {
            //     (window.gtag.q = window.gtag.q || []).push(arguments)
            // };
            // gtag('js', new Date());
            // gtag('config', 'GA_MEASUREMENT_ID');
        },
        
        hasConsent: function(type) {
            const settings = this.getCurrentSettings();
            return settings[type] || false;
        }
    };

    // Global function to show cookie settings (used from cookie policy page)
    window.showCookieSettings = function() {
        CookieConsent.showSettings();
    };

    // Global object for external access
    window.CookieConsent = CookieConsent;

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            CookieConsent.init();
        });
    } else {
        CookieConsent.init();
    }

})();