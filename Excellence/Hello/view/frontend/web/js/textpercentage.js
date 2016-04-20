define([
   	'jquery',
   	'jquery/ui',
    'percentage'
   	],function($){
   		"use strict";

      $.excellence.percentage.prototype._show = function(){
        this._super();
        this.element.html("Percentage: " + this.options.value + "%");
      }
      $.excellence.percentage.prototype.reset = function(){
        this._setOptino('value',0);
      }
   		return {};
   })