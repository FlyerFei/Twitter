<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
    </head>
    <body>
		<?php
			require_once("twitteroauth/twitteroauth.php");
			$consumer_key = 'Tt2P4YWRw8gj5xwnk5LSBQ';  
			$consumer_secret = '7ggiXDpW2xPu6Bex7GDwseXx1GsFxcBllYIEJeJ1Mo';
			$access_token = '126808058-1Uw4ip7h49M4CBOnnFICjGvujmDrr9Ic0WZIhriu';
			$access_token_secret = 'gPO9JpS6kZHyjB3u90djwY9Fm78tMr3IthXmINrKR5A';
			$nb_of_tweets = 1;
			$include_rts = false;

            $tweet_content = 'Hello PennApps!!';
			
			$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
                  
            $post_tweet = $connection->post('statuses/update', array('status' => $tweet_content, 'lat' => 39.93501, 'long' => -75.16846));

			$tweets = $connection->get('statuses/user_timeline', array('count' => $nb_of_tweets, 'include_rts' => $include_rts)); 
            ?>
    <ul>
        <?php  foreach ($tweets as $key => $tweet): ?>
            <li><?php
 
                //links
        //$tweet = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a target='_blank' href=\"\\0\">\\0</a>",  $tweet->text); 
        $tweet = preg_replace("/[[:alpha:]]+:\/\/[^<>[:space:]]+[[:alnum:]\/]/","<a target='_blank' href=\"\\0\">\\0</a>",  $tweet->text); 
		//#
        $tweet = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a target="_blank" href="https://twitter.com/search?q=%23\2&src=hash">#\2</a>', $tweet);
        //@
        $tweet = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a target="_blank" href="http://twitter.com/$1" target="_blank">@$1</a>', $tweet );
                 
                echo $tweet;
 
            ?></li>
        <?php endforeach ?>
    </ul>
			

		
    </body>
</html>