<?php

/**
 * This is a
 * helper function
 * @param None
 * @return none
 **/


/**
 ******************************************
 * We write it as a function because
 * if we wanna hook any condition or
 * logic we wanna do it Here
 * @param None
 * @return login page
 *****************************************
 */
function login_form() {
	// retrun to index page
	redirect(LOGIN_FORM);
}
/**
 ******************************************
 * We write it as a function because
 * if we wanna hook any condition or
 * logic we wanna do it Here
 * @param None
 * @return dashboard Page
 *****************************************
 */
function login_success_redirect() {
	redirect(DASHBOARD_URL);
}

function set_auth($data) {
	$_SESSION['Auth'] = $data;
	# check if the login success ...
	is_login();
}

function get_auth() {
	if (isset($_SESSION['Auth'])) {
		return $_SESSION['Auth'];
	}
	return false;
}

function is_logout() {

	if (empty($_SESSION['Auth'])) {
		redirect(APP_URL);
	}
}

function is_login() {

	if (!empty($_SESSION['Auth'])) {
		header("location:" . login_success_redirect());
		exit();
	}

}

/**
* has_login
* this function return true or false
* based on user  login or not 
* */
function has_login() {
	if (!empty($_SESSION['Auth'])) {
		return true;
	}
	return false;
}

function logout() {
	// we need to do a update operation
	$id = Auth("id");
	db_update("users", $id, ["is_online" => 0]);
	# Then..
	unset($_SESSION['Auth']);
	//check if logout or not
	is_logout();
}

# This Function Will logout Not allowed Role user
function not_allowed_to_dashboard($role) {
	if ($role == Auth('user_type')) {
		unset($_SESSION['Auth']);

		set_flush(TRUE, "danger", "Sorry! ", "Access to this page is restricted.");
		is_login();
	}
}

function Auth($field) {
	if (empty($_SESSION['Auth'])) {
		return false;
	}

	if (isset($_SESSION['Auth']->$field)) {
		return $_SESSION['Auth']->$field;
	}
	return false;
}
function refresh_auth($data) {
	$_SESSION['Auth'] = $data;
}