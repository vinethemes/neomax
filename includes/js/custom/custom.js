jQuery(document).ready(function( $ ) {

    //matchheight 

    $('.post-wrap.grid .post').matchHeight();



   $('.slider-wrapper23.main.slider .neomax_slides').mCustomScrollbar({
            axis: 'x',
            scrollButtons: { enable: true },
            mouseWheel: { enable: true, axis: 'x' },
            advanced: { autoExpandHorizontalScroll: true },
            alwaysShowScrollbar:2,
            scrollInertia: 200,
    });
    $('.slider-wrapper23 .highlight-slider-grid').mCustomScrollbar({
            axis: 'x',
            scrollButtons: { enable: true },
            mouseWheel: { enable: true, axis: 'x' },
            advanced: { autoExpandHorizontalScroll: true },
            alwaysShowScrollbar:2,
            scrollInertia: 200,
    });
    $('.slider-wrapper23 .footer-slider-grid').mCustomScrollbar({
            axis: 'x',
            scrollButtons: { enable: true },
            mouseWheel: { enable: true, axis: 'x' },
            advanced: { autoExpandHorizontalScroll: true },
            alwaysShowScrollbar:2,
            scrollInertia: 200,
    });



      $('.share-toggle-btn').on('click', function () {
        $(this).closest('.video-meta-wrap').find('.share-icons').toggleClass('visible');
    });
    $('.copy-link-btn').on('click', function () {
        const $copyConfirm = $(this).siblings('.copy-confirmation');
        navigator.clipboard.writeText(window.location.href).then(() => {
            $copyConfirm.fadeIn().delay(2500).fadeOut();
        });
    });



	    $('.ribbon').fadeIn();

    $('.information-bar .container .close').on('click',function(){
        $('.information-bar').addClass('hide');
    });

    // Menu
   
   $('#main-nav').hcOffcanvasNav({
        customToggle: $('.toggle'),
        levelTitles: true,
        levelTitleAsBack: true,
		pushContent: '#wrapper'
      });


		$( window ).resize( function() {
			var browserWidth = $( window ).width();

			if ( browserWidth > 920 ) {
				$(".main-nav,.secondary-menu").show();
			}
		} );





    var ico = $('<i class="fa fa-caret-down"></i>');
    var ico2 = $('<i class="fa fa-caret-down"></i>');
    var ico1 = $('<i class="fa fa-caret-right"></i>');


    $('.main-nav > li:has(ul) > a').append(ico);
    $('.main-nav li:has(ul)  li:has(ul)>a').append(ico1);


    

		//FitVids
		$(".post-content iframe").wrap("<div class='fitvid'/>");
		$(".arrayvideo,.fitvid").fitVids();



    $(function()
    {
        $.fn.scrollToTop = function() {
            $(this).hide().removeAttr('href');

            var scrollDiv = $(this);
            $(window).scroll(function()
            {
                if ($(window).scrollTop() >= 1000)
                {
                    $(scrollDiv).fadeIn('slow')
                }
                else
                {
                    $(scrollDiv).fadeOut('slow')
                }
            });
            $(this).click(function()
            {
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow')
            })
        }
    });
    $(function()
    {
        $('#credits').scrollToTop();
    });

    if($('.hearder-holder .header-image').length) {
        $('body').addClass('headerimage');
    }



    $('.main-nav a').focus( function () {
        $(this).siblings('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).siblings('.sub-menu').removeClass('focused');
    });

// Sub Menu
    $('.sub-menu a').focus( function () {
        $(this).parents('.sub-menu').addClass('focused');
    }).blur(function(){
        $(this).parents('.sub-menu').removeClass('focused');
    });

    $(".neomax-toggle").click(function() {
        var index = $(this).data("index");
        $(".neomax_slides").removeClass("active");
        $(".neomax_slides").eq(index).addClass("active");
    });

    $(".neomax-toggle").click(function() {
        if (!$(this).hasClass("active")) {
            $(".neomax-toggle").removeClass("active").addClass("notactive");
            $(this).removeClass("notactive").addClass("active");
        }
    });



    function addDarkmodeWidget() {
  const options = {
    bottom: '64px',
    right: '32px',
    time: '0.5s',
    mixColor: '#fff',
    backgroundColor: '#fff',
    buttonColorDark: '#100f2c',
    buttonColorLight: '#fff',
    saveInCookies: true,
    label: '<i class="fa-solid fa-moon"></i>', // Emoji label for the button
    autoMatchOsTheme: true // Match system theme by default
  };

  const darkmode = new Darkmode(options);
  darkmode.showWidget();
}

window.addEventListener('load', addDarkmodeWidget);



});
