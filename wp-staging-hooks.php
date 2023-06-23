<?php

/*
  Plugin Name: WP Staging Hooks
  Plugin URI: https://wp-staging.com
  Description: Extend WP STAGING by using actions and filters.
  Author: WP STAGING
  Version: 1.0.4
  Author URI: https://wp-staging.com
 */

/*
 * Copyright (c) 2023 WP STAGING. All rights reserved.
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 */

/*
 * Note: This plugin does not contain all available hooks. 
 * Always check the official docs before using one of these hooks: 
 * https://wp-staging.com/docs/actions-and-filters/
 */

class wpstagingHooks
{

    /**
     * Uncomment the actions / filters below to activate them
     */
    function __construct()
    {
        /*
         * Keep certain plugins activated while wp staging requests are executed. 
         * Necessary if you want to use third party plugin function while using one of wp staging hooks or filters
         */
        //update_option('wpstg_optimizer_excluded', array('wp-mail-smtp'));

        /*
         * Run an action after after successfull cloning on the prod site
         */

        //add_action( 'wpstg_cloning_complete', array($this, 'sendMail'), 10 );
        //add_action( 'wpstg_cloning_complete', array($this, 'executeSql'), 10 );

        /*
         * Run an action after after successfull pushing on the prod site
         */
        //add_action( 'wpstg_pushing_complete', array($this, 'pushingComplete') );


        /*
         * Cloning: Run an action after after successfull cloning on the staging site
         */
        //add_action( 'wpstg.clone_first_run', array($this, 'wpstg_execute_after_cloning' ), 10);

        /*
         *  Exclude Tables From Search & Replace operation / Cloning and Pushing
         */
        //add_action( 'wpstg_searchreplace_excl_tables', array($this, 'excludeTablesSR'), 10 );
        /*
         *  Cloning: Exclude Rows From Search & Replace in wp_options
         */
        //add_action( 'wpstg_clone_searchreplace_excl_rows', array($this, 'excludeRowsSR'), 10 );
        /*
         *  Cloning: Exclude Rows From Search & Replace in wp_options
         */
        //add_action( 'wpstg_clone_searchreplace_excl', array($this, 'excludeStringsSR'), 10 );
        /*
         *  Cloning: Change Search & Replace Parameters
         */
        //add_action( 'wpstg_clone_searchreplace_params', array($this, 'setSRparams'), 10 );

        /*
         * Cloning: Exclude files from cloning
         */
        //add_action( 'wpstg_clone_excluded_files', array($this, 'wpstg_clone_excluded_files'), 10 );

        /*
         *  Cloning: Exclude Folders
         */
        //add_action( 'wpstg_clone_excl_folders', array($this, 'excludeFolders'), 10 );
        /*
         *  Cloning: Exclude Folders (Multisites)
         */
        //add_action( 'wpstg_clone_mu_excl_folders', array($this, 'multisiteExcludeFoldersCloning'), 10 );
        /*
         *  Cloning: Do not Modify Table Prefix from option_name in wp_options
         */
        //add_action( 'wpstg_excl_option_name_custom', array($this, 'wpstg_excl_option_name_custom'), 10 );
        /*
         *  Cloning: Change target hostname
         */
        // add_filter( "wpstg_cloning_target_hostname", array($this, 'set_cloning_target_hostname'), 10 );
        /*
         *  Cloning: Change target destination dir
         */
        // add_filter( "wpstg_cloning_target_dir", array($this, 'set_cloning_target_directory'), 10 );

        /*
         * Cloning: Copy specific database rows during cloning
         */
        // add_filter( "wpstg.cloning.database.queryRows", array($this, 'query_cloning_database_rows'), 10 );

        /*
         *  Pushing: Change Search & Replace parameters
         */
        // add_filter( 'wpstg_push_searchreplace_params', array($this, 'wpstg_push_custom_params'), 10 );
        /*
         *  Pushing: Exclude tables from pushing
         */
        //add_action( 'wpstg_push_excluded_tables', array($this, 'wpstg_push_excluded_tables'), 10 );
        /*
         *  Pushing: Exclude folders from pushing
         */
        //add_action( 'wpstg_push_excl_folders_custom', array($this, 'wpstg_push_directories_excl'), 10 );

        /*
         * Pushing: Exclude files from pushing
         */
        //add_action( 'wpstg_push_excluded_files', array($this, 'wpstg_push_excluded_files'), 10 );

        /*
         * Pushing: Preserve data in wp_options and exclude it from pushing
         */
        //add_action( 'wpstg_preserved_options', array($this, 'wpstg_push_options_excl'), 10 );

        /*
         * Pushing: Copy specific database rows during push
         */
        //add_filter( "wpstg.pushing.database.queryRows", array($this, 'query_pushing_database_rows'), 10 );

        /*
         * Backup: Exclude file extension from backup
         */
        //add_filter( 'wpstg.export.files.ignore.file_extension', [$this, 'wpstg_export_files_ignore_extensions']);

        /*
         * Backup: Exclude files bigger than the given size from backup
         */
        //add_filter( 'wpstg.export.files.ignore.file_bigger_than', [$this, 'wpstg_backup_files_ignore_files_bigger_than']);

        /*
         * Backup: Exclude files with particular extensions larger than the given file size from backup
         */
        //add_filter( 'wpstg.export.files.ignore.file_extension_bigger_than', [$this, 'wpstg_backup_files_ignore_files_w_extension_bigger_than']);
        
        /*
         * Backup: Exclude folders from being included in a backup
         */
        //add_filter( 'wpstg.backup.exclude.directories', [$this, 'wpstg_backup_exclude_directories']);
      
        /*
         * Backup: Exclude files from being restored
         */
        //add_filter( 'wpstg.backup.restore.exclude.other.files', [$this, 'wpstg_backup_restore_exclude_other_files']);
    }

    /**
     * Change target hostname of staging site
     * @param string $dest
     * @return string
     */
    public function set_cloning_target_hostname($dest)
    {
        $dest = "https://example.com";
        return $dest;
    }

    /**
     * Change target directory of staging site
     * @param string $dest
     * @return string
     */
    public function set_cloning_target_directory($dest)
    {
        $dest = "/custompath/";
        return $dest;
    }

    /**
     * Send out an email when the cloning proces has been finished successfully
     */
    public function sendMail()
    {
        wp_mail('test@example.com', 'WP Staging cloning process has been finished', 'body sample text');
    }

    /**
     * Execute custom sql query after cloning on staging site
     */
    public function executeSql($args)
    {
        global $wpdb;

        $extDb = true; // set to false to use the default $wpdb db object and to use SQL on the production databae. Set to false to execute SQL on external database
        // External database object
        if ($extDb && !empty($args->databaseUser) && !empty($args->databasePassword) && !empty($args->databaseDatabase) && !empty($args->databaseServer)) {
            $db = new \wpdb($args->databaseUser, str_replace("\\\\", "\\", $args->databasePassword), $args->databaseDatabase, $args->databaseServer);
        } else {
            $db = $wpdb;
        }

        // Prefix of the staging site
        $prefix = $args->prefix;
        $sql = "INSERT INTO {$prefix}options (option_name,option_value) VALUES ('test2', 'value')";
        error_log('Execute SQL: ' . $sql);
        // Add value testvalue into prefix_options or execute any other sql query here
        $db->query($sql);
    }

    /**
     * Send out an email when the pushing proces has been finished successfully
     */
    public function pushingComplete()
    {
        wp_mail('test@example.com', 'WP Staging cloning process has been finished', 'body sample text');
    }

    /**
     * Exclude certain Tables From Search & Replace operation
     *
     * Use this if the search & replace process eats up a lot of your available memory
     * and the cloning or pushing process failed with a ‘memory exhausted error‘.
     * You can also use this to improve the speed of the cloning and pushing process.
     *
     * Exclude tables which do not need any search & replacement of strings!
     * These can be tables which contains visitor stats, IP addresses or similar.
     * After excluding these tables you can increase the DB Search & Replace limit in
     * WP Staging settings to a higher value to get better performance.
     */
    public function excludeTablesSR($tables)
    {
        $addTables = array('_posts', '_postmeta');
        return array_merge($tables, $addTables);
    }

    /**
     * Exclude certain rows in table wp_options from Search & Replace operation
     */
    public function excludeRowsSR($default)
    {
        $rows = array('siteurl', 'home');
        return array_merge($default, $rows);
    }

    /**
     * Exclude certain strings from Search & Replace operations
     */
    public function excludeStringsSR()
    {
        return array('blog.localhost.com', 'blog1.localhost.com');
    }

    /**
     * Cloning: Add new Search & Replace rules on top of existing ones or change existing ones entirely
     */
    public function setSRparams($args)
    {
        // Add new strings to search & replace array
        $args['search_for'][] = '%2F%2Fwww.example.com%2Fstaging%2F';
        $args['search_for'][] = '//www.example2.com/staging/';
        $args['replace_with'][] = '%2F%2Fwww.example.com%2F';
        $args['replace_with'][] = '//www.example2.com/';

        // Default values - You can change these
        $args['replace_guids'] = 'off';
        $args['dry_run'] = 'off';
        $args['case_insensitive'] = false;
        $args['replace_guids'] = 'off';
        $args['replace_mails'] = 'off';
        $args['skip_transients'] = 'on';

        return $args;
    }

    /**
     * Cloning: Exclude files from cloning
     * Example: You can use a wildcard pattern like *.log to exclude all log files
     */
    function wpstg_clone_excluded_files($default)
    {
        $files = array('custom-file', '*LOG-*', '*.logs');
        return array_merge($default, $files);
    }

    /**
     * Cloning: Exclude Folders
     * These paths must be the path relative to the wordpress root folder
     * These exclude rules will not be applied to wp-admin, wp-includes
     */
    public function excludeFolders($defaultFolders)
    {
        $folders = [
            '/wp-content/plugins/wordpress-seo', // Relative path to your wordpress root path. Remember to add leading slash
            '**/node_modules', // Wildcard path
            '*.zip' // Extension
        ];
        return array_merge($defaultFolders, $folders);
    }

    /**
     * Excluded paths relative to the wordpress root folder when cloning multisites
     * These exclude rules will not be applied to wp-admin, wp-includes
     */
    public function multisiteExcludePathsCloning($defaultFolders)
    {
        $folders = [
            '/wp-content/plugins/wordpress-seo', // Relative path to your wordpress root path, remember to add leading slash 
            '**/node_modules', // Wildcard path
            '*.zip' // Extension
        ];
        return array_merge($defaultFolders, $folders);
    }

    /**
     * Cloning: Do not Modify Table Prefix for particular rows in option_name
     */
    public function wpstg_excl_option_name_custom($args)
    {
        $cols = array('wp_mail_smtp', 'wp_mail_smtp_version');
        return array_merge($args, $cols);
    }

    /**
     * Pushing: Change Search & Replace parameters
     */
    public function wpstg_push_custom_params($args)
    {

        // Add new strings to search & replace array
        $args['search_for'][] = '%2F%2Fwww.example.com%2Fstaging%2F';
        $args['search_for'][] = '//www.example2.com/staging/';
        $args['search_for'][] = '\/\/www.example2.com\/staging';
      
        $args['replace_with'][] = '%2F%2Fwww.example.com%2F';
        $args['replace_with'][] = '//www.example2.com/';
        $args['replace_with'][] = '\/\/www.example2.com';

        // Default values - Can be changed
        $args['replace_guids'] = 'off';
        $args['dry_run'] = 'off';
        $args['case_insensitive'] = false;
        $args['replace_guids'] = 'off';
        $args['replace_mails'] = 'off';
        $args['skip_transients'] = 'on';
        return $args;
    }

    /**
     * Pushing: Change Search & Replace parameters
     */
    function wpstg_push_excluded_tables($tables)
    {
        $customTables = array('_options', '_posts');
        return array_merge($tables, $customTables);
    }

    /**
     * Pushing: Exclude folders from pushing
     */
    function wpstg_push_directories_excl($default)
    {
        $dirs = array('custom-folder', 'custom-folder2');
        return array_merge($default, $dirs);
    }

    /**
     * Pushing: Exclude files from pushing
     * Example: You can use a wildcard pattern like *.log to exclude all log files
     */
    function wpstg_push_excluded_files($default)
    {
        $files = array('custom-file', '*LOG-*', '*.logs');
        return array_merge($default, $files);
    }

    /**
     * Pushing: Preserve data in wp_options and exclude it from pushing
     * The example below preserves the value of the ‘siteurl’ on the live site.
     * Any number of additional options may be added.
     */
    function wpstg_push_options_excl($options)
    {
        $options[] = 'siteurl';
        return $options;
    }

    /**
     * Cloning: This function will be executed after cloning on staging site
     */
    function wpstg_execute_after_cloning()
    {
        // add some code 
    }

    /**
     * Cloning: Query specific database rows
     */
    function query_cloning_database_rows($filters)
    {
        // Use prefix of production site database.
        $myFilters = [
            // copy posts where post type is not 'coupon'
            'wp_posts' => [
                'post_type' => [
                    'operator' => '<>',
                    'value' => 'coupon'
                ]
            ],
            // query wp_postmeta table depending upon options selected for wp_posts table
            'wp_postmeta' => [
                'join' => [
                    'table' => 'wp_posts',
                    'primaryKey' => 'ID',
                    'foreignKey' => 'post_id',
                ]
            ]
        ];
    
        return array_merge($filters, $myFilters);
    }

    /**
     * Pushing: Query specific database rows
     */
    function query_pushing_database_rows($filters)
    {
        // Use prefix of staging site database i.e. wpstg0
        $filters = [
            // copy options where option_name is not 'wpstg_is_staging_site'
            'wpstg0_options' => [
                'option_name' => [
                    'operator' => '<>',
                    'value' => 'wpstg_is_staging_site'
                ]
            ],
            // copy posts where post_title LIKE 'Hello%' AND post_status is 'publish'
            'wpstg0_posts' => [
                'post_title' => [
                    'operator' => 'LIKE',
                    'value' => 'Hello%'
                ],
                'post_status' => 'publish'
            ],
            // query wpstg0_postmeta table depending upon options selected for wpstg0_posts table
            'wpstg0_postmeta' => [
                'join' => [
                    'table' => 'wp_posts',
                    'primaryKey' => 'ID',
                    'foreignKey' => 'post_id',
                ]
            ]
        ];

        return $filters;
    }

    /**
     * Backup: Exclude files bigger than the given size from backup
     * Allow user to exclude certain file extensions from being backup exported
     */
    function wpstg_backup_files_ignore_extensions($default_excluded){
        return array_merge($default_excluded, ['zip', 'gz']);
    }

    /**
     * Backup: Exclude files bigger than the given size from backup
     * Allow user to exclude files bigger than given size from being backup exported
     */
    function wpstg_backup_files_ignore_files_bigger_than($default){
        return 10 * MB_IN_BYTES;
    }

    /**
     * Backup: Exclude files with particular extensions larger than the given file size from backup
     * Allow users to exclude files with extensions larger than the given size from being exported
     */
    function wpstg_backup_files_ignore_files_w_extension_bigger_than($default){
        $ignoreFiles = [
            'gz' => 10 * MB_IN_BYTES, 
            'tar' => 20 * MB_IN_BYTES
        ];
        return array_merge($default, $ignoreFiles);
    }
  
    /**
     * Backup: Exclude folders from being included in a backup
     * E.g. This examples excludes the folder WP_CONTENT_DIR  . '/cache'
     */
    function wpstg_backup_exclude_directories($excludedDirectories){
        $customExcludedDirectories = [
            'var/www/example.com/htdocs/wp-content/cache'
        ];
        return array_merge($excludedDirectories, $customExcludedDirectories);
    }
  
    /**
     * Backup: Exclude files from being restored
     */
    function wpstg_backup_restore_exclude_other_files($excludedFiles){
        $customExcludedFiles = [
            'wp-content/db.php',
            'wp-content/object-cache.php',
        ];
        return array_merge($excludedFiles, $customExcludedFiles);
    }
}

// Launch it
new wpstagingHooks();
