<?php

 
 include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="paiement.css" />
    <link rel="stylesheet" type="text/css" href="RESSOURCES/css/all.css" />
    <link rel="stylesheet" type= "text/css" href="RESSOURCES/css/footer.css">
    <title>Make Demous</title>
</head>
    <body>
        <div class="row">
        <div class="col-75">
            <div class="container">
            <form action="/action_page.php">

                <div class="row">
                <div class="col-50">
                    <h3>Adresse de livraison</h3>
                    <label for="fname"><i class="fa fa-user"></i> Nom complet</label>
                    <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="john@example.com">
                    <label for="adr"><i class="fa fa-address-card-o"></i> Adresse</label>
                    <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                    <label for="city"><i class="fa fa-institution"></i> Ville</label>
                    <input type="text" id="city" name="city" placeholder="New York">

                    <div class="row">
                    <div class="col-50">
                        <label for="state">Pays</label>
                        <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                        <label for="zip">Code Postal</label>
                        <input type="text" id="zip" name="zip" placeholder="10001">
                    </div>
                    </div>
                </div>

                <div class="col-50">
                    <h3>Paiement</h3>
                    <label for="fname">Cartes acceptées</label>
                    <div class="icon-container">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div>
                    <label for="cname">Nom sur la carte</label>
                    <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                    <label for="ccnum">Numéro de la carte</label>
                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                    <label for="expmonth">Exp Month</label>
                    <input type="text" id="expmonth" name="expmonth" placeholder="September">

                    <div class="row">
                    <div class="col-50">
                        <label for="expyear">Annee d'expiration</label>
                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                    </div>
                </div>

                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> adresse de facturation identique à celle de livraison
                </label>
                <input type="submit" value="Continuer paiement" class="btn">
            </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
            <h4>MON PANIER
                <span class="price" style="color:black">
                <i class="fa fa-shopping-cart"></i>
                <b>4</b>
                </span>
            </h4>
            <p><a href="#">Produit 1</a> <span class="price">$15</span></p>
            <p><a href="#">Produit 2</a> <span class="price">$5</span></p>
            <p><a href="#">Produit 3</a> <span class="price">$8</span></p>
            <p><a href="#">Produit 4</a> <span class="price">$2</span></p>
            <hr>
            <p>Sous-Total <span class="price" style="color:black"><b>$30</b></span></p>
            </div>
        </div>
        </div>
        
    </body>    
<?php include 'footer.php' ?>