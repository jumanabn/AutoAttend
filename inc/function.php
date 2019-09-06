<?php

function get_user($email){
	global $conn;

	$sql = "SELECT id, name, email, role FROM users where email = '$email' LIMIT 0,1";
	$result = $conn->query($sql);
    
    if ($result) {
    	return $result->fetch_object();
    }
	else return false;
	
}
function get_user_by_id($id){
	global $conn;

	$sql = "SELECT id, name, email, role FROM users where id = '$id' LIMIT 0,1";
	$result = $conn->query($sql);
    
    if ($result) {
    	return $result->fetch_object();
    }
	else return false;
	
}

function current_user(){
	$email = $_COOKIE["user_name"];
	return get_user($email);
}


function is_admin($user_id = null){

	if(!$user_id)
		$user_id = current_user()->id;

    $user = get_user_by_id($user_id);
	
	if ($user->role == 'admin') 
		return true;
		else return false;	
}

function admin_only(){
	if(!is_admin()){
		header('Location: http://localhost/dashboard/');
	}
}

function get_ip_lists(){

		ob_start(); 
		   system('arp -a ');  
		   $cmd_result = ob_get_contents();
	ob_clean();
	 $ip_list = explode("\n", $cmd_result);//create array for each entry

	unset($ip_list[0], $ip_list[1], $ip_list[2]); // remove unnecessay values

	//process each entry
	$ip_list_new = array();
	
    foreach ($ip_list as $value) {

	     //remove extra blank spaces & explode by single space
		$value= explode(" " ,preg_replace('/\s+/', ' ', trim($value)));

	//check if the exploded entry has a mac address
	 if (isset($value[1]))
	 {
	 	$ip= $value[0];
	 	$mac = strtoupper($value[1]); //Uppercase all mac addresses

	 	$ip_list_new[$ip]=$mac;
	 	
		}
	    
	}
	return $ip_list_new;
	}


 function is_device_online($ip){
 	ob_start(); 
		   system('ping -n 1 '.$ip);  
		   $cmd_result = ob_get_contents();
          ob_clean();
if (strpos($cmd_result, 'Received = 1') != False) {
		return true;

	}
	else{
		
	 return false;
	}	
 }