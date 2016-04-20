var config = {
    map:{
    	'*' : {
        	"percentage":"Excellence_Hello/js/percentage",
        	"textpercentage":"Excellence_Hello/js/textpercentage",
        	"bxslider" : "Excellence_Hello/js/jquery.bxslider/jquery.bxslider.min"
        }
    },
    shim : {
    	'textpercentage' : ['percentage'],
    	"bxslider" : {
    		deps: ['jquery'],
    		export : 'bxslider'
    	}
    },
    deps: ['textpercentage']
};