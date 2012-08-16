$(document).ready(function() {	
	$('.row-fluid').fadeIn('slow');
});

$.fn.toggleAlert = function(){
		var css_value = $(this).css('display');
		switch(css_value){
			case 'none':
				$(this).css('display', 'block');
			break;
			case 'block':
				$(this).css('display', 'none');
			break;
		}
	}