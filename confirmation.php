<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande Confirmée - Les Croquettes du Chef</title>
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/client.css">
    <link rel="stylesheet" href="css/confirmation.css">
    <link href="assets/Logo projet.png" rel="icon">
</head>
<body>
 
    <header>
        <div class="logo">
            <img src="assets/Logo projet.png" alt="Logo" class="header-logo">
            Les croquettes du chef
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="menu.php">La Carte</a></li>
                <li><a href="profil.php" class="btn">Profil</a></li>
            </ul>
        </nav>
    </header>
 
    <main>
 
        <div class="bloc-confirmation">
 
            <div class="entete-confirmation">
                <div class="icone-check">✅</div>
                <h1>Commande confirmée !</h1>
                <p>Votre paiement a été accepté. Votre commande part en cuisine dès maintenant.</p>
            </div>
 
            <div class="carte">
                <h2>Récapitulatif de commande</h2>
 
                <div class="ligne-article">
                    <span>Bœuf Wagyu Premium x2</span>
                    <span>29,98 €</span>
                </div>
                <div class="ligne-article">
                    <span>Terrine de Canard Fermier x1</span>
                    <span>12,50 €</span>
                </div>
                <div class="ligne-article">
                    <span>Croquettes Saumon & Quinoa x1</span>
                    <span>18,00 €</span>
                </div>
 
                <div class="ligne-total">
                    <span>Total payé</span>
                    <span>60,48 €</span>
                </div>
            </div>
 
            <div class="carte carte-cuisine">
                <p>👨‍🍳 Votre commande est en cuisine ! Temps estimé : <strong>15 à 20 min</strong>.</p>
            </div>
 
            <div class="carte">
                <h2>Informations</h2>
                <div class="ligne-info">
                    <span class="label-info">Numéro de commande</span>
                    <span>#00003</span>
                </div>
                <div class="ligne-info">
                    <span class="label-info">Date</span>
                    <span>29 mars 2026 — 14h32</span>
                </div>
                <div class="ligne-info">
                    <span class="label-info">Paiement</span>
                    <span>Carte bancaire ****4821</span>
                </div>
                <div class="ligne-info">
                    <span class="label-info">Adresse</span>
                    <span>12 rue des lilas, Pontoise</span>
                </div>
            </div>
 
            <div class="zone-boutons">
                <a href="index.php" class="btn-confirmation principal">Retour à l'accueil</a>
                <a href="profil.php" class="btn-confirmation secondaire">Voir mes commandes</a>
            </div>
 
        </div>
 
    </main>
 
    <footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>
 
</body>
</html>
