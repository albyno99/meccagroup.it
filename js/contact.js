// Contact page specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Contact form handling
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleFormSubmit);
    }

    // FAQ functionality
    initializeFAQ();
    
    // Form validation
    initializeFormValidation();
});

function handleFormSubmit(e) {
    e.preventDefault();
    
    const submitBtn = e.target.querySelector('.submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnLoader = submitBtn.querySelector('.btn-loader');
    
    // Show loading state
    btnText.style.display = 'none';
    btnLoader.style.display = 'inline';
    submitBtn.disabled = true;
    
    // Collect form data
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData.entries());
    
    // Simulate form submission (replace with actual endpoint)
    setTimeout(() => {
        // Reset button state
        btnText.style.display = 'inline';
        btnLoader.style.display = 'none';
        submitBtn.disabled = false;
        
        // Show success message
        showNotification('Grazie per la tua richiesta! Ti risponderemo entro 24 ore.', 'success');
        
        // Reset form
        e.target.reset();
        
        // Log data for development (remove in production)
        console.log('Form submitted with data:', data);
        
    }, 2000);
}

function initializeFAQ() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all other FAQ items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            if (isActive) {
                item.classList.remove('active');
            } else {
                item.classList.add('active');
            }
        });
    });
}

function initializeFormValidation() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        // Real-time validation
        input.addEventListener('blur', function() {
            validateField(this);
        });
        
        input.addEventListener('input', function() {
            // Remove error styling when user starts typing
            if (this.classList.contains('error')) {
                this.classList.remove('error');
            }
        });
    });
}

function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    
    // Required field validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
    }
    
    // Email validation
    if (field.type === 'email' && value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            isValid = false;
        }
    }
    
    // Phone validation (Italian format)
    if (field.type === 'tel' && value) {
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{8,15}$/;
        if (!phoneRegex.test(value)) {
            isValid = false;
        }
    }
    
    // Add or remove error class
    if (isValid) {
        field.classList.remove('error');
    } else {
        field.classList.add('error');
    }
    
    return isValid;
}

// Utility function for notifications (if not already included)
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

    // Remove after 5 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (document.body.contains(notification)) {
                document.body.removeChild(notification);
            }
        }, 300);
    }, 5000);
}

// Form field auto-format functions
function formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (value.startsWith('39')) {
        value = '+' + value;
    } else if (value.startsWith('0') || value.startsWith('3')) {
        value = '+39 ' + value;
    }
    
    input.value = value;
}

// Add phone formatting on input
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('telefono');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            formatPhoneNumber(this);
        });
    }
});

// Map interaction
function initializeMap() {
    // If using Google Maps API, initialize here
    // For now, we're using iframe embed
    const mapContainer = document.querySelector('.map-placeholder');
    if (mapContainer) {
        console.log('Map container loaded');
    }
}

// Contact card click handlers
document.addEventListener('DOMContentLoaded', function() {
    // Make phone numbers clickable on mobile
    const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    phoneLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Track phone clicks for analytics
            console.log('Phone number clicked:', this.href);
        });
    });
    
    // Make email links clickable
    const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
    emailLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Track email clicks for analytics
            console.log('Email clicked:', this.href);
        });
    });
});

// Export functions for potential use
window.ContactPage = {
    validateField,
    showNotification,
    formatPhoneNumber
};