<?php

function enregUser($id)
{ 
	$_SESSION['user']=$id;
}

function estConnecte()
{	return isset($_SESSION['user']);	}

	function deconnexion()
	{	session_destroy();	}


  
?>