jQuery(document).ready( function () {
   let dataTable = jQuery('#myTable').DataTable({
         'processing' :true, 
         'serverSide' :true,        
        'ajax' :{
        	'url':'ajax-callback.php',
        	'type':'get',
        	'data': function(data){
          // Read values
          var from_date = $('#search_fromdate').val();
          var to_date = $('#search_todate').val();

          // Append to data
          data.searchByFromdate = from_date;
          data.searchByTodate =   to_date;
       }
        },

        'columns':[
        { data: 'id'},
        { data: 'name' },
        { data: 'email' },
        { data: 'sal' },
        { data: 'join_date' }

        ]
    });

	  // Search button
	$('#btn_search').click(function(){
	    dataTable.draw();
	});
});
