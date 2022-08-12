<?php
require 'db.php';

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: admin.php');
    exit;
}


$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$produit_id = $params['id'];


//upload images

$target_dir = "PRODUITS/" . $produit_id . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $message =  "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $message =  "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $message =  "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message =  "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $message =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message =  "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    rename($target_dir . $produit_id . ".png", $target_dir . rand(1, 100) . ".png");
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $produit_id . ".png")) {
        $message =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        $message =  "Sorry, there was an error uploading your file.";
    }
}




//changer le nom 

if (isset($_REQUEST['button_changer_nom'])) {
    $nouveau_nom = strip_tags($_REQUEST["changer_nom"]);
    $insert_stmt = $db->prepare("UPDATE produits SET nom=:unom WHERE id = :uid");
    $insert_stmt->execute(array(
        ":unom" => $nouveau_nom,
        ":uid" => $produit_id,
    ));
}

//changer la description

if (isset($_REQUEST['button_changer_description'])) {
    $nouvelle_description = strip_tags($_REQUEST["changer_description"]);
    $insert_stmt = $db->prepare("UPDATE produits SET description=:udescription WHERE id = :uid");
    $insert_stmt->execute(array(
        ":udescription" => $nouvelle_description,
        ":uid" => $produit_id,
    ));
}

//changer le prix 

if (isset($_REQUEST['button_changer_prix'])) {
    $nouveau_prix = strip_tags($_REQUEST["changer_prix"]);
    $insert_stmt = $db->prepare("UPDATE produits SET prix=:uprix WHERE id = :uid");
    $insert_stmt->execute(array(
        ":uprix" => $nouveau_prix,
        ":uid" => $produit_id,
    ));
}


//supprimer le produit 

if (isset($_REQUEST['button_supprimer_produit'])) {
    $insert_stmt = $db->prepare("DELETE FROM `produits` WHERE id = :uid;");
    $insert_stmt->execute(array(
        ":uid" => $produit_id
    ));
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title>Modifier produit</title>
</head>

<body>



<div class="forms">
    <form class="form" method="post" name="changer_nom" id="formulaire_d_inscription">
        <label for="changer_nom">changer le nom: </label>
        <input type="text" name="changer_nom">
        <input type="submit" name="button_changer_nom" value="changer" id="">
    </form>


    <form class="form" method="post" name="changer_description" id="formulaire_d_inscription">
        <label for="changer_nom">changer la description: </label>
        <input type="textarea" name="changer_description">
        <input type="submit" name="button_changer_description" value="changer" id="">
    </form>


    <form class="form" method="post" name="changer_prix" id="formulaire_d_inscription">
        <label for="changer_prix">changer le prix: </label>
        <input type="text" name="changer_prix">
        <input type="submit"  value="changer" name="button_changer_prix" id="">
    </form>
    <form class="changer image" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Changer l'image</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Changer l'image" name="submit">
        <!-- <p><?php echo $message ?></p> -->
    </form>

    <form class="changer image" method="post" enctype="multipart/form-data">
        <input onclick="return confirm('Etes-vous sur de vouloir supprimer le produit ?');" type="submit" value="Supprimer le produit" name="button_supprimer_produit">
    </form>
</div>
<a href="dashboard.php" class="btn">Revenir au tableau de bord</a>
<a class="btn" href="logout.php"><i class="fas fa-sign-out-alt"></i>Se déconnecter</a>
</body>

</html>




<style>
    .forms{
        display: flex;
        flex-direction: row;
    }
    form{
        display: flex;
        flex-direction: column;
        padding: 20px;
        margin-right: 40px;
        border-radius: 50px;
        background-color: #f1f1f1;
    }
    input{
        margin: 10px 0;
    }
    input[type=submit]{
        border: 1px solid black;

    }
</style>


</body>