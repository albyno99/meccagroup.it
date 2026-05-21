<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('services'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('services'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-bg">
            <picture>
                <source type="image/webp"
                        srcset="media/hero-services-640w.webp 640w, media/hero-services-1280w.webp 1280w, media/hero-services-1920w.webp 1920w"
                        sizes="100vw">
                <img src="media/hero-services-1280w.jpg"
                     srcset="media/hero-services-640w.jpg 640w, media/hero-services-1280w.jpg 1280w, media/hero-services-1920w.jpg 1920w"
                     sizes="100vw"
                     alt="<?php echo t('services_page_title'); ?>"
                     class="hero-image"
                     width="1280" height="818"
                     fetchpriority="high">
            </picture>
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <h1 class="page-title"><?php echo t('services_page_title'); ?></h1>
                <p class="page-subtitle"><?php echo t('services_page_subtitle'); ?></p>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="services-overview">
        <div class="container">
            <div class="overview-grid">
                <div class="overview-item">
                    <div class="overview-icon">🚛</div>
                    <h3><?php echo t('services_overview_1_title'); ?></h3>
                    <p><?php echo t('services_overview_1_desc'); ?></p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">🏗️</div>
                    <h3><?php echo t('services_overview_2_title'); ?></h3>
                    <p><?php echo t('services_overview_2_desc'); ?></p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">🌍</div>
                    <h3><?php echo t('services_overview_3_title'); ?></h3>
                    <p><?php echo t('services_overview_3_desc'); ?></p>
                </div>
                <div class="overview-item">
                    <div class="overview-icon">💼</div>
                    <h3><?php echo t('services_overview_4_title'); ?></h3>
                    <p><?php echo t('services_overview_4_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Autotrasporti Section -->
    <section id="autotrasporti" class="service-detail autotrasporti">
        <div class="container">
            <div class="service-header">
                <div class="service-brand">
                    <img src="media/mecca_logo_autotrasporti.png" alt="<?php echo t('nav_autotrasporti'); ?>" class="service-brand-logo">
                    <h2><?php echo t('nav_autotrasporti'); ?></h2>
                </div>
                <p class="service-intro"><?php echo t('services_autotrasporti_desc'); ?></p>
            </div>

            <div class="service-content-grid">
                <div class="service-features">
                    <h4><?php echo t('services_auto_features_title'); ?></h4>
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">🚚</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_1_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_1_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📏</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_2_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_2_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🏭</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_3_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_3_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🚛</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_4_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_4_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🌍</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_5_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_5_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📋</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_auto_feature_6_title'); ?></h5>
                                <p><?php echo t('services_auto_feature_6_desc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-image-container">
                    <picture>
                        <source type="image/webp"
                                srcset="media/foto-21-640w.webp 640w, media/foto-21-1280w.webp 1280w"
                                sizes="(min-width: 1024px) 50vw, 100vw">
                        <img src="media/foto-21-1280w.jpg"
                             srcset="media/foto-21-640w.jpg 640w, media/foto-21-1280w.jpg 1280w"
                             sizes="(min-width: 1024px) 50vw, 100vw"
                             alt="<?php echo t('nav_autotrasporti'); ?>"
                             class="service-main-image"
                             width="1280" height="960"
                             loading="lazy" decoding="async">
                    </picture>
                    <div class="service-gallery">
                        <img src="media/foto-12-640w.jpg" alt="<?php echo t('nav_autotrasporti'); ?> 1" class="gallery-thumb" loading="lazy" decoding="async" width="512" height="640" data-large-jpg="media/foto-12-1280w.jpg" data-large-webp="media/foto-12-1280w.webp">
                        <img src="media/foto-4-640w.jpg"  alt="<?php echo t('nav_autotrasporti'); ?> 2" class="gallery-thumb" loading="lazy" decoding="async" width="480" height="640" data-large-jpg="media/foto-4-1280w.jpg"  data-large-webp="media/foto-4-1280w.webp">
                        <img src="media/foto-23-640w.jpg" alt="<?php echo t('nav_autotrasporti'); ?> 3" class="gallery-thumb" loading="lazy" decoding="async" width="640" height="512" data-large-jpg="media/foto-23-1280w.jpg" data-large-webp="media/foto-23-1280w.webp">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Materiali Edili Section -->
    <section id="materiali-edili" class="service-detail materiali-edili">
        <div class="container">
            <div class="service-header">
                <div class="service-brand">
                    <img src="media/mecca_logo_edili.png" alt="<?php echo t('nav_materiali_edili'); ?>" class="service-brand-logo">
                    <h2><?php echo t('nav_materiali_edili'); ?></h2>
                </div>
                <p class="service-intro"><?php echo t('services_materiali_desc'); ?></p>
            </div>

            <div class="service-content-grid">
                <div class="service-image-container">
                    <picture>
                        <source type="image/webp"
                                srcset="media/foto-41-640w.webp 640w, media/foto-41-1280w.webp 1280w"
                                sizes="(min-width: 1024px) 50vw, 100vw">
                        <img src="media/foto-41-1280w.jpg"
                             srcset="media/foto-41-640w.jpg 640w, media/foto-41-1280w.jpg 1280w"
                             sizes="(min-width: 1024px) 50vw, 100vw"
                             alt="<?php echo t('nav_materiali_edili'); ?>"
                             class="service-main-image"
                             width="1280" height="960"
                             loading="lazy" decoding="async">
                    </picture>
                    <div class="service-gallery">
                        <img src="media/foto-38-640w.jpg" alt="<?php echo t('nav_materiali_edili'); ?> 1" class="gallery-thumb" loading="lazy" decoding="async" width="640" height="480" data-large-jpg="media/foto-38-1280w.jpg" data-large-webp="media/foto-38-1280w.webp">
                        <img src="media/foto-39-640w.jpg" alt="<?php echo t('nav_materiali_edili'); ?> 2" class="gallery-thumb" loading="lazy" decoding="async" width="640" height="480" data-large-jpg="media/foto-39-1280w.jpg" data-large-webp="media/foto-39-1280w.webp">
                        <img src="media/foto-40-640w.jpg" alt="<?php echo t('nav_materiali_edili'); ?> 3" class="gallery-thumb" loading="lazy" decoding="async" width="640" height="480" data-large-jpg="media/foto-40-1280w.jpg" data-large-webp="media/foto-40-1280w.webp">
                    </div>
                </div>
                <div class="service-features">
                    <h4><?php echo t('services_materials_features_title'); ?></h4>
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon">🧱</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_1_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_1_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">⛰️</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_2_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_2_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🏗️</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_3_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_3_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🚚</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_4_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_4_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">🔧</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_5_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_5_desc'); ?></p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">📦</div>
                            <div class="feature-content">
                                <h5><?php echo t('services_materials_feature_6_title'); ?></h5>
                                <p><?php echo t('services_materials_feature_6_desc'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="process-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('services_process_title'); ?></h2>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h4><?php echo t('services_process_1_title'); ?></h4>
                    <p><?php echo t('services_process_1_desc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h4><?php echo t('services_process_2_title'); ?></h4>
                    <p><?php echo t('services_process_2_desc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h4><?php echo t('services_process_3_title'); ?></h4>
                    <p><?php echo t('services_process_3_desc'); ?></p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h4><?php echo t('services_process_4_title'); ?></h4>
                    <p><?php echo t('services_process_4_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('services_why_title'); ?></h2>
            <div class="advantages-grid">
                <div class="advantage-card">
                    <div class="advantage-icon">⏰</div>
                    <h4><?php echo t('services_why_1_title'); ?></h4>
                    <p><?php echo t('services_why_1_desc'); ?></p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">✅</div>
                    <h4><?php echo t('services_why_2_title'); ?></h4>
                    <p><?php echo t('services_why_2_desc'); ?></p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🎯</div>
                    <h4><?php echo t('services_why_3_title'); ?></h4>
                    <p><?php echo t('services_why_3_desc'); ?></p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">💰</div>
                    <h4><?php echo t('services_why_4_title'); ?></h4>
                    <p><?php echo t('services_why_4_desc'); ?></p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🛡️</div>
                    <h4><?php echo t('services_why_5_title'); ?></h4>
                    <p><?php echo t('services_why_5_desc'); ?></p>
                </div>
                <div class="advantage-card">
                    <div class="advantage-icon">🤝</div>
                    <h4><?php echo t('services_why_6_title'); ?></h4>
                    <p><?php echo t('services_why_6_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo t('services_cta_title'); ?></h2>
                <p><?php echo t('services_cta_desc'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo $lang->getPageUrl('contact'); ?>" class="btn btn-primary"><?php echo t('services_cta_quote'); ?></a>
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