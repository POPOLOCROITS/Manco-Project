$(document).ready(function(){
	var id = jQuery.geturl("product");
	$(".product_indv_container").css({"margin-top":$("nav").height() + "px"})

	$.ajax({
		type:"POST",
		url:"../php/default.php",
		data:{identification:5,id:id},
		success:function(data){
			obj = $.parseJSON(data);

			// console.log(obj);			

			$("head").find("title").html(obj.name);
			$(".title_container").find("h3").html(obj.name);
			$(".title_container").find("h5").html(obj.serie);

			$(".desc_container").find("p").html(obj.description);

			$(".details_container").find(".name_container").html(obj.data);

			$(".images_container").html(obj.images);

		},
		error:function(xhr, status, error){
			var err = eval("(" + xhr.responseText + ")");
 			alert(err.Message);
		}
	});

	$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

	height = (( $(window).height() / 2 ) - 50);

    $(".preloader_subcontainer").css({"margin-top":height});
    $(".preloader_container").fadeIn("slow");

    setTimeout(function(){
    	$(".preloader_container").fadeOut("slow",function(){
            $(".images_container").fadeIn();
        });                  
    },2000);

    $(".add_product").on("click",function(){
    	var id = jQuery.geturl("product");
    	$.ajax({
		type:"POST",
		url:"../php/default.php",
		data:{identification:8,id:id},
		success:function(data){
			var obj = jQuery.parseJSON(data);
			console.log(obj.response);
			if(obj.response == true){
				Materialize.toast('Articulo añadido!', 4000);

				console.log($(".mjx3_cart_counter").length);
				
				$(".mjx3_cart_counter").fadeIn(300);
				console.log(obj);
			}else{
				Materialize.toast('Ya cuenta con este producto', 4000);
				console.log(obj);
			}
		},
		error:function(xhr, status, error){
			var err = eval("(" + xhr.responseText + ")");
 			alert(err.Message);
		}
	});
    });

});	

(function($) {  
    $.geturl = function(key){  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
})(jQuery); 
