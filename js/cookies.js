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
            const banner = document.createElement('div');
            banner.className = 'cookie-banner';
            banner.innerHTML = `
                <div class="cookie-banner-content">
                    <div class="cookie-banner-text">
                        <h3>${this.translations.title}</h3>
                        <p>${this.translations.message}</p>
                    </div>
                    <div class="cookie-banner-actions">
                        <button class="cookie-btn cookie-btn-accept" onclick="CookieConsent.acceptAll()">
                            ${this.translations.accept}
                        </button>
                        <button class="cookie-btn cookie-btn-settings" onclick="CookieConsent.showSettings()">
                            ${this.translations.settings}
                        </button>
                        <button class="cookie-btn cookie-btn-reject" onclick="CookieConsent.rejectAll()">
                            ${this.translations.reject}
                        </button>
                        <a href="/cookie-policy.php" class="cookie-learn-more" target="_blank">
                            ${this.translations.learnMore}
                        </a>
                    </div>
                </div>
            `;
            
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
            const modal = document.createElement('div');
            modal.className = 'cookie-settings-modal';
            modal.innerHTML = `
                <div class="cookie-settings-overlay" onclick="CookieConsent.hideSettings()"></div>
                <div class="cookie-settings-content">
                    <div class="cookie-settings-header">
                        <h2>${this.translations.settingsTitle}</h2>
                        <button class="cookie-settings-close" onclick="CookieConsent.hideSettings()">×</button>
                    </div>
                    <div class="cookie-settings-body">
                        <p>${this.translations.settingsDescription}</p>
                        
                        <div class="cookie-category">
                            <div class="cookie-category-header">
                                <label class="cookie-toggle">
                                    <input type="checkbox" checked disabled>
                                    <span class="toggle-slider"></span>
                                    <span class="toggle-label">${this.translations.necessaryTitle}</span>
                                </label>
                            </div>
                            <p class="cookie-category-description">${this.translations.necessaryDescription}</p>
                        </div>
                        
                        <div class="cookie-category">
                            <div class="cookie-category-header">
                                <label class="cookie-toggle">
                                    <input type="checkbox" id="analytics-toggle" ${settings.analytics ? 'checked' : ''}>
                                    <span class="toggle-slider"></span>
                                    <span class="toggle-label">${this.translations.analyticsTitle}</span>
                                </label>
                            </div>
                            <p class="cookie-category-description">${this.translations.analyticsDescription}</p>
                        </div>
                    </div>
                    <div class="cookie-settings-footer">
                        <button class="cookie-btn cookie-btn-accept" onclick="CookieConsent.saveSettings()">
                            ${this.translations.save}
                        </button>
                        <button class="cookie-btn cookie-btn-secondary" onclick="CookieConsent.acceptSelected()">
                            ${this.translations.acceptSelected}
                        </button>
                    </div>
                </div>
            `;
            
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