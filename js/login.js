$(document).ready(function(){

	$("#submit_reg").on("click", function(){
		var username = $("#username").val();
		
		var mail = $("#email").val();
		var con_mail = $("#conemail").val();
		
		var pass = $("#password").val();
		var con_pass = $("#conpassword").val();

		if(pass != con_pass){
			console.log("Password is diferent");
		}else if(mail != con_mail){
			console.log("Mail is diferent!");
		}else{
			
			var data = {
				username:username,
				pass:pass,
				mail:mail,
				first: $("#first_name").val(),
				last: $("#last_name").val()
			};

			$.ajax({
				type:"POST",
				url:"login/default.php",
				data:data,
				success:function(respond){
					console.log(respond);
				},
				error:function(){
					console.log("something went wrong :(");
				}
			});

			console.log("Password and Mail are good!");
			if(username != "" && pass != "" && mail != ""){
				console.log("All fine.");
			}
		}
	});

});