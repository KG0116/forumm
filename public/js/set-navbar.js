jQuery(document).ready(function($) {
	var current_uri = $("[name='currentUri']").val();
	if(current_uri != '/'){
		
		$("body").addClass('main_body');
		$("navbar").addClass('main_navbar');
	}
});