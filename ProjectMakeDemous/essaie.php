<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RESSOURCES/css/newsletter.css">
    <title>essaie</title>
</head>

<body>
    <style>
        body {
            background-color: white
        }
    </style>

 <div class="popup" >
            <form action="/action_page.php" class="contenant">
                <h1>S'inscrire à la newlester</h1>

                <label for="email"><b>Nom</b></label>
                <input type="text" placeholder="Entrer nom" name="nom" required>

                <label for="psw"><b>Email</b></label>
                <input type="text" placeholder="Entrer mail" name="email" required>

                <label>
                <input type="checkbox" checked="checked" name="subscribe"> Daily Newsletter
                </label>

                <button onclick=Clicked() type="submit" class="btn" name="btn-submit">S'inscrire</button>
                <script> 
                    const btn = document.getElementsByName('btn-submit')
                    function Clicked(){
                        var nom = document.getElementByName("nom").value;
                        var email = document.getElementByName("email").value;
                        alert("Votre demande a bien été prise en compte ;)")


                    }                                      
                </script>
                <button type="button" class="cancel" onclick="closeForm()">Close</button>
            </form>
        


</body>
</html>