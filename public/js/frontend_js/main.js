/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
// alert('awd');
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
$(document).ready(function(){
	// alert('awd');
	// Change Price with Size
	// $("#selSize").hide();

// Change Price with Size
	$("#selSize").change(function(){
		var idsize = $(this).val();
		// alert(idsize);
		if(idsize==""){
			return false;
		}

		$.ajax({
			type:'post',
			url:'getting-product-price',
			data:{idsize:idsize},
			success:function(data){
				
				alert(data.success);

              	// alert(data);
             },error:function(){
              	alert('error');

      		}
		});	
	});
});

//validation
/*$(document).ready(function(){
		alert('working');
	$("#registerForm").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				lettersonly:true
			},
			password:{
				required:true,
				minlength:6
			}
			email:{
				required:true,
				email:true
			}
		},
		messages:{
				name: "Please Enter Your Name",
				password:{
						required:"Please provide your password",
						minlength: "your password must be greater than 6"
				},
				email:{
					required:"Please Enter your valid email",
					email: "Please enter valid email"
				}
		}
	});
});*/