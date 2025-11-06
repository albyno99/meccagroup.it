<?php
require_once __DIR__ . '/language.php';
?>
<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <img src="media/mecca_logo_white.png" alt="Mecca Group" class="logo">
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="<?php echo $lang->getPageUrl('home'); ?>" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>"><?php echo t('nav_home'); ?></a>
            </li>
            <li class="nav-item">
                <a href="<?php echo $lang->getPageUrl('about'); ?>" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'about-us.php' ? 'active' : ''; ?>"><?php echo t('nav_about'); ?></a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?php echo $lang->getPageUrl('services'); ?>" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'services.php' ? 'active' : ''; ?>"><?php echo t('nav_services'); ?></a>
                <div class="dropdown-content">
                    <a href="<?php echo $lang->getPageUrl('services'); ?>#autotrasporti">
                        <img src="media/mecca_logo_autotrasporti.png" alt="<?php echo t('nav_autotrasporti'); ?>">
                        <?php echo t('nav_autotrasporti'); ?>
                    </a>
                    <a href="<?php echo $lang->getPageUrl('services'); ?>#materiali-edili">
                        <img src="media/mecca_logo_edili.png" alt="<?php echo t('nav_materiali_edili'); ?>">
                        <?php echo t('nav_materiali_edili'); ?>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a href="<?php echo $lang->getPageUrl('contact'); ?>" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : ''; ?>"><?php echo t('nav_contact'); ?></a>
            </li>
            <!-- Language Toggle -->
            <li class="nav-item language-toggle">
                <div class="language-switcher">
                    <span class="current-lang"><?php echo strtoupper($lang->getCurrentLanguage()); ?></span>
                    <div class="language-dropdown">
                        <?php if($lang->getCurrentLanguage() === 'it'): ?>
                            <a href="<?php echo $lang->getLanguageUrl('en'); ?>" class="lang-option">
                                <img src="media/flag-en.svg" alt="English" class="flag-icon">
                                <span>EN</span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo $lang->getLanguageUrl('it'); ?>" class="lang-option">
                                <img src="media/flag-it.svg" alt="Italiano" class="flag-icon">
                                <span>IT</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>