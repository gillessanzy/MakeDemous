<?php
require 'db.php';
include("navbar.php");
$message = '';
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$produit_id = $params['id'];

$select_stmt = $db->prepare("SELECT * FROM produits WHERE id = :produit_id"); //sql select query
$select_stmt->execute(array(':produit_id' => $produit_id));    //execute query with bind parameter
$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

$key_array = array_keys($_GET);





// ---------------------------
$message = '';

if (isset($_POST["ajouter_au_panier"])) {
    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if (in_array($_POST["hidden_id"], $item_id_list)) {
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $_POST["hidden_id"]) {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
            }
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_POST["hidden_id"],
            'item_name'            =>    $_POST["hidden_name"],
            'item_price'        =>    $_POST["hidden_price"],
            'item_quantity'        =>    $_POST["quantity"]
        );
        $cart_data[] = $item_array;
    }


    $item_data = json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    header("location:" . $_SERVER['PHP_SELF'] . '?id=' . $produit_id . "&success=1");
}
//message de succès
if (isset($key_array[1])) {
    $message = '
    <div class="alert success">
    <span class="closebtn">&times;</span>  
    <strong>Fait !</strong> Le produit a été ajouté au panier !
  </div>
	';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/desc_produit.css">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title><?php echo $row['nom'] ?></title>
</head>

<body>
    <form class="desc_produit" method="post">
        <div class="image">
            <img src="/PRODUITS/<?php echo $produit_id . "/" . $produit_id . ".png" ?>">
        </div>

        <div class="text">
            <h1 class="nom_produit"><?php echo $row['nom'] ?></h1>
            <p class="description_produit"><?php echo $row['description'] ?></p>
            <div class="block_prix_qtt_btn">
                <div class="prix_qtt">
                    <p class="prix_produit">Prix par pack : <?php echo $row['prix'] ?> €</p>
                    <div class="selecteur">
                        <!-- <input type="text" name="quantity" value="1" class="form-control" /> -->
                        <label for="quantity">Quantité : </label>
                        <input class="form-control" type="number" name="quantity" id="qtt">
                        
                        
                        
                    </div>

                </div>
                <div class="bouttons">
                    <input class="btn" type="submit" name="ajouter_au_panier" style="margin-top:5px;"
                        value="Ajouter au panier" />
                    <input type="hidden" name="hidden_name" value="<?php echo $row["nom"]; ?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $row["prix"]; ?>" />
                    <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>" />
                </div>

            </div>
            <?php echo $message; ?>
        </div>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src="RESSOURCES/js/desc_produit.js"></script>
    </form>
    <?php include 'footer.php' ?>
</body>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function() {
            div.style.display = "none";
        }, 600);
    }
}
</script>

</html>


<style>
.form-control {
    font-size: 110%;
    border: 3px solid #0099ff;
    border-radius: 10%;
}

.form-control:focus {
    border-color: blue;

}

.selecteur {
    padding-top: 10px;

}

#slideshow-items-container {
    width: 100%;
}

.image {
    margin : 10px 0 ;
    width: 40%;
    height: auto;;
    border: 2px solid black;
}

.image img {
    width: 100%;
    height: auto;
}

.text {
    width: 50%;
    display: flex;
    flex-direction: column;
    padding: 10px 0 0 30px;
}



.prix_qtt {
    display: flex;
    flex-direction: column;
    justify-content: space-around;

}

.bouttons {
    display: flex;
    float: right;
    flex-direction: row;
    justify-content: flex-end;
}

.block_prix_qtt_btn {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;



}

.btn {
    font-size: 120%;
    text-transform: capitalize;
}

.desc_produit {
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap-reverse;
    padding: 10px 0;
    align-items: center;
}



.nom_produit {
    padding: 10px 0;
}

.description_produit {
    padding: 10px 0;

}

@media only screen and (max-width: 400px) {
  body {
    font-size: 80%;
    padding: 0;
  }
.image{
    width: 100%;
}
.text{
    width: 100%;
    padding: 0 10px;
}
}
</style>