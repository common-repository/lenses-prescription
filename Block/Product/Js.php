<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_LensesPrescription_Block_Product_Js {

  protected $_lpProduct;
  protected $_lpProductData;  
  

	public function __construct(){
    
    include_once(Pektsekye_LP()->getPluginPath() . 'Model/Product.php' );
    $this->_lpProduct = new Pektsekye_LensesPrescription_Model_Product();			 		  			
	}


  public function getProductId(){
    global $product;
    return (int) $product->get_id();              
  }
  

  public function getLpProductData()
  {
    if (!isset($this->_lpProductData)){
      $this->_lpProductData = $this->_lpProduct->getOptions($this->getProductId());
    }    
    return $this->_lpProductData;  
  }
  
  
  public function getOptionIds()
  {
    $options = $this->getLpProductData();
    return !empty($options) ? array_map('intval', explode(',', $options['option_ids'])) : array();
  }   
  
  
  public function getNumberOfColumns(){
    $options = $this->getLpProductData();
    return !empty($options) && $options['number_of_columns'] > 0 ? (int) $options['number_of_columns'] : 4; 
  } 
  
    
  public function toHtml(){
    include_once(Pektsekye_LP()->getPluginPath() . 'view/frontend/templates/product/js.php');
  }


}
