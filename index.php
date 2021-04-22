<?php
    include './gestion/connexion.php' ;

    // Accusé de reception

    if(isset($_POST['okrv']) || isset($_POST['okct']))
    {
        $nom = strip_tags($_POST['nom']);
        $destinataire = strip_tags($_POST['mail']);
        // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
        $expediteur = 'oroihtcorp@gmail.com';
        $copie = $destinataire;
        $copie_cachee = $destinataire;
        $objet = 'Merci de nous avoir contacter'; // Objet du message
        $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-type: text/html; charset=utf-8'."\n"; // l'en-tete Content-type pour le format HTML
        $headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
        $headers .= 'From: "Oroiht"<'.$expediteur.'>'."\n"; // Expediteur
        $headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
        $headers .= 'Cc: '.$copie."\n"; // Copie Cc
        $headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
        $message = '
                <div style="width: 100%; text-align: left">
                    <p><b>Ceci est un message automatisé, veuillez ne pas répondre.</b></p>
                    <p>Bonjour '.$nom.',</p>
                    <p>Merci de nous avoir contacter !</p>
                    <p>Nous apprécions votre confiance portée en nous et vous contacterons dans un proche delai.</p>
                    <p>Cordialement,</p>
                    <p>L’équipe de OROIHT.</p>
                </div>';
        // if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
        // {
        //     echo '<div id="alert" style="z-index: 100 ; font-family: Lucida ; background: white ; text-align: center ; padding: 20px ; font-size: 20px">
        //             <p>Votre message a bien été envoyé !</p><i id="close" style="position: absolute ; font-size: 25px ; top: 20px ; right: 30px" class="fas fa-times"></i>
        //           </div>';
        // }
        // else // Non envoyé
        // {
        //     echo '<p style="font-family: Lucida ; color: red ; background: white ; text-align: center ; padding: 20px ; font-size: 20px ">Votre message n\'a pas pu être envoyé !"</p><i style="position: absolute ; font-size: 25px ; color: red ; top: 20px ; right: 30px" class="fas fa-times"></i>';
        // }
    }

    if(isset($_POST['okrv'])){
        $nom = strip_tags($_POST['nom']);
        $email = strip_tags($_POST['mail']);
        $telephone = strip_tags($_POST['tel']);
        $ville = strip_tags($_POST['ville']);

        $req = $bdd->prepare("INSERT INTO rv (nom,email,telephone,ville) VALUES(?,?,?,?)");
        $req->execute(array($nom,$email,$telephone,$ville));
    }
    if(isset($_POST['okct'])){
        $nom = strip_tags($_POST['nom']);
        $societe = strip_tags($_POST['societe']);
        $telephone = strip_tags($_POST['tel']);
        $ville = strip_tags($_POST['ville']);
        $msg = strip_tags($_POST['msg']);
        $email = strip_tags($_POST['mail']);

        $reqp = $bdd->prepare("INSERT INTO contact (nom,societe,telephone,ville,email,msg) VALUES(?,?,?,?,?,?)");
        $reqp->execute(array($nom,$societe,$telephone,$ville,$email,$msg));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OROIHT est une agence de communication digitale située en plein cœur de Casablanca, qui à l’aide de son équipe d’experts, a pour principale mission la satisfaction de ses clients à travers l’accompagnement vers la réalisation de leurs objectifs et attentes d’être leader dans leurs domaines respectifs.">
    <meta name="keywords" content="création de site web,agence web au sénégal,création de site ecommerce">
    <title>Agence Web à Casablanca</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.2-web/css/all.css">
</head>
<body>
    <!-- En-tete -->
    <header>
        <section class="top">
            <div>
                <p>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-whatsapp"></i>
                </p>
                <p>des questions ? appelez-nous au 06 56 71 65 30 / 07 07 76 34 09</p>
            </div>
        </section>
        <section class="menu">
            <div class="logo">
                <img src="images/Oroiht Digital.gif" alt="logo Oroiht">
            </div>
            <input type="checkbox" name="" id="check">
            <label for="check"><i class="fas fa-bars"></i></label>
            <ul class="options">
                <li><a href="#apropos">Qui sommes-nous</a></li>
                <li><a href="#service">services</a></li>
                <li><a href="#rv">Rendez-vous</a></li>
                <li><a href="#seo">SEO</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </section>
        <section class="banner">
            <div>
                <h1>Courronnez la Technologie</h1>
                <p>Qualité - Fiabilité - Confidentialité</p>
            </div>
        </section>
    </header>

    <!-- Contenu principal -->
    <main>
        <section id="apropos">
            <h2>A propos de notre agence digitale</h2>
            <div class="description">
                <div><img src="images/Oroiht Digital.gif" alt="logo de Oroiht"></div>
                <div>
                    <p><b>OROIHT</b> est une agence de communication digitale située en plein cœur de Casablanca, qui à l’aide de son équipe d’experts, a pour principale mission la satisfaction de ses clients à travers l’accompagnement vers la réalisation de leurs objectifs et attentes d’être leader dans leurs domaines respectifs.</p>
                    <p>Elle s’efforce tous les jours à s’innover afin de répondre au mieux à l’évolution constante du marché, et de ce fait, fournir les meilleures prestations à des prix concurrentiels. Ceci lui permet d’établir un lien de confiance avec ses clients et de pérenniser les relations avec eux.</p>
                </div>
            </div>
        </section>
        <section id="service">
            <i class="fas fa-laptop-code"></i>
            <h2>Nos Services</h2>
                <div class="services">
                    <div class="bloc">
                        <h3>Site Vitrine</h3>
                        <div class="description">
                            <ul>
                                <li><i class="fas fa-check"></i>Jusqu’à 5 pages + page de contact</li>
                                <li><i class="fas fa-check"></i>Hébergement et nom de domaine offert *</li>
                                <li><i class="fas fa-check"></i>Adresses de messagerie professionnelles</li>
                                <li><i class="fas fa-check"></i>Affichage responsive</li>
                            </ul>
                            <button id="prix">A seulement : 2500 DH HT</button>
                        </div>
                    </div>
                    <div class="bloc">
                        <h3>Site Premium</h3>
                        <div class="description">
                            <ul>
                                <li><i class="fas fa-check"></i>Jusqu’à 15 pages + page de contact</li>
                                <li><i class="fas fa-check"></i>Hébergement et nom de domaine offert *</li>
                                <li><i class="fas fa-check"></i>Adresses de messagerie professionnelles</li>
                                <li><i class="fas fa-check"></i>Affichage responsive</li>
                            </ul>
                            <button id="prix">A seulement : 4500 DH HT</button>
                        </div>
                    </div>
                    <div class="bloc">
                        <h3>Site E-commerce</h3>
                        <div class="description">
                            <ul>
                                <li><i class="fas fa-check"></i>Pages et produits illimités</li>
                                <li><i class="fas fa-check"></i>Hébergement et nom de domaine offert *</li>
                                <li><i class="fas fa-check"></i>Adresses de messagerie professionnelles</li>
                                <li><i class="fas fa-check"></i>Affichage responsive</li>
                            </ul>
                            <button id="prix">Sur demande</button>
                        </div>
                    </div>
                    <div class="bloc">
                        <h3>Immobilière</h3>
                        <div class="description">
                            <ul>
                                <li><i class="fas fa-check"></i>Pages et biens illimités</li>
                                <li><i class="fas fa-check"></i>Hébergement et nom de domaine offert *</li>
                                <li><i class="fas fa-check"></i>Adresses de messagerie professionnelles</li>
                                <li><i class="fas fa-check"></i>Affichage responsive</li>
                            </ul>
                            <button id="prix">A seulement : 7500 DH HT</button>
                        </div>
                    </div>
                </div>
        </section>
        <section id="avantage">
            <h2>Pourquoi faire appel à notre agence web ?</h2>
            <div class="avantages">
                <div class="av1">
                    <img src="./icones/qualite.png" alt="">
                    <h3>QUALITÉ</h3>
                    <p>Les méthodes selon lesquelles nous opérons sont conformes aux normes internationales.</p>
                </div>
                <div class="av2">
                    <img src="./icones/FIABILITE.png" alt="">
                    <h3>FIABILITÉ</h3>
                    <p>Le contenu édité par notre agence web est dénué des pratiques de «duplicate content».</p>
                </div>
                <div class="av3">
                    <img src="./icones/confidentialite.png" alt="">
                    <h3>CONFIDENTIALITÉ</h3>
                    <p>Vos données personnelles ne seront nullement divulguées, elles seront cryptées à l’issue de la saisie.</p>
                </div>
                <div class="av4">
                    <img src="./icones/Professionnalisme.png" alt="">
                    <h3>PROFESSIONNALISME</h3>
                    <p>Nous vous assurons des prestations de haute qualité grâce à notre équipe d’experts.</p>
                </div>
                <div class="av5">
                    <img src="./icones/reacrivite.png" alt="">
                    <h3>RÉACTIVITÉ</h3>
                    <p>Nous restons à votre écoute et nous répondons à vos demandes en un temps record.</p>
                </div>
                <div class="av6">
                    <img src="./icones/livraison.png" alt="">
                    <h3>LIVRAISON</h3>
                    <p>Parce que nous respectons votre métier, nous nous tenons à un temps de livraison rapide</p>
                </div>
                <div class="av7">
                    <img src="./icones/supportg.png" alt="">
                    <h3>SUPPORT</h3>
                    <p>Les professionnels de notre agence web vous garantissent un support technique des plus complets et efficaces</p>
                </div>
            </div>
        </section>
        <section id="rv">
            <div>
                <h2>Prise de rendez-vous</h2>
                <h3>Vous êtes un professionnel, vous manquez certainement de temps. Pas de souci, notre agence de communication se charge de vous contacter dans les meilleurs délais</h3>
            </div>
            <div>
                <form action="#" method="POST">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="email" name="mail" placeholder="Email" required>
                    <input type="tel" name="tel" placeholder="téléphone" required>
                    <input type="text" name="ville" placeholder="ville" required>
                    <button type="submit" name="okrv">Valider</button>
                </form>
            </div>
        </section>
        <section id="seo">
            <div>
                <h2>Le référencement naturel, le chemin du succès</h2>
                <h4>Le référencement naturel est l’ingrédient principal à la réussite de tout site web</h4>
                <p>La création de site web sous toutes ses formes, vise à rendre nos produits et services accessibles aux internautes. Le référencement naturel, étant la règle du jeu par lequel passe la création des sites web afin d’optimiser leur lisibilité sur la proposition de résultats des moteurs de recherche, avoir un contenu riche en mots-clés avec une organisation et configuration parfaites, maximisera l’apparition de votre site web en recherchant une information qui va dans le sens de votre activité.</p>
            </div>
            <div>
                <img src="./images/11.png" alt="seo1">
            </div>
        </section>
        <section id="contact">
            <div>
                <h2>Contactez-nous</h2>
                <h3>Nous vous prions de bien remplir le formulaire ci-dessous. Nous reviendrons vers vous dans les 24 heures qui suiven</h3>
            </div>
            <form action="#" method="POST">
               <div class="collapse">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="text" name="societe" placeholder="Société" required>
               </div>
                <div class="collapse">
                    <input type="tel" name="tel" placeholder="Téléphone" required>
                    <input type="text" name="ville" placeholder="Ville" required>
                </div>
                <div class="collapse mail"><input type="email" name="mail" placeholder="Email" required></div>
                <div class="collapse msg">
                    <label for="msg">Votre message</label>
                    <textarea name="msg" id="msg" cols="30" rows="5" required></textarea>
                </div>
                <div class="collapse"><button type="submit" name="okct">Contactez-nous</button></div>
            </form>
        </section>
        <section id="realisations">
            <h2>Nos réalisations</h2>
            <div id="carousel">
                <div class="carousel">
                    <div class="carousel_images">
                    </div>
                </div>
                <div class="navigation">
                    <button id="previous"><</button>
                    <button id="next">></button>
                </div>
            </div>
        </section>
        <div class="scroll"><i class="fas fa-arrow-up"></i></div>
    </main>

    <footer>
        <h2>Avez-vous des questions? Merci de nous contacter.</h2>
        <section>
            <div>
                <h3>Telephone</h3>
                <span>05 55 44 33 44</span>
                <span>05 55 44 33 44</span>
            </div>
            <div>
                <h3>Email</h3>
                <span>Oroihtcorp@gmail.com</span>
            </div>
            <div>
                <h3>Horaires</h3>
                <span>Lundi - Vendredi</span>
                <span>09H - 14H</span>
                <span>15H - 20H</span>
            </div>
            <div>
                <h3>Adresse</h3>
                <span>Casablanca, Sidi Maarouf</span>
                <span>Boulevard Hassan II</span>
            </div>
        </section>
        <p class="icones">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-whatsapp"></i>
        </p>
        <p>Copyright 2021 - Tous droits réservés</p>
        
            <?php
            if(isset($_POST['okrv']) || isset($_POST['okct'])){
                if(mail($destinataire, $objet, $message, $headers)) // Envoi du message
                {
                    echo '<div id="alerte"><p id="valid">Votre message a bien été envoyé !<i id="close" class="fas fa-times"></i></p></div>';
                }
                // else // Non envoyé
                // {
                //     echo '<p id="invalid">Votre message n\'a pas pu être envoyé !"<i id="close" class="fas fa-times"></i></p>';
                // }
            }
            ?>
        
    </footer>

    <script src="./js/main.js"></script>
</body>
</html>