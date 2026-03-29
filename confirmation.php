<?php 
    $client=json_decode($_COOKIE["client"], true);
    $mail=$client['email'];   
    $file=file_get_contents("donnees/data.json");
    $data=json_decode($file, true);
    $commande_data =file_get_contents("donnees/panier_$mail.json");
    $commande = json_decode($commande_data, true); 
    $plat_data=file_get_contents("donnees/plat.json");
    $plat=json_decode($plat_data, true);
    if($data[$client['email']]['role']['bloque']==true){
        setcookie("client", json_encode($data[$mail]), time()-3600);  
        header("Location: index.php");
    }
    function aff_num_cmd_ou_fidelite($num, $cmd_ou_fidelite){
        if($cmd_ou_fidelite==1){
            if($num<10){
                echo "000".$num;
            }
            else if($num<100){
                echo "00".$num;
            }
            else if($num<1000){
                echo "0".$num;
            }
            else{
                echo $num;
            }
        }
        else{
            if($num<10){
                echo "0000000".$num;
            }
            else if($num<100){
                echo "000000".$num;
            }
            else if($num<10000){
                echo "00000".$num;
            }
            else if($num<100000){
                echo "0000".$num;
            }
            else if($num<1000000){
                echo "000".$num;
            }
            else if($num<10000000){
                echo "00".$num;
            }
            else if($num<100000000){
                echo "0".$num;
            }
            else{
                echo $num;
            }
        }
    }
?>
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
                <?php foreach($commande['plats'] as $id => $detail){ ?>
                    <div class="ligne-article">
                        <span><?php echo $plat[$id]['name']; ?> x<?php echo $commande['plats'][$id]['quantite']; ?></span>
                        <span><?php echo number_format($plat[$id]['prix'], 2, ',', ' '); ?>€</span>
                    </div>
                <?php } ?>
                <?php if($commande['reduction']==true){ ?>
                    <div class="ligne-reduction">
                        <span>Réduction coupon fidélité</span>
                        <span>-<?php echo $commande['total']/2;?></span>
                    </div>
                <?php } ?>
                <div class="ligne-total">
                    <span>Total</span>
                    <span><?php if($commande['reduction']==true){ echo number_format($commande['total']/2, 2, ',', ' ');}else{ echo number_format($commande['total'], 2, ',', ' ');} ?>€</span>
                </div>
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
