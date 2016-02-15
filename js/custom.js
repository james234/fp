//Custom JS
//var baseUrl = document.location.origin+'/fp/';
var baseUrl = document.location.origin+'/others/fp/';

$(document).ready(function(){
	
	$('#country').on('change',function(){
		var cid = $(this).val();

		$.ajax({
			
			type:'POST',
			url:baseUrl+'home/showState',
			data: {cid : cid},
			success: function(data){
				//alert(data);
			//	var obj = $.parseJSON(data);
				$('#state').html(data);
				
			} // end success
			
		}); //end ajax
		return false;

	}); // end country

	$('#state').on('change',function(){
		var sid = $(this).val();
		var cid = $('#country').val();

		$.ajax({
			
			type:'POST',
			url:baseUrl+'home/showCity',
			data: {cid : cid,sid : sid},
			success: function(data){
			//	alert(data);
			//	var obj = $.parseJSON(data);
				$('#city').html(data);
			} // end success
			
		}); //end ajax
		return false;

	}); //City
	
	$('.edit').click(function(){
//		alert($(this).attr('id'));
		var id = $(this).attr('id');
		
		$.ajax({
			
			type:'POST',
			url:baseUrl+'myaccount/updatePlace',
			data:{action_id :id},
			success:function(data){
				
				// Code Here
			
			}
			
		});
		
		
	}); // end edit
	$('.delete').click(function(){
//		alert($(this).attr('id'));
		var id = $(this).attr('id');
		var This = $(this);
		$.ajax({
			
			type:'POST',
			url:baseUrl+'myaccount/deletePlace',
			data:{action_id :id},
			success:function(data){
				
				// Code Here
				This.closest('div').parent('div').remove();
			
			}
			
		});
		
		
	}); // end place-action-delete
	
	
	/*-----------------------------------------
*                Accordion detail tab
-----------------------------------------*/		
		
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

	
 /*------------------------------------------
  *      Add Places Form Validation 
  ---------------------------------------*/
		
	$( "#add_places" ).validate({
		rules: {
		  email: {
			required: true,
			email: true
			},
			contact_person: "required",			
			phone: "required",
			organisation: "required",
            place_typeID: "required",
			description: "required",
			phone: {
				required: true,
				minlength:10,
				maxlength: 10,
				number : true
			},
			countryID: "required",
			address: "required",
			rooms_available: "required",
			facilities: "required",
			terms_conditions :{
				required: true
			}
			
		  }
	});
	
	
	/************************************
    *      Registration From Validation 
    /************************************/
		
	$( "#registration_form" ).validate({
		rules: {
		  email: {
			required: true,
			email: true
			},
			username: "required",
			password: "required",
			mobile: "required",
			organisation_name: "required",
            organisation_type: "required",
			fhname: "required",
			mobile: {
				required: true,
				minlength:10,
				maxlength: 10,
				number : true
			},
			date: "required",
			address: "required",
			number_of_room: "required",
			facilities: "required",
			terms_conditions :{
				required: true
			}
			
		  }
	});
	
	
	
		/*****************************
		* 	//  Check Email Availablity
		******************************/
	
		
		 $('input[id=InputEmail]').blur(function() { 
            $("#Loading").show();
			var email = $(this).val();
			$.ajax({			
				type:'POST',
				url:baseUrl+'registration/check_email_availablity',
				data: {email : email},
				success: function(data){
				//	var obj = $.parseJSON(data);
					$('#Loading').html(data);
				} // end success			
			}); //end ajax
			return false;
            
         });


		/*****************************
		* 	//  Delete uploaded image
		******************************/
	   $('.deleteImage').click(function(){
		var id = $(this).attr('id');
		var This = $(this);
		$.ajax({			
			type:'POST',
			url:baseUrl+'myaccount/deleteImage',
			data:{action_id :id},
			success:function(data){								
				$('.place_image_div').remove();			
			}			
		});
	}); // end delete-Image-delete
	
		 
		 $(".user_image").colorbox({iframe:true, width:"80%", height:"80%"});
		 

	
}); // documentment ready

	/************************************
		Password Match Confirmaiton 
	*************************************/
	function retypePassword()
	{
			var password= $("#InputPasswordFirst").val();
			var retype_password = $("#InputPasswordSecond").val();
			if(password!=retype_password)
			{ 
				alert("Password Not Match");
			}
	   
	}
