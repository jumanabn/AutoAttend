<?php

date_default_timezone_set('Asia/Dhaka');

$client_list_file = 'clients.txt';
//open file to get existing content

if (!file_exists($client_list_file)) {
	$client_list = "Name	mac";
	file_put_contents($client_list_file, $client_list);
	
}

$client_list = file_get_contents($client_list_file);//append a new person to the file
$client_list = explode("\n", $client_list);

$client_list_heading = explode("	", $client_list[0]);

unset($client_list[0]); //name Ip will be invisible

$clients = array();

foreach ($client_list as $client) {
	$client = explode("	", $client);

	$name = $client[0];
	$mac = preg_replace('/\s*/m', '', $client[1]);

	$clients[$name] = $mac;
}


//get The Ip Addresses

ob_start(); //proccesss start This function will turn output buffering on
	   system('arp -a '); // system is like cmd commad 
	   $cmd_result = ob_get_contents();
ob_clean();

$ip_list = explode("\n", $cmd_result);//create array for each 


 

unset($ip_list[0], $ip_list[1], $ip_list[2]); // remove unnecessay values


//process each entry

foreach ($ip_list as $value) {

     //remove extra blank spaces
	$value= explode(" " ,preg_replace('/\s+/', ' ', trim($value)));

//check if the exploded entry has a mac address
 if (isset($value[1]))
 {
 	$ip= $value[0];
 	$mac = strtoupper($value[1]);

 	$ip_list_new[$ip]=$mac;
 	
}
    
}
// var_dump($ip_list_new);
// die();


var_dump($clients);

foreach ($clients as $name => $mac){

   	$ip = array_search($mac, $ip_list_new);

	ob_start(); //proccesss start This function will turn output buffering on
	   system('ping -n 1 '.$ip); // system is like cmd commad 
	   $cmd_result = ob_get_contents();
 	ob_clean();

	if (strpos($cmd_result, 'Received = 1') != False) {
		$clients[$name] = 'Online';
	}
	else{
		$clients[$name] = 'Offline';
	 
	}

}
	


var_dump($clients);





?>
