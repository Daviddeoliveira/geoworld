<!DOCTYPE html>
<?php
require_once 'inc/manager-db.php';

if (isset($_GET['ajouter'])){
    ajouterUtilisateur($_GET);
} ?>

<html lang="fr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
  <link href="datepicker.css" rel="stylesheet" type="text/css"/>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>

	<form action="login.php" method="post">
		Votre login : <input type="text" name="login"><br />
		Votre mot de passe : <input type="password" name="pwd"><br />
		<input type="submit" value="Connexion">
	</form>

<a href=form.php>Crée un compte</a>
