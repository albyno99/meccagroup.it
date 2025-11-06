<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('about'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('about'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-bg">
            <img src="media/mecca_isidoro_copertina.png" alt="<?php echo t('about_page_title'); ?>" class="hero-image">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content">
            <div class="container">
                <h1 class="page-title"><?php echo t('about_page_title'); ?></h1>
                <p class="page-subtitle"><?php echo t('about_page_subtitle'); ?></p>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="story-grid">
                <div class="story-content">
                    <h2 class="section-title"><?php echo t('about_story_title'); ?></h2>
                    <div class="story-text">
                        <p><?php echo t('about_story_p1'); ?></p>
                        <p><?php echo t('about_story_p2'); ?></p>
                        <p><?php echo t('about_story_p3'); ?></p>
                    </div>
                </div>
                <div class="story-image">
                    <img src="media/mecca_isidoro_copertina.png" alt="<?php echo t('about_story_title'); ?>" class="founder-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('about_values_title'); ?></h2>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">🏗️</div>
                    <h3><?php echo t('about_value_quality'); ?></h3>
                    <p><?php echo t('about_value_quality_desc'); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🤝</div>
                    <h3><?php echo t('about_value_reliability'); ?></h3>
                    <p><?php echo t('about_value_reliability_desc'); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon">👨‍💼</div>
                    <h3><?php echo t('about_value_professionalism'); ?></h3>
                    <p><?php echo t('about_value_professionalism_desc'); ?></p>
                </div>
                <div class="value-card">
                    <div class="value-icon">🌱</div>
                    <h3><?php echo t('about_value_sustainability'); ?></h3>
                    <p><?php echo t('about_value_sustainability_desc'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('about_team_title'); ?></h2>
            <p class="section-description text-center"><?php echo t('about_team_desc'); ?></p>
            
            <div class="team-stats">
                <div class="stat-item">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label"><?php echo t('about_stat_experience'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="25">0</div>
                    <div class="stat-label"><?php echo t('about_stat_employees'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label"><?php echo t('about_stat_clients'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label"><?php echo t('about_stat_vehicles'); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-content">
                <h2 class="section-title"><?php echo t('about_mission_title'); ?></h2>
                <div class="mission-text">
                    <blockquote><?php echo t('about_mission_quote'); ?></blockquote>
                    <p><?php echo t('about_mission_desc'); ?></p>
                    <ul class="mission-list">
                        <li><?php echo t('about_mission_1'); ?></li>
                        <li><?php echo t('about_mission_2'); ?></li>
                        <li><?php echo t('about_mission_3'); ?></li>
                        <li><?php echo t('about_mission_4'); ?></li>
                        <li><?php echo t('about_mission_5'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="certifications-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('about_cert_title'); ?></h2>
            <div class="certifications-content">
                <div class="cert-text">
                    <p><?php echo t('about_cert_desc'); ?></p>
                    <ul class="cert-list">
                        <li><?php echo t('about_cert_1'); ?></li>
                        <li><?php echo t('about_cert_2'); ?></li>
                        <li><?php echo t('about_cert_3'); ?></li>
                        <li><?php echo t('about_cert_4'); ?></li>
                        <li><?php echo t('about_cert_5'); ?></li>
                    </ul>
                </div>
                <div class="cert-logos">
                    <div class="cert-placeholder">
                        <span>ISO 9001</span>
                    </div>
                    <div class="cert-placeholder">
                        <span><?php echo $lang->getCurrentLanguage() === 'it' ? 'Trasporti Eccezionali' : 'Exceptional Transport'; ?></span>
                    </div>
                    <div class="cert-placeholder">
                        <span><?php echo $lang->getCurrentLanguage() === 'it' ? 'Sicurezza' : 'Safety'; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2><?php echo t('about_cta_title'); ?></h2>
                <p><?php echo t('about_cta_desc'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo $lang->getPageUrl('contact'); ?>" class="btn btn-primary"><?php echo t('cta_contact'); ?></a>
                    <a href="<?php echo $lang->getPageUrl('services'); ?>" class="btn btn-outline"><?php echo t('about_cta_services'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>