<?php
	$journal_name_arr =  explode('/', $_SERVER['PATH_INFO']);


	// pr( $_SERVER['PATH_INFO'] );

	// pr($journal_name_arr);
	$route_slug = '';
	if( isset( $journal_name_arr[1] ) ){
	   $route_slug = validate($journal_name_arr[1]); 
	}

	// pr($route_slug);
	# Fixing DOI issue where url look like 
	# https://www.universepg.com/journal-details/ajpab/some-article
	if( $route_slug == 'journal-details' ){

			$new_url = APP_URL.$journal_name_arr[2].'/'.$journal_name_arr[3];

			header("HTTP/1.1 301 Moved Permanently");
			header("Location:".$new_url);
			exit();
	}

	# fixing Very First DOI issue 
	# Url will look like this: https://www.universepg.com/290/
	if( is_numeric( $route_slug ) ){

		$route_slug = (int) $route_slug;

		$article = get_first( get_on_condition( 'journal_latest_articles', "id='$route_slug'" ) );

		// pr($article);

		if( $article ){
			$new_url = APP_URL.'journal-details/'.$article->permalink;
			header("HTTP/1.1 301 Moved Permanently");
			header("Location:".$new_url);
			exit();
		}
	}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404  Page Not Found</title>
</head>
<body>
	<h3 style="text-align: center; color: red;">
		404 Page Not Found !
	</h3>
</body>
</html>