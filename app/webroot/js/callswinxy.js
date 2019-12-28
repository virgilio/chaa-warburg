jQuery(document).ready(function() {
	jQuery('.img_obra a img').load(function(){
		// Get on screen image
		var screenImage = jQuery(this);

		// Create new offscreen image to test
		var theImage = new Image();
		theImage.src = screenImage.attr("src");

		// Get accurate measurements from that.
		var imageWidth = theImage.width;
		var imageHeight = theImage.height;

		if (imageWidth > jQuery('.img_obra').width()){
	  	  jQuery('.img_obra a').swinxyzoom({
	    	mode:'window', 
	    	size: '100%', 
	    	lens: { width: 300, height: 300 }, 
	    	controls : false 
	    	});
		} else {
			jQuery(this).parent('a').attr('href','#');
		};
	});
});