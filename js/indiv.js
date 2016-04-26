$(document).ready(function(){
	var id = jQuery.geturl("product");

	$.ajax({
		type:"POST",
		url:"../php/default.php",
		data:{identification:5,id:id},
		success:function(data){
			obj = $.parseJSON(data);

			$.each(obj,function(index,value){

				$("head").find("title").html(obj.name);
				$(".title_container").find("h3").html(obj.name);
				$(".title_container").find("h5").html(obj.serie);

				$(".desc_container").find("p").html(obj.description);

				$(".details_container").find(".name_container").html(obj.data);

			});
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
