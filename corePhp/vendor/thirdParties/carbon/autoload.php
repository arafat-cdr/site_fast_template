<?php
require(__DIR__."/vendor/autoload.php");

use Carbon\Carbon;

/*=========================================
=            Example by arafat            =
=========================================*/


function wl_add_carbon_dates($num, $date = '03/15/2023', $format = 'm/d/Y'){
    
    $timeZone = APP_TIME_ZONE;
    
    
    $date = Carbon::createFromDate($date, $timeZone);
    
    $date_adds = $date;
    
    if( $num == 1 ){
        $date_adds = $date->addDay();
    }else if( $num > 1 ){
        $date_adds = $date->addDays($num);
    }
    
    
    return $date_adds->format($format);
}

function wl_add_carbon_weeks($num, $date = '2022-03-15', $format = 'm/d/Y'){

	$timeZone = APP_TIME_ZONE;
	$date = Carbon::createFromDate($date, $timeZone);

    $date_adds = $date;
    if( $num == 1 ){
        $date_adds = $date->addWeek();
    }else if( $num > 1 ){
        $date_adds = $date->addWeeks($num);
    }
    
   return $date_adds->format($format);
}

function wl_add_carbon_months($num, $date = '2022-03-15', $format = 'm/d/Y'){

	$timeZone = APP_TIME_ZONE;
	$date = Carbon::createFromDate($date, $timeZone);

    $date_adds = $date;
    if( $num == 1 ){
        $date_adds = $date->addMonth();
    }else if( $num > 1 ){
        $date_adds = $date->addMonths($num);
    }
    
   return $date_adds->format($format);

}

function wl_add_carbon_years($num, $date = '2022-03-15', $format = 'm/d/Y'){

	$timeZone = APP_TIME_ZONE;
	$date = Carbon::createFromDate($date, $timeZone);

    $date_adds = $date;
    if( $num == 1 ){
        $date_adds = $date->addYear();
    }else if( $num > 1 ){
        $date_adds = $date->addYears($num);
    }
    
   return $date_adds->format($format);
    
}


/**
 * Get the Current Date and Time using carbon
 * get_carbon_date
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function get_carbon_date($echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = Carbon::now($timeZone);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

function add_hour_to_current_date_time($hours, $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = Carbon::now($timeZone);

    // add the Hours..
    $carbon = $carbon->addHour($hours);

    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get the Current Date
 * get_carbon_date
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function get_carbon_date_only($echo = true, $format = "m/d/Y", $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = Carbon::now($timeZone)->format($format);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get the Current Date and Time in a formate using carbon
 * if you need to pass a format pass it
 * format -->  Monday, May 18, 2020 10:54 AM
 * get_carbon_date
 * @param $format, $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */

function get_carbon_date_format($format = "LLLL", $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $carbon = Carbon::now($timeZone)->isoFormat($format);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * Get A Date and Time in a formate using carbon
 * if you need to pass a format pass it
 * format -->  Monday, May 18, 2020 10:54 AM
 * get_carbon_date
 * @param $date, $format, $timeZone, $echo
 * @return $date based on time Zone and Format
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */

function get_carbon_on_date_format($date, $format = "LLLL", $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $carbon = Carbon::createFromDate($date, $timeZone)->isoFormat($format);
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */

function get_carbon_on_date_diff_human($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $carbon = $datetime->diffForHumans();
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}


function wl_carbon_date_diff_from_today($check_date){
    
    $today = date("m/d/Y");
    
    $startDate = Carbon::parse($check_date);
    $endDate = Carbon::parse($today);
    $diffInDays = $endDate->diffInDays($startDate, false);
    
    return $diffInDays;
    
}

/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_day($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    
    // pr($datetime);

   $extra = "- ";
    if(get_carbon_date(false) < $datetime){
        $extra = "";
    }

    $carbon = $extra.$datetime->diffInDays();
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_hour($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " hours ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " hours remain ";
    }
    $carbon = $datetime->diffInHours().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_real_hour($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " hours ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " hours remain ";
    }
    $carbon = $datetime->diffInRealHours().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_minute($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " minutes ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " minutes remain ";
    }
    $carbon = $datetime->diffInMinutes().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}
/**
 *
 * @author arafat.dml@gmail.com
 * @package personal framework
 *
 */
function get_carbon_on_date_diff_second($date, $echo = true, $timeZone = false)
{
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    $datetime = Carbon::createFromDate($date, $timeZone);
    $extra = " seconds ago ";
    if(get_carbon_date(false) < $datetime){
        $extra = " seconds remain ";
    }
    $carbon = $datetime->diffInSeconds().$extra;
    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

/**
 * add Date to Current Date
 * carbon_add_date_only
 * @param $timeZone, $echo
 * @return current time based on time Zone
 * @package arafat framework
 * @author arafat.dml@gmail.com
 */


function carbon_add_date_only($num_date_to_add, $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = new Carbon();
    // Now add the days we want
    $carbon->addDays($num_date_to_add);
    $carbon = $carbon->format("Y-m-d");

    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}

function carbon_subtract_date_only($num_date_to_add, $echo = true, $timeZone = false){
    # if timeZone not passed then set the default one
    if(!$timeZone){
        $timeZone = APP_TIME_ZONE;
    }
    // pr($timeZone);
    $carbon = new Carbon();
    // Now add the days we want
    $carbon->subDays($num_date_to_add);
    $carbon = $carbon->format("Y-m-d");

    if($echo){
        echo $carbon;
    }else{
       return $carbon;
    }
}



/*printf("Carbon Now: %s", Carbon::now()->isoFormat('LLLL'));
echo "<br/>";
printf("%s",  Carbon::createFromDate("2020-05-18 10:33:24", 'Asia/Dhaka')->isoFormat('LLLL'));
echo "<br/>";
//printf("Carbon Now: %s", Carbon::now());
echo "<br/>";
$datetime = Carbon::createFromDate("2020-04-18 10:33:24", 'Asia/Dhaka');
printf("%s", $datetime->diffForHumans());
echo "<br/>";
printf("%s days ago", $datetime->diffInDays());

die();*/

/*=====  End of Example by arafat  ======*/

