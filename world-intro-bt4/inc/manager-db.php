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

function city(){
   
   global $pdo;
   $query = 'SELECT NAME,population FROM city WHERE idcountry =';
   return $pdo->query($query)->fetchAll();
}

function languagesByCountry($idPays){

  global $pdo;
  $query = 'SELECT name,IsOfficial,percentage FROM countrylanguage,language WHERE countrylanguage.idLanguage=language.id AND idcountry= :idp';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idp', $idPays, PDO::PARAM_INT);
  $prep->execute();
  return $prep->fetchAll();
}