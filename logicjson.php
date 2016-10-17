<?php
	session_start();
	$keys = $_POST['keys'];
	$keys = preg_replace("/[^a-zA-Z0-9ąćęłńóśźż\s]/", "", $keys);
	$keys = trim($keys);
	while (strpos($keys, '  ') !== false) {
		$keys = str_replace('  ', ' ', $keys);
	}
	$_SESSION['keysreturn'] = $keys;
	$keys = str_replace(' ', '+', $keys);
	
	$_SESSION['movement']= 0;
	
	$url = "http://api.giphy.com/v1/gifs/search?q=".$keys."&api_key=dc6zaTOxFJmzC&offset=0";
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