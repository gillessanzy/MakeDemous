<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/magasin.css">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title>Magasin</title>

    <?php require 'db.php'; ?>

</head>


<body>

    <?php include 'navbar.php';
    
    $query = $db->prepare("SELECT * FROM produits");
    $query->execute();
    ?>
        <h1>nos produits</h1>


    <section class='nos_produits'>
        <?php while ($row = $query->fetch()) { ?>
            <div class='produit'>
                <div class="image">
                    <a href="desc_produit.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['image_dir'] ?>" alt=""></a>
                </div>
                <a class="nom_produit" href="desc_produit.php?id=<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></a>
                <p class='prix'>€<?php echo $row['prix'] ?></p>
            </div>
        <?php } ?>
    </section>
    <?php include 'footer.php'; ?>

</body>


</html>

