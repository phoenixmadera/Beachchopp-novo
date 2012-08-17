$(document).ready(function () {
	$.fn.select = function(val){
		$('option', this).filter(function() {
			return $(this).val() == val; 
		}).attr('selected', true);
	}
});