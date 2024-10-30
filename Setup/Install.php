<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_LensesPrescription_Setup_Install {
	

	public static function install(){
	
		if ( !class_exists( 'WooCommerce' ) ) { 
		  deactivate_plugins('lenses-prescription');
		  wp_die( __('The Lenses Prescription plugin requires WooCommerce to run. Please install WooCommerce and activate.', 'lenses-prescription'));
	  }

    if ( version_compare( WC()->version, '3.0', "<" ) ) {
      wp_die(sprintf(__('WooCommerce %s or higher is required (You are running %s)', 'lenses-prescription'), '3.0', WC()->version));
    }	
    	
		self::create_tables();
				
	}


	private static function create_tables(){
		global $wpdb;

		$wpdb->hide_errors();
		 
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta(self::get_schema());
	}


	private static function get_schema(){
		global $wpdb;

		$collate = '';

		if ($wpdb->has_cap( 'collation')){
			if (!empty( $wpdb->charset)){
				$collate .= "DEFAULT CHARACTER SET $wpdb->charset";
			}
			if (!empty( $wpdb->collate)){
				$collate .= " COLLATE $wpdb->collate";
			}
		}
		
		return "
CREATE TABLE {$wpdb->base_prefix}lensesprescription_product (
  `lp_product_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) unsigned NOT NULL,
  `option_ids` varchar(255) DEFAULT NULL,
  `number_of_columns` int(11) unsigned NOT NULL,       
  PRIMARY KEY (lp_product_id)  
) $collate;		
		";
		
	}

}
