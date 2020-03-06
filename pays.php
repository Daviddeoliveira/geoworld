<?php
require_once 'header.php';
require_once 'inc/manager-db.php';

session_start ();
if (isset($_SESSION['nom'])) {
 echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
 echo '<br><a href="./logout.php">Deconnexion</a></p>';
}
else{
 header ('location: authentification.php');
}

$idPays=$_GET['id'];
$villes=getCitiesByIdCountry($idPays);
$langues=languagesByCountry($idPays);
$pays= getNameCountyById($idPays);
?>

<main role="main" class="flex-shrink-0">
  <?php echo" <h1>Les infomartions sur $pays->Name</h1>"; ?>
  <div class="container">
    <h2>Ville et population</h2>
    <div>
      <table class=" table table-dark">
        <tr>
          <th>Nom</th>
          <th>Population</th>
        </tr>
      <?php foreach ($villes as $cle) : ?>
        <tr>
        <th><?php echo "$cle->NAME"; ?></th>
        <th><?php echo "$cle->population"; ?></th>
      </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <h2>Langues parlées</h2>
    <div>
      <table class=" table table-dark">
        <tr>
          <th>Nom</th>
          <th>Langue Officiel</th>
          <th>Percentage</th>
        </tr>
      <?php foreach ($langues as $key) : ?>
        <tr>
        <th><?php echo "$key->name"; ?></th>
        <th><?php echo "$key->IsOfficial"; ?></th>
        <th><?php echo "$key->percentage"; ?></th>
      </tr>
        <?php endforeach; ?>
      </table>
      </div>
  </div>
  <a href="index.php">Retour</a>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
