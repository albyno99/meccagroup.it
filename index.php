<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('home'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('home'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg">
            <img src="media/mecca_isidoro_copertina.png" alt="Mecca Group Hero" class="hero-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <h1 class="hero-title">
                    <span class="hero-title-main"><?php echo t('hero_title_main'); ?></span>
                    <span class="hero-title-sub"><?php echo t('hero_title_sub'); ?></span>
                </h1>
                <p class="hero-subtitle"><?php echo t('hero_subtitle'); ?></p>
                <div class="hero-cta">
                    <a href="<?php echo $lang->getPageUrl('services'); ?>" class="btn btn-primary"><?php echo t('hero_cta_services'); ?></a>
                    <a href="<?php echo $lang->getPageUrl('contact'); ?>" class="btn btn-outline"><?php echo t('hero_cta_quote'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-preview">
        <div class="container">
            <div class="services-grid">
                <!-- Autotrasporti -->
                <div class="service-card autotrasporti">
                    <div class="service-content">
                        <div class="service-header">
                            <img src="media/mecca_logo_autotrasporti.png" alt="<?php echo t('nav_autotrasporti'); ?>" class="service-logo">
                            <h2><?php echo t('services_autotrasporti_title'); ?></h2>
                        </div>
                        <h3><?php echo t('services_autotrasporti_subtitle'); ?></h3>
                        <p><?php echo t('services_autotrasporti_desc'); ?></p>
                        <a href="<?php echo $lang->getPageUrl('services'); ?>#autotrasporti" class="service-link"><?php echo t('services_discover_more'); ?></a>
                    </div>
                    <div class="service-image">
                        <img src="media/mecca_autotrasporti_camion.png" alt="<?php echo t('nav_autotrasporti'); ?>">
                    </div>
                </div>

                <!-- Materiali Edili -->
                <div class="service-card materiali-edili">
                    <div class="service-content">
                        <div class="service-header">
                            <img src="media/mecca_logo_edili.png" alt="<?php echo t('nav_materiali_edili'); ?>" class="service-logo">
                            <h2><?php echo t('services_materiali_title'); ?></h2>
                        </div>
                        <h3><?php echo t('services_materiali_subtitle'); ?></h3>
                        <p><?php echo t('services_materiali_desc'); ?></p>
                        <a href="<?php echo $lang->getPageUrl('services'); ?>#materiali-edili" class="service-link"><?php echo t('services_discover_more'); ?></a>
                    </div>
                    <div class="service-image">
                        <img src="media/bricks_1.png" alt="<?php echo t('nav_materiali_edili'); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="instagram-section">
        <div class="container">
            <h2 class="section-title"><?php echo t('instagram_title'); ?></h2>
            <p class="section-subtitle">@meccagroup_</p>
            
            <div class="instagram-grid">
                <!-- La Storia -->
                <div class="instagram-card">
                    <div class="instagram-content">
                        <h3><?php echo t('instagram_story'); ?></h3>
                        <div class="instagram-embed">
                            <iframe 
                                src="https://www.instagram.com/p/DIjiWztqccQ/embed/" 
                                frameborder="0" 
                                width="100%" 
                                scrolling="no" 
                                allowtransparency="true"
                                style="border:none;overflow:hidden;width:100%;min-height:600px;">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- I Nostri Servizi -->
                <div class="instagram-card">
                    <div class="instagram-content">
                        <h3><?php echo t('instagram_services'); ?></h3>
                        <div class="instagram-embed">
                            <iframe 
                                src="https://www.instagram.com/p/DH3mawksRrG/embed/" 
                                frameborder="0" 
                                width="100%" 
                                scrolling="no" 
                                allowtransparency="true"
                                style="border:none;overflow:hidden;width:100%;min-height:600px;">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- 3° Post Instagram -->
                <div class="instagram-card">
                    <div class="instagram-content">
                        <h3><?php echo t('instagram_post3'); ?></h3>
                        <div class="instagram-embed">
                            <iframe 
                                src="https://www.instagram.com/p/DMaY_SVMvAQ/embed/" 
                                frameborder="0" 
                                width="100%" 
                                scrolling="no" 
                                allowtransparency="true"
                                style="border:none;overflow:hidden;width:100%;min-height:600px;">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo t('cta_title'); ?></h2>
                <p><?php echo t('cta_subtitle'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo $lang->getPageUrl('contact'); ?>" class="btn btn-primary"><?php echo t('cta_contact'); ?></a>
                    <a href="tel:+393316254783" class="btn btn-outline">
                        <span class="phone-icon-white"></span>
                        +39 331 625 47 83
                    </a>
                    <a href="tel:+390141943008" class="btn btn-outline">
                        <span class="phone-icon-white"></span>
                        +39 0141 943008
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
    <script src="js/cookies.js"></script>
</body>
</html>