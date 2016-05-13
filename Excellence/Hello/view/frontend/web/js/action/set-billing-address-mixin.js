/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote',
    'jquery/jquery-storageapi'
], function ($, wrapper,quote) {
    'use strict';
    var agreementsConfig = window.checkoutConfig.checkoutAgreements;

    return function (setBillingAction) {
        /** Override default place order action and add agreement_ids to request */
        return wrapper.wrap(setBillingAction, function(originalAction, messageContainer) {
            
       var storage = $.localStorage;
       var data1 = storage.get('mage-cache-storage')['checkout-data']['billingAddressFromData'];
       // see here we are using "from" data
       // i think this is a typo by magento so we will use both "from" and "form"
       var data2 = storage.get('mage-cache-storage')['checkout-data']['billingAddressFormData'];

       var cartId = quote.getQuoteId();
       $.post('excellence/checkout/billingstep',
                { 
                    excellence: {
                        billing: {
                            data1 : data1,
                            data2 : data2
                        }
                    },
                    'cartId' : cartId
                }).done(function(){

                    

                })


            return originalAction(messageContainer);
        });
    };
});
