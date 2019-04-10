<?php

/*
  Plugin Name: WP STAGING HOOKS
  Plugin URI:
  Description: Extend WP Staging by using actions and filters.
  Author: WP Staging
  Version: 0.0.1
  Author URI: https://wp-staging.com
 */

/*
 * Copyright (c) 2019 WP Staging. All rights reserved.
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 */

class wpstagingHooks {

    function __construct() {
        // Uncomment the code below to activate an action or filter
        
        // Run after successfull cloning
        add_action( 'wpstg_cloning_complete', array($this, 'cloningComplete') );
        
        // Run after successfull pushing
        add_action( 'wpstg_pushing_complete', array($this, 'pushingComplete') );
    }

    /**
     * Send out an email when the cloning proces has been finished successfully
     */
    private function cloningComplete() {
        error_log( 'executed1' );
        wp_mail( 'admin@xsimulator.net', 'WP Staging cloning process has been finished', 'body sample text' );
    }
    
    /**
     * Send out an email when the pushing proces has been finished successfully
     */
    private function pushingComplete() {
        error_log( 'executed1' );
        wp_mail( 'admin@xsimulator.net', 'WP Staging pushing process has been finished', 'body sample text' );
    }

}

new wpstagingHooks();
