<?php

/**
 * Store Locator Plus Ajax Handler
 *
 * Manage the AJAX calls that come in from our admin and frontend UI.
 * Currently only holds new AJAX calls, all calls need to go in here.
 *
 * @package StoreLocatorPlus\AjaxHandler
 * @author Lance Cleveland <lance@charlestonsw.com>
 * @copyright 2012-2013 Charleston Software Associates, LLC
 */
class SLPlus_AjaxHandler {

    //-------------------------------------
    // Properties
    //-------------------------------------

    /**
     * The formdata variables.
     *
     * @var string[] $formdata
     */
    public $formdata;

    /**
     * Default formdata values.
     *
     * @var mixed[] $formdata_defaults
     */
    private $formdata_defaults = array(
        'addressInput'      => '',
        'addressInputState' => '',
        'nameSearch'        => '',
    );

    /**
     * Name of this module.
     *
     * @var string $name
     */
    private $name;
    
    /**
     * The plugin object.
     * 
     * @var \SLPlus $plugin
     */
    public $plugin;


    /**
     * The database query string.
     *
     * @var string $dbQuery
     */
    private $dbQuery;

    //----------------------------------
    // Methods
    //----------------------------------
    
    /*************************************
     * The Constructor
     */
    function __construct($params=null) {
        $this->name = 'AjaxHandler';
        if (isset($_REQUEST['formdata'])) {
            $this->formdata = wp_parse_args($_REQUEST['formdata'],$this->formdata_defaults);
        }
        if (isset($_REQUEST['options'])) {
            $this->setPlugin();
            $this->plugin->options = wp_parse_args($_REQUEST['options'],$this->plugin->options);
        }
    }

    /**
     * Set the plugin property to point to the primary plugin object.
     *
     * Returns false if we can't get to the main plugin object.
     *
     * @global wpCSL_plugin__slplus $slplus_plugin
     * @return boolean true if plugin property is valid
     */
    function setPlugin() {
        if (!isset($this->plugin) || ($this->plugin == null)) {
            global $slplus_plugin;
            $this->plugin = $slplus_plugin;
            $this->plugin->register_module($this->name,$this);
        }
        return (isset($this->plugin) && ($this->plugin != null));
    }

    /**
     * Format the result data into a named array.
     *
     * We will later use this to build our JSONP response.
     *
     * @param mixed[] $data the data from the SLP database
     * @return mixed[]
     */
    function slp_add_marker($row = null) {
        if ($row == null) {
            return '';
        }
        $marker = array(
              'name'        => esc_attr($row['sl_store']),
              'address'     => esc_attr($row['sl_address']),
              'address2'    => esc_attr($row['sl_address2']),
              'city'        => esc_attr($row['sl_city']),
              'state'       => esc_attr($row['sl_state']),
              'zip'         => esc_attr($row['sl_zip']),
              'country'     => esc_attr($row['sl_country']),
              'lat'         => $row['sl_latitude'],
              'lng'         => $row['sl_longitude'],
              'description' => html_entity_decode($row['sl_description']),
              'url'         => esc_attr($row['sl_url']),
              'sl_pages_url'=> esc_attr($row['sl_pages_url']),
              'email'       => esc_attr($row['sl_email']),
              'hours'       => esc_attr($row['sl_hours']),
              'phone'       => esc_attr($row['sl_phone']),
              'fax'         => esc_attr($row['sl_fax']),
              'image'       => esc_attr($row['sl_image']),
              'distance'    => $row['sl_distance'],
              'tags'        => esc_attr($row['sl_tags']),
              'option_value'=> esc_js($row['sl_option_value']),
              'attributes'  => maybe_unserialize($row['sl_option_value']),
              'id'          => $row['sl_id'],
          );

        $this->plugin->currentLocation->set_PropertiesViaArray($row);

        // FILTER: slp_results_marker_data
        // Modify the map marker object that is sent back to the UI in the JSONP response.
        //
        $marker = apply_filters('slp_results_marker_data',$marker);

        return $marker;
    }

    /**
     * Handle AJAX request for OnLoad action.
     *
     */
    function csl_ajax_onload() {
        $this->setPlugin();

        // Get Locations
        //

        // Return How Many?
        //
        $response=array();
        $locations = $this->execute_LocationQuery($this->plugin->options['initial_results_returned']);
        foreach ($locations as $row){
            $response[] = $this->slp_add_marker($row);
        }

        // Output the JSON and Exit
        //
        $this->renderJSON_Response(
                array(
                        'count'         => count($response) ,
                        'type'          => 'load',
                        'response'      => $response
                    )
                );
    }

    /**
     * Handle AJAX request for Search calls.
     *
     * @global type $wpdb
     */
    function csl_ajax_search() {
        global $wpdb;
        $this->setPlugin();

        // Get Locations
        //
		$response = array();
		$resultRowids = array();
        $locations = $this->execute_LocationQuery($this->plugin->options_nojs['max_results_returned']);
        foreach ($locations as $row){
            $thisLocation = $this->slp_add_marker($row);
            if (!empty($thisLocation)) {
				$response[] = $thisLocation;
				$resultRowids[] = $row['sl_id'];
            }
		}

		// Do report work
		//
		$queryParams = array();
		$queryParams['QUERY_STRING'] = $_SERVER['QUERY_STRING'];
		$queryParams['tags'] = $_POST['tags'];
		$queryParams['address'] = $_POST['address'];
		$queryParams['radius'] = $_POST['radius'];

		do_action('slp_report_query_result', $queryParams, $resultRowids);

        // Output the JSON and Exit
        //
        $this->renderJSON_Response(
                array(  
                        'count'         => count($response),
                        'option'        => $_POST['address'],
                        'type'          => 'search',
                        'response'      => $response
                    )
                );
     }

    /**
     * Run a database query to fetch the locations the user asked for.
     *
     * @param string $maxReturned how many results to max out at
     * @return object a MySQL result object
     */
    function execute_LocationQuery($maxReturned) {
        //........
        // SLP options that tweak the query
        //........
        $this->plugin->database->createobject_DatabaseExtension();

        // Distance Unit (KM or MI) Modifier
        // Since miles is default, if kilometers is selected, divide by 1.609344 in order to convert the kilometer value selection back in miles
        //
        $multiplier=(get_option('sl_distance_unit',__('miles', 'csa-slplus'))==__('km', 'csa-slplus'))? 6371 : 3959;

        //........
        // Post options that tweak the query
        //........

        // Add all the location filters together for SQL statement.
        // FILTER: slp_location_filters_for_AJAX
        //
        $filterClause = '';
        foreach (apply_filters('slp_location_filters_for_AJAX',array()) as $filter) {
            $filterClause .= $filter;
        }

        // ORDER BY
        //
        add_filter('slp_ajaxsql_orderby',array($this,'filter_SetDefaultOrderByDistance'),100);

        // Having clause filter
        // Do filter after sl_distance has been caculated
        //
        // FILTER: slp_location_having_filters_for_AJAX
        // append new having clause logic to the array and return the new array
        // to extend/modify the having clause.
        //
        $havingClause = 'HAVING ';
        $havingClauseElements =
            apply_filters(
                'slp_location_having_filters_for_AJAX',
                array(
                    '(sl_distance < %d) ',
                    'OR (sl_distance IS NULL) '
                )
             );
        foreach ($havingClauseElements as $filter) {
            $havingClause .= $filter;
        }

        // FILTER: slp_ajaxsql_fullquery
        //
        $this->dbQuery =  
            apply_filters(
                'slp_ajaxsql_fullquery',
                $this->plugin->database->get_SQL(
                    array(
                        'selectall_with_distance',
                        'where_default_validlatlong',
                    )
                 )                                                      .
                "{$filterClause} "                                      .
                "{$havingClause} "                                      .
                $this->plugin->database->get_SQL('orderby_default')     .
                'LIMIT %d'
            );

        // Set the query parameters
        // FILTER: slp_ajaxsql_queryparams
        $queryParams =
            apply_filters(
                'slp_ajaxsql_queryparams',
                array(
                    $multiplier,
                    $_POST['lat'],
                    $_POST['lng'],
                    $_POST['lat'],
                    $_POST['radius'],
                    $maxReturned
                )
            );

        // Run the query
        //
        // First convert our placeholder dbQuery into a string with the vars inserted.
        // Then turn off errors so they don't munge our JSONP.
        //
        global $wpdb;
        $this->dbQuery =
            $wpdb->prepare(
                $this->dbQuery,
                $queryParams
                );
        $wpdb->hide_errors();
        $result = $wpdb->get_results($this->dbQuery, ARRAY_A);

        // Problems?  Oh crap.  Die.
        //
        if ($result === null) {
            die(json_encode(array(
                'success'       => false, 
                'response'      => 'Invalid query: ' . $wpdb->last_error,
                'dbQuery'       => $this->dbQuery
            )));
        }

        // Return the results
        // FILTER: slp_ajaxsql_results
        //
        return apply_filters('slp_ajaxsql_results',$result);
    }

    /**
     * Add sort by distance ASC as default order.
     *
     * @param string $orderby
     * @return string
     */
    function filter_SetDefaultOrderByDistance($orderby) {
        return $this->plugin->database->extend_OrderBy($orderby,' sl_distance ASC ');
    }

    /**
     * Output a JSON response based on the incoming data and die.
     *
     * Used for AJAX processing in WordPress where a remote listener expects JSON data.
     *
     * @param mixed[] $data named array of keys and values to turn into JSON data
     * @return null dies on execution
     */
    function renderJSON_Response($data) {

        // What do you mean we didn't get an array?
        //
        if (!is_array($data)) {
            $data = array(
                'success'       => false,
                'count'         => 0,
                'message'       => __('renderJSON_Response did not get an array()','csa-slplus')
            );
        }

        // Add our SLP Version and DB Query to the output
        //
        $data = array_merge(
                    array(
                        'success'       => true,
                        'slp_version'   => $this->plugin->version,
                        'dbQuery'       => $this->dbQuery
                    ),
                    $data
                );

        // Tell them what is coming...
        //
        header( "Content-Type: application/json" );

        // Go forth and spew data
        //
        echo json_encode($data);

        // Then die.
        //
        die();
    }
}
