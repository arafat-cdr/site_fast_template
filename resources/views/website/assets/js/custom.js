$(document).ready(function(){

	$.cookieCuttr({
		cookieDeclineButton: true,
		cookieAnalyticsMessage: "This site uses cookies for learning about our traffic, we store no personal details."
	});

	$( "#validateinit" ).validate( {
		rules: {

			name: {
				required: true,
				minlength: 2
			},
			
			email: {
				required: true,
				email: true
			},
			agree:"required",
			contact_number:"required",
			country:"required",
			article_type:"required",
			message:"required",
			file:"required",
			journal_name: "required",

		},
		messages: {
			name: "Please enter your firstname",
			lastname1: "Please enter your lastname",
			name: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "text-danger" );

			// Add `has-feedback` class to the parent div.form-group
			// in order to add icons to inputs
			element.parents( ".col-sm-5" ).addClass( "has-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}

			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !element.next( "span" )[ 0 ] ) {
				//$( "<span class='form-control-feedback text-danger' style='color:red;'><i class='fas fa-exclamation-circle'></i></span>" ).insertAfter( element );
			}
		},
		success: function ( label, element ) {
			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !$( element ).next( "span" )[ 0 ] ) {
				//$( "<span class='fas fa-exclamation-circle form-control-feedback'></span>" ).insertAfter( $( element ) );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
			//$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
		},
		unhighlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
			//$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
		}
		
	});
});