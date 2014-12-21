(function($) {
	$( document ).ready( function() {
		$('#navigationwrapper').scrollUpMenu({'transitionTime': 100});

		$('#search_link').popover({
			header: '#search-popover > .popover-header',
			content: '#search-popover > .popover-content'
		});

		$('#tag_link').popover({
			header: '#tag-popover > .popover-header',
			content: '#tag-popover > .popover-content'
		});

		$('#category_link').popover({
			header: '#category-popover > .popover-header',
			content: '#category-popover > .popover-content'
		});

		$("#hamburger").on( 'click', function() {
			$(this).hide();
			$("#topnavigation").show();			
		} );

		$( window ).on( "resize", function() {
			$(".format-image").css( 'min-height', 0.45 * $(this).width() + "px" );
		} );

		$(".format-image").css( 'min-height', 0.45 * $( window ).width() + "px" );
	} );
}(jQuery));