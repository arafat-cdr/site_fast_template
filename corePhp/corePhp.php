<?php
/*
**************************************************
** Autoload Order
** 1) Autoload the Config files
** 2) Autoload the Helpers
** 3) Autoload the ThirdParties files
** 4) Autoload the cores
** 5) Autoload the Plugins
** 6) Autoload the Routes
****************************************************
*/

// Session start 
session_start();

# All Path Constant
$config = "/config";
$third_parties = "/vendor/thirdParties";
$core = "/vendor/core";
$database = __DIR__."/../database";
$route = __DIR__."/../route";
$resources = __DIR__."/../resources";
$views = $resources."/views";

define("APP_PATH", __DIR__);
define("APP_INSTALL_PATH", str_replace( '/corePhp', '', APP_PATH ));
define("PUBLIC_PATH", APP_INSTALL_PATH.'/public');
define("ROOT_APP_PATH", str_replace("corePhp", "", APP_PATH));
define("CONFIG_PATH", APP_PATH.$config);
define("THIRD_PARTIES_PATH", APP_PATH.$third_parties);
define("CORE_PATH", APP_PATH.$core);
define("DATABASE_PATH", $database);
define("VIEW_PATH", $views);
define("ROUTE_PATH", $route);

function app_on(){
    $root = $_SERVER['DOCUMENT_ROOT'];
    $filePath = dirname(__FILE__);
    if ($root == $filePath) {
        return; // installed in the root
    } else {
        $subfolder = str_replace($root."/", "", $filePath);
        return $subfolder;  // installed in a subfolder or subdomain
    }
}

# Additional Support to my App
# if we visit our app using
# base_url/index.php in this case
# $_SERVER['PATH_INFO'] is giving error
# So set it a value

if(!isset($_SERVER['PATH_INFO'])){
    # for initial it is the root
    # We make think it as index.php

    $_SERVER['PATH_INFO'] = "/";
}

function route_url( $return_as_array = false ){

    $route_url = $_SERVER['PATH_INFO'];

    # Because we will handle / or index.php in
    # Route so we need to Check it /
    if( strlen($_SERVER['PATH_INFO']) > 1 ) {
        $route_url = trim($_SERVER['PATH_INFO'], "/");
    }

    if($return_as_array){
        return explode("/", $route_url);
    }
    return $route_url;
}

function route_url_last(){
    return basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}


function p($data){
    echo "<pre style='background: black; color:green; font-size: 25px;'>";
    print_r($data);
    echo "</pre>";
}

function lp($auto_loading_files){
    foreach ($auto_loading_files as $require_file) {
        require($require_file);
        // For Debug purpose ..
        // p($require_file);
    }
}

# dynamic loading the config files
$res = glob(CONFIG_PATH."/*.php");
lp($res);

# Dynamic loading the helpers
$res = glob(CORE_PATH."/helpers/*.php");
lp($res);

# Dynamic loading the third parities autoload.php
$res = glob(THIRD_PARTIES_PATH."/*/autoload.php");
lp($res);

# Dynamic loading core Mail files
$res = glob(CORE_PATH."/mail/*.php");
lp($res);

# Dynamic loading core dbConnectors files
$res = glob(CORE_PATH."/dbConnectors/*.php");
lp($res);

# Dynamic loading core crud files
$res = glob(CORE_PATH."/crud/*.php");
lp($res);

# Dynamic Loading CoreMigrations Files..
$res = glob(CORE_PATH."/databaseMigration/*.php");;
lp($res);

# Dynamic Loading Migrations Files..
$res = glob(DATABASE_PATH."/*.php");
lp($res);

# Dynamic loading core ViewSupport Files files
$res = glob(CORE_PATH."/views/*.php");
lp($res);

# Dynamic loading core Route files It Support the Route Features
$res = glob(CORE_PATH."/route/*/*.php");
lp($res);

# Dynamic loading core Route files For Running the Route
$res = glob(CORE_PATH."/route/*.php");
lp($res);

# Dynamic loading the route files
$res = glob(ROUTE_PATH."/*.php");
lp($res);

$res = glob( __DIR__.'/modules/*.php' );
lp($res);


define("CONFIG_URL", APP_URL.$config);
define("THIRD_PARTIES_URL", APP_URL.$third_parties);
define("CORE_URL", APP_URL.$core);
define("DATABASE_URL", APP_URL.$database);



/**
 *
 * if the code already has a php mailer 
 * Then if I include this , this will thorw error
 * to solve this issue we will check a condition
 * and Include it
 *
 */




# ------------------------------------------------------
# add by web_lover on 07/Mar/2023
#-------------------------------------------------------

function calculate_frequency_with_start_date($date, $frequency, $print = false){
    
    $res = '';

    if( $frequency == "Daily" ){
    	$res = wl_add_carbon_dates( 1, $date );
    }else if( $frequency == "Weekly" ){
    	$res = wl_add_carbon_weeks( 1, $date );
    }else if( $frequency == "Monthly" ){
    	$res = wl_add_carbon_months( 1, $date );
    }else if( $frequency == "Quarterly" ){
    	$res = wl_add_carbon_months( 3, $date );
    }else if( $frequency == "Biannually" ){
    	$res = wl_add_carbon_months( 6, $date );
    }else if( $frequency == "Annually" ){
    	$res = wl_add_carbon_years( 1, $date );
    }else if( $frequency == "Every Other Year" ){
    	$res = wl_add_carbon_years( 2, $date );
    }else if( $frequency == "Every Third Year" ){
    	$res = wl_add_carbon_years( 3, $date );
    }else if( $frequency == "Every Fourth Year" ){
    	$res = wl_add_carbon_years( 4, $date );
    }else if( $frequency == "Every Fifth Year" ){
    	$res = wl_add_carbon_years( 5, $date );
    }
    
    
    if( $print ){
        echo $res;
    }else{
 
        return $res;          
    }

}

#-------------------------------------------------------
# end add by web_lover
#-------------------------------------------------------
