<?php
$base_url = APP_URL;
// echo $base_url;
function redirect($url = NULL) {

	global $base_url;
	
	$url_to_redirect = '';

		if($url == "self") {
			$url_to_redirect = $_SERVER['REQUEST_URI'];

		}else {
			$url_to_redirect = $url;
		}
		
	
	echo "<script>window.location.href='".$url_to_redirect."'</script>";
	
}
