jQuery(document).ready(function($) {
	
	
	//select only images in users' posts, add class to resize the image, 
	//and add class to parent element to center the image 
	$('img').not('.comment').not('.profile').addClass('img-post').parent().addClass('text-center');

	//for mobile devices, set dimensions of images in users' posts such that 
	//they accord with the golden ratio, given w = (a + b) = width of comment textarea
	if( $('.txt-comment').width() < 640){

		var w = $('.txt-comment').width();
		var phi = (1.0 + Math.sqrt(5)) / 2.0;
		var h = Math.ceil(w / phi);
		$('.img-post').css( 'width', w ).css( 'height', h );
	}

	//disable submit-comment button if user is not logged in 
	var auth = parseInt( $("input[name='auth']").val() );

	if( auth === 1 ){

		$('.btn-comment').attr('disabled', null);
	}
	else{

		$('.btn-comment').attr('disabled', 'true');
	}

	console.log(auth);
	console.log(auth === 1);

});