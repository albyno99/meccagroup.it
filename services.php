<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('services'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('services'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-bg">
            <img src="media/mecca_autotrasporti_camion.png" alt="<?php echo t('services_page_title'); ?>" class="hero-image">
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
                    <div class="overview-icon">⚙️</div>
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
                    <h2><?php echo t('services_autotrasporti_title'); ?></h2>
                </div>
                <h3><?php echo t('services_autotrasporti_subtitle'); ?></h3>
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
                    <img src="media/mecca_autotrasporti_camion.png" alt="<?php echo t('nav_autotrasporti'); ?>" class="service-main-image">
                    <div class="service-gallery">
                        <img src="media/autotrasporti_1.png" alt="<?php echo t('nav_autotrasporti'); ?> 1" class="gallery-thumb">
                        <img src="media/autotrasporti_2.png" alt="<?php echo t('nav_autotrasporti'); ?> 2" class="gallery-thumb">
                        <img src="media/autotrasporti_3.png" alt="<?php echo t('nav_autotrasporti'); ?> 3" class="gallery-thumb">
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
                    <h2><?php echo t('services_materiali_title'); ?></h2>
                </div>
                <h3><?php echo t('services_materiali_subtitle'); ?></h3>
                <p class="service-intro"><?php echo t('services_materiali_desc'); ?></p>
            </div>

            <div class="service-content-grid">
                <div class="service-image-container">
                    <img src="media/bricks_1.png" alt="<?php echo t('nav_materiali_edili'); ?>" class="service-main-image">
                    <div class="service-gallery">
                        <img src="media/bricks_1.png" alt="<?php echo t('nav_materiali_edili'); ?> 1" class="gallery-thumb">
                        <img src="media/bricks_2.png" alt="<?php echo t('nav_materiali_edili'); ?> 2" class="gallery-thumb">
                        <img src="media/bricks_3.png" alt="<?php echo t('nav_materiali_edili'); ?> 3" class="gallery-thumb">
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
                        <span class="phone-icon">📞</span>
                        <?php echo t('cta_phone'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>