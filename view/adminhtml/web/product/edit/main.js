( function ($) {
  "use strict";

$.widget("pektsekye.lensesPrescription", {

  _create: function(){   		    

    $.extend(this, this.options); 

    this._on({
      "change select, input": $.proxy(this.setChanged, this),
    });
     
  },
  

  setChanged : function(){
    $('#lp_changed').val(1);     
  }   

});

})(jQuery);