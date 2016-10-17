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
		for( $x = 0; $x < $_SESSION['numberOfResults']; $x++ )
		{
			$likes = @$connection->query(sprintf("SELECT ID FROM gifs WHERE gifid='%s' AND vote='1'",
			$_SESSION['gifid'.$x]));
			
			$dislikes = @$connection->query(sprintf("SELECT ID FROM gifs WHERE gifid='%s' AND vote='-1'",
			$_SESSION['gifid'.$x]));
			
			$numberOflikes = $likes->num_rows;
			$numberOfdislikes = $dislikes->num_rows;
			
			$_SESSION['votes'.$x] = $numberOflikes - $numberOfdislikes;
			
			$result = @$connection->query(
			sprintf("SELECT * FROM gifs WHERE gifid='%s' AND ip='%s'",
			$_SESSION['gifid'.$x],$_SESSION['userIP']));
			
			if($numberOfRows = $result->num_rows)
			$_SESSION['isVoted'.$x] = true;
			else
			$_SESSION['isVoted'.$x] = false;
		}

		$_SESSION['connectSQLErrorBoolean'] = false;
		$connection->close();
	}
	
	header("Location: index.php");
	exit();
	
?>