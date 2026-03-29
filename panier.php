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
    function conjugaison($sing, $plur, $val){
        if($val==1){
            return $sing;
        }
        else{
            return $plur;
        }
    }
    
    foreach($commande['plats'] as $id => $detail){ 
        if(isset($_REQUEST['btn_suppr_'.str_replace(" ", "_", $id)])){
            $commande['total']=$commande['total']-$detail['prix'];
            unset($commande['plats'][$id]);
            file_put_contents("donnees/panier_$mail.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: panier.php");
            exit;
        }
        else if(isset($_REQUEST['btn_plus_'.str_replace(" ", "_", $id)])){
            $commande['total']=round($commande['total'] + $detail['prix'], 2);;
            $commande['plats'][$id]['quantite']++;
            file_put_contents("donnees/panier_$mail.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: panier.php");
            exit;
        }
        else if($detail['quantite']>1){
            if(isset($_REQUEST['btn_moins_'.str_replace(" ", "_", $id)])){
                $commande['total']=round($commande['total'] + $detail['prix'], 2);;
                $commande['plats'][$id]['quantite']--;
                file_put_contents("donnees/panier_$mail.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                header("Location: panier.php");
                exit;
            }
        }
    }   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title>Les Croquettes du Chef</title>
    
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/panier.css">
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
                <li><a href="menu.php">La Carte</a></li>
                <li><a href="profil.php" class="active">Mon profil</a></li>
                <li><a href="profil.php" class="btn">Profil</a></li>
            </ul>
        </nav>
    </header>
    <h1>Mon Panier</h1>
    <main class="container">
    <div class="diff_part">
        <section class="contenu-profil">
            <?php foreach($commande['plats'] as $id => $detail){ ?>
                <div class="carte-info">
                    <img class="img_cmd" src="assets/<?php echo $plat[$id]['image']; ?>" alt="<?php echo $detail['name']; ?>">
                    <div class="clm_1">
                        <h2 class="name"><?php echo $plat[$id]['name'];?></h2>
                        <p class="name"><small><?php if($plat[$id]['name']=="Os à mâcher Bio"){ echo conjugaison("Friandise", "Friandises", $detail['quantite'])." pour tous chiens";}else if($plat[$id]['age']['junior']==true){ echo conjugaison("Plat", "Plats", $detail['quantite'])." pour chiots";}else if($plat[$id]['age']['senior']==true){ echo conjugaison("Friandise", "Friandises", $detail['quantite'])." pour tous chiens";}else if($plat[$id]['age']['junior']==true){ echo conjugaison("Plat", "Plats", $detail['quantite'])." pour chiens seniors";}else{ echo conjugaison("Plat", "Plats", $detail['quantite'])." pour chien adultes";} ?></small></p>
                    </div>
                    <div class="clm_2">
                        <p class=prix><?php echo number_format($detail['quantite']*$plat[$id]['prix'], 2, ',', ' ');?>€</p>
                        <form>   
                            <?php if($detail['quantite']==1){ ?>
                                <div class="gestion_quantite">
                                    <button name="btn_suppr_<?php echo str_replace(" ", "_", $id); ?>" class="btn-carte"><small>🗑️</small></button>
                                    <p class=""> <?php echo $detail['quantite']; ?> </p>
                                    <button name="btn_plus_<?php echo str_replace(" ", "_", $id); ?>" class="btn-carte">+</button>
                                </div>                        
                            <?php }else{ ?>                    
                                <div class="gestion_quantite">
                                    <button name="btn_moins_<?php echo str_replace(" ", "_", $id); ?>" class="btn-carte">-</button>
                                    <p class=""><strong><?php echo $detail['quantite']; ?></strong></p>
                                    <button name="btn_plus_<?php echo str_replace(" ", "_", $id); ?>" class="btn-carte">+</button>
                                </div>                        
                            <?php } ?>
                        </form>
                    </div>    
                </div>
            <?php } ?>       
        </section>
        <div class="recapitulatif">
            <h2>Récapitulatif</h2>
            <?php foreach($commande['plats'] as $id => $detail){ ?>
                <div class="commande">
                    <p><?php echo $detail['name']."  x".$detail['quantite']; ?></p>
                    <p class="prix_recap"><?php echo number_format($detail['quantite']*$plat[$id]['prix'], 2, ',', ' '); ?>€</p>
                </div>
            <?php } ?>
            <div class="commande_total">
                    <p><strong>TOTAL</strong></p>
                    <p class="prix_recap"><strong><?php echo number_format($commande['total'], 2, ',', ' '); ?>€</strong></p>
            </div>
            <a href="" class="bouton-recommande">Payement</a>
        </div>
    </div>
</main>
<footer>
    <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
</footer>
</body>
</html>

