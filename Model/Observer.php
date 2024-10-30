<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_LensesPrescription_Model_Observer {  

  protected $_lpProduct;        
                
      
  public function __construct(){           
    include_once(Pektsekye_LP()->getPluginPath() . 'Model/Product.php' );
    $this->_lpProduct = new Pektsekye_LensesPrescription_Model_Product();
      
    add_action('woocommerce_process_product_meta', array($this, 'save_product_options'));         
		add_action('delete_post', array($this, 'delete_post'));    	          		
  }	  


 
  public function save_product_options($post_id){
    if (isset($_POST['lp_changed']) && $_POST['lp_changed'] == 1){
      $productId = (int) $post_id;         
      $optionIds = array_map('intval', $_POST['lp_text_option']);
      if (isset($optionIds[0]) && $optionIds[0] < 1){
        unset($optionIds[0]);
      }
      
      $numberOfColumns = (int) $_POST['lp_number_of_columns'];
      
      $data = array('option_ids' => $optionIds, 'number_of_columns' => $numberOfColumns);
      
      $this->_lpProduct->saveOptions($productId, $data);                     
    }
  }
    
	
	public function delete_post($id){
		if (!current_user_can('delete_posts') || !$id || get_post_type($id) != 'product'){
			return;
		}
   		
    $this->_lpProduct->deleteProductOptions($id);             
	}		
		
}
