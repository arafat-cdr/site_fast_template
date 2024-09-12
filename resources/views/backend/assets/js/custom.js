$(document).ready(function(){

	/***************************************************
	|| This Will add the nav-active Class
	|| On the Parent of Module Name li class
	|| And the a parent li class
	|| This All is Based on the Current url
	|| It Match the website current url with menu href url
	|| In the Menu, if match it will add the class
	|| .nav-link is the href url class
	|| it is adding the 1st and 3rd parent
	|| all parent are in --> li tag
	|| ***************************************************
	*/

	// alert( window.location.href );

	$('.nav-link').filter(function(){
	    return window.location.href === $(this).attr('href');
	}).addClass("active")  // Add 'active' class to the matching 'a' tag
	.each(function() {
	    // Add 'active' class to the parent 'li' and its ancestor 'a' tags
	    $(this).parents('li').addClass("menu-is-opening menu-open active");
	    $(this).parents('ul').prev('a').addClass("active");
	});

	// Summernote
/*	$('.summernote').summernote({
	  
	});*/


	$('.summernote').summernote({
	    toolbar: [
	      // Keep the default toolbar buttons
	      ['style', ['style']],
	      ['font', ['bold', 'underline', 'clear']],
	      ['fontname', ['fontname']],
	      ['color', ['color']],
	      ['para', ['ul', 'ol', 'paragraph']],
	      ['table', ['table']],
	      ['insert', ['link', 'picture', 'video']],
	      ['view', ['fullscreen', 'codeview', 'help']],

	      // Add new buttons: Font Size, Superscript, Subscript, Italic, Line Height
	      ['fontsize', ['fontsize']],
	      ['script', ['superscript', 'subscript']],
	      ['fontstyle', ['italic']],
	      ['height', ['height']],
	      ['lineHeights', ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '3.0']], // Line Height option
	    ],
	    fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '24', '36', '48', '64', '82', '150'],
	    height: 300,
	    lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
	  });

	$( ".datepicker" ).datepicker({
	      changeMonth: true,
	      changeYear: true,
	      dateFormat: 'MM d, yy',
	});


	$('.select_2_cls').select2();
	$('.select_2_multiple_cls').select2({
		multiple: true,
	});

	$('.select_2_multiple_cls_tags').select2({
		multiple: true,
		tags: true,
	});


	$("input[data-bootstrap-switch]").each(function(){
	  $(this).bootstrapSwitch('state', $(this).prop('checked'));
	})


	$(".seo_switch").on('change',  function(){
		console.log($(this).is(':checked'));
	});


});