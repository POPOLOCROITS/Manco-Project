$.ajax({
	type:"POST",
	url:"../php/default.php",
	data:{identification:6},
	success:function(data){
		var obj = $.parseJSON(data);
		// console.log(obj);

		$(".cart_products").html(obj);

		
	},
	error:function(){

	}
});

$(document).ready(function(){

	


	// $("#btn_delete").on("click",function(){
	// 	console.log($(".cart_products").find("div").length);
	// 	$.ajax({
	// 		type:"POST",
	// 		url:"../php/default.php",
	// 		data:{identification:7, product:$("#id_product").value()},
	// 		success:function(data){
	// 			var obj = $.parseJSON(data);
	// 			console.log(obj);

	// 			$(".cart_products").html(obj);
	// 		},
	// 		error:function(){

	// 		}
	// 	})
	// });

});