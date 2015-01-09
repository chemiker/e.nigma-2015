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

		$("#hamburger").on( 'focusin click', function() {
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
		$(".menu>li, div.menu>ul>li").each( function () {
			$(this).on( 'focusin mouseenter', function () {
				if ( $(this).children('ul.sub-menu, ul.children').length > 0 ) {
					$(this).addClass('active-mouse-hover');
				}
			} );
			$(this).on( 'focusout mouseleave', function () {
				$(this).removeClass('active-mouse-hover');
			} );
		} );

		$(".menu li, .page_item li").each( function () {
			$(this).on( 'focusin mouseenter', function () {
				$(this).children('ul.sub-menu, ul.children').show();
				$(this).find("ul li").first().focus();
			} );
			$(this).on( 'focusout mouseleave', function () {				
				$(this).children('ul.sub-menu, ul.children').hide();
			} );
		} );
	}
}(jQuery));