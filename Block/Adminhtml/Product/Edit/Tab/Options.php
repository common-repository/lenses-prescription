<?php
if (!defined('ABSPATH')) exit;

class Pektsekye_LensesPrescription_Block_Adminhtml_Product_Edit_Tab_Options {

  protected $_lpOption;
  protected $_lpProduct;
  
  protected $_productOptions;    
  protected $_lpProductData;  
    
    
	public function __construct() {

    include_once(Pektsekye_LP()->getPluginPath() . 'Model/Option.php' );
    $this->_lpOption = new Pektsekye_LensesPrescription_Model_Option();
    
    include_once(Pektsekye_LP()->getPluginPath() . 'Model/Product.php' );
    $this->_lpProduct = new Pektsekye_LensesPrescription_Model_Product();
  }



  public function getProductId() {
    global $post;    
    return (int) $post->ID;  
  }
  
  
  public function getProductOptions() {  
    if (!isset($this->_productOptions)){
      $this->_productOptions = $this->_lpOption->getProductOptions($this->getProductId());
    }    
    return $this->_productOptions;              
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
    return !empty($options) ? explode(',', $options['option_ids']) : array();
  } 
    

  public function getDropdownOptionExists()
  {     
    $optionExists = false;
    foreach ($this->getProductOptions() as $option){
      if ($option['type'] == 'drop_down'){
        $optionExists = true;
        break;
      }
    }    
    return $optionExists; 
  }    


  public function getDropdownFieldSelectOptions() {
    $options = array('' => __('-- select drop-down options --', 'lenses-prescription'));
    foreach($this->getProductOptions() as $optionId => $option){
      if ($option['type'] == 'drop_down'){
        $options[$optionId] = $option['title'];
      }    
    }
    return $options;
  }
  
  
  public function getNumberOfColumns(){
    $options = $this->getLpProductData();
    return !empty($options) && $options['number_of_columns'] > 0 ? (int) $options['number_of_columns'] : 4; 
  }  
  
  
  public function getProductOptionsPluginEnabled(){
    return function_exists('Pektsekye_PO');  
  }
   
  
  public function toHtml() {
  
    echo '<div id="lp_product_data" class="panel woocommerce_options_panel hidden">';
    
    include_once(Pektsekye_LP()->getPluginPath() . 'view/adminhtml/templates/product/edit/tab/options.php');
    
    echo ' </div>';
  }


}
