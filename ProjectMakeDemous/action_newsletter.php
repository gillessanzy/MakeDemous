<?php
    //b session_start();
    
    
    
    $email =  $_POST['email'];
    $date_time = time();
    
    
    /*$options = [
        'cost' => 12,
    ];*/

    require_once 'db.php';
   //$mysqli = new mysqli($host, $login, $password, $dbname);
    if ($mysql->connect_error) {
        die('Erreur de connexion (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
    if ($stmt = $mysql->prepare('INSERT INTO newsletter($email, $date_time) VALUES (?, ?)')) {
        //$password = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt->bind_param("si", $email, $date_time);
        $result = $stmt->execute();
        // Le message est mis dans la session, il est préférable de séparer message normal et message d'erreur.
        if($result) {
            $_SESSION['message'] = "Enregistrement réussi";
            //echo 'enregistrement reussi';

        } else {
           $_SESSION['message'] =  "Impossible d'enregistrer";
           //echo 'enregistrement echooué';
        }
    }
    // Redirection vers la page d'accueil par exemple :
    header('Location: checkout.php');
?>
