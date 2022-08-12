

<?php
session_start();
if (isset($_REQUEST['submit'])) {
    $nom  = strip_tags($_REQUEST['nom']);
    $prenom  = strip_tags($_REQUEST['prenom']);
    $entreprise  = strip_tags($_REQUEST['entreprise']);
    $pays  = strip_tags($_REQUEST['pays']);
    $adresse  = strip_tags($_REQUEST['adresse']);
    $code_postal  = strip_tags($_REQUEST['code_postal']);
    $ville  = strip_tags($_REQUEST['ville']);
    $tel  = strip_tags($_REQUEST['tel']);
    $email  = strip_tags($_REQUEST['email']);

    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['entreprise'] = $entreprise;
    $_SESSION['pays'] = $pays;
    $_SESSION['code_postal'] = $code_postal;
    $_SESSION['ville'] = $ville;
    $_SESSION['tel'] = $tel;
    $_SESSION['email'] = $email;
    $_SESSION['adresse'] = $adresse;

    header('Location: http://localhost:3000');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/checkout.css">
    <link rel="stylesheet" href="RESSOURCES/css/footer.css">
    <link rel= "stylesheet" href="RESSOURCES/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    
    <title> Caisse </title>
</head>

    <body>

        <?php include 'navbar.php' ?>
        
        <div class="container">
            <h1>Vérification et validation de votre commande</h1>
            <div class="checkout">
                <section class="formulaires">
                <form class="adresse_de_livraison" method="post" name="inserer_information" id="formulaire_d_inscription">
                        <h2>Informations de livraison</h2>
                        <div class="input-group">
                            <input required type="text" name="nom" autocomplete="off" class="input">
                            <label class="user-label">Nom</label>
                        </div>
                        <div class="input-group">
                            <input required type="text" name="prenom" autocomplete="off" class="input">
                            <label class="user-label">Prénom</label>
                        </div>
                        <div class="input-group">
                            <input required type="text" name="entreprise" autocomplete="off" class="input">
                            <label class="user-label">Entreprise</label>
                        </div>
                        <div class="input-group">
                        
                            <select id="select" class="input">
                            
                                    <?php
                                        $id_fichier= fopen("c:/liste_pays.txt","r");
                                        while($ligne=fgets($id_fichier,1024))
                                        {
                                            $ligne=explode(chr(9),$ligne);
                                            if ($ligne[1]=='France') // France est sélectionné par défaut
                                            print '<option value='.$ligne[0].' selected="selected">'.$ligne[1].'</option>';
                                            else
                                            print '<option value='.$ligne[0].'>'.$ligne[1].'</option>';
                                        }
                                    ?>
                                    
                            </select>
                            
                        </div>
                        <div class="input-group">
                            <input required type="text" name="adresse" autocomplete="off" class="input">
                            <label class="user-label">Adresse</label>
                        </div>
                        <div class="input-group">
                            <input required type="text" name="code_postal" autocomplete="off" class="input">
                            <label class="user-label">Code Postal</label>
                        </div>
                        <div class="input-group">
                            <input required type="select" name="ville" autocomplete="off" class="input">
                            <label class="user-label">Ville</label>
                        </div>
                        <div class="input-group">
                            <input required type="text" name="tel" autocomplete="off" class="input">
                            <label class="user-label">Numéro de téléphone</label>
                        </div>
                        <div class="input-group">
                            <input required type="text" name="email" autocomplete="off" class="input">
                            <label class="user-label">Email</label>
                        </div>
                        
                    </form>



                    <!-- <a class="btn" href="http://localhost:3000">Proceder au paiement sécurisé</a> -->

                </section>
                <section class="details_commande">
                    <div class="cartes">
                        <h2>Votre Commande</h2>
                        <?php
                        if (isset($_COOKIE["shopping_cart"])) {
                            $total = 0;
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);
                            foreach ($cart_data as $keys => $values) {
                        ?>
                                <div class="carte_produit">
                                    <div class="text_produit">
                                        <div class="desc">
                                            <p><?php echo $values["item_name"]; ?></p>
                                            <p>€ <?php echo $values["item_price"]; ?> X <?php echo $values["item_quantity"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="montant">
                                        <p>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></p>
                                    </div>
                                </div>
                            <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                            ?>
                             <label for="fname">Cartes acceptées </label>
                             <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"><img src="RESSOURCES/css/favicon/icons8-visa-50-4.png"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"><img src="RESSOURCES/css/favicon/icons8-amex-50.png"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"><img src="RESSOURCES/css/favicon/icons8-logo-mastercard-50.png"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"><img src="RESSOURCES/css/favicon/icons8-découvrir-50.png"></i>
                            </div>
                            <div class="details_prix">
                                <p>TOTAL (Hors-Taxes): € <?php echo number_format($total, 2); ?></p>
                                <p>Frais de livraison : €20 </p>
                                <p>Taxes : €20 </p>
                                <h3>TOTAL (TCC) : € <?php echo number_format($total + 40, 2); ?></h3>
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
                    </div>
                    <div><p> <br></p>       </div>
                    <input class="btn" id="popo" value="Procéder au paiement sécurisé avec stripe" type="submit" name="submit">
                    
                </section>
            </div>
        </div>
            <div class="modal-container">

                 <div class="overlay modal-trigger"></div>

                <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
                <button 
                aria-label="close modal"
                class="close-modal modal-trigger">X</button>
                <h1 id="modalTitle">Abonnez-vous à notre newsletter</h1>
                    <p id="dialogDesc">Assurez-vous de confirmer votre abonnement avec l'e-mail de bienvenue envoyé dans votre boîte de réception. En vous abonnant, vous recevrez des e-mails réguliers de Make Demous et vous acceptez notre <a href="politique_confidentialite.php">Avis de confidentialité</a> et nos <a href="politique_confidentialite.php">Conditions d'utilisation</a> . Nous respectons votre vie privée et vous avez toujours le choix de vous désabonner.</p>
                    <form action="action_newsletter.php" method="POST">
                    <input type="email" id="adresse-modal"  name="email" autocomplete="off" class="input" placeholder="Adresse mail"  required> <button  class="submit-modal"  id="submit">Soumettre</button>
                    </form>
                    <style>
                    #adresse-modal, #submit-modal {
  
                                display: inline-block;
                                margin: 0 2%;
                                flex: content;


                                }

                </style>
                </div>
                
            </div>

            </div>

            <button  class="modal-btn modal-trigger"><img src="https://img.icons8.com/sf-ultralight/25/000000/mailbox-closed-flag-up.png"/><a target="_blank" href="https://icons8.com/icon/lfy91r9ZXgye/boîte-aux-lettres-fermée-pleine"></a> S'abonner à la newsletter</button>





            <script src="RESSOURCES/js/app.js"></script>                 
                
                    
                    
    </body>
    <img src="https://img.icons8.com/sf-ultralight/25/000000/mailbox-closed-flag-up.png"/>
            <?php include 'footer.php' ?>
        </div>
</html>