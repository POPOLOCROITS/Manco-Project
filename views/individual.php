<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>

	<!-- jQuery -->
	<script type="text/javascript" src="../js/jquery.js"></script>

	<title></title>
</head>
<body>

</body>
</html>

<script type="text/javascript">
	
	var id = jQuery.geturl("product");

	$.ajax({
		type:"POST",
		url:"../php/default.php",
		data:{identification:5,id:id},
		success:function(data){
			obj = $.parseJSON(data);
			console.log(obj);

			$.each(obj,function(index,value){
				console.log(value.name);
			});
		},
		error:function(){
			console.log("Error...");
		}
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

</script>