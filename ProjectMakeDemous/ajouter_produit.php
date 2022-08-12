<?php
require 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: admin.php');
    exit;
}
$table_name = "produits";
$insert_stmt = $db->prepare("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = :utable_name");
$insert_stmt->execute(array(':utable_name' => $table_name));
$row = $insert_stmt->fetchAll();

$produit_id = $row[0][0];




//upload images
mkdir("PRODUITS/" . $produit_id . "/", 0700);
$target_dir = "PRODUITS/" . $produit_id . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {



    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        rename($target_dir . $produit_id . ".png", $target_dir . rand(1, 100) . ".png");
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $produit_id . ".png")) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $nom = strip_tags($_REQUEST["nom"]);
    $description = strip_tags($_REQUEST["description"]);
    $prix = strip_tags($_REQUEST["prix"]);
    $image_dir =  $target_dir . $produit_id . ".png";

    $insert_stmt = $db->prepare("INSERT INTO `produits`(`nom`, `description`, `prix`, `image_dir`) VALUES (:unom, :udescription, :uprix, :image_dir)");
    $insert_stmt->execute(array(
        ":unom" => $nom,
        ":udescription" => $description,
        ":uprix" => $prix,
        ":image_dir" => $image_dir
    ));
}




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title>Modifier produit</title>
</head>

<body>


    <h1 style="text-align:center;">Ajouter un produit</h1>
    <form class="form" method="post" name="nom" id="formulaire_d_inscription" enctype="multipart/form-data">
        <div>
            <label for="nom">nom: </label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="nom">description: </label>
            <input type="text" name="description">
        </div>
        <div><label for="prix">prix: </label>
            <input type="text" name="prix">
        </div>
        <div><label for="fileToUpload">image : </label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Ajouter produit" name="submit">
        </div>
    </form>
</body>
<div style="text-align: center;">
    <a href="dashboard.php" class="btn">Revenir au tableau de bord</a>
    <a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
</div>

</html>

<style>
    form {
        display: flex;
        flex-direction: column;
        margin: 10px 20%;
        background-color: #f1f1f1;
        border-radius: 50px;
        padding: 20px;
    }

    input[type=submit] {
        border: 2px solid black;
        padding: 10px;
    }

    form div {
        margin-top: 20px;
    }
</style>





</body>