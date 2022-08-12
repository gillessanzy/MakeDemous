<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/aide_et_support.css">
    <!-- <link rel="stylesheet" href="RESSOURCES/css/all.css"> -->
    <?php
    if (!empty($_POST["send"])) {
        $name = $_POST["userName"];
        $email = $_POST["userEmail"];
        $subject = $_POST["subject"];
        $company = $_POST["company"];
        $content = $name . " de chez " . $company . "nous dit : " . $_POST["content"];

        $toEmail = "contact@makedemous.com";
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Votre message à été transféré à nos équipes, nous vous réponderons le plus tot possible";
            $type = "success";
        }
    }

//email de confirmation 
    // sujet du mail de confirmation.
    $conf_subject = 'Merci pour message';

    // expéditeur du mail
    $conf_sender = 'Make Demous <contact@makedemous.com>';
    //contenu du mail
    $msg = $name . ",\n\nMerci pour votre demande récente. Un membre de notre
    équipe répondra à votre message dans les plus brefs délais.";

    mail($email, $conf_subject, $msg, 'From: ' . $conf_sender);


    ?>
    <title>Aide et Support</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <div class="contain">

        <div class="wrapper">

            <div class="form">
                <h2 class="form-headline">Envoyez-nous un message</h2>
                <!-- <form id="submit-form" method="post" action=""> -->
                <form name="frmContact" id="" frmContact"" method="post" action="" enctype="multipart/form-data" onsubmit="return validateContactForm()">
                    <p>
                        <!-- <input name="nom" id="name" class="form-input" type="text" placeholder="Votre Nom*"> -->
                        <input type="text" class="form-input" name="userName" id="userName" placeholder="Votre Nom*"/>
                        <small class="name-error"></small>
                    </p>
                    <p>
                        <!-- <input name="email" id="email" class="form-input" type="email" placeholder="Votre Email*"> -->
                        <input type="text" class="form-input" name="userEmail" id="userEmail" placeholder="Votre Email*"/>
                        <small class="name-error"></small>
                    </p>
                    <p class="full-width">
                        <!-- <input name="entreprise" id="company-name" class="form-input" type="text" placeholder="Nom de votre Entreprise*" required> -->
                        <input type="text" class="form-input" name="company" id="company-name" placeholder="Nom de votre Entreprise*" required />
                        <small></small>
                    </p>
                    <p class="full-width">
                        <!-- <input name="objet" id="objet" class="form-input" type="text" placeholder="Objet*" required> -->
                        <input type="text" class="form-input" name="subject" id="objet" placeholder="Objet*" required/>
                        <small></small>
                    </p>
                    <p class="full-width">
                        <!-- <textarea name="message" minlength="20" id="message" cols="30" rows="7" placeholder="Votre Message*" required></textarea> -->
                        <textarea name="content" minlength="20" id="message" class="input-field" cols="30" rows="7" placeholder="Votre Message*"></textarea>
                        <small></small>
                    </p>
                    <p class="full-width">
                        <input type="checkbox" id="checkbox" name="checkbox" checked> Oui, je souhaite recevoir
                        des communications par mail sur les services de la société.
                    </p>
                    <p class="full-width">
                        <!-- <input name="send" type="submit" class="submit-btn" value="Envoyer" onclick="checkValidations()"> -->
                        <input type="submit" name="send" class="btn" value="Envoyer" />
                        <button class="reset-btn" onclick="reset()">réinitialiser</button>
                    </p>
                </form>
            </div>

            <div class="contacts contact-wrapper">

                <ul>
                    <li>Une question ? Consulter notre <a href="FAQ.php">FAQ</a>. Si vous ne trouver pas de réponse à votre question, Envoyer nous un message ! </li>
                    <li>
                        <h4>Entrons en contact ! </h4> Nous sommes ouverts à toute suggestion ou simplement pour discuter.
                    </li>
                    <span class="hightlight-contact-info">
                        <li class="email-info"><i class="fa fa-envelope" aria-hidden="true"></i> Contact@makedemous.com</li>
                    </span>
                </ul>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>

</body>

</html>



<script>
    const nameEl = document.querySelector("#name");
    const emailEl = document.querySelector("#email");
    const companyNameEl = document.querySelector("#company-name");
    const messageEl = document.querySelector("#message");

    const form = document.querySelector("#submit-form");

    function checkValidations() {
        let letters = /^[a-zA-Z\s]*$/;
        const name = nameEl.value.trim();
        const email = emailEl.value.trim();
        const companyName = companyNameEl.value.trim();
        const message = messageEl.value.trim();
        if (name === "") {
            document.querySelector(".name-error").classList.add("error");
            document.querySelector(".name-error").innerText =
                "Please fill out this field!";
        } else {
            if (!letters.test(name)) {
                document.querySelector(".name-error").classList.add("error");
                document.querySelector(".name-error").innerText =
                    "Please enter only characters!";
            } else {

            }
        }
        if (email === "") {
            document.querySelector(".name-error").classList.add("error");
            document.querySelector(".name-error").innerText =
                "Please fill out this field!";
        } else {
            if (!letters.test(name)) {
                document.querySelector(".name-error").classList.add("error");
                document.querySelector(".name-error").innerText =
                    "Please enter only characters!";
            } else {

            }
        }
    }

    function reset() {
        nameEl = "";
        emailEl = "";
        companyNameEl = "";
        messageEl = "";
        document.querySelector(".name-error").innerText = "";
    }
</script>