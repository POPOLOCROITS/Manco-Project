$(window).load(function(){
	// $(".preloader-wrapper").fadeOut('slow', function(){
	// 	// $(this).remove();
	// });

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

     var products_container = $("<div>",{class:"mjx_products_container",id:"mjx_products_container"});       
        var row_container = $("<div>",{class:"row"});
    products_container.append(row_container);

    $.ajax({
        type:"POST",
        data: data,
        url: "login/default.php",
        success:function(data){
            var obj = jQuery.parseJSON(data);
            // console.log(obj);

            $.each(obj,function(index, value){
                var my_a = $("<a>", {href:"views/individual.php?product="+ value.id});
                    var inmediat_container1 = $("<div>",{class:"col-md-2 separator", id:"min_product"});
                        var my_div1 = $("<div>",{class:"container_p row"});
                            var prot_img1 = $("<img>",{class:"prot", src:value.url});                    
                            var my_inf_cont = $("<div>",{class:"info_cont"});
                                var my_div_name = $("<div>",{class:"row"});
                                    var my_h5_name = $("<h6>",{class:"col-md-12 my_content", html:value.name});
                                my_div_name.append(my_h5_name);     
                            my_inf_cont.append(my_div_name); 
                        my_div1.append(prot_img1,my_inf_cont);
                    inmediat_container1.append(my_div1);
                my_a.append(inmediat_container1);

                row_container.append(my_a);
            });

            $("section").append(products_container);

            height = (( $(window).height() - $("nav").height()) / 2 ) - 50;

            $(".preloader_subcontainer").css({"margin-top":height});  
            $("section").find(".preloader_container").fadeIn("slow");
            
            setTimeout(function(){
                $("section").find(".preloader_container").fadeOut("slow",function(){
                    $("#mjx_products_container").fadeIn();
                });                  
            },2000);
            
        },
        error:function(){
            console.log("My Teemo!1!");
        }
    })
}