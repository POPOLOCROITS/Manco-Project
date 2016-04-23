$(document).ready(function(){

	var tab = $.geturl("tab");


	if(tab == 1){
		 $('ul.tabs').tabs('select_tab', 'registration');		
	}else if(tab == 2){
		 $('ul.tabs').tabs('select_tab', 'login_mj');
	}else{
		console.log("Oops!");
	}

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
				identification: 1,
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
					window.location = "index.php";
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

	$("#submit_log").on("click", function(){
		setTimeout(function(){
			if ( $('#username_log').val() != "" && $('#password_log').val() != "" ){
				
				var data = {
					identification:3,
					username: $('#username_log').val(),
					pass: $('#password_log').val()
				};

				$.ajax({
					type: 'POST',
					url: 'login/default.php',
					data: data,
					success:function(data){
						// console.log(data)
						window.location = "index.php";
					},
					error:function(){
						console.log("Something went wrong");
					}
				});
				
			}
			else{
				console.log("There is nothing to do :v");
			}
		}, 3000);
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