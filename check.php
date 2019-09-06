<?php require('inc/connect.php'); ?>
<?php require('inc/function.php'); ?>

<?php

date_default_timezone_set('Asia/Dhaka');

$ip_list = get_ip_lists();


$sql = "SELECT id, name, mac_add, user_id FROM devices";

$result = $conn->query($sql);

while ($row  = $result->fetch_assoc()) {
    $id      = $row['id'];
    $mac_add = $row['mac_add'];
    $user_id = $row['user_id'];


    $date    = date("Y-m-d", time());
    $time    = date("Y-m-d H:i:s", time());

	$ip      = array_search($mac_add, $ip_list);

       

	if(is_device_online($ip)){
		$conn->query("UPDATE devices SET last_seen = '$time' WHERE id = '$id'");


		$result2 = $conn->query("SELECT date FROM attendance WHERE user_id = '$user_id' AND date = '$date' LIMIT 0,1");

		if ($result2->num_rows == 0) {
			$conn->query("INSERT INTO attendance (user_id, date, in_time, out_time) VALUES('$user_id', '$date', '$time', '$time')");
		}
		else{

			$conn->query("UPDATE attendance SET out_time = '$time' WHERE user_id = '$user_id' AND date = '$date'");
		}

		
	}
	else echo $row['name'] . ':Offline <br/>';

}
