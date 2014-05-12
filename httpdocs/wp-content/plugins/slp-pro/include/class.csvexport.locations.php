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
     * @copyright 2013 Charleston Software Associates, LLC
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
                '<p>'.
                    __('Export the location data to a CSV file.','csa-slp-pro').
                    '<br/>' .
                    '<input type="button" ' .
                        'id="export_locations" name="export_locations" ' .
                        'value="Export Locations" ' .
                        'onClick="'. $this->createstring_ExportButtonJS('slp_download_locations_csv','locations') . '" ' .
                        '/>'.
                '</p>'.
                '</div>'.
                '</div>'.
                '<iframe id="secretIFrame" src="" style="display:none; visibility:hidden;"></iframe>' .
                '</div>'
                ;
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

            // Open stdout
            //
            $stdout = fopen('php://output','w');

            // Export Header
            //
            fputcsv($stdout,$this->dbFields);

            // Export records
            //
            $offset=0;
            while ($locationArray = $this->database->get_Record(array('selectall'),null,$offset++)) {
                // FILTER: slp-pro-csvexport
                $locationArray = apply_filters('slp-pro-csvexport',$locationArray);
                fputcsv($stdout,array_intersect_key($locationArray,array_flip($this->dbFields)));
            }

            // Close stdout
            //
            fflush($stdout);
            fclose($stdout);
        }
    }
}