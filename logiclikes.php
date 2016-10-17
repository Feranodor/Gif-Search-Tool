<?php
	session_start();
	
	require_once "connect.php";
	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connection->connect_errno!=0)
	{
		$_SESSION['connectSQLErrorBoolean'] = true;
	}
	else
	{
		$counterLikeDislike= $_POST['btnCounterLikeDislike'];
		$counterLikeDislike = explode("m",$counterLikeDislike);
	
		$result = @$connection->query(
		sprintf("SELECT * FROM gifs WHERE gifid='%s' AND ip='%s'",
		$_SESSION['gifid'.$counterLikeDislike[0]],$_SESSION['userIP']));
	
		$numberOfRows = $result->num_rows;
		
		if ($numberOfRows === 0)
		{
			$sql = sprintf("INSERT INTO gifs VALUES (NULL, '%s', '%s', '%s')",
			$_SESSION['gifid'.$counterLikeDislike[0]],
			$counterLikeDislike[1],
			$_SESSION['userIP']);
			
			$connection->query($sql);
			$_SESSION["votes".$counterLikeDislike[0]] = $_SESSION["votes".$counterLikeDislike[0]] + $counterLikeDislike[1];
			
			$_SESSION['isVoted'.$counterLikeDislike[0]] = true;
			
			echo $_SESSION["votes".$counterLikeDislike[0]].' | thanks for your vote';
		}
		else
		{
			echo $_SESSION["votes".$counterLikeDislike[0]].' | rated beforehand by you';
		}

		$_SESSION['connectSQLErrorBoolean'] = false;
		$connection->close();
	}
	
	
	
?>