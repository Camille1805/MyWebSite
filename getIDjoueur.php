<?php 
    $dbName = 'eoz-wiki_ds5l';
    $host = 'localhost';
    $username = 'eoz-wiki_ds5l';
    $password = 'V32i#t#E';
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8', $username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   	$name=$_GET["nomcompte"];
	$passw=md5($_GET["passw"]);
    echo $name." ".$passw;
    $req = "SELECT id FROM LoginSystem where name='$name' and pass='$passw' ";
    $res = $bdd->query($req);
    $laLigne = $res->fetch();		
	echo json_encode($laLigne);
?>