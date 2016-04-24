$(window).load(function(){
	$(".preloader-wrapper").fadeOut('slow', function(){
		$(this).remove();
	});

	var windowHeight        = $("#mjx3_banner").height() + 20,
        footerHeight        = $('footer').height(),
        heightDocument      = (windowHeight) + ($('.content').height()) + ($('footer').height());

    // Definindo o tamanho do elemento pra animar
    $('#scroll-animate, #scroll-animate-main').css({
        'height' :  heightDocument + 'px'
    });

    // Definindo o tamanho dos elementos header e conteúdo
    // $('header').css({
    //     'height' : windowHeight + 'px',
    //     'line-height' : windowHeight + 'px'
    // });

    $('.wrapper-parallax').css({
        'margin-top' : windowHeight + 'px'
    });

    scrollFooter(window.scrollY, footerHeight);

    // ao dar rolagem
    window.onscroll = function(){
        var scroll = window.scrollY;

        $('#scroll-animate-main').css({
            'top' : '-' + scroll + 'px'
        });
        
        $('header').css({
            'background-position-y' : 50 - (scroll * 100 / heightDocument) + '%'
        });

        scrollFooter(scroll, footerHeight);
    }

    margin_navbar($("nav"));
});

$(document).ready(function(){

    $.ajax({cache:false});

	$(".dropdown-button").dropdown();

	$('.slider').slider({full_width: true});

	carousel_silver( $("#example-1") );
	carousel_silver( $("#example-2") )

    $("#kill_session").on("click",function(){
        session_killer();
    });

    $("#products").on("click",function(){
        if($(this).hasClass("action")){
             show_products($(this), true);
            $(this).removeClass("action");
        }else{
            show_products($(this), false);
            $(this).addClass("action");
        }
    });
});

function carousel_silver(example){

  	var parent = example.parents(".track");
  	var track = example.silverTrack({
    	duration: 800,
    	easing: "easeInOutQuad"
  	});

  	track.install(new SilverTrack.Plugins.Navigator({
    	prev: $("a.prev", parent),
    	next: $("a.next", parent)
  	}));

  	track.install(new SilverTrack.Plugins.Css3Animation({
    	delayUnit: "s",
    	autoHeightDuration: 300,
    	autoHeightEasing: "easeInOutCubic",
    	autoHeightDelay: 1
  	}));

  	track.install(new SilverTrack.Plugins.ResponsiveHubConnector({
    	layouts: ["phone", "small-tablet", "tablet", "web"],
    	onReady: function(track, options, event) {
      		options.onChange(track, options, event);
    },

    onChange: function(track, options, event) {
      	track.options.mode = "horizontal";
      	track.options.autoheight = false;
      	track.options.perPage = 4;

      	if (event.layout === "small-tablet") {
        	track.options.perPage = 3;

      	} else if (event.layout === "phone") {
        	track.options.mode = "vertical";
        	track.options.autoHeight = true;
      	}

      	track.restart({keepCurrentPage: true});
    }
  	}));

  	track.start();
}

function scrollFooter(scrollY, heightFooter){

    if(scrollY >= heightFooter)
    {
        $('footer').css({
            'bottom' : '0px'
        });
    }
    else
    {
        $('footer').css({
            'bottom' : '-' + heightFooter + 'px'
        });
    }
}

function margin_navbar(nav){
	console.log( $(nav).css("height") );
}

function session_killer(){
    setTimeout(function(){
        window.location.href = "login/logout.php";
    },2500);

    $.ajax({
        type:"POST",
        data:{identification:2},
        url:"login/default.php",
        success:function(){
            window.location = "index.php";
        },
        error:function(){
            console.log("something went wrong :(");
        }
    })
}

function show_products(object, in_out){
    
    var btn_text = "";
    var windowHeight = $("#mjx3_banner").height() + 20;

    $(window).scrollTop(0);

    if(in_out){
        btn_text = "Regresar";
        var heightDocument = (windowHeight) + ($('.content').height()) - ($('footer').height()/3);

        $(".wrapper-parallax").animate({
            // "margin-top": '0px'
            "margin-top": $("nav").height() + 'px'
        },300);
        if($("section").find(".mjx_products_container").length == 0){
            build_product_list();
        }else{
            $("section").find(".mjx_products_container").fadeIn(300);
        }
        
    }else{
        btn_text = "Productos";
        var heightDocument = (windowHeight) + ($('.content').height()) + ($('footer').height());

        $(".wrapper-parallax").animate({
            "margin-top": windowHeight + 'px'
        },300);
        $("section").find(".mjx_products_container").fadeOut(300);
    }

    $(object).find("div").animate({
            width:"toggle"
    },300,function(){
        $("#products").find("div").html(btn_text);         
    });

    $(object).find("div").animate({
        width:"toggle"
    },300);

    $("header").find("#mjx3_banner").animate({
        height: "toggle"
    },300, function(){
        
    });  
   
    $('#scroll-animate').css({
        'height' :  heightDocument + 'px'
    });
}

function build_product_list(){

    var data = {identification:4};

    $.ajax({
        type:"POST",
        data: data,
        url: "login/default.php",
        success:function(data){
            var obj = jQuery.parseJSON(data);
            console.log(obj);
        },
        error:function(){
            console.log("My Teemo!1!");
        }
    })

    var products_container = $("<div>",{class:"mjx_products_container"});       
        var row_container = $("<div>",{class:"row"});
            
            var inmediat_container1 = $("<div>",{class:"col-md-2 separator"});
                var my_div1 = $("<div>",{class:"container_p row"});
                    var prot_img1 = $("<img>",{class:"prot img-responsive", src:"http://schoolido.lu/static/idols/chibi/Kousaka_Honoka.png"});                    
                    var my_inf_cont = $("<div>",{class:"info_cont"});
                        var my_div_name = $("<div>",{class:"row"});
                            var my_h5_name = $("<h6>",{class:"col-md-12 my_content", html:"Kousaka Honoka"});
                        my_div_name.append(my_h5_name);     
                    my_inf_cont.append(my_div_name); 
                my_div1.append(prot_img1,my_inf_cont);
            inmediat_container1.append(my_div1);
            
            var inmediat_container2 = $("<div>",{class:"col-md-2"});
                var prot_img2 = $("<img>",{class:"prot", src:"http://schoolido.lu/static/idols/chibi/Hoshizora_Rin.png"});
            inmediat_container2.append(prot_img2);    
            var inmediat_container3 = $("<div>",{class:"col-md-2"});
                var prot_img3 = $("<img>",{class:"prot", src:"http://schoolido.lu/static/idols/chibi/Yazawa_Nico.png"});
            inmediat_container3.append(prot_img3);
            var inmediat_container4 = $("<div>",{class:"col-md-2"});
                var prot_img4 = $("<img>",{class:"prot", src:"http://schoolido.lu/static/idols/chibi/Koizumi_Hanayo.png"});
            inmediat_container4.append(prot_img4);   
        row_container.append(inmediat_container1,inmediat_container2,inmediat_container3,inmediat_container4); 
    products_container.append(row_container);

    $("section").append(products_container);

}