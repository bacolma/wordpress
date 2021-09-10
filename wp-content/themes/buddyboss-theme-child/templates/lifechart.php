<?php
/*
 * Template name: LifeChart Page
 *
 * @package WordPress
 * @subpackage BuddyBoss_Theme_Child
 * 
 */
get_header(); ?>
    <div id="primary" class="content-area bb-grid-cell">
        <main id="main" class="site-main">
            <?php
            if (class_exists('\\RampLifechart\\Core\\RampLifechart') == true) {
                $obj = \RampLifechart\Core\RampLifechart::getInstance();
                $obj->printPage();
            } else {
                "<p>Plugin Ramp-lifechart is not found.</p>";
            }
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->
    
<?php
get_footer();   