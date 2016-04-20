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

	$(".dropdown-button").dropdown();

	$('.slider').slider({full_width: true});

	carousel_silver( $("#example-1") );
	carousel_silver( $("#example-2") )

	// var banner = $("#mjx3_banner")
	// var hammerTime = new Hammer(banner);

	// hammerTime.on('pan', function(ev){
	// 	console.log("something...");
	// });
	
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

function scrollFooter(scrollY, heightFooter)
{
    console.log(scrollY);
    console.log(heightFooter);

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