(function ($) {
 "use strict";

/*--------------------------
preloader
---------------------------- */

	$(window).on('load',function(){
		var pre_loader = $('#preloader')
	pre_loader.fadeOut('slow',function(){$(this).remove();});
	});


/*---------------------
 TOP Menu Stick
--------------------- */

var windows = $(window);
var sticky = $('#sticker');

windows.on('scroll', function() {
    var scroll = windows.scrollTop();
    if (scroll < 300) {
        sticky.removeClass('stick');
    }else{
        sticky.addClass('stick');
    }
});

// Nice Select JS
  $('select').niceSelect();
/*----------------------------
 jQuery MeanMenu
------------------------------ */

    var mean_menu = $('nav#dropdown');
    mean_menu.meanmenu();

/*---------------------
 wow .js
--------------------- */
    function wowAnimation(){
        new WOW({
            offset: 100,
            mobile: true
        }).init()
    }
    wowAnimation()

/*--------------------------
 scrollUp
---------------------------- */

	$.scrollUp({
		scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>',
		easingType: 'linear',
		scrollSpeed: 900,
		animation: 'fade'
	});

/*----------------------------
 Counter js active
------------------------------ */

    var count = $('.counter');
    count.counterUp({
		delay: 40,
		time: 3000
	});

/*--------------------------
 collapse
---------------------------- */

	var panel_test = $('.panel-heading a');
	panel_test.on('click', function(){
		panel_test.removeClass('active');
		$(this).addClass('active');
	});
/*--------------------------
 Parallax
---------------------------- */
    var parallaxeffect = $(window);
    parallaxeffect.stellar({
        responsive: true,
        positionProperty: 'position',
        horizontalScrolling: false
    });

/*--------------------------
 MagnificPopup
---------------------------- */

    $('.video-play').magnificPopup({
        type: 'iframe'
    });


/*---------------------
 Brand carousel
---------------------*/

    var brand = $('.brand-carousel');
    brand.owlCarousel({
		loop:true,
		nav:false,
        margin:50,
		dots:true,
		autoplay:false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:4
			},
			1000:{
				items:6
			}
		}
	});

/*---------------------
 Testimonial carousel
---------------------*/

    var review = $('.testimonial-carousel');
    review.owlCarousel({
		loop:true,
		nav:false,
        margin:40,
		dots:true,
        center: true,
		autoplay:false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});
/*---------------------
 Screen carousel
---------------------*/
	var screen = $('.screen-carousel');
	    screen.owlCarousel({
		loop:true,
		nav:false,
		dots:true,
        center: true,
        autoWidth:true,
        margin:20,
		autoplay:false,
		responsive:{
			0:{
				items:1,
			},
			768:{
				items:3
			},
			1000:{
				items:4
			}
		}
	});

/*----------------------------
    Contact form
------------------------------ */
	$("#contactForm").on("submit", function (event) {
		if (event.isDefaultPrevented()) {
			formError();
			submitMSG(false, "Did you fill in the form properly?");
		} else {
			event.preventDefault();
			submitForm();
		}
	});
	function submitForm(){
		var name = $("#name").val();
		var email = $("#email").val();
		var msg_subject = $("#msg_subject").val();
		var message = $("#message").val();


		$.ajax({
			type: "POST",
			url: "assets/contact.php",
			data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
			success : function(text){
				if (text === "success"){
					formSuccess();
				} else {
					formError();
					submitMSG(false,text);
				}
			}
		});
	}

	function formSuccess(){
		$("#contactForm")[0].reset();
		submitMSG(true, "Message Submitted!")
	}

	function formError(){
		$("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass();
		});
	}

	function submitMSG(valid, msg){
		if(valid){
			var msgClasses = "h3 text-center tada animated text-success";
		} else {
			var msgClasses = "h3 text-center text-danger";
		}
		$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
	}


})(jQuery);



(function($) {
	"use strict";
	$.fn.sliderResponsive = function(settings) {

	  var set = $.extend(
		{
		  slidePause: 5000,
		  fadeSpeed: 800,
		  autoPlay: "on",
		  showArrows: "off",
		  hideDots: "off",
		  hoverZoom: "on",
		  titleBarTop: "off"
		},
		settings
	  );

	  var $slider = $(this);
	  var size = $slider.find("> div").length; //number of slides
	  var position = 0; // current position of carousal
	  var sliderIntervalID; // used to clear autoplay

	  // Add a Dot for each slide
	  $slider.append("<ul></ul>");
	  $slider.find("> div").each(function(){
		$slider.find("> ul").append('<li></li>');
	  });

	  // Put .show on the first Slide
	  $slider.find("div:first-of-type").addClass("show");

	  // Put .showLi on the first dot
	  $slider.find("li:first-of-type").addClass("showli")

	   //fadeout all items except .show
	  $slider.find("> div").not(".show").fadeOut();

	  // If Autoplay is set to 'on' than start it
	  if (set.autoPlay === "on") {
		  startSlider();
	  }

	  // If showarrows is set to 'on' then don't hide them
	  if (set.showArrows === "on") {
		  $slider.addClass('showArrows');
	  }

	  // If hideDots is set to 'on' then hide them
	  if (set.hideDots === "on") {
		  $slider.addClass('hideDots');
	  }

	  // If hoverZoom is set to 'off' then stop it
	  if (set.hoverZoom === "off") {
		  $slider.addClass('hoverZoomOff');
	  }

	  // If titleBarTop is set to 'on' then move it up
	  if (set.titleBarTop === "on") {
		  $slider.addClass('titleBarTop');
	  }

	  // function to start auto play
	  function startSlider() {
		sliderIntervalID = setInterval(function() {
		  nextSlide();
		}, set.slidePause);
	  }

	  // on mouseover stop the autoplay
	  $slider.mouseover(function() {
		if (set.autoPlay === "on") {
		  clearInterval(sliderIntervalID);
		}
	  });

	  // on mouseout starts the autoplay
	  $slider.mouseout(function() {
		if (set.autoPlay === "on") {
		  startSlider();
		}
	  });

	  //on right arrow click
	  $slider.find("> .right").click(nextSlide)

	  //on left arrow click
	  $slider.find("> .left").click(prevSlide);

	  // Go to next slide
	  function nextSlide() {
		position = $slider.find(".show").index() + 1;
		if (position > size - 1) position = 0;
		changeCarousel(position);
	  }

	  // Go to previous slide
	  function prevSlide() {
		position = $slider.find(".show").index() - 1;
		if (position < 0) position = size - 1;
		changeCarousel(position);
	  }

	  //when user clicks slider button
	  $slider.find(" > ul > li").click(function() {
		position = $(this).index();
		changeCarousel($(this).index());
	  });

	  //this changes the image and button selection
	  function changeCarousel() {
		$slider.find(".show").removeClass("show").fadeOut();
		$slider
		  .find("> div")
		  .eq(position)
		  .fadeIn(set.fadeSpeed)
		  .addClass("show");
		// The Dots
		$slider.find("> ul").find(".showli").removeClass("showli");
		$slider.find("> ul > li").eq(position).addClass("showli");
	  }

	  return $slider;
	};
  })(jQuery);



  //////////////////////////////////////////////
  // Activate each slider - change options
  //////////////////////////////////////////////
  $(document).ready(function() {

	$("#slider1").sliderResponsive({
	// Using default everything
	  // slidePause: 5000,
	  // fadeSpeed: 800,
	  // autoPlay: "on",
	  // showArrows: "off",
	  // hideDots: "off",
	  // hoverZoom: "on",
	  // titleBarTop: "off"
	});

  });
