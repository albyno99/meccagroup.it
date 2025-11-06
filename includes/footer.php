<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <img src="media/mecca_logo_white.png" alt="Mecca Group" class="footer-logo">
                <p><?php echo t('footer_tagline'); ?></p>
                <div class="social-links">
                    <a href="https://instagram.com/meccagroup_" target="_blank">Instagram</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4><?php echo t('footer_contact_title'); ?></h4>
                <div class="contact-info">
                    <p>📍 Viale Cavalieri di Vittorio Veneto, 3<br>14010 Cantarana (AT), Italia</p>
                    <p>📞 +39 331 625 47 83 / 0141 943008</p>
                    <p>✉️ info@meccagroup.it</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h4><?php echo t('footer_services_title'); ?></h4>
                <ul>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>#autotrasporti"><?php echo t('nav_autotrasporti'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>#materiali-edili"><?php echo t('nav_materiali_edili'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>"><?php echo t('footer_services_international'); ?></a></li>
                    <li><a href="<?php echo $lang->getPageUrl('services'); ?>"><?php echo t('footer_services_rental'); ?></a></li>
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
        </div>
    </div>
</footer>