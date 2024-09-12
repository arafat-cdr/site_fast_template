<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page_title; ?></title>

	<?php

		if( isset( $site_verify ) ){
			echo $site_verify;
		}

		echo "\n <!-- -------------------------------- -->\n";

		if( $seo_data ){
			echo $seo_data;
		}

		if( $canonical ){
			echo "\n".'<link rel="canonical" href="'.$canonical.'">';
		}

	?>

	<?php include_once( __DIR__.'/load_css.php' ); ?>

</head>
<body class="d-flex flex-column vh-100 mt-auto">
	<?php include_once( __DIR__.'/nav_menu.php' ); ?>
	<div class="main_content shadow-lg p-3 mb-5 bg-body rounded top_30">