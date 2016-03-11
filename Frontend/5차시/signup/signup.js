$(document).ready(on_page_ready());

function on_page_ready() {
	calc_margin_top();

	$(window).resize(function() {
		calc_margin_top();
	});
}

function calc_margin_top() {
	var none_header_height = $(window).height() - $('header').height();

	if($(window).height() >= 460) {
		$('header').css('width', '100%');
		$('header').css('height', '100px');
		$('article').css('margin-top', none_header_height/2 - $('article').height()/2);
	} else {
		$('header').css('width', '0');
		$('header').css('height', '0');
		$('article').css('margin-top', $(window).height()/2 - $('article').height()/2);
	}
}