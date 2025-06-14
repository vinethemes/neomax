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
   
   // Menu

    // Initialize the offcanvas menu with accessibility enhancements
    $('#main-nav').hcOffcanvasNav({
        customToggle: $('.toggle'),
        levelTitles: true,
        levelTitleAsBack: true,
        pushContent: '#wrapper',
        
        // Add accessibility attributes
        insertClose: 0, // Add close button
        insertBack: true, // Add back buttons for submenus
        
        // Callbacks for accessibility
        onOpen: function() {
            handleMenuOpen();
        },
        onClose: function() {
            handleMenuClose();
        }
    });
    

    
    // Enhance the toggle button accessibility
    function setupToggleButton() {
        const $toggle = $('.toggle');
        
        // Add proper ARIA attributes
        $toggle.attr({
            'aria-label': 'Open navigation menu',
            'aria-expanded': 'false',
            'aria-controls': 'main-nav',
            'role': 'button'
        });
        
        // Remove href to prevent page jump
        $toggle.removeAttr('href');
        
        // Make it keyboard accessible
        $toggle.on('keydown', function(e) {
            // Activate on Enter or Space
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });
    }
    
    // Handle menu opening
    function handleMenuOpen() {
        const $toggle = $('.toggle');
        const $offcanvasNav = $('.hc-offcanvas-nav');
        
        // Update toggle button state
        $toggle.attr({
            'aria-expanded': 'true',
            'aria-label': 'Close navigation menu'
        });
        
        // Focus management
        setTimeout(() => {
            // Find the first focusable element in the menu
            const firstFocusable = $offcanvasNav.find('a, button, [tabindex="0"]').first();
            
            if (firstFocusable.length) {
                firstFocusable.focus();
            }
            
            // Set up keyboard navigation
            setupKeyboardNavigation($offcanvasNav);
            
        }, 100); // Small delay to ensure menu is fully rendered
        
        // Trap focus within the menu
        trapFocus($offcanvasNav);
    }
    
    // Handle menu closing
    function handleMenuClose() {
        const $toggle = $('.toggle');
        
        // Update toggle button state
        $toggle.attr({
            'aria-expanded': 'false',
            'aria-label': 'Open navigation menu'
        });
        
        // Return focus to toggle button
        $toggle.focus();
        
        // Remove focus trap
        $(document).off('keydown.focustrap');
    }
    
    // Set up keyboard navigation within the menu
    function setupKeyboardNavigation($menu) {
        const $focusableElements = $menu.find('a, button, [tabindex="0"]');
        
        $focusableElements.on('keydown', function(e) {
            const currentIndex = $focusableElements.index(this);
            
            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % $focusableElements.length;
                    $focusableElements.eq(nextIndex).focus();
                    break;
                    
                case 'ArrowUp':
                    e.preventDefault();
                    const prevIndex = currentIndex === 0 ? $focusableElements.length - 1 : currentIndex - 1;
                    $focusableElements.eq(prevIndex).focus();
                    break;
                    
                case 'Home':
                    e.preventDefault();
                    $focusableElements.first().focus();
                    break;
                    
                case 'End':
                    e.preventDefault();
                    $focusableElements.last().focus();
                    break;
            }
        });
    }
    
    // Trap focus within the menu
    function trapFocus($menu) {
        $(document).on('keydown.focustrap', function(e) {
            if (e.key !== 'Tab') return;
            
            const $focusableElements = $menu.find('a, button, [tabindex="0"]:visible');
            const firstFocusable = $focusableElements.first()[0];
            const lastFocusable = $focusableElements.last()[0];
            
            if (e.shiftKey) {
                // Shift + Tab
                if (document.activeElement === firstFocusable) {
                    e.preventDefault();
                    lastFocusable.focus();
                }
            } else {
                // Tab
                if (document.activeElement === lastFocusable) {
                    e.preventDefault();
                    firstFocusable.focus();
                }
            }
        });
    }
    
    // Add ARIA attributes to menu items
    function enhanceMenuItems() {
        const $menuItems = $('#main-nav a');
        
        $menuItems.each(function() {
            const $this = $(this);
            const $submenu = $this.next('ul');
            
            if ($submenu.length) {
                // This item has a submenu
                $this.attr({
                    'aria-haspopup': 'true',
                    'aria-expanded': 'false'
                });
                
                // Add unique ID for aria-controls
                const submenuId = 'submenu-' + Math.random().toString(36).substr(2, 9);
                $submenu.attr('id', submenuId);
                $this.attr('aria-controls', submenuId);
            }
        });
    }
    
    // Handle submenu interactions
    function handleSubmenuInteractions() {
        $(document).on('click', '.hc-offcanvas-nav .nav-next', function() {
            const $trigger = $(this).prev('a');
            $trigger.attr('aria-expanded', 'true');
        });
        
        $(document).on('click', '.hc-offcanvas-nav .nav-back', function() {
            // Find the parent menu item and update its state
            const $parentItem = $(this).closest('ul').prev('a');
            if ($parentItem.length) {
                $parentItem.attr('aria-expanded', 'false');
            }
        });
    }
    
    // Initialize everything
    setupToggleButton();
    enhanceMenuItems();
    handleSubmenuInteractions();



    




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
