<?php
/**
 * Manage plugin activation.
 *
 * @package StoreLocatorPlus\Pro\Activation
 * @author Lance Cleveland <lance@charlestonsw.com>
 * @copyright 2013 Charleston Software Associates, LLC
 *
 */
class Pro_Activation {

    //----------------------------------
    // Methods
    //----------------------------------

    /**
     * The plugin object
     *
     * @var \SLPPro $plugin
     */
    var $addon;

    /**
     * The base plugin object.
     *
     * @var \SLPlus $slplus
     */
    var $slplus;

    /**
     * Plugin table update status, key = table name, value = "new" or "updated"
     *
     * @var string[] $status
     */
    var $status;

    /**
     * Initialize the object.
     *
     * @param mixed[] $params
     */
    function __construct($params = null) {
        // Do the setting override or initial settings.
        //
        if ($params != null) {
            foreach ($params as $name => $value) {
                $this->$name = $value;
            }
        }

        $this->slplus = $this->addon->plugin;
    } 

    /**
     * Set the status array to failed.
     */
    function set_StatusFailed() {
        $this->status['all']='failed';
    }

    /**
     * Update or create the data tables.
     *
     * This can be run as a static function or as a class method.
     */
    function update() {
        if (!isset($this->addon)) {
            $this->set_StatusFailed();
            return;
        }

        // If the installed version is < 3.12, Delete old options
        //
        if (version_compare($this->addon->options['installed_version'], '3.12', '<')) {
            foreach (
                array(
                    'csl-slplus-SLPLUS-PRO-isenabled',
                    'csl-slplus-SLPLUS-PRO-lk',
                )
                as $optname) {
                delete_option($optname);
            }
        }

        // Version 4.0.014 update
        //
        if (version_compare($this->addon->options['installed_version'], '4.0.014', '<')) {

            // csl-slplus_show_tags migrated to PRO-options['tag_output_processing']
            // impacts results rendering
            //
            $optionName = SLPLUS_PREFIX.'_show_tags';
            $this->addon->options['tag_output_processing'] = ((get_option($optionName,'0')!=='0') ? 'as_entered':'hide');
            delete_option($optionName);

            // csl-slplus_tag_search_selections migrated to PRO-options['tag_selections']
            // impacts search form rendering
            //
            $optionName = SLPLUS_PREFIX.'_tag_search_selections';
            $this->addon->options['tag_selections'] = get_option($optionName,'');
            delete_option($optionName);

            // csl-slplus_show_tag_search migrated to PRO-options['tag_selector']
            // impacts search form rendering
            //
            // If tag selector is off the display type is none.
            //
            // If tag selector is on and tag selections are missing type is textinput.
            // If tag selector is on and tag selections are in place type is dropdown.
            //
            $optionName = SLPLUS_PREFIX.'_show_tag_search';
            $this->addon->options['tag_selector'] =
                $this->slplus->is_CheckTrue( get_option( $optionName, '0' ) )    ?
                    'none'                          :
                    (empty($this->addon->options['tag_selections'])?
                        'textinput'                 :
                        'dropdown'
                    )
                    ;
            delete_option($optionName);
        }

        // Version 4.0.016 update
        //
        if (version_compare($this->addon->options['installed_version'], '4.0.019', '<')) {
            $optionName = SLPLUS_PREFIX.'-enhanced_search_show_tag_radio';
            if ( $this->slplus->is_CheckTrue( get_option( $optionName , '0' ) ) ) {
                $this->addon->options['tag_selector'] = 'radiobutton';
            }
            delete_option($optionName);
		}

		// Version 4.1.00 update
        //
        if (version_compare($this->addon->options['installed_version'], '4.1.00', '<')) {
            $optionName = SLPLUS_PREFIX.'-reporting_enabled';
            if ( $this->slplus->is_CheckTrue( get_option( $optionName , '0' ) ) ) {
                $this->addon->options['reporting_enabled'] = 'on';
            }
            delete_option($optionName);
		}

		// Install reporting tables
		//
		$this->install_reporting_tables();
	}

	/*************************************
     * Install reporting tables
     *
     * Update the plugin version in config.php on every structure change.
     */
    function install_reporting_tables() {
        global $wpdb;

        $charset_collate = '';
        if ( ! empty($wpdb->charset) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if ( ! empty($wpdb->collate) )
            $charset_collate .= " COLLATE $wpdb->collate";

        // Reporting: Queries
        //
        $table_name = $wpdb->prefix . "slp_rep_query";
        $sql = "CREATE TABLE $table_name (
                slp_repq_id    bigint(20) unsigned NOT NULL auto_increment,
                slp_repq_time  timestamp NOT NULL default current_timestamp,
                slp_repq_query varchar(255) NOT NULL,
                slp_repq_tags  varchar(255),
                slp_repq_address varchar(255),
                slp_repq_radius varchar(5),
                PRIMARY KEY  (slp_repq_id),
                INDEX (slp_repq_time)
                )
                $charset_collate						
                ";
        $this->dbupdater($sql,$table_name);	



        // Reporting: Query Results
        //
        $table_name = $wpdb->prefix . "slp_rep_query_results";
        $sql = "CREATE TABLE $table_name (
                slp_repqr_id    bigint(20) unsigned NOT NULL auto_increment,
                slp_repq_id     bigint(20) unsigned NOT NULL,
                sl_id           mediumint(8) unsigned NOT NULL,
                PRIMARY KEY  (slp_repqr_id),
                INDEX (slp_repq_id)
                )
                $charset_collate						
                ";

        // Install or Update the slp_rep_query_results table
        //
        $this->dbupdater($sql,$table_name);     
	}

	/**
     * Update the data structures on new db versions.
     *
     * @global object $wpdb
     * @param type $sql
     * @param type $table_name
     * @return string
     */
    function dbupdater($sql,$table_name) {
        global $wpdb;
        $retval = ( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) ? 'new' : 'updated';

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        return $retval;
    }
}
