define([
   	'jquery',
   	'jquery/ui'
   	],function($){
   		"use strict";

   		$.widget("excellence.percentage", {
            options : {
               value : 0
            },
   			_create : function(){
               this.element.addClass('percentage');
               this._show();
   			},
            _show : function(){
               this.element.html(this.options.value + "%");
               this._trigger('update',{value:this.options.value});
               if(this.options.value){
                  this._trigger('complete',{value:this.options.value});
               }
            },
            _setOption : function(key,value){
               /**
                 this is called automatically 
                 after _setOptions
                 when setting options 
               **/
               if ( key === "value" ) {
                  value = this._constrain( value );
               }
               this._super(key,value);
               this._show();
            },
            _constrain: function( value ) {
                 if ( value > 100 ) {
                     value = 100;
                 }
                 if ( value < 0 ) {
                     value = 0;
                 }
                 return value;
             }
   		});

   		return $.excellence.percentage;
   })