jQuery.noConflict();
jQuery(function() {
				jQuery('#mix_container').gridnav({
					type	: {
						mode		: 'disperse', 	// use def | fade | seqfade | updown | sequpdown | showhide | disperse | rows
						speed		: 500,			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows
						easing		: '',			// for fade, seqfade, updown, sequpdown, showhide, disperse, rows	
						factor		: '',			// for seqfade, sequpdown, rows
						reverse		: ''			// for sequpdown
					}
				});
			});
  jQuery(document).ready(function () {
	  
	  //Examples of how to assign the ColorBox event to elements
				jQuery(".group1").colorbox({rel:'group1'});
				jQuery(".group2").colorbox({rel:'group2', transition:"fade"});
				jQuery(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				jQuery(".group4").colorbox({rel:'group4', slideshow:true});
				jQuery(".ajax").colorbox();
				jQuery(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				jQuery(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				jQuery(".inline").colorbox({inline:true, width:"50%"});
				jQuery(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				jQuery("#click").click(function(){ 
					jQuery('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
	  
	  jQuery('#more_view').jcarousel({
        start: 1,
		scroll:1,
		wrap: 'circular'
    });
	  // hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	  jQuery('#slider').nivoSlider();
      jQuery('.mycarousel_related').jcarousel({
		scroll: 1,
        wrap: 'circular'
    });
	
	});
	
jQuery(function() {
    jQuery("div.add-to-cart").append('<div class="add">&#8250;</div><div class="dec add">&#8249;</div>');

    jQuery(".add").click(function() {
        var jQueryadd = jQuery(this);
        var oldValue = jQueryadd.parent().find("input").val();
		var newVal = 0;
    
        if (jQueryadd.text() == "›") {
    	   newVal = parseFloat(oldValue) + 1;
    	  // AJAX save would go here
    	} else {
    	  // Don't allow decrementing below zero
    	  if (oldValue >= 1) {
    	      newVal = parseFloat(oldValue) - 1;
    	      // AJAX save would go here
    	  }
		  if(oldValue == 0){
			  newVal = parseFloat(oldValue);
			  }
    	}
    	jQueryadd.parent().find("input").val(newVal);
    });
	jQuery("#reset_btn").click(function(){
		document.getElementById('qty').value=1;
		});

});