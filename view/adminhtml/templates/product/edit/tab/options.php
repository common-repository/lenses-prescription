<?php
if (!defined('ABSPATH')) exit;
?>
<div class="lp-container">
<?php if (!$this->getProductOptionsPluginEnabled()): ?>
  <div class="lensesprescription-create-ms"><?php echo __('Please, install and enable the <a href="https://wordpress.org/plugins/product-options-for-woocommerce/" target="_blank">Product Options</a> plugin.', 'lenses-prescription'); ?></div>
<?php  elseif (!$this->getDropdownOptionExists()): ?> 
  <div class="lensesprescription-create-ms"><?php echo sprintf(__('Create product options with type Drop-down and save the product. (<a href="%s" target="_blank">screenshot</a>)', 'lenses-prescription'), Pektsekye_LP()->getPluginUrl() . 'view/adminhtml/web/product/edit/dropdown_options.png'); ?></div>
<?php else: ?>
  <div id="lp_options">
    <input type="hidden" id="lp_changed" name="lp_changed" value="0">           
    <div>
      <p class="form-field">
        <label for="lp_text_option_select"><?php echo __('Prescrition options', 'lenses-prescription'); ?></label>  <span class="woocommerce-help-tip" data-tip="<?php echo htmlspecialchars(__("Product options that will be combined and displayed as the lenses prescription table.", 'lenses-prescription'));?>"></span>    
        <select id="lp_text_option_select" name="lp_text_option[]" multiple="multiple" size="10">
        <?php foreach ($this->getDropdownFieldSelectOptions() as $key => $value ): ?>
          <option value="<?php echo esc_attr($key); ?>" <?php echo in_array($key, $this->getOptionIds()) ? 'selected="selected"' : ''; ?> ><?php echo esc_html($value); ?></option>
        <?php endforeach; ?>
        </select>
      </p>       
    </div>     
    <div>
      <p class="form-field">
        <label for="lp_number_of_columns"><?php echo __('Number of columns', 'lenses-prescription'); ?></label>
        <input class="lp-number-of-columns" type="text" id="lp_number_of_columns" name="lp_number_of_columns" value="<?php echo (int) $this->getNumberOfColumns(); ?>" autocomplete="off">                     
      </p>    
    </div>      
  </div> 
   <script type="text/javascript">
    jQuery('#lp_options').lensesPrescription({});        
  </script>                 
<?php endif; ?>     
</div>

    