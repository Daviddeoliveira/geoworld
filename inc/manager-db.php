<?php
require_once 'connect-db.php';

function getCountriesByContinent($continent){

  // pour utiliser la variable globale dans la fonction
  global $pdo;
  $query = 'SELECT * FROM Country WHERE Continent = :cont;';
  $prep = $pdo->prepare($query);
  // on associe ici (bind) le paramètre (:cont) de la req SQL,
  // avec la valeur reçue en paramètre de la fonction ($continent)
  // on prend soin de spécifier le type de la valeur (String) afin
  // de se prémunir d'injections SQL (des filtres seront appliqués)
  $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
  $prep->execute();
  // var_dump($prep);  pour du debug
  // var_dump($continent);

  // on retourne un tableau d'objets (car spécifié dans connect-db.php)
  return $prep->fetchAll();
}

function getAllCountries(){

  global $pdo;
  $query = 'SELECT * FROM Country;';
  return $pdo->query($query)->fetchAll();
}

function getContinents(){

  global $pdo;
  $query = 'SELECT Continent FROM Country GROUP BY Continent;';
  return $pdo->query($query)->fetchAll();
}

function getCitiesByIdCountry($idPays){

   global $pdo;
   $query = 'SELECT NAME,population FROM city WHERE idcountry= :idp';
   $prep = $pdo->prepare($query);
   $prep->bindValue(':idp', $idPays, PDO::PARAM_INT);
   $prep->execute();
   return $prep->fetchAll();
}

function languagesByCountry($idPays){

  global $pdo;
  $query = 'SELECT name,IsOfficial,percentage FROM countrylanguage,language WHERE countrylanguage.idLanguage=language.id AND idcountry= :idp';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idp', $idPays, PDO::PARAM_INT);
  $prep->execute();
  return $prep->fetchAll();
}

function getAuthentification($login,$pass){
  global $pdo;
  $query = "SELECT * FROM user where login=:login and password=:pass";
  $prep = $pdo->prepare($query);
  $prep->bindValue(':login', $login);
  $prep->bindValue(':pass', $pass);
  $prep->execute();
  if($prep->rowCount() == 1){
    $result = $prep->fetch();
    return $result;
 }
  else
  return false;
}

function ajouterUtilisateur($tab){
   global $pdo;
   print_r($tab);
     $nom = $tab['nom'];
     $login = $tab['login'];
     $password = $tab['mot_de_passe'];
     $role = $tab['role'];
     $query = "INSERT INTO user(nom,role,login,password) values('$nom','$role','$login','$password')";
     echo "$query";
    $pdo->exec($query);
}

  function getNameCountyById($idPays){
  global $pdo;
  $query = 'SELECT Name FROM country WHERE id= :idp';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idp', $idPays, PDO::PARAM_INT);
  $prep->execute();
  return $prep->fetch();
}
/*$result =  $pdo->query($query)->fetch();
return $result->name;*/
