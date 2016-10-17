<?php
	session_start();
	
	if (!isset($_SESSION['connectSQLErrorBoolean'])) $_SESSION['connectSQLErrorBoolean'] = false;
	if (!isset($_SESSION['connectGiphyErrorBoolean'])) $_SESSION['connectGiphyErrorBoolean'] = false;
	if (!isset($_SESSION['totalCount'])) $_SESSION['totalCount'] = -1;
	if (!isset($_SESSION['keysreturn'])) $_SESSION['keysreturn'] = "";
	if (!isset($_SESSION['numberOfResults'])) $_SESSION['numberOfResults'] = -1;
	if (!isset($_SESSION['movement'])) $_SESSION['movement'] = 0;
	
	if (!isset($_SESSION['userIP'])){
		
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		$_SESSION['userIP'] = $ip;
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Gif Search Tool</title>
	
	<style>
		.tile
		{
			margin:5px; 
			padding:10px; 
			background-color:#a58af2; 
			float:left; 
			border-radius: 17px 17px 17px 17px; 
			-moz-border-radius: 17px 17px 17px 17px; 
			-webkit-border-radius: 17px 17px 17px 17px; 
			border: 0px solid #000000; 
			-webkit-box-shadow: 10px 10px 15px -1px rgba(0,0,0,0.72); 
			-moz-box-shadow: 10px 10px 15px -1px rgba(0,0,0,0.72); 
			box-shadow: 10px 10px 15px -1px rgba(0,0,0,0.72);
		}
	</style>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
	
	<script>
	
	function rating(id,likeDislike){
    $.ajax({
        type:'POST',
        url:'logiclikes.php',
        data:'btnCounterLikeDislike='+id+'m'+likeDislike,
        success:function(msg){
            if(msg == 'err'){
                alert('Some problem occured, please try again.');
            }else{
                $('#divVote'+id).html(msg);
            }
        }
    });
	}
	
	</script>
	
</head>

<body style="background-color:#75a7ff;">
Powered By Giphy
	<form action="logicjson.php" method="post">
	
		<br /> <input type="text" name="keys" />
		<input type="submit" value="Search" />
	
	</form>
<?php


	if ($_SESSION['connectGiphyErrorBoolean'] === true)
	{
		echo "Giphy connection error";
	}
	else
	{
		if ($_SESSION['keysreturn'] === '')
		{
			echo "Enter your query!!!";
		}
		else if ($_SESSION['totalCount'] > 0)
		{
			echo $_SESSION['totalCount'].' GIFs found for "'.$_SESSION['keysreturn'].'".';
			$movementFirst = $_SESSION['movement'] + 1;
			$movementLast = $_SESSION['movement'] + 25;
			if ($movementLast>$_SESSION['totalCount'])
			{
				$movementLast=$_SESSION['totalCount'];
			}
			echo '['.$movementFirst.']-['.$movementLast.']';
		}
		else
		{
			echo 'No GIFs found for "'.$_SESSION['keysreturn'].'".';
		}
		
		echo ' Your IP: '.$_SESSION['userIP'].'<br>';
		
		echo '<form action="logicmovement.php" method="post">';
		if ($_SESSION['movement']>0) 
			echo '<button name="movement" value="-25">Previous</button>';
		if ($_SESSION['movement'] + 25<$_SESSION['totalCount']) 
			echo '<button name="movement" value="25">Next</button>';
		echo '</form><br><br>';
		
		if ($_SESSION['connectSQLErrorBoolean'] === true)
		{
			echo "SQL connection error: like/dislike functionality disabled<br><br>";
		}
		
	
		for( $x = 0; $x < $_SESSION['numberOfResults']; $x++ ) {
			echo '<div class="tile">';
			echo '<video controls><source src="'.$_SESSION['gifurl'.$x].'" type="video/mp4"></video>';
			
			if ($_SESSION['connectSQLErrorBoolean'] === false)
			{
				echo '<br><b><div id="divVote'.$x.'">'.$_SESSION["votes".$x].'</div></b>';
				
				if ($_SESSION['isVoted'.$x])
				{
					echo 'rated by you';
				}
				else
				{
					echo '<button onClick="rating('.$x.',1)">Like</button>';
					echo '<button onClick="rating('.$x.',-1)">Dislike</button>';
				}
			}	
			echo '</div>';
		}
	}
?>
</body>
</html>