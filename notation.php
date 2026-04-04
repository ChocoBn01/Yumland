<?php 
    if(!isset($_COOKIE["client"])){
        header("Location: index.php");
        exit;
    }
    $client=json_decode($_COOKIE["client"], true);
    $mail=$client['email'];   
    $file=file_get_contents("donnees/data.json");
    $data=json_decode($file, true);
    $commande_data =file_get_contents("donnees/commande_passe.json");
    $commande = json_decode($commande_data, true); 
    $plat_data=file_get_contents("donnees/plat.json");
    $plat=json_decode($plat_data, true);
    if($data[$client['email']]['role']['bloque']==true){
        setcookie("client", json_encode($data[$mail]), time()-3600);  
        header("Location: index.php");
        exit;
    }
    foreach($commande[$mail] as $id => $cmd_client){
        if($cmd_client['note']['etat']==false){
            $cmd=$cmd_client;
        }
    }
    function aff_num_cmd($num){
        if($num<10){
            return "000".$num;
        }
        else if($num<100){
            return "00".$num;
        }
        else if($num<1000){
            return "0".$num;
        }
        else{
            return $num;
        }
    }
    if(!isset($cmd)){
        header("Location: index.php");
        exit;
    }
    else{
        foreach($cmd['plats'] as $idplat => $plat){
            if(isset($_REQUEST["name".str_replace(" ", "_", $idplat)])){
                $commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']=intval($_REQUEST["name".str_replace(" ", "_", $idplat)]);
            }
        }
        if(isset($_REQUEST['com'])){
            $commande[$mail][aff_num_cmd($cmd['num'])]['note']['com']=$_REQUEST['com'];
        }
        else{
            $commande[$mail][aff_num_cmd($cmd['num'])]['note']['com']="";
        }
        $all=0;
        foreach($cmd['plats'] as $idplat => $plat){
            if(!isset($commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note'])){
                $commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']=0;
                $all=1;
            }
            else if($commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']==0){
                $commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']=0;
                $all=1;
            }
            if(isset($_REQUEST["com_".str_replace(" ", "_", $idplat)])){
                $commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']['com']=$_REQUEST["com_".str_replace(" ", "_", $idplat)];
            }
            if(!isset($commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']['com'])){
                $commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note']['com']="";
                $all=1;
            }
        }
        if($all==1){
            $commande[$mail][aff_num_cmd($cmd['num'])]['note']['etat']=false;
            file_put_contents("donnees/commande_passe.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            header("Location: notation.php");
            exit;
        }
        else{
            if(isset($_REQUEST['submit_btn'])){
                $commande[$mail][aff_num_cmd($cmd['num'])]['note']['etat']=true;
                
                $somme = 0;
                $quantite = 0;
                
                foreach($cmd['plats'] as $idplat => $plat){
                    $somme+=$commande[$mail][aff_num_cmd($cmd['num'])]['plats'][$idplat]['note'];
                    $quantite++;
                }
                $commande[$mail][aff_num_cmd($cmd['num'])]['note']['note']=intval($somme/$quantite);
                
                file_put_contents("donnees/commande_passe.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                header("Location: index.php");
                exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/variables.css">
        <link rel="stylesheet" href="css/notation.css">
        <link rel="stylesheet" href="css/client.css">
        
        <title>Les Croquettes du Chef</title>
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
                <li><a href="menu.php">La carte</a></li>
                <li><a href="menu.php" class="active">Avis</a></li>
            </ul>
        </nav>
        </header>
        <div class="rect_bleu">
            <form action="" method="post" target="_top" id="formulaire_login" name="connexion">
                <img class="logo_login" src="assets/Logo projet.png" alt="logo de notre site de vente">
                <div class="Notez_votre_cmd">   
                    Notez votre commande
                </div>
                <form method="POST">
                    <?php foreach($cmd['plats'] as $idplat => $plat){ ?>
                        <div class="cmd_1">
                            <img class="img_cmd_1" src="assets/Boeuf wagyu.png" alt="image Prestige du chef">
                            <div class="cmd1_s_img">
                                <div class="l1_1">
                                    <div class="nplat_1">
                                        <?php echo $plat['name']; ?>
                                    </div>
                                    <div class="radio_1">                               
                                        <input type="radio" name="<?php echo "name".str_replace(" ", "_", $idplat); ?>" class="note_1" value="1">
                                        <label for="idnote_1_1">★</label>                                
                                        <input type="radio" name="<?php echo "name".str_replace(" ", "_", $idplat); ?>" class="note_1" value="2">
                                        <label for="idnote_1_2">★</label>                               
                                        <input type="radio" name="<?php echo "name".str_replace(" ", "_", $idplat); ?>" class="note_1" value="3">
                                        <label for="idnote_1_3">★</label>                               
                                        <input type="radio" name="<?php echo "name".str_replace(" ", "_", $idplat); ?>" class="note_1" value="4">
                                        <label for="idnote_1_4">★</label>
                                        <input type="radio" name="<?php echo "name".str_replace(" ", "_", $idplat); ?>" class="note_1" value="5">
                                        <label for="idnote_1_5">★</label>
                                    </div>
                                </div>
                                <textarea name="<?php echo "com_".str_replace(" ", "_", $idplat); ?>" class="com_1" placeholder="   Votre commentaire sur le plat"></textarea>
                            </div>
                        </div>
                    <?php } ?>
                    <textarea name="com" class="com_1" placeholder="   Votre commentaire sur la commande"></textarea>
                    <button class="avis_submit" name="submit_btn">
                        Soumettre mes avis
                    </button>
                </form>    
            </form>
        </div>
    <footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>
        
    </body>
</html>
