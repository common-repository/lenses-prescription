( function ($) {
  "use strict";

  $.widget("pektsekye.lensesPrescription", {

    _create: function(){   		    

      $.extend(this, this.options);
      
      var oId, div;
      var l = this.optionIds.length;
      for (var i=0;i<l;i++){ 
        oId = this.optionIds[i];
        div = this.element.find('#pofw_option_'+oId).closest('.field');
  
        div.addClass('pofw-prescription-option');
        
        if ((i + 1) % this.numberOfColumns == 0 || i + 1 == l){
          div.after('<div class="clear"></div>');
        }
      }          
    }   
    
  });

})(jQuery);
    


