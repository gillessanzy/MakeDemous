<?php
require 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: admin.php');
    exit;
}




//afficher les produits 
$query = $db->prepare("SELECT * FROM produits");
$query->execute();

$q = $db->prepare("SELECT * FROM commandes");
$q->execute();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title>admin</title>
</head>

<body>
    <h1>Bievenue dans le tableau de bord du site </h1>
    
    <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
    <section class="modifier_produit">
    <h1>Modifier produits</h1>
    <?php while ($row = $query->fetch()) { ?>
        <div class='produit'>

            <p class="nom_produit">identifiant de l'article : <?php echo  $row['id']; ?> et son nom est : <?php echo $row['nom'] ?>
            <p class='description'>description : <?php echo $row['description'] ?></p>

            <p class='prix'>prix : €<?php echo $row['prix'] ?></p>
            <a class="btn" style="text-align: center;" href="modifier_produit.php?id=<?php echo $row['id'] ?>">modifier produit</a>
            
        </div>
    <?php } ?>

    <a class="btn" href="ajouter_produit.php">ajouter un produit</a>

    <h1>commandes</h1>
    <?php while ($r = $q->fetch()) { ?>
        <div class='produit'>
            <p class="nom_produit">nom :  <?php echo  $r['nom']; ?></p>
            <p class='description'>prenom : <?php echo $r['prenom'] ?></p>
            <p class='description'>email : <?php echo $r['email'] ?></p>
            <p class='description'>telephone : <?php echo $r['telephone'] ?></p>
            <p class='description'>entreprise : <?php echo $r['entreprise'] ?></p>
            <p class='description'>adresse de facturation : <?php echo $r['adr_facturation'] ?></p>
            <p class='description'>adresse de livraison : <?php echo $r['adr_livraison'] ?></p>
        </div>
    <?php } ?>




    </section>

    <style>
        .produit {
            display: flex;
            flex-direction: column;
            background-color: #a1a1a1;
            margin: 0 5% 20px 5%;
            border-radius: 50px;
            padding: 20px;
        }
    </style>





</body>

</html>