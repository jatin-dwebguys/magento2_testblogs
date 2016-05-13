define([
    'uiComponent',
    'Magento_Checkout/js/model/quote',
    'ko',
], function (Component,quote,ko) {
    'use strict';
    return Component.extend({
        defaults: {
            template: 'Excellence_Hello/test'
        },
        isVisible : ko.observable(false),
        initialize: function(){
           var self = this;
           self._super();
           quote.shippingMethod.subscribe(function(method){
              self.toggleBox(method);
           });
           self.toggleBox(quote.shippingmethod);
           return self;
        },
        toggleBox : function(method){
          var self = this;
          if(method){
            if(method.method_code == 'shippingmethod'){
               self.isVisible(true);
             }else{
               self.isVisible(false);
             }
          }
        }
    });
});
