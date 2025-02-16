jQuery(document).ready(function( $ ) {

    //matchheight

    $('.post-wrap.grid .post').matchHeight();

    //Slick slider


    $('.main .neomax_slides').slick({
        dots: true,
        infinite: true,
        speed: 750,
        fade: true,
        autoplay: true,
        pauseOnHover: true,
        pauseOnFocus: true,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll:1,
        arrows:false,
        dotsClass: "slider-dots"
    });

        $('#content, #sidebar').theiaStickySidebar({
            // Settings
            additionalMarginTop: 30
        });


	    $('.ribbon').fadeIn();

    $('.information-bar .container .close').on('click',function(){
        $('.information-bar').addClass('hide');
    });

    // Menu
    $('.neomax-top-bar .menu-wrap .main-nav').slicknav({
        prependTo:'.neomax-top-bar .top-bar',
        label:'',
        nestedParentLinks:false,
        allowParentLinks: true
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


    $('.searchwrap a').on('click', function ( e ) {
        e.preventDefault();
        $('.display-search-view').toggle('slide');

        $('#modal-1 a.ct_icon.search').toggleClass('inc-zindex');
        $('#modal-1 a.ct_icon.search i').addClass('fa-search');
        $('#modal-1 a.ct_icon.search i').removeClass('fa-times-circle');
		$('a.ct_icon.search.inc-zindex i').addClass('fa-times-circle');
        $('a.ct_icon.search.inc-zindex i').removeClass('fa-search');
    });


    const open = document.getElementById("open-trigger");
    const close = document.getElementById("close-trigger");


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



    if (open) {
        open.addEventListener('click', () => MicroModal.show('modal-1', {
                onShow: () => document.body.classList.add('howdy'),
            onClose: () => document.body.classList.remove('howdy'),
            awaitCloseAnimation: true,
            openClass: 'open'
    }), false);
    }

    if (close) {
        close.addEventListener('click', () => MicroModal.close('modal-1'), false);
    }
});
