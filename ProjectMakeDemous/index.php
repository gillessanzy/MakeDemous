<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="RESSOURCES/css/img/400-px-twitter.jpg">
    <link rel="stylesheet" href="RESSOURCES/css/cookie.css">
    <title>Make Demous</title>
</head>

<body>


    <!-------------------------------- SECTION VIDEO ------------------------->
    <section class="presentation_video">
        <video autoplay loop muted>
            <source src="RESSOURCES\css\video\quickunpack_1.mp4" type="video/mp4">
        </video>
    </section>
    <!-- BAR DE NAVIGATION -->
    <?php include 'navbar.php' ?>

    <!-------------------------------- SECTION PRESENTATION ------------------------->
    <section class="presentation">
        <h1 class="presentation_titre">la nouvelle solution de découpe </h1>
        <div class="presentation_colonnes">
            <p class="presentation_text">Avec <span class="blue_highlight">Quick Unpack</span>, évitez les <span
                    class="red_highlight">accidents</span> et les <span class="red_highlight">pertes de temps</span> au
                travail grâce à
                une lame de cutter directement fixée au doigt.
                C’est donc un produit <span class="blue_highlight">unique</span> et <span
                    class="blue_highlight">innovant</span> que vous pouvez uniquement trouver chez <span
                    class="blue_highlight">Make Demous</span>.</p>
            <ul class="avantages">
                <li>Facile à porter</li>
                <li>confortable </li>
                <li>innovant</li>
                <li>rapide</li>
                <li>efficace</li>
                <li>Et surtout breveté, et donc unique !</li>
            </ul>
        </div>

    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 200 1440 88">
        <path fill="#0099ff" fill-opacity="1"
            d="M0,288L120,266.7C240,245,480,203,720,202.7C960,203,1200,245,1320,266.7L1440,288L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z">
        </path>
    </svg>
    <!------------------------------ SECTION SPECIFICATIONS ----------------------->
    <section id='first_section' class="quick_unpack_specs">
        <img src="RESSOURCES\css\img\quick_unpack_specs.png" alt="spécification du Quick Unpack">
    </section>
    <!-------------------------------- SECTION TOUT SUR LE QUICK UNPACK ------------------------->
    <svg style="transform: scaleY(-1);" xmlns="http://www.w3.org/2000/svg" viewBox="0 200 1440 88">
        <path fill="#0099ff" fill-opacity="1"
            d="M0,288L120,266.7C240,245,480,203,720,202.7C960,203,1200,245,1320,266.7L1440,288L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z">
        </path>
    </svg>
    <section class="tout_sur_le_quick_unpack">
        <h1 class="">tout sur le quick unpack </h1>
        <div class="">
            <p class="">Le Quick Unpack à été conçu dans le but d’augmenter l'efficacité des travailleurs de
                la distribution, livraison, et tous les métiers où il est nécessaire de découper des emballages. Une
                lame incorporée à l'index sera disponible avec le gant et peut être activée en la poussant vers l'avant
                avec le pouce. Cette lame peut ensuite être utilisée pour ouvrir un emballage. Une fois relâché, le
                système automatique se rétracte, ce qui le rend plus sécurisé.
                Ils se présentent également sous deux autres formats, l'un intégré sur un gant et l'autre qui peut être
                glis
                sé et utilisé sur un gant existant..
            </p>
            <img src="RESSOURCES/css/img/tout_sur_le_quick_unpack.png" alt="">
            <p>Ainsi, Quick Unpack évite tout accident lié à l’utilisation du cutter, tout en représentant un gain de
                temps considérable. Fini les cutters que l’on perd dans un tiroir, ou les coupures douloureuses !</p>
        </div>

    </section>
    <!-------------------------------- SECTION button ------------------------->
    <section class="button">
        <a class="btn decourvrir" href="/magasin.php">Découvrir nos produits</a>
    </section>
    <!-------------------------------- SECTION ILLUSTRATIONS ------------------------->
    <section class="illustrations">
        <div class="illustrations">
            <div class="ill deplacer">
                <img src="RESSOURCES\css\img\deplacer.svg" alt="">
                <p>Déplacer des éléments sans poser son outil de coupe</p>
            </div>
            <div class="ill productivite">
                <img src="RESSOURCES\css\img\productivite.svg" alt="">
                <p>Augmenter l’efficacité et la productivité</p>
            </div>
            <div class="ill leger">
                <img src="RESSOURCES\css\img\facile.svg" alt="">
                <p>Léger et facile à utiliser</p>
            </div>
        </div>
    </section>

    <!-------------------------------- SECTION MESSAGE ------------------------->
    <section class="message">
        <h1 class="">Êtes-vous une entreprise, un détaillant ou un distributeur?</h1>
        <div class="container_message">
            <div class="message_text">
                <p>Avec Quick Unpack, Make Demous souhaite s’adresser aux professionnels afin d’éviter les blessures
                    avec
                    les outils de découpe, et les pertes d’outils qui ralentissent votre productivité.</p>


                <h2>Option de personnalisation</h2>
                <p>Il est possible pour les entreprises de personnaliser le Quick Unpack pour leurs employés en
                    imprimant le
                    logo de leur entreprise sur le produit.</p>

            </div>
            <div class="contact">
                <h2>Contactez-nous</h2>
                <p>Pour nous contacter, merci d'utiliser le <a href="">formulaire de contact</a> ou l'email ci-dessous.
                </p>
                <h3>Make Demous</h3>
                <p>contact@makedemous.com</p>
            </div>
        </div>
    </section>
    <style>

    </style>

    <!----- COOKIE CONSENT BOX ------->

    <div class="wrapper">
    <img src="RESSOURCES/css/img/cookie.png" alt="">
    <div class="content">
      <header>Cookies Consent</header>
      <p>This website use cookies to ensure you get the best experience on our website.</p>
      <div class="buttons">
        <button class="item">I understand</button>
        <a href="#" class="item">Learn more</a>
      </div>
    </div>
  </div>

  <script>
    const cookieBox = document.querySelector(".wrapper"),
    acceptBtn = cookieBox.querySelector("button");

    acceptBtn.onclick = ()=>{
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "CookieBy=CodingNepal; max-age="+60*60*24*30;
      if(document.cookie){ //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      }else{ //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=CodingNepal"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
  </script>


    <!-- FOOTER -->

    <?php include 'footer.php' ?>
</body>

</html>



<script>
let navbar = document.getElementById("main-nav");
let first_section = document.getElementById("first_section");
let navPos = first_section.getBoundingClientRect().top;

window.addEventListener("scroll", e => {
    let scrollPos = window.scrollY;
    if (scrollPos > navPos) {
        navbar.classList.add('sticky');
        header.classList.add('navbarOffsetMargin');
    } else {
        navbar.classList.remove('sticky');
        header.classList.remove('navbarOffsetMargin');
    }
});
</script>