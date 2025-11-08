<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <img src="media/mecca_logo_white.png" alt="Mecca Group" class="footer-logo">
                <p><?php echo t('footer_tagline'); ?></p>
                <div class="social-links">
                    <a href="https://www.facebook.com/people/Mecca-Group/61573993564211/?_rdr" target="_blank" class="social-link">
                        <span class="facebook-icon"></span>Facebook
                    </a>
                    <a href="https://www.instagram.com/meccagroup_/" target="_blank" class="social-link">
                        <span class="instagram-icon"></span>Instagram
                    </a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4><?php echo t('footer_contact_title'); ?></h4>
                <div class="contact-info">
                    <p><span class="location-icon"></span>Viale Cavalieri di Vittorio Veneto, 3<br>14010 Cantarana (AT), Italia</p>
                    <p>
                        <span class="phone-icon-white"></span>
                        <a href="tel:+393316254783" style="color: inherit; text-decoration: none;">+39 331 625 47 83</a> / 
                        <a href="tel:+390141943008" style="color: inherit; text-decoration: none;">+39 0141 943008</a>
                    </p>
                    <p><span class="email-icon"></span><a href="mailto:info@meccagroup.it" style="color: inherit; text-decoration: none;">info@meccagroup.it</a></p>
                </div>
            </div>
            
            <div class="footer-section">
                <h4><?php echo t('footer_services_title'); ?></h4>
                <ul>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>#autotrasporti"><?php echo t('nav_autotrasporti'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>#materiali-edili"><?php echo t('nav_materiali_edili'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>"><?php echo t('footer_services_equipment'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>"><?php echo t('footer_services_consulting'); ?></a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4><?php echo t('footer_hours_title'); ?></h4>
                <div class="opening-hours-footer">
                    <p><strong><?php echo t('hours_weekdays'); ?>:</strong> <?php echo t('hours_weekdays_time'); ?></p>
                    <p><strong><?php echo t('hours_saturday'); ?>:</strong> <?php echo t('hours_saturday_time'); ?></p>
                    <p><strong><?php echo t('hours_sunday'); ?>:</strong> <?php echo t('hours_closed'); ?></p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p><?php echo t('footer_copyright'); ?></p>
            <div class="footer-legal">
                <a href="<?php echo $lang->getPageUrl('terms'); ?>"><?php echo t('terms_nav'); ?></a>
                <span>|</span>
                <a href="<?php echo $lang->getPageUrl('privacy'); ?>"><?php echo t('privacy_nav'); ?></a>
                <span>|</span>
                <a href="<?php echo $lang->getPageUrl('cookies'); ?>"><?php echo t('cookies_nav'); ?></a>
            </div>
            <p><?php echo t('footer_made_with_love'); ?></p>
        </div>
    </div>
</footer>