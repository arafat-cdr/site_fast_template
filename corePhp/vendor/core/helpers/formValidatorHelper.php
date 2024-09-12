<?php

function validate($data = NULL){
  if(empty($data)){
    return NULL;
  }
  $data = trim($data);
  // replace single quote
  // $data =  str_replace("'", "//'", $data);

  $data = stripslashes($data);
  $data = addslashes($data);
  $data = htmlspecialchars($data);
  // encode html entities
  $data = htmlentities($data);
  
  return $data;
}

 function auto_validate($data) {

	$res = array();

	foreach ($data as $k => $v) {

	  $res[$k] = validate($v);
	}

	return $res;
}

function validate_normal($data){
  $data = trim($data);
  // replace single quote
  $data = addslashes($data);

  return $data;
}

function html_encode( $data ){
  $data = htmlspecialchars($data);
  // encode html entities
  $data = htmlentities($data);

  return $data;
}

function html_decode( $data ){
  $str = utf8_decode($data);
  $data = htmlspecialchars_decode( $data );
  $data = html_entity_decode( $data );

  return $data;
}

function clean($str)
{
    $str = utf8_decode($str);
    $str = str_replace("&nbsp;", "", $str);
    $str = preg_replace('/\s+/', ' ', $str);
    $str = trim($str);
    return $str;
}

function new_clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

