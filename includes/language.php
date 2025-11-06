<?php
class LanguageManager {
    private $currentLang;
    private $translations;
    private $supportedLanguages = ['it', 'en'];
    private $defaultLanguage = 'it';
    
    public function __construct() {
        $this->detectLanguage();
        $this->loadTranslations();
    }
    
    private function detectLanguage() {
        // Check if language is set in URL parameter (highest priority)
        if (isset($_GET['lang']) && in_array($_GET['lang'], $this->supportedLanguages)) {
            $this->currentLang = $_GET['lang'];
            $_SESSION['lang'] = $this->currentLang;
            // Mark that user explicitly changed language
            $_SESSION['user_lang_preference'] = $this->currentLang;
            return;
        }
        
        // Check if user has a stored preference (user manually changed language before)
        if (isset($_SESSION['user_lang_preference']) && in_array($_SESSION['user_lang_preference'], $this->supportedLanguages)) {
            $this->currentLang = $_SESSION['user_lang_preference'];
            $_SESSION['lang'] = $this->currentLang;
            return;
        }
        
        // Check if language is set in session (previous automatic detection)
        if (isset($_SESSION['lang']) && in_array($_SESSION['lang'], $this->supportedLanguages)) {
            $this->currentLang = $_SESSION['lang'];
            return;
        }
        
        // Auto-detect from browser only for first visit
        $browserLang = $this->getBrowserLanguage();
        
        // If browser language is Italian, use Italian, otherwise use English
        if ($browserLang === 'it') {
            $this->currentLang = 'it';
        } else {
            $this->currentLang = 'en';
        }
        
        $_SESSION['lang'] = $this->currentLang;
    }
    
    private function getBrowserLanguage() {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
            $primaryLang = strtolower(substr($languages[0], 0, 2));
            return $primaryLang;
        }
        return $this->defaultLanguage;
    }
    
    private function loadTranslations() {
        $langFile = __DIR__ . '/../lang/' . $this->currentLang . '.php';
        if (file_exists($langFile)) {
            $this->translations = require $langFile;
        } else {
            // Fallback to default language
            $this->translations = require __DIR__ . '/../lang/' . $this->defaultLanguage . '.php';
        }
    }
    
    public function get($key, $default = '') {
        return isset($this->translations[$key]) ? $this->translations[$key] : $default;
    }
    
    public function getCurrentLanguage() {
        return $this->currentLang;
    }
    
    public function getOtherLanguage() {
        return $this->currentLang === 'it' ? 'en' : 'it';
    }
    
    public function getLanguageUrl($lang) {
        $currentUrl = $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($currentUrl);
        
        // Remove existing lang parameter
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $params);
            unset($params['lang']);
            $query = http_build_query($params);
            $newUrl = $parsedUrl['path'] . ($query ? '?' . $query : '');
        } else {
            $newUrl = $parsedUrl['path'];
        }
        
        // Add new lang parameter
        $separator = strpos($newUrl, '?') !== false ? '&' : '?';
        return $newUrl . $separator . 'lang=' . $lang;
    }
    
    public function setUserLanguagePreference($lang) {
        if (in_array($lang, $this->supportedLanguages)) {
            $this->currentLang = $lang;
            $_SESSION['lang'] = $lang;
            $_SESSION['user_lang_preference'] = $lang;
            $this->loadTranslations();
        }
    }
    
    public function clearLanguagePreference() {
        unset($_SESSION['user_lang_preference']);
        unset($_SESSION['lang']);
    }
    
    public function getSupportedLanguages() {
        return $this->supportedLanguages;
    }
    
    public function getLanguageName($lang) {
        $names = [
            'it' => 'Italiano',
            'en' => 'English'
        ];
        return isset($names[$lang]) ? $names[$lang] : $lang;
    }
    
    public function getPageUrl($page, $lang = null) {
        if ($lang === null) {
            $lang = $this->currentLang;
        }
        
        $pages = [
            'home' => 'index.php',
            'about' => 'about-us.php',
            'services' => 'services.php',
            'contact' => 'contact.php'
        ];
        
        $url = isset($pages[$page]) ? $pages[$page] : 'index.php';
        
        if ($lang !== $this->defaultLanguage) {
            $url .= '?lang=' . $lang;
        }
        
        return $url;
    }
    
    public function generateMetaTags($page) {
        $lang = $this->currentLang;
        $title = '';
        $description = '';
        $canonical = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        
        switch($page) {
            case 'home':
                $title = ($lang === 'it') ? 'Mecca Group - Trasporti e Materiali Edili dal 1970' : 'Mecca Group - Transport and Building Materials since 1970';
                $description = $this->get('meta_description_home');
                break;
            case 'about':
                $title = ($lang === 'it') ? 'Chi Siamo - Mecca Group' : 'About Us - Mecca Group';
                $description = $this->get('meta_description_about');
                break;
            case 'services':
                $title = ($lang === 'it') ? 'Servizi - Mecca Group' : 'Services - Mecca Group';
                $description = $this->get('meta_description_services');
                break;
            case 'contact':
                $title = ($lang === 'it') ? 'Contatti - Mecca Group' : 'Contact - Mecca Group';
                $description = $this->get('meta_description_contact');
                break;
        }
        
        $meta = '<title>' . htmlspecialchars($title) . '</title>' . "\n";
        $meta .= '<meta name="description" content="' . htmlspecialchars($description) . '">' . "\n";
        $meta .= '<meta name="robots" content="index, follow">' . "\n";
        $meta .= '<meta name="author" content="Mecca Group">' . "\n";
        $meta .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
        
        // Open Graph tags
        $meta .= '<meta property="og:title" content="' . htmlspecialchars($title) . '">' . "\n";
        $meta .= '<meta property="og:description" content="' . htmlspecialchars($description) . '">' . "\n";
        $meta .= '<meta property="og:type" content="website">' . "\n";
        $meta .= '<meta property="og:url" content="https://' . $canonical . '">' . "\n";
        $meta .= '<meta property="og:image" content="https://' . $_SERVER['HTTP_HOST'] . '/media/mecca_logo_red.png">' . "\n";
        $meta .= '<meta property="og:locale" content="' . ($lang === 'it' ? 'it_IT' : 'en_US') . '">' . "\n";
        
        // Twitter Card tags
        $meta .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
        $meta .= '<meta name="twitter:title" content="' . htmlspecialchars($title) . '">' . "\n";
        $meta .= '<meta name="twitter:description" content="' . htmlspecialchars($description) . '">' . "\n";
        $meta .= '<meta name="twitter:image" content="https://' . $_SERVER['HTTP_HOST'] . '/media/mecca_logo_red.png">' . "\n";
        
        // Language alternates
        $meta .= '<link rel="alternate" hreflang="it" href="https://' . $_SERVER['HTTP_HOST'] . $this->getPageUrl($page, 'it') . '">' . "\n";
        $meta .= '<link rel="alternate" hreflang="en" href="https://' . $_SERVER['HTTP_HOST'] . $this->getPageUrl($page, 'en') . '">' . "\n";
        $meta .= '<link rel="alternate" hreflang="x-default" href="https://' . $_SERVER['HTTP_HOST'] . $this->getPageUrl($page, 'it') . '">' . "\n";
        
        // Canonical URL
        $meta .= '<link rel="canonical" href="https://' . $canonical . '">' . "\n";
        
        return $meta;
    }
    
    public function generateStructuredData($page) {
        $lang = $this->currentLang;
        $structuredData = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "Mecca Group",
            "url" => "https://" . $_SERVER['HTTP_HOST'],
            "logo" => "https://" . $_SERVER['HTTP_HOST'] . "/media/mecca_logo_red.png",
            "description" => $this->get('footer_tagline'),
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "Viale Cavalieri di Vittorio Veneto, 3",
                "addressLocality" => "Cantarana",
                "addressRegion" => "AT",
                "postalCode" => "14010",
                "addressCountry" => "IT"
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+39-331-625-4783",
                "contactType" => "customer service",
                "availableLanguage" => ["Italian", "English"]
            ],
            "foundingDate" => "1970",
            "numberOfEmployees" => "25",
            "industry" => "Transportation and Building Materials",
            "sameAs" => [
                "https://instagram.com/meccagroup_"
            ]
        ];
        
        return '<script type="application/ld+json">' . json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}

// Helper function for templates
function t($key, $default = '') {
    global $lang;
    return $lang->get($key, $default);
}

// Initialize language manager
session_start();
$lang = new LanguageManager();
?>