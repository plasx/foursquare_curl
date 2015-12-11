<?php 

include 'sql.php';


function get_code(){ echo "<a href='https://foursquare.com/oauth2/authorize?response_type=".response_type."&client_id=".client_id."&redirect_uri=".redirect_uri."'><h1>LOGIN</h1></a>"; }

function connect($url, $body = null){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		));
		if(isset($body)){
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        }

	$result = curl_exec($curl);
	$results = json_decode($result, true);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	curl_close($curl);
	return array($results, $status);
}

function access_token($code){
	$url = "https://foursquare.com/oauth2/access_token?";
	$body = http_build_query(array('client_id' => client_id, 'client_secret' => client_secret, 'grant_type' => 'authorization_code', 'redirect_uri' => redirect_uri, 'code' => $code, 'v' => '20151209'));
	return connect($url,$body);
}

function get_checkins($token){

	$url = "https://api.foursquare.com/v2/users/self/checkins?oauth_token=". $token . "&v=20151210&limit=1&sort=newestfirst";
	return connect($url);
}


$last_checkin = get_checkins(sql_connect($connection));

if(($last_checkin[1]) == 200){
	echo "<h4 class='text-center'>" . $last_checkin[0]['response']['checkins']['items'][0]['venue']['name']. "</h4>";
	echo "<p class='text-center'>" . $last_checkin[0]['response']['checkins']['items'][0]['venue']['location']['formattedAddress'][0]. "</p>";
	echo "<p class='text-center'>" . $last_checkin[0]['response']['checkins']['items'][0]['venue']['location']['formattedAddress'][1]. "</p>";
}

?>