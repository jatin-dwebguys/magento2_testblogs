/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*global define*/
define(
    [
        'Magento_Checkout/js/view/summary/abstract-total',
        'Magento_Checkout/js/model/quote',
        'underscore'
    ],
    function (Component, quote,_) {
        "use strict";
        return Component.extend({
            getPureValue: function() {
                var totals = quote.getTotals()();
                
                var custom_fee = _.filter(totals.total_segments,function(total){
                    if(total.code == 'etech'){
                        return true;
                    }
                });
                if (custom_fee) {
                    return _.first(custom_fee).value;
                }
                return 0;
            },
            getValue: function () {
                return this.getFormattedPrice(this.getPureValue());
            }

        });
    }
);
