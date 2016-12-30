$(document).ready(function() {
	$('select').material_select();
	$(".dropdown-button").dropdown();

	$('.link_ajax').click(function(e) {
		e.preventDefault();

		var link = $(this).attr('href');
		console.log(link);
		$.ajax({
			url: link,
		})
		.done(function() {
			var cart_q = parseInt( $('.nbr_cart_q').text() );
			$('.nbr_cart_q').text( cart_q + 1 );
		})
		.fail(function(data) {
			console.log(data);
		});
		
	});
});
