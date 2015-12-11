<?php 

include 'index.php';

if($last_checkin[1] == 401){
	get_code();
}

if($_GET['code']){
	$token = access_token($_GET['code']);
	$last_checkin = get_checkins($token[0]['access_token']);
	sql_connect($connection,$token[0]['access_token']);
	echo "<p class='text-center'>" . $last_checkin[0]['response']['checkins']['items'][0]['venue']['location']['formattedAddress'][0]. "</p>";

}
 ?>