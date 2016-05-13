define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/quote'
], function ($,Component,ko,quote) {
    'use strict';
    return Component.extend({
       initialize: function () {
              var self = this;
              self._super();
              quote.shippingMethod.subscribe(function(newValue){
                  if(newValue.method_code == "shippingmethod"){
                    //this would our store pickup shipping method
                    
                  }
              });
       }
    });
});
