/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
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
              self.etech_select = ko.observable(false);
              quote.billingAddress.subscribe(function(){
                var storage = $.localStorage;
               var data1 = storage.get('mage-cache-storage')['checkout-data']['billingAddressFromData'];
               // see here we are using "from" data
               // i think this is a typo by magento so we will use both "from" and "form"
               var data2 = storage.get('mage-cache-storage')['checkout-data']['billingAddressFormData'];
               console.log(data1);
               console.log(data2);
                if(data1 && data1.etech_select){
                  self.etech_select = data1.etech_select;
                }else if(data2 && data2.etech_select){
                  self.etech_select = data2.etech_select;
                }
              });
              
       }
    });
});
