<?php
require_once 'header.php';
require_once 'inc/manager-db.php';
require_once 'inc/connect-db.php';

session_start ();
if (isset($_SESSION['nom'])) {
 echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
 echo '<br><a href="./logout.php">Deconnexion</a></p>';
}
else{
 header ('location: authentification.php');
}

$continent = (empty($_GET['continent']))?'Asia' : $_GET['continent'];
$desPays = getCountriesByContinent($continent);
?>

<main role="main" class="flex-shrink-0">

  <div class="container">
    <?php echo "<h1>Les pays en $continent</h1>"?>
    <div>

       <code>
         <?php //var_dump($desPays[0]); ?>
      </code>
    </div>
    <p></p>
        <table class=" table table-dark">
          <tr>
            <th>Nom</th>
            <th>Population</th>
            <th>Region</th>
            <th>Nom Local</th>
            <th>espérance de vie</th>
            <th>Dirigant du pays</th>
          </tr>
        <?php foreach ($desPays as $key) : ?>
          <tr>
         <th><a href=pays.php?id=<?php echo $key->id?>><?php echo "$key->Name";?></a></th>
         <th><?php echo "$key->Population"; ?></th>
         <th><?php echo "$key->Region"; ?></th>
         <th><?php echo "$key->LocalName"; ?></th>
         <th><?php echo "$key->LifeExpectancy"; ?></th>
         <th><?php echo "$key->HeadOfState"; ?></th>
       </tr>
      <?php endforeach; ?>
        </table>
      </div>

  </div>

</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
