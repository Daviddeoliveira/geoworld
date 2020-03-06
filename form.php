<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
  <link href="datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

</head>
<?php
  if(isset($_GET['message'])){
	$message =$_GET['message'];
        echo $message;
   }
?>
	<form method="get" action="authentification.php?ajouter">
 		Nom : <input type="text" name="nom"  ><br>
		login : <input type="text" id="login" name="login" ><br>
		mot de passe : <input type="text" name="mot_de_passe" ><br>
    role :<br> <input type="radio" name="role" value="professeur" >professeur<br>
          <input type="radio" name="role" value="élève" >élève<br>

		<input type="submit" name="ajouter" value="ajouter">
	</form>
