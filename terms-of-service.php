<?php require_once 'includes/language.php'; ?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <?php echo $lang->generateMetaTags('terms'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <?php echo $lang->generateStructuredData('terms'); ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo t('terms_title'); ?></h1>
            <p class="page-subtitle">
                <?php echo t('terms_last_updated'); ?>: <?php echo t('terms_effective_date'); ?>
            </p>
        </div>
    </section>

    <!-- Terms Content -->
    <section class="legal-content">
        <div class="container">
            <div class="legal-text">
                
                <div class="legal-section">
                    <h2><?php echo t('terms_section_1_title'); ?></h2>
                    <p><?php echo t('terms_section_1_content'); ?></p>
                </div>

                <div class="legal-section">
                    <h2><?php echo t('terms_section_2_title'); ?></h2>
                    <p><?php echo t('terms_section_2_content'); ?></p>
                </div>

                <div class="legal-section">
                    <h2><?php echo t('terms_section_3_title'); ?></h2>
                    <p><?php echo t('terms_section_3_content'); ?></p>
                </div>

                <div class="legal-section">
                    <h2><?php echo t('terms_section_4_title'); ?></h2>
                    <p><?php echo t('terms_section_4_content'); ?></p>
                </div>

                <div class="legal-section">
                    <h2><?php echo t('terms_section_5_title'); ?></h2>
                    <p><?php echo t('terms_section_5_content'); ?></p>
                </div>

                <div class="legal-section">
                    <h2><?php echo t('terms_section_6_title'); ?></h2>
                    <p><?php echo t('terms_section_6_content'); ?></p>
                </div>

                <div class="contact-info">
                    <h3><?php echo t('footer_contact_title'); ?></h3>
                    <p>
                        <strong>Mecca Group</strong><br>
                        Viale Cavalieri di Vittorio Veneto, 3<br>
                        14010 Cantarana (AT), Italia<br>
                        <a href="tel:+393316254783">+39 331 625 47 83</a> / 
                        <a href="tel:+390141943008">+39 0141 943008</a><br>
                        <a href="mailto:info@meccagroup.it">info@meccagroup.it</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>