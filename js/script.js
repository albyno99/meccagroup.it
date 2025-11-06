// Mobile Navigation
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(n => {
            n.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }

    // Language switcher enhancement
    const languageSwitcher = document.querySelector('.language-switcher');
    if (languageSwitcher) {
        // Store user's language preference in localStorage
        const currentLang = document.querySelector('.current-lang').textContent.toLowerCase();
        if (!localStorage.getItem('userLangPreference')) {
            localStorage.setItem('userLangPreference', currentLang);
        }
        
        // Handle language change clicks
        document.querySelectorAll('.lang-option').forEach(option => {
            option.addEventListener('click', function(e) {
                const newLang = this.querySelector('span').textContent.toLowerCase();
                localStorage.setItem('userLangPreference', newLang);
                localStorage.setItem('langChangedByUser', 'true');
                // Let the default link behavior handle the redirect
            });
        });
    }

    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(229, 62, 62, 0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
            } else {
                navbar.style.background = 'var(--primary-red)';
                navbar.style.backdropFilter = 'none';
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
            }
        });
    }, observerOptions);

    // Observe all elements with animation classes
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Service cards hover effect
    document.querySelectorAll('.service-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Instagram cards loading effect
    const instagramIframes = document.querySelectorAll('.instagram-embed iframe');
    instagramIframes.forEach(iframe => {
        iframe.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        iframe.style.opacity = '0';
        iframe.style.transition = 'opacity 0.5s ease-in-out';
    });

    // Form validation (for contact forms)
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    field.addEventListener('input', function() {
                        this.classList.remove('error');
                    }, { once: true });
                }
            });

            if (!isValid) {
                e.preventDefault();
                showNotification('Per favore, compila tutti i campi obbligatori.', 'error');
            }
        });
    });

    // Phone number click tracking
    document.querySelectorAll('a[href^="tel:"]').forEach(phoneLink => {
        phoneLink.addEventListener('click', function() {
            // You can add analytics tracking here
            console.log('Phone number clicked:', this.href);
        });
    });

    // Newsletter subscription (if applicable)
    const newsletterForm = document.querySelector('#newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (isValidEmail(email)) {
                showNotification('Grazie per l\'iscrizione alla newsletter!', 'success');
                this.reset();
            } else {
                showNotification('Per favore, inserisci un indirizzo email valido.', 'error');
            }
        });
    }

    // Lazy loading for images
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
});

// Utility functions
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    // Style the notification
    Object.assign(notification.style, {
        position: 'fixed',
        top: '20px',
        right: '20px',
        padding: '15px 20px',
        borderRadius: '8px',
        color: 'white',
        fontWeight: '500',
        zIndex: '10000',
        transform: 'translateX(100%)',
        transition: 'transform 0.3s ease-in-out',
        maxWidth: '300px',
        boxShadow: '0 4px 12px rgba(0, 0, 0, 0.15)'
    });

    // Set background color based on type
    switch(type) {
        case 'success':
            notification.style.background = '#38A169';
            break;
        case 'error':
            notification.style.background = '#E53E3E';
            break;
        case 'warning':
            notification.style.background = '#D69E2E';
            break;
        default:
            notification.style.background = '#3182CE';
    }

    // Add to page
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Remove after 4 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 4000);
}

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const heroImage = document.querySelector('.hero-image');
    
    if (heroImage) {
        const rate = scrolled * -0.5;
        heroImage.style.transform = `translateY(${rate}px)`;
    }
});

// Service statistics counter (if needed)
function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        element.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

// Initialize statistics counters when they come into view
const statObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counter = entry.target;
            const finalValue = parseInt(counter.dataset.count);
            animateValue(counter, 0, finalValue, 2000);
            statObserver.unobserve(counter);
        }
    });
});

document.querySelectorAll('.stat-number').forEach(stat => {
    statObserver.observe(stat);
});

// Cookie consent (if needed)
function showCookieConsent() {
    if (!localStorage.getItem('cookieConsent')) {
        const consent = document.createElement('div');
        consent.innerHTML = `
            <div style="position: fixed; bottom: 0; left: 0; right: 0; background: #2D3748; color: white; padding: 20px; z-index: 10000; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div style="flex: 1; margin-right: 20px;">
                    <p>Questo sito utilizza cookie per migliorare l'esperienza utente. Continuando la navigazione accetti l'uso dei cookie.</p>
                </div>
                <div>
                    <button onclick="acceptCookies()" style="background: #E53E3E; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; margin-left: 10px;">Accetta</button>
                </div>
            </div>
        `;
        document.body.appendChild(consent);
    }
}

function acceptCookies() {
    localStorage.setItem('cookieConsent', 'true');
    const consent = document.querySelector('[style*="position: fixed; bottom: 0"]');
    if (consent) {
        consent.remove();
    }
}

// Initialize cookie consent
// showCookieConsent();

// Performance optimization: defer non-critical scripts
window.addEventListener('load', function() {
    // Initialize any third-party scripts here
    console.log('Mecca Group website loaded successfully');
});

// Error handling for missing elements
window.addEventListener('error', function(e) {
    console.log('Error caught:', e.error);
});

// Add loading state management
document.addEventListener('DOMContentLoaded', function() {
    // Remove loading class from body when page is ready
    document.body.classList.remove('loading');
    
    // Add loaded class for CSS transitions
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 100);
});

// Export functions for potential use in other scripts
window.MeccaGroup = {
    showNotification,
    isValidEmail,
    animateValue
};