<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
   <title>Les Croquettes du Chef</title>
    
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/profil.css">
    <link rel="stylesheet" href="css/client.css">
    <link href="assets/Logo projet.png" rel="icon">
</head>
<body>

    <header>
        <div class="logo">
            <img src="assets/Logo projet.png" alt="Logo" class="header-logo" style="height: 35px;">
            Espace client
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="menu.php">La Carte</a></li>
                <li><a href="profil.php" class="active">Mon profil</a></li>
                <li><a href="index.php" class="btn">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
    <aside class="sidebar-perso">
        <div class="titre-modif">
            <h3>Mes informations</h3>
            <a href="" class="carre-crayon">✏️</a>
        </div>
        <div class="info-details">
            <p>NOM :</p>
            <p><strong>Dupont</strong></p>
            <p>PRÉNOM :</p>
            <p><strong>Maxime</strong></p>
            <p>ADRESSE :</p>
            <p><strong>12 rue des Lilas, 95300 Pontoise</strong></p>
            <p>TÉLÉPHONE :</p>
            <p><strong>06 52 83 17 95</strong></p>
            <p>INFOS COMPLÉMENTAIRES :</p>
            <p><strong>Étage : 6ème, code : 0000</strong></p>
        </div>
    </aside>

    <section class="contenu-profil">
        <h1>Mon Profil</h1>

        <div class="carte-info">
            <h3>Programme De Fidélité</h3>
            <p>
                N° de carte de fidélité :<br />
                <span class="numero-carte">600881064999</span>
            </p>
            <p>Vous avez <strong>100 points</strong></p>
            <div class="barre">
                <div class="avancee"></div>
            </div>
            <p><small>Encore 50 points avant votre prochaine box offerte !</small></p>
        </div>
                <div class="carte-info">
                    <h3>Anciennes commandes 🛍️</h3>
                        <div class="commande">
                        <div class="numero">
                            <strong>Commande n°8542</strong>
                            <a href="" class="bouton-recommande" >Recommander</a>
                        </div>
                                <p>Croc' Poulet Fermier - 12.50€</p>
                        </div>

                        <div class="commande">
                        <div class="numero">
                            <strong>Commande n°8003</strong>
                            <a href="" class="bouton-recommande" >Recommander</a>
                        </div>
                                <p>Os à macher - 3.50€</p>
                        </div>

                        <div class="commande derniere-ligne">
                            <div class="numero">
                                <strong>Commande n°7910</strong>
                                <a href="" class="bouton-recommande" >Recommander</a>
                            </div>
                                <p>Le Prestige du Chef - 24.90€</p>
                            </div>
                        </div>
    </section>
    
</main>
<footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>
    
    
</body>
</html>

