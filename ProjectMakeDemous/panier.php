<?php

//index.php

require 'db.php';
$message = '';

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == $_GET["id"]) {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:panier.php?remove=1");
            }
        }
    }
    if ($_GET["action"] == "clear") {
        setcookie("shopping_cart", "", time() - 3600);
        header("location:panier.php?clearall=1");
    }
}


if (isset($_GET["remove"])) {
    $message = '
    <div class="alert success">
    <span class="closebtn">&times;</span>  
    <strong>Operation réussie !</strong> Le produit a été supprimé du panier.
  </div>
	';
}
if (isset($_GET["clearall"])) {
    $message = '
    <div class="alert success">
    <span class="closebtn">&times;</span>  
    <strong>Operation réussie !</strong> Le panier a été vidé.
  </div>
	';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/panier.css">
    <link rel="stylesheet" href="RESSOURCES/css/all.css">

    <title>cart</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section class="cart">
        <h1>Panier</h1>
        <?php echo $message; ?>
        <div class="titres">
            <div class="image_produit">
                <p>Image</p>
            </div>
            <div class="titre_produit">
                <p>Produit</p>
            </div>
            <div class="selecteur_et_prix">
                <p>Quantité</p>
            </div>
            <div class="montant">
                <p>Montant</p>
            </div>
            <div class="trash">
            </div>
        </div>
        <?php
        if (isset($_COOKIE["shopping_cart"])) {
            $total = 0;
            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
            $cart_data = json_decode($cookie_data, true);
            foreach ($cart_data as $keys => $values) {
        ?>


                <div class="carte_produit">
                    <div class="image_produit">
                        <img src="PRODUITS/<?php echo $values["item_id"] ?>/<?php echo $values["item_id"] ?>.png" alt="">
                    </div>
                    <div class="titre_produit">
                        <p><?php echo $values["item_name"]; ?></p>
                    </div>
                    <div class="selecteur_et_prix">
                        <div class="qtt">
                            <p>Qtt : <?php echo $values["item_quantity"]; ?></p>
                        </div>
                        <p class="montant_produit">€ <?php echo $values["item_price"]; ?> par pack</p>
                    </div>

                    <div class="montant">
                        <p>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
                    </div>
                    <div class="trash">
                        <a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>">
                            <ion-icon class="trash_bin" name="trash-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>

            
            
            
            <div class="carte_produit btn_total">
            
                <a class="btn" href="magasin.php">Continuer vos achats</a>
                <a class="btn" href="checkout.php">Passer à la caisse</a>
                <a href=""></a>
                <p class="total">TOTAL : € <?php echo number_format($total, 2); ?></p>
                <a class="btn btn_red" href="panier.php?action=clear">Vider le panier</a>


            </div>
        <?php
        } else {
            echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
        }
        ?>
    </section>
    
</body>
<?php include 'footer.php' ?>
</html>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>



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

<style>
    .btn_total{
        background-color: white;
    }
</style>