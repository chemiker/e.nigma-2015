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

		handle_submenus();
	} );

	function handle_submenus() {
		$("#menu-navigation>li").each( function () {
			$(this).on( 'mouseenter', function () {
				if ( $(this).children('ul.sub-menu').length > 0 )
					$(this).addClass('active-mouse-hover');
			} );
			$(this).on( 'mouseleave', function () {
				$(this).removeClass('active-mouse-hover');
			} );
		} );

		$("#menu-navigation li").each( function () {
			$(this).on( 'mouseenter', function () {
				$(this).children('ul.sub-menu').show();
			} );
			$(this).on( 'mouseleave', function () {				
				$(this).children('ul.sub-menu').hide();
			} );
		} );
	}
}(jQuery));