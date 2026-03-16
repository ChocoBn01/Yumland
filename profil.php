<?php 
    $client=json_decode($_COOKIE["client"], true);   
    $commande_data =file_get_contents("commande.json");
    $commande = json_decode($commande_data, true); 
?>
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
                <?php if(isset($client['role']['restaurateur']) && $client['role']['restaurateur'] == true){ ?>
                    <li><a href="commandes.php">Commande</a></li>
                <?php } ?>
                <?php if(isset($client['role']['livreur']) && $client['role']['livreur'] == true){ ?>
                    <li><a href="livraisons.php">Livraison</a></li>
                <?php } ?>
                <?php if(isset($client['role']['admin']) && $client['role']['admin'] == true){ ?>
                    <li><a href="admin.php">Administration</a></li>
                <?php } ?>
                <li><a href="menu.php">La Carte</a></li>
                <li><a href="profil.php" class="active">Mon profil</a></li>
                <li><a href="logout.php" class="btn">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
    <aside class="sidebar-perso">
        <div class="titre-modif">
            <h3>Mes informations</h3>
            <a href="modification.php" class="carre-crayon">✏️</a>
        </div>
        <div class="info-details">
            <p>NOM :</p>
            <p><strong><?php echo $client['fname']; ?></strong></p>
            <p>PRÉNOM :</p>
            <p><strong><?php echo $client['name']; ?></strong></p>
            <p>ADRESSE :</p>
            <p><strong><?php echo $client['adr']; ?></strong></p>
            <p>TÉLÉPHONE :</p>
            <p><strong><?php echo $client['tel']; ?></strong></p>
            <?php if($client['infocomp']!=""){ ?>
                <p>INFOS COMPLÉMENTAIRES :</p>
                <p><strong><?php echo $client['infocomp']; ?></strong></p>
            <?php } ?>
        </div>
    </aside>

    <section class="contenu-profil">
        <h1>Mon Profil</h1>

        <div class="carte-info">
            <h3>Programme De Fidélité</h3>
            <p>
                N° de carte de fidélité :<br />
                <span class="numero-carte"><?php echo $client['numero_fidelite']; ?></span>
            </p>
            <p>Vous avez <strong><?php echo $client['point_fidelite']; ?> points</strong></p>
            <div class="barre">
                <div class="avancee"></div>
            </div>
            <p><small>Encore <?php echo 150-($client['point_fidelite']); ?> points avant votre prochaine box offerte !</small></p>
        </div>
                <div class="carte-info">
                    <h3>Anciennes commandes 🛍️</h3>
                        <?php 
                            $email = $client['email'];
                            if(!empty($commande[$email])){
                                foreach($commande[$email] as $id_cmd => $details){ ?>
                                    <div class="commande">
                                        <div class="numero">
                                            <strong>Commande n°<?php echo $details['num'];?> (<?php echo $details['date']; ?>)</strong>
                                            <a href="#" class="bouton-recommande">Recommander</a>
                                        </div>
                                        <?php foreach($details['plats'] as $produit){ ?>
                                            <p><?php echo $produit['nom']; ?> - <?php echo number_format($produit['prix'], 2, ',', ' '); ?>€</p>
                                        <?php } ?>
                                    </div>
                                <?php } 
                            } else { ?>
                                <div class="commande">
                                    <div class="numero">
                                        <strong><br>Vous n'avez pas encore passé de commande.</strong>
                                        <a href="menu.php" class="bouton-recommande">Commander</a>
                                    </div>
                                </div>
                            <?php } ?>
    </section>    
</main>
<footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>
    
    
</body>
</html>

