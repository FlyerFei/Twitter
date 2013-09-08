<?php
    $tweet_message = htmlspecialchars($_POST['tweet']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $longitude = htmlspecialchars($_POST['longitude']);
    require_once("twitteroauth/twitteroauth.php");
	$consumer_key = 'Tt2P4YWRw8gj5xwnk5LSBQ';  
	$consumer_secret = '7ggiXDpW2xPu6Bex7GDwseXx1GsFxcBllYIEJeJ1Mo';
	$access_token = '126808058-1Uw4ip7h49M4CBOnnFICjGvujmDrr9Ic0WZIhriu';
	$access_token_secret = 'gPO9JpS6kZHyjB3u90djwY9Fm78tMr3IthXmINrKR5A';
	$nb_of_tweets = 1;
	$include_rts = false;

	
	$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
          
    if (strcmp($latitude, '') != 0 && strcmp($longitude, '') != 0 ) {
        $post_tweet = $connection->post('statuses/update', array('status' => $tweet_message, 'lat' => $latitude, 'long' => $longitude));
    }
    else {
        $post_tweet = $connection->post('statuses/update', array('status' => $tweet_message));
    }

?>
