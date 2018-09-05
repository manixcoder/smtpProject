/************************************
	Developer : 
	Description: 
	Date: 
	Use : 
/*************************************/
 $(document).ready(function(){
    
	$("#searchfi").keyup(function(){
			
	$.ajax({
		type  : 'post',
		url   :  'http://a1professionals.net/arudym_app/admin/DashBoard/dummy_search_result',
		data  :{
			'From_date' : this.value //this.value function  tkae current entered value 
			},
		
		success:function(res){
		    var  html;
		    html +="<thead><tr><th>UserId</th><th>UserName</th><th>UserType</th><th>UserEmail</th><th>UserPassword</th><th>UserStatus</th></tr></thead><tbody>";
		    $.each(res,function(index,value){
		        html +="<tr>";
		        html +="<td>"+value.user_id+ "</td>";
		        html +="<td>"+value.userName+ "</td>";
		        html +="<td>"+value.userType+ "</td>";
		        html +="<td>"+value.userEmail+ "</td>";
		        html +="<td>"+value.userPassword+ "</td>";
		        html +="<td>"+value.status+ "</td>";
		        html +="</tr>";
		        
		    });
		    html += "</tbody>";
		    
			$("#search_result").html(html);
		
			} 
		
		});
});

});

/************************************
	Developer : sanyam singahl
	Description: for show date picker
	Date: 5/5/2017
	Use : date range picker
/*************************************/


	$(function() {
		$('input[name="daterange"]').daterangepicker({
			//maxDate: new Date()
		});
	});
	


/************************************
	Developer : sanyam singahl
	Description: choose date after search data from database
	Date: 5/5/2017
	Use : date range picker for search data
/*************************************/


	$(function() {
		$('.applyBtn').click(function() {
			
			var from_date = $("input[name=daterangepicker_start]").val();//alert(from_date);
			var to_date = $("input[name=daterangepicker_end]").val();//alert(to_date);
			var base_url = $("input[name=base_url]").val(); //alert(to_date);
			
			var url = base_url+'admin/search-appointment/?from_date='+from_date+'&to_date='+to_date;

				$('#date_form').attr('action', url);
				
				$('#From_date').val(from_date);
			   $('#To_date').val(to_date);
			
			
		
		
			if(to_date){
			
			  document.getElementById('date_form').submit(); 
			 
			}
		});	
	});

/************************************
	Developer  : sanyam singahl
	Description: 
	Date       : 5/5/2017
	Use        : show alert msg
/*************************************/

		setTimeout(function() {
			jQuery('#request').fadeOut('slow');
		}, 5000); 
		