"use strict";
define([
    'uiComponent',
    'ko',
    'Magento_Checkout/js/model/shipping-save-processor',
    'Excellence_Hello/js/model/shipping-save-processor/default'
    ], function(Component,ko,processor,defaultprocessor) {
     
        processor.registerProcessor('default',defaultprocessor);
        return Component.extend({
            initialize: function () {
            	var self = this;
                self._super();
            }
        });
});