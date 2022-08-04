jQuery(document).ready( function () {
        jQuery('#myTable').DataTable({
	         'processing' :true, 
	         'serverSide' :true,        
	        'ajax' :{
	        	'url':'ajax-response.php'
	        	dataFilter: function(data){
            	var json = jQuery.parseJSON( data );
            	console.log(json);
       		 }
	        },

	        'columns':[
	        { data: 'name' },
	        { data: 'email' },
	        { data: 'sal' }

	        ]
	    });
} );