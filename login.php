<?php
 require_once('inc/manager-db.php');

 if (isset($_POST['login']) && isset($_POST['pwd']) && !empty($_POST['login'])&& !
	empty($_POST['login'])) {
 	$result = getAuthentification($_POST['login'],$_POST['pwd']);
  $login = $_POST['login'];
  $pass = $_POST['pwd'];


 if($result){
	session_start ();

  $_SESSION['role'] = $result->role;
  $_SESSION['nom'] = $result->nom;

	header ('location: index.php');
  }
  else{
  	header ('location: authentification.php');
  }
  }
  else {
  	header ('location: authentification.php');
  }
 ?>
