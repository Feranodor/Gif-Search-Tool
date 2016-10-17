<?php
	session_start();

	$_SESSION['movement'] = $_SESSION['movement'] + $_POST['movement'];

	$keys = str_replace(' ', '+', $_SESSION['keysreturn']);	
	
	$url = "http://api.giphy.com/v1/gifs/search?q=".$keys."&api_key=dc6zaTOxFJmzC&offset=".$_SESSION['movement'];
	$content = @file_get_contents($url);
	if ($content === FALSE)
	{
		$_SESSION['connectGiphyErrorBoolean'] = true;
	}
	else
	{
		$json = json_decode($content);
		$_SESSION['numberOfResults'] = $json->pagination->count;
		$_SESSION['totalCount'] = $json->pagination->total_count;
	
		for( $x = 0; $x < $_SESSION['numberOfResults']; $x++ ) {
		$_SESSION['gifid'.$x] = $json->data[$x]->id;
		$_SESSION['gifurl'.$x] = $json->data[$x]->images->fixed_height->mp4;
		}
		
		$_SESSION['connectGiphyErrorBoolean'] = false;
	}
	
	header("Location: logicsql.php");
	exit();
	
?>