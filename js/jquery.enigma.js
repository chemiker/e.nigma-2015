(function($) {
	$( document ).ready( function() {
		$('#navigationwrapper').scrollUpMenu({'transitionTime': 100});

		popovers = ['search', 'tag', 'category'];
		$(popovers).each( function (index, slug) {
			register_popover(slug);
		} );

		$('.popover-link').on('click', function (e) {
			e.preventDefault();
			$(this).focus(); // For mobile devives
			$('.popover-link').not(this).popover('hide');
		});

		$("#hamburger").on( 'focusin click', function() {
			$(this).hide();
			$("#topnavigation").show();
		} );

		$(window).on( "resize", function() {
			$(".format-image").css( 'min-height', 0.45 * $(this).width() + "px" );
		} );

		$(".format-image").css( 'min-height', 0.45 * $( window ).width() + "px" );

		handle_submenus();
	} );

	function register_popover(slug) {
		$('#' + slug + '_link').popover({
			html: true,
			placement: 'bottom',
			trigger: 'focus',
			title: $('#' + slug + '-popover > .popover-header').html(),
			content: function () {
				return $('#' + slug + '-popover > .popover-content').html();
			}
		});
	};

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