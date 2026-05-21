<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('about'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('about'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-bg">
            <picture>
                <source type="image/webp"
                        srcset="media/foto-35-640w.webp 640w, media/foto-35-1280w.webp 1280w, media/foto-35-1920w.webp 1920w"
                        sizes="100vw">
                <img src="media/foto-35-1280w.jpg"
                     srcset="media/foto-35-640w.jpg 640w, media/foto-35-1280w.jpg 1280w, media/foto-35-1920w.jpg 1920w"
                     sizes="100vw"
                     alt="<?php echo t('about_page_title'); ?>"
                     class="hero-image"
                     width="1280" height="961"
                     fetchpriority="high">
            </picture>
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
                    <picture>
                        <source type="image/webp"
                                srcset="media/founder-isidoro-640w.webp 640w, media/founder-isidoro-1280w.webp 1280w"
                                sizes="(min-width: 1024px) 33vw, 100vw">
                        <img src="media/founder-isidoro-1280w.jpg"
                             srcset="media/founder-isidoro-640w.jpg 640w, media/founder-isidoro-1280w.jpg 1280w"
                             sizes="(min-width: 1024px) 33vw, 100vw"
                             alt="<?php echo t('about_story_title'); ?>"
                             class="founder-image"
                             width="1280" height="960"
                             loading="lazy" decoding="async">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('about_partners_title'); ?></h2>
            <p class="section-description text-center"><?php echo t('about_partners_desc'); ?></p>
            
            <div class="partners-carousel">
                <div class="partners-track">
                    <a href="https://www.marcegaglia.com/officialwebsite/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Marcegaglia', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/Marcegaglia-logo-partner-acciaio-steel.png" alt="Marcegaglia" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://ambrogiointermodal.com/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Ambrogio Intermodal', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/ambrogio.png" alt="Ambrogio Intermodal" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://utilgroup.com/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Util Group', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/logo-util-grey-B.png" alt="Util Group" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://alessiotubi.amendunitubi.it/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Alessio Tubi', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/Alessiotubi-logo.png" alt="Alessio Tubi" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://www.arvedi.it" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Acciaieria Arvedi', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/logo-acciaieria-arvedi.png" alt="Acciaieria Arvedi" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://www.isolpack.com/it/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Isolpack', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/isolpack_logo.png" alt="Isolpack" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <!-- Duplicate for seamless loop -->
                    <a href="https://www.marcegaglia.com/officialwebsite/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Marcegaglia', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/Marcegaglia-logo-partner-acciaio-steel.png" alt="Marcegaglia" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://ambrogiointermodal.com/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Ambrogio Intermodal', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/ambrogio.png" alt="Ambrogio Intermodal" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://utilgroup.com/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Util Group', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/logo-util-grey-B.png" alt="Util Group" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://alessiotubi.amendunitubi.it/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Alessio Tubi', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/Alessiotubi-logo.png" alt="Alessio Tubi" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://www.arvedi.it" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Acciaieria Arvedi', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/logo-acciaieria-arvedi.png" alt="Acciaieria Arvedi" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
                    <a href="https://www.isolpack.com/it/" target="_blank" rel="noopener" class="partner-logo" data-tooltip="<?php echo htmlspecialchars(t('partner_tooltip_visit_of') . ' Isolpack', ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="media/isolpack_logo.png" alt="Isolpack" loading="lazy">
                        <div class="partner-tooltip"><?php echo t('partner_tooltip_visit'); ?></div>
                    </a>
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
                    <div class="stat-number" data-count="57">0</div>
                    <div class="stat-label"><?php echo t('about_stat_experience'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="15">0</div>
                    <div class="stat-label"><?php echo t('about_stat_employees'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="16000">0</div>
                    <div class="stat-label"><?php echo t('about_stat_clients'); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" data-count="20">0</div>
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

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-content">
                <h2 class="section-title"><?php echo t('about_vision_title'); ?></h2>
                <div class="vision-text">
                    <blockquote><?php echo t('about_vision_quote'); ?></blockquote>
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
    <script src="js/cookies.js"></script>
</body>
</html>