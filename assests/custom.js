jQuery(document).ready( function () {
        jQuery('#myTable').DataTable({
	         'processing' :true, 
	         'serverSide' :true,        
	        'ajax' :{
	        	'url':'ajax-callback.php',
	        	'type':'get'
	        },

	        'columns':[
	        { data: 'id'},
	        { data: 'name' },
	        { data: 'email' },
	        { data: 'sal' }

	        ]
	    });
} );
