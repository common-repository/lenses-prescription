<?php
if (!defined('ABSPATH')) exit;
?>
<?php if (count($this->getOptionIds()) > 0): ?>  
  <script type="text/javascript">
      jQuery("#pofw_product_options").lensesPrescription({         
        optionIds       : <?php echo json_encode($this->getOptionIds()); ?>,
        numberOfColumns : <?php echo (int) $this->getNumberOfColumns(); ?>                                                                                                                                      
      });
  </script>        
<?php endif; ?>
