<?php
/**
 * @author arafat.dml@gmail.com
 * get the first element of
 * a array
 * @param multidimensional array
 * @return the first array element as
 * it was the only array element of
 * that array or false
 */
 function get_first(array $data)
 {
 	if(@count($data)){
 		return $data[0];
 	}
 	return false;
 }


function get_order($table_name, $col_name = "display_order") {
	$order = 1;
	$find_order = core_crud()->dbSelectRaw("SELECT * FROM {$table_name} ORDER BY id DESC LIMIT 1;");
	if ($find_order) {
		$order = ((int) $find_order[0]->$col_name) + 1;
	}
	return $order;
}


/**
 *****************************************
 * This function is A hook Function
 * That Hook Additional Data in the
 * Add Or Edit Data Query
 * @param the Data Array That Are Going
 * To Insert The Data or Update
 * @return The Data Array
 * @author arafat.dml@gmail.com
 * @package arafat own php freameWork
 * @written on : 15.04.2020
 *****************************************
 **/

function hooked_in(array $data) {

	# Add Anything You Wanna Hooked ...
	if (has_login()) {
		$data['user_id'] = Auth("id");
	}

	# In the End Return it ..
	return $data;

}



function delete_on_confirm($table_name, $redirect_url, array $batch_table = [], $foreign_key_name = false, $foreign_key_val = false) {
	# Delete Code ...
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "delete") {
			$id = (int) validate($_GET["id"]);

			$res = core_crud()->dbDelete($table_name, "WHERE id='$id'");
			# Here we perform the batch delete work ... yooo Fun haa ?
			if( $batch_table && $foreign_key_name ){

				# Get the Foreign key value
				if($foreign_key_val){
					$foreign_key_val_res = get_first(get_on_condition($table_name, "id='$id'", $foreign_key_val, "id", "ASC", false));
					if($foreign_key_val_res){
						$foreign_key_val = $foreign_key_val_res->{$foreign_key_val};
					}
				}
				// dd($foreign_key_val);
				if(is_array($batch_table)){
					foreach ($batch_table as $key => $associate_table) {
						if($foreign_key_val){
							$res = core_crud()->dbDelete($associate_table, "WHERE {$foreign_key_name}='$foreign_key_val'");
						}else{
							$res = core_crud()->dbDelete($associate_table, "WHERE {$foreign_key_name}='$id'");
						}
					}
				}
			}
			if ($res) {
				default_success_flash("delete");
			} else {
				default_failed_flash("delete");
			}
			redirect($redirect_url);
		}
	}
}



# This will load the Associate table
# @data will take a 2nd deimensional obj
function lazy_loading_associate_table($data, $order_col_name = "display_order") {
	# Coppy the data into Another Var
	# We will Append The Associate Table
	# Data into Here .....
	$main_data = $data;
	// pr($data);

	if (is_object($data) || is_array($data)) {
		if ($data) {
			foreach ($data as $k => $v) {
				foreach ($v as $kk => $vv) {
					if (strpos($kk, "_id") !== false) {
						$table_foreign_key = $kk;
						// $search_id = (int) $vv;
						$search_id =  validate($vv);

						if( !$search_id ){
							continue;
						}

						# Get The table Name ...
						$table_name = foreign_key_table_name($table_foreign_key);


						// check if we have , seperate id in as foreign key
						if (strpos($search_id, ",") !== false) {

							$extra_data = core_crud()->dbSelect($table_name, "*", "WHERE id IN($search_id)", false, false, "ORDER BY '$order_col_name' ASC");
						}else{
						$extra_data = get_first( core_crud()->dbSelect($table_name, "*", "WHERE id=$search_id", false, false, "ORDER BY '$order_col_name' ASC") );
					    }
						if ($extra_data) {
							$main_data[$k]->$table_foreign_key = $extra_data;
						}
					}
				}
			}
		}
	}

	return $main_data;
}

# This is the Lazy Loading Wrapper Function
# That is Implementing the Lazy Loading ..
function lazy_loading_wrapper($view_data, array $remove_form_view = [], $order_col_name = "display_order") {
	$view_data = lazy_loading_associate_table($view_data, $order_col_name);
	$view_data = $view_data[0];
	// dd($view_data);
	# Remove the Data form details Obj..
	if ($remove_form_view) {
		foreach ($remove_form_view as $k => $v) {
			if (property_exists($view_data, $v)) {
				unset($view_data->$v);
			}
		}
	}

	return $view_data;
}

# This Query helper Function Is a Helper Function
# That will help To Show the Details ....
function view_details($table_name, $col_names = "*", array $remove_form_view = [], $order_col_name = "display_order") {
	$view_data = array();
	if (isset($_GET["action"])) {
		if ($_GET["action"] == "view") {
			$id = (int) validate($_GET["id"]);
			// set id seesion for later use ...
			session_set("view_id", $id);
			// end setting id for later use
			global $view_data;
			$view_data = core_crud()->dbSelect($table_name, "$col_names", "WHERE id='$id'");

			if ($view_data) {
				$view_data = lazy_loading_wrapper($view_data, $remove_form_view, $order_col_name);
			} else {
				default_failed_flash(" view Details Not Found");
			}
		}
	}

	return $view_data;
}

# This is a wrapper function that will help
# to Automatic print the details view
# Simply passing the 2 required argument...

function details_view_wrapper($title, $table_name, $col_names = "*", array $remove_form_view = [], $order_col_name = "display_order") {
	$data = view_details($table_name, $col_names, $remove_form_view, $order_col_name);
	details_table_view($title, $data);
}
/**
 * db_insert
 * This is a simple db insert utility function
 * It save the data in the databse table
 * @author arafat.dml@gmail.com
 * @param table_name, data_arr, redirect_url
 * @return redirect or insert id
 *
 */

function db_insert($table_name, array $form_data, $redirect = false)
{
	# Now call the Database Save Function ...
	$res = core_crud()->dbInsert($table_name, $form_data);
	if ($res) {
		default_success_flash();
	} else {
		default_failed_flash();
	}

	if($redirect){
		redirect($redirect);
	}
	# Or return the insert id
	return $res;
}

function db_select_raw( $query ){
	
	$res = core_crud()->dbSelectRaw($query);

	return $res;
}

/**
 * db_update
 * This is a simple db update utility function
 * It update the data in the databse table
 * @author arafat.dml@gmail.com
 * @param table_name, $id, data_arr, redirect_url, $col_name
 * @return redirect or true
 *
 */

function db_update( $table_name, $id, array $form_data, $redirect = false, $col_name = "id" )
{
	$res = core_crud()->dbUpdate($table_name, $form_data, "where $col_name='$id'");
	if ($res) {
		default_success_flash("Update");
	} else {
		default_failed_flash("Update");
	}
	if($redirect){
		redirect($redirect);
	}
	# or return true
	return true;
}



/**
 *
 * db_delete
 * A simple delete helper function
 * @param $table_name, $id
 * @author arafat.dml@gmail.com
 * @package another custom php framework
 */

function db_delete($table_name, $id, $col_name = "id", $redirect = false){
    $res = core_crud()->dbDelete($table_name, "WHERE {$col_name}='$id'");
    $success = false;
    if($res) {
        default_success_flash("delete");
        $success = true;
    } else {
        default_failed_flash("delete");
    }
    if($redirect){
        redirect($redirect);
    }

    return $success;

}


/**
 * Below Are Some Options
 * Table Query Helpers
 * That Help To create Rapid Query
 * In the Options Table ...
 * @author arafat.dml@gmail.com
 * @package own framework
 * @param someArguments
 * @return QueryResult
 */

function option_get_by_group($group_name, $select_col = "*", $asc_col = "display_order") {
	$table_name = "options";

	$res = core_crud()->dbSelect($table_name, $select_col, "WHERE group_name='$group_name'", false, false, "ORDER BY $asc_col ASC");

	return $res;
}

function option_get_by_key($key, $select_col = "*", $asc_col = "display_order") {
	$table_name = "options";

	$res = core_crud()->dbSelect($table_name, $select_col, "WHERE data_key='$key'", false, false, "ORDER BY $asc_col ASC");

	return $res;
}

function option_get_by_group_and_key($group_name, $key, $select_col = "*", $asc_col = "display_order") {
	$table_name = "options";

	$res = core_crud()->dbSelect($table_name, $select_col, "WHERE group_name='$group_name' AND data_key='$key'", false, false, "ORDER BY $asc_col ASC");

	return $res;
}

function get_on_condition($table_name, $conditions, $select_col = "*", $asc_col = "id", $sort = "DESC", $lazy_load = true) {
	$res = core_crud()->dbSelect($table_name, $select_col, "WHERE $conditions", false, false, "ORDER BY $asc_col $sort");
	# Get Lazy Loading Associate Tables
	if ($res && $lazy_load) {
		$res = lazy_loading_associate_table($res);
	}
	return $res;
}

function get_by_table_name($table_name, $select_col = "*", $asc_col = "id", $sort = "DESC", $lazy_load = true) {
	$res = core_crud()->dbSelect($table_name, $select_col, false, false, false, "ORDER BY $asc_col $sort");
	# Get Lazy Loading Associate Tables
	if ($res && $lazy_load) {
		$has_res = lazy_loading_associate_table($res);
		if( $has_res ){
			return $has_res;
		}
	}
	return $res;
}

function get_by_table_name_group_by($table_name, $group_col, $select = "*", $condition = false, $sort = "ASC", $lazy_load = true) {
	
	if($condition){
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name} WHERE {$condition} ORDER BY {$group_col} DESC");
	}else{
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name} ORDER BY {$group_col} DESC");
	}

	# Get Lazy Loading Associate Tables
	if ($res && $lazy_load) {
		$has_res = lazy_loading_associate_table($res);

		if( $has_res ){
			return $has_res;
		}
	}
	return $res;
}

/**
 *
 * get_by_limit_one
 * Get data on where condition or without condition
 * we can set the col, sort_name, select_col.
 * @param $table_name, $condition, $sort, $col_name, $select
 * @return 1 result or false
 * @author arafat.dml@gmail.com
 *
 */
function get_by_limit_one($table_name, $condition = false, $sort = "ASC", $col_name = "id",  $select = "*")
{
	if($condition){
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name} WHERE {$condition} ORDER BY {$col_name} {$sort} LIMIT 1;");
	}else{
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name}  ORDER BY {$col_name} {$sort} LIMIT 1;");
	}

	if($res){
		return $res[0];
	}
	return false;

}

/**
 *
 * get_by_limit
 * Get data on where condition or without condition
 * we can set the col, sort_name, select_col.
 * @param $table_name, $condition, $sort, $col_name, $select
 * @return 1 result or false
 * @author arafat.dml@gmail.com
 *
 */
function get_by_limit($table_name, $limit = 1, $condition = false, $select = "*", $sort = "ASC", $col_name = "id")
{
	if($condition){
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name} WHERE {$condition} ORDER BY {$col_name} {$sort} LIMIT {$limit};");
	}else{
		$res = core_crud()->dbSelectRaw("SELECT {$select} FROM {$table_name}  ORDER BY {$col_name} {$sort} LIMIT {$limit};");
	}

	if($res){
		return $res[0];
	}
	return false;

}

/**
 **********************************************
 * Below Function is a Helper Login Query
 * function to Help the Login On the Fly
 * @param All are Optionals
 * @return on success redirect to Dashboard
 * on fails @return false
 * @author arafat.dml@gmail.com
 * written On : 14.04.2020
 * @package arafat own php framework
 **********************************************
 **/
function query_login($table_name = "users", $name = "email", $password = "password", $hash = "md5") {

	# -------------------------------------------
	# First Check if already login or not
	# If already Login then Redirect dashboard.
	is_login();
	#-------------------------------------------

	if (isset($_POST[$name]) && isset($_POST[$password])) {
		$select_col = "*";
		$name_val = validate($_POST[$name]);
		$password_val = hash($_POST[$password]);

		echo $password_val; die('die');

		$conditions = $name . "='" . $name_val . "' AND " . $password . "='" . $password_val . "'";
		// pr($conditions);
		$res = core_crud()->dbSelect($table_name, $select_col, "WHERE $conditions");
		if ($res) {
			# save the last login data here ...
			db_update("users", $res[0]->id, ["last_login" => get_carbon_date(false)]);
			# re query because we just run a update ...
			$res = core_crud()->dbSelect($table_name, $select_col, "WHERE $conditions");
			#---------------------------------------
			$res = lazy_loading_associate_table($res);
			$res = $res[0];
			# Set the Session data...
			# If it can set The session It will Redirect to Dashboard...
			# Set The Flash...
			set_flush(TRUE, "success", "Congratulations! ", "You are Successfully Logged In");
			set_auth($res);
		}
		# login failed Message ...
		set_flush(TRUE, "danger", "Oops! ", "User Name or Password Is not Valid !");
		return false;
	}
	# oops it is false then...
	return false;
}