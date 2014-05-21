<?php
if (!defined( 'ABSPATH'     )) { exit;   } // Exit if accessed directly, dang hackers

// Make sure the class is only defined once.
//
if (!class_exists('CSVExport')) {
    require_once('class.csvexport.php');
    
    /**
     * CSV Export for Pro Pack
     *
     * @package StoreLocatorPlus\ProPack\CSVExportLocations
     * @author Lance Cleveland <lance@charlestonsw.com>
     * @copyright 2014 Charleston Software Associates, LLC
     */
    class CSVExportLocations extends CSVExport {


        //-------------------------------------
        // Properties
        //-------------------------------------

        /**
         * The fields we want to export.
         *
         * @var string[] $dbFields
         */
        private $dbFields = array(
                'sl_id',
                'sl_store',
                'sl_address',
                'sl_address2',
                'sl_city',
                'sl_state',
                'sl_zip',
                'sl_country',
                'sl_latitude',
                'sl_longitude',
                'sl_tags',
                'sl_description',
                'sl_email',
                'sl_url',
                'sl_hours',
                'sl_phone',
                'sl_fax',
                'sl_image',
            );

        /**
         * The incoming AJAX form data.
         *
         * @var mixed[]
         */
        private $formdata;

        /**
         *
         * @param mixed[] $params
         */
        function __construct($params) {
            parent::__construct($params);
            $this->type='Locations';

            // FILTER: slp-pro-dbfields
            $this->dbFields=apply_filters('slp-pro-dbfields',$this->dbFields);
        }

        /**
         * Create the location export form.
         *
         * @return string
         */
        function create_Form_LocationExport() {
            return
                '<div class="slp_bulk_upload_div section_column">' .
                    '<h2>'.__('Bulk Export', 'csa-slp-pro').'</h2>'.
                    '<div class="section_description">'.
                        '<div class="form_entry">'.
                    
                            __('Export the location data to a CSV file.','csa-slp-pro').

                            $this->slplus->helper->create_SubheadingLabel( __('Export Filters','csa-slp-pro') ) .
                            '<div class="filter_box">'.
                                '<p>' . __('Filter the locations that are exported using these filters: ','csa-slp-pro'). '</p>' .
                                $this->createstring_LocationFilterForm().
                            '</div>' .

                            '<div id="export_button_wrapper"> ' .
                                '<input type="button" ' .
                                    'id="export_locations" name="export_locations" ' .
                                    'value="Export Locations" ' .
                                    'onClick="'. $this->createstring_ExportButtonJS('slp_download_locations_csv','locations') . '" ' .
                                    '/>'.
                            '</div>' .
                        '</div>'.
                    '</div>'.
                    '<iframe id="secretIFrame" src="" style="display:none; visibility:hidden;"></iframe>' .
                '</div>'
                ;
        }

        /**
         * Create an input field on the export locations filter page with a div wrapper.
         *
         * @param string $field_name field name and ID
         * @param string $placeholder placeholder text, defaults to ''
         * @return string HTML for the input field and wrapping div
         */
        function createstring_FilterInput($field_name,$placeholder='', $label='') {
            return
                '<div class="form_entry">' .
                    ( ! empty ($label) ? "<label for='{$field_name}'>{$label}</label>": '' ) .
                    "<input id='{$field_name}' name='{$field_name}' class='postform' type='text' value='' placeholder='{$placeholder}' />" .
                    $this->createstring_FilterJoinWith("{$field_name}_joiner") .
                '</div>'
                ;
        }

        /**
         * Create the AND/OR logic joiner for export filters.
         * 
         * @param string $field_name the field name and ID
         * @return string HTML for the filter field "joiner" selector
         */
        function createstring_FilterJoinWith($field_name) {
            return
                "<select id='$field_name' name='$field_name' class='postform'>".
                    "<option value='AND'>".__('and','csa-slp-pro').'</option>'.
                    "<option value='OR'>" .__('or' ,'csa-slp-pro').'</option>'.
                '</select>'
                ;
        }

        /**
         * Create the location filter form for export filters.
         */
        function createstring_LocationFilterForm() {

           $HTML =
                '<div id="csa-slp-pro-location-filters">' .
                    $this->createstring_FilterInput('name',__('Store Name My Place or My* or *Place','csa-slp-pro'),__('Name','csa-slp-pro')) .
                    $this->createstring_LocationPropertyDropdown( 'state' , true ) .
                    $this->createstring_FilterInput('zip_filter',__('Zip Code 29464 or 294* or *464','csa-slp-pro'),__('Zip','csa-slp-pro')) .
                    $this->createstring_LocationPropertyDropdown( 'country' , false ) .
                '</div>'
                ;

           return $HTML;
        }

        /**
         * Create the HTML string for a state selection drop down from the data tables.
         *
         * @param string $location_property - which location property to use to build the drop down options
         * @return string the HTML for the drop down menu.
         */
        function createstring_LocationPropertyDropdown( $location_property = 'state' , $joiner = true ) {

            $input_id   = $location_property . '_filter';
            switch ( $location_property ) {
                case 'country':
                    $label      = __('Country','csa-slp-pro');
                    $all_option = __('All Countries','csa-slp-pro');
                    break;

                case 'state':
                default:
                    $label      = __('State','csa-slp-pro');
                    $all_option = __('All States','csa-slp-pro');
                    break;
            }

            return
                '<div class="form_entry">' .
                    "<label for='{$input_id}'>{$label}</label>" .
                    "<select id='{$input_id}' name='{$input_id}' class='postform'>".
                        "<option value=''>{$all_option}</option>".
                        $this->createstring_LocationPropertyDropdownOptions( $location_property ).
                    '</select>'.
                    ( $joiner ? $this->createstring_FilterJoinWith( $location_property . "_joiner") : '' ) .
                '</div>'
                ;
        }

        /**
         * Create the HTML string for the individual options on the state drop down.
         *
         * o location_property values 'state' (default), 'country'
         *
         * @param string $location_property - which location property to use to build the drop down options
         * @return string the HTML all of the state option selectors in the dropdown.
         */
        function createstring_LocationPropertyDropdownOptions( $location_property = 'state' ) {

            // Set SQL command based on property
            //
            switch ( $location_property ) {
                case 'country':
                    $sql_command = 'select_country_list';
                    break;
                case 'state':
                default:
                    $sql_command = 'select_state_list';
                    break;
            }

            $HTML = '';
            $offset = 0;
            while ( ( $location = $this->slplus->database->get_Record( $sql_command , '' , $offset++ ) )!= NULL ) {
                $HTML .= "<option value='{$location[$location_property]}'>{$location[$location_property]}</option>";
            }
            return $HTML;
        }

        /**
         * Send Locations
         */
        function do_SendLocations() {

            // Connect to SLP database
            //
            $slpDBFile = str_replace('slp-pro/include/class.csvexport.php','store-locator-le/include/class.data.php',__FILE__);
            require_once($slpDBFile);
            $this->database = new SLPlus_Data();

            // Formdata Parsing
            //
            $this->formdata = array(
                'name'              => '',
                'name_joiner'       => 'AND',
                'state_filter'      => '',
                'state_joiner'      => 'AND',
                'zip_filter'        => '',
                'zip_joiner'        => 'AND',
                'country_filter'    => '',
            );
            if ( isset( $_REQUEST['formdata'] ) ) {
                $this->formdata = wp_parse_args($_REQUEST['formdata'],$this->formdata);
            }

            // Which Records?
            //
            $sqlCommand = array('selectall','where_default');
            $sqlParams = array();

            // Export Name Pattern Matches
            //
            if ( ! empty( $this->formdata['name'] ) ) {
                add_filter('slp_ajaxsql_where',array($this,'filter_ExtendGetSQLWhere_Name'));
                $sqlParams[]  = $this->modifystring_WildCardToSQLLike($this->formdata['name']);
            }


            // State Filter
            //
            if ( ! empty( $this->formdata['country_filter'] ) ) {
                add_filter('slp_ajaxsql_where',array($this,'filter_ExtendGetSQLWhere_Country'));
                $sqlParams[]  = sanitize_text_field( $this->formdata['country_filter'] );
            }
            
            // State Filter
            //
            if ( ! empty( $this->formdata['state_filter'] ) ) {
                add_filter('slp_ajaxsql_where',array($this,'filter_ExtendGetSQLWhere_State'));
                $sqlParams[]  = sanitize_text_field( $this->formdata['state_filter'] );
            }

            // Export Zip Pattern Matches
            // Use * as a wild card beginning or ending 294* or *464 or *94*.
            //
            if ( ! empty( $this->formdata['zip_filter'] ) ) {
                add_filter('slp_ajaxsql_where',array($this,'filter_ExtendGetSQLWhere_Zip'));
                $sqlParams[]  = $this->modifystring_WildCardToSQLLike($this->formdata['zip_filter']);
            }

            // Open stdout
            // Byte Order Mark (BOM) for UTF-8 is \xEF\xBB\xBF
            // Byte Order Mark (BOM) for UTF-16 is \xFE\xFF
            // @see http://en.wikipedia.org/wiki/Byte_order_mark#UTF-8
            $stdout = fopen('php://output','w');
            fputs($stdout, "\xEF\xBB\xBF");
           
            // Export Header
            //
            fputcsv($stdout,$this->dbFields);

            // Export records
            //
            $offset=0;
            while ($locationArray = $this->database->get_Record( $sqlCommand , $sqlParams , $offset++ )) {
                // FILTER: slp-pro-csvexport
                $locationArray = apply_filters('slp-pro-csvexport',$locationArray);
                fputcsv($stdout,array_intersect_key($locationArray,array_flip($this->dbFields)));
            }

            // Close stdout
            //
            fflush($stdout);
            fclose($stdout);
        }

       /**
         * Add name filters to the SQL where clause.
         *
         * @param string $where current where clause
         * @return string
         */
        function filter_ExtendGetSQLWhere_Name($where) {
            return $this->database->extend_Where($where,"sl_store LIKE '%s' ");
        }

        /**
         * Add country filters to the SQL where clause.
         *
         * @param string $where current where clause
         * @return string
         */
        function filter_ExtendGetSQLWhere_Country($where) {
            return $this->database->extend_Where($where,'sl_country = %s ',$this->formdata['zip_joiner']);
        }

        /**
         * Add state filters to the SQL where clause.
         *
         * @param string $where current where clause
         * @return string
         */
        function filter_ExtendGetSQLWhere_State($where) {
            return $this->database->extend_Where($where,'sl_state = %s ',$this->formdata['name_joiner']);
        }

        /**
         * Add zip filters to the SQL where clause.
         *
         * @param string $where current where clause
         * @return string
         */
        function filter_ExtendGetSQLWhere_Zip($where) {
            return $this->database->extend_Where($where,"sl_zip LIKE '%s' ",$this->formdata['state_joiner']);
        }

        /**
         * Change wildcard strings to SQL Like Statements.
         *
         * Replace * with % in the string.
         *
         * @param type $wildcard_string
         */
        function modifystring_WildCardToSQLLike($wildcard_string) {
            return str_replace('*','%',sanitize_text_field( $wildcard_string ));
        }
    }
}
