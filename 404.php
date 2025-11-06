<?php 
require_once 'includes/language.php';
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLanguage(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('error_404_title'); ?> | Mecca Group</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="error-page">
        <div class="container">
            <div class="error-content">
                <div class="error-number">404</div>
                <h1 class="error-title"><?php echo t('error_404_title'); ?></h1>
                <p class="error-description"><?php echo t('error_404_description'); ?></p>
                
                <div class="error-actions">
                    <a href="index.php" class="btn btn-primary"><?php echo t('error_404_home_button'); ?></a>
                    <a href="contact.php" class="btn btn-outline"><?php echo t('error_404_contact_button'); ?></a>
                </div>
                
                <div class="error-links">
                    <h3><?php echo t('error_404_links_title'); ?></h3>
                    <ul>
                        <li><a href="about-us.php"><?php echo t('nav_about'); ?></a></li>
                        <li><a href="services.php"><?php echo t('nav_services'); ?></a></li>
                        <li><a href="contact.php"><?php echo t('nav_contact'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/script.js"></script>
</body>
</html>