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
        <div class="hero-bg" style="--lqip:url('data:image/webp;base64,UklGRigBAABXRUJQVlA4IBwBAAAQBwCdASooAB8APxF6sFEsKCSisBqoAYAiCWgAnTNEb1QL7Bo6zY5a/i7dasBSgmchgKVn+0aSk3lJuHc4HBkrgAD++xMoPJBobT6UBF69rffSivWXGSii8fPiIRydM7etg9ceW4CtQwp8/qEe0lagA0JjND47XI6QRKjSiVka68Hf7NkE7GPCOJf4P6DT/od1KtV1QeFNRR+5cgE1igrIYXP9/3wicgj6K0C8qu/BGynsSGrcq86NCDlymOAX2Fm+0+8EpG7WDa0ugfDYSDhvULJQ70ev6xT5yNR19GN4AbfehfyNSuR1b7tpRzJpIpiFP9tzF6fOdTPI3Z/wVXK7oV5DkTK23E2UHduzm/aqs+Xx9CtKmGf6fIAAAA==');">
            <picture>
                <source type="image/webp"
                        srcset="media/foto-5-640w.webp 640w, media/foto-5-1280w.webp 1280w, media/foto-5-1920w.webp 1920w"
                        sizes="100vw">
                <img src="media/foto-5-1280w.jpg"
                     srcset="media/foto-5-640w.jpg 640w, media/foto-5-1280w.jpg 1280w, media/foto-5-1920w.jpg 1920w"
                     sizes="100vw"
                     alt="Mecca Group Hero"
                     class="hero-image"
                     width="1280" height="961"
                     fetchpriority="high">
            </picture>
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
                        <picture>
                            <source type="image/webp"
                                    srcset="media/card-autotrasporti-640w.webp 640w, media/card-autotrasporti-1280w.webp 1280w"
                                    sizes="(min-width: 1024px) 50vw, 100vw">
                            <img src="media/card-autotrasporti-1280w.jpg"
                                 srcset="media/card-autotrasporti-640w.jpg 640w, media/card-autotrasporti-1280w.jpg 1280w"
                                 sizes="(min-width: 1024px) 50vw, 100vw"
                                 alt="<?php echo t('nav_autotrasporti'); ?>"
                                 class="fade-on-load"
                                 width="1280" height="1011"
                                 loading="lazy" decoding="async">
                        </picture>
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
                        <picture>
                            <source type="image/webp"
                                    srcset="media/card-edili-640w.webp 640w, media/card-edili-1280w.webp 1280w"
                                    sizes="(min-width: 1024px) 50vw, 100vw">
                            <img src="media/card-edili-1280w.jpg"
                                 srcset="media/card-edili-640w.jpg 640w, media/card-edili-1280w.jpg 1280w"
                                 sizes="(min-width: 1024px) 50vw, 100vw"
                                 alt="<?php echo t('nav_materiali_edili'); ?>"
                                 class="fade-on-load"
                                 width="960" height="1280"
                                 loading="lazy" decoding="async">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trailers Section -->
    <section class="trailers-section">
        <div class="container">
            <h2 class="section-title text-center"><?php echo t('trailers_title'); ?></h2>
            <p class="section-description text-center"><?php echo t('trailers_desc'); ?></p>
            
            <div class="trailers-grid">
                <div class="trailer-card">
                    <div class="trailer-image white-bg">
                        <img src="media/Flip_tarp.png" alt="<?php echo t('trailer_flip_tarp'); ?>" loading="lazy">
                    </div>
                    <h3><?php echo t('trailer_flip_tarp'); ?></h3>
                    <p><?php echo t('trailer_flip_tarp_desc'); ?></p>
                </div>

                <div class="trailer-card">
                    <div class="trailer-image">
                        <img src="media/trasporto_coils.png" alt="<?php echo t('trailer_coils'); ?>" loading="lazy">
                    </div>
                    <h3><?php echo t('trailer_coils'); ?></h3>
                    <p><?php echo t('trailer_coils_desc'); ?></p>
                </div>

                <div class="trailer-card">
                    <div class="trailer-image">
                        <img src="media/Porta_container.png" alt="<?php echo t('trailer_container'); ?>" loading="lazy">
                    </div>
                    <h3><?php echo t('trailer_container'); ?></h3>
                    <p><?php echo t('trailer_container_desc'); ?></p>
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

    <!-- Instagram Section -->
    <section class="instagram-section">
        <div class="container">
            <h2 class="section-title"><?php echo t('instagram_title'); ?></h2>
            <p class="section-subtitle">
                <a href="https://www.instagram.com/meccagroup_/" target="_blank" class="instagram-link">
                    <span class="instagram-icon"></span>@meccagroup_
                </a>
            </p>
            
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