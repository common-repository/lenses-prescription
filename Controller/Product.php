<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_LensesPrescription_Controller_Product {


	public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_scripts')); 	
    add_action('woocommerce_before_add_to_cart_button', array($this, 'display_options_on_product_page'), 12);	//after product options							  				
	}


  public function enqueue_frontend_scripts(){
    wp_enqueue_script('lp_product_view', Pektsekye_LP()->getPluginUrl() . 'view/frontend/web/main.js', array('jquery', 'jquery-ui-widget'));      
    wp_enqueue_style('lp_product_view', Pektsekye_LP()->getPluginUrl() . 'view/frontend/web/main.css');		  		  			
  }
  
  
	public function display_options_on_product_page() { 
    include_once(Pektsekye_LP()->getPluginPath() . 'Block/Product/Js.php');
    $block = new Pektsekye_LensesPrescription_Block_Product_Js();
    $block->toHtml();
  }
  

}
