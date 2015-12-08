<?php
include 'config.php';
include 'sql.php';

// - - -= FOURSQUARE CREDENTIALS =- - -

    define("client_id",'XXXXXXX'); // OAuth 2.0 Client ID. 
    define("client_secret",'XXXXXXX'); // Client (Consumer) Secret
    define("response_type",'code'); // No need to change for this application
    define("redirect_uri", 'http://www.yourwebsite.com/'); // Callback URL

// - - -= MYSQL CREDENTIALS =- - - 

    define("servername",'localhost');
    define("username",'XXXXXXX');
    define("password",'XXXXXXX');
    define("dbname",'XXXXXXX');

?>