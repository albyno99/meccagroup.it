<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('contact'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('contact'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero contact-hero">
        <div class="hero-bg">
            <img src="media/mecca_autotrasporti_camion.png" alt="<?php echo t('contact_page_title'); ?>" class="hero-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <h1 class="page-title"><?php echo t('contact_page_title'); ?></h1>
                <p class="page-subtitle"><?php echo t('contact_page_subtitle'); ?></p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-icon"><span class="location-icon"></span></div>
                    <h3><?php echo t('contact_address_title'); ?></h3>
                    <p>Viale Cavalieri di Vittorio Veneto, 3<br>14010 Cantarana (AT), Italia</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon"><span class="phone-icon-white"></span></div>
                    <h3><?php echo t('contact_phone_title'); ?></h3>
                    <p>
                        <a href="tel:+393316254783">+39 331 625 47 83</a><br>
                        <a href="tel:+390141943008">+39 0141 943008</a>
                    </p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon"><span class="email-icon"></span></div>
                    <h3><?php echo t('contact_email_title'); ?></h3>
                    <p>
                        <a href="mailto:info@meccagroup.it">info@meccagroup.it</a>
                    </p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">⏰</div>
                    <h3><?php echo t('contact_hours_title'); ?></h3>
                    <p>
                        <strong><?php echo t('hours_weekdays'); ?>:</strong> <?php echo t('hours_weekdays_time'); ?><br>
                        <strong><?php echo t('hours_saturday'); ?>:</strong> <?php echo t('hours_saturday_time'); ?><br>
                        <strong><?php echo t('hours_sunday'); ?>:</strong> <?php echo t('hours_closed'); ?>
                    </p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">📱</div>
                    <h3><?php echo t('contact_social_title'); ?></h3>
                    <div class="social-links">
                        <a href="https://www.facebook.com/people/Mecca-Group/61573993564211/?_rdr" target="_blank" class="social-link">
                            <span class="facebook-icon"></span>Facebook
                        </a>
                        <a href="https://www.instagram.com/meccagroup_/" target="_blank" class="social-link">
                            <span class="instagram-icon"></span>Instagram
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('contact_map_title'); ?></h2>
            <div class="map-container">
                <div class="map-placeholder">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2832.123456789!2d8.123456!3d44.987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12d2b1234567890a%3A0x1234567890abcdef!2sViale%20Cavalieri%20di%20Vittorio%20Veneto%2C%203%2C%2014010%20Cantarana%20AT%2C%20Italy!5e0!3m2!1sen!2sit!4v1234567890123!5m2!1sen!2sit" 
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 16px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="location-info">
                    <h3>Mecca Group</h3>
                    <p>Viale Cavalieri di Vittorio Veneto, 3<br>14010 Cantarana (AT), Italia</p>
                    <div class="location-actions">
                        <a href="https://maps.google.com/?q=Viale+Cavalieri+di+Vittorio+Veneto,+3,+14010+Cantarana+AT,+Italy" target="_blank" class="btn btn-outline">
                            <?php echo t('contact_map_open'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h2><?php echo t('contact_form_title'); ?></h2>
                    <p><?php echo t('contact_form_subtitle'); ?></p>
                </div>
                
                <form class="contact-form" id="contact-form" method="POST" action="process-contact.php">
                    <input type="hidden" name="lang" value="<?php echo $lang->getCurrentLanguage(); ?>">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nome"><?php echo t('contact_form_name'); ?> *</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="cognome"><?php echo t('contact_form_surname'); ?> *</label>
                            <input type="text" id="cognome" name="cognome" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email"><?php echo t('contact_form_email'); ?> *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono"><?php echo t('contact_form_phone'); ?></label>
                            <input type="tel" id="telefono" name="telefono">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="azienda"><?php echo t('contact_form_company'); ?></label>
                        <input type="text" id="azienda" name="azienda">
                    </div>
                    
                    <div class="form-group">
                        <label for="servizio"><?php echo t('contact_form_service'); ?></label>
                        <select id="servizio" name="servizio">
                            <option value=""><?php echo t('contact_form_service_select'); ?></option>
                            <option value="autotrasporti"><?php echo t('contact_form_service_auto'); ?></option>
                            <option value="materiali-edili"><?php echo t('contact_form_service_materials'); ?></option>
                            <option value="noleggio-attrezzature"><?php echo t('contact_form_service_equipment'); ?></option>
                            <option value="consulenza-tecnica"><?php echo t('contact_form_service_consulting'); ?></option>
                            <option value="altro"><?php echo t('contact_form_service_other'); ?></option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="messaggio"><?php echo t('contact_form_message'); ?> *</label>
                        <textarea id="messaggio" name="messaggio" rows="6" required placeholder="<?php echo t('contact_form_message_placeholder'); ?>"></textarea>
                    </div>
                    
                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="privacy" name="privacy" required>
                            <span class="checkmark"></span>
                            <?php echo t('contact_form_privacy'); ?> *
                        </label>
                    </div>
                    
                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="newsletter" name="newsletter">
                            <span class="checkmark"></span>
                            <?php echo t('contact_form_newsletter'); ?>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary submit-btn">
                        <span class="btn-text"><?php echo t('contact_form_submit'); ?></span>
                        <span class="btn-loader" style="display: none;"><?php echo t('contact_form_sending'); ?></span>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('contact_faq_title'); ?></h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4><?php echo t('contact_faq_1_q'); ?></h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo t('contact_faq_1_a'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4><?php echo t('contact_faq_2_q'); ?></h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo t('contact_faq_2_a'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4><?php echo t('contact_faq_3_q'); ?></h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo t('contact_faq_3_a'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4><?php echo t('contact_faq_4_q'); ?></h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo t('contact_faq_4_a'); ?></p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4><?php echo t('contact_faq_5_q'); ?></h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p><?php echo t('contact_faq_5_a'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/cookies.js"></script>
</body>
</html>