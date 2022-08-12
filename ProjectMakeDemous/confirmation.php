<?php
require 'db.php';
session_start();
$nom =     $_SESSION['nom'];
$prenom =    $_SESSION['prenom'];
$entreprise =    $_SESSION['entreprise'];
$adresse =    $_SESSION['pays'];
$code_postal =    $_SESSION['code_postal'];
$ville =    $_SESSION['ville'];
$tel =    $_SESSION['tel'];
$email =    $_SESSION['email'];
$adresse =    $_SESSION['adresse'];

$addr = $code_postal . " " . $ville . " " . $adresse ;



$insert_stmt = $db->prepare("INSERT INTO `commandes`(`nom`, `prenom`, `email`, `telephone`, `entreprise`, `adr_facturation`, 
`adr_livraison`)
 VALUES (:unom,:uprenom,:uemail,:utelephone,:uentreprise,:uadr_facturation,:uadr_livraison)");
    $insert_stmt->execute(array(
        ':unom' => $nom,
        ':uprenom' => $prenom,
        ':uemail' => $email,
        ':utelephone' => $tel,
        ':uentreprise' => $entreprise,
        ':uadr_facturation' => $addr,
        ':uadr_livraison' => $addr
    ));

//email de confirmation 
    // sujet du mail de confirmation.
    // $conf_subject = 'Merci pour Votre commande';

    // // expéditeur du mail
    // $conf_sender = 'Make Demous <contact@makedemous.com>';
    // //contenu du mail
    // $msg = $name . ",\n\nVotre commande à été enregistré, vous aller la recevoir le XX/XX/XXXX";

    // mail($email, $conf_subject, $msg, 'From: ' . $conf_sender);


    header('Location: http://localhost');


?>