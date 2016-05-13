"use strict";
define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/shipping-save-processor',
    'Excellence_Hello/js/model/shipping-save-processor/default',
    'Magento_Checkout/js/model/quote'
    ], function(Component,ko,processor,defaultprocessor,quote) {
     
        processor.registerProcessor('default',defaultprocessor);


        return Component.extend({
            visible: ko.observable(!quote.isVirtual()), 
            // if we need some kind of option for virtual products. else not required
            initialize: function () {
            	var self = this;
                self._super();
                return this;
            }
        });
});