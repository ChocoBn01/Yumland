<?php 
    error_reporting(0);
    $client=json_decode($_COOKIE["client"], true);  
    $mail=$client['email'];  
    $plat_data=file_get_contents("donnees/plat.json");
    $plat=json_decode($plat_data, true);
    $file=file_get_contents("donnees/data.json");
    $data=json_decode($file, true);
    if($data[$client['email']]['role']['bloque']==true){
        setcookie("client", json_encode($data[$mail]), time()-3600);  
        header("Location: index.php");
    }
    if(isset($_COOKIE["client"])){ 
        $commande_data =file_get_contents("donnees/panier_$mail.json");
        $commande = json_decode($commande_data, true); 
        foreach($plat as $index => $detail){
            if(isset($_REQUEST['btn_plus_'.str_replace(" ", "_", $index)])){
                $commande['total']=round($commande['total'] + $detail['prix'], 2);
                if(isset($commande['plats'][$index])){
                    $commande['plats'][$index]['quantite']++;
                }
                else{
                    $commande['plats'][$index]['quantite']=1;
                    $commande['plats'][$index]['prix']=$detail['prix'];
                    $commande['plats'][$index]['name']=$detail['name'];
                }
                file_put_contents("donnees/panier_$mail.json", json_encode($commande, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                header("Location: menu.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Carte - Les Croquettes du Chef</title>
    
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/client.css">
    <link rel="stylesheet" href="css/accueil.css"> <link rel="stylesheet" href="css/menu.css">   
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
                <li><a href="menu.php" class="active">La Carte</a></li>
                <li><a href="panier.php">🛒</a></li>
                <li>
                    <a href="<?php if(isset($_COOKIE["client"])){ echo "profil.php"; } else{ echo "login.php"; }  ?>" class="btn">
                        <?php  
                            if(isset($_COOKIE["client"])){
                                echo "Profil";
                            }
                            else{
                                echo "Connexion";
                            }
                        ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="banniere-menu">
            <h1>Notre Carte <span class="text-primary">Gourmande</span> 🦴</h1>
            <p>Sélectionnez le meilleur pour sa santé : sans céréales, frais et équilibré.</p>
        </section>

        <section class="conteneur-menu">
            
            <aside class="colonne-filtres">
                <div class="groupe-filtres">
                    <h3>🐕 Âge</h3>
                    <label><input type="checkbox" name="junior" checked> Chiots (Junior)</label>
                    <label><input type="checkbox" name="adulte" checked> Adultes</label>
                    <label><input type="checkbox" name="senior" checked> Seniors</label>
                </div>

                <div class="groupe-filtres">
                    <h3>🥩 Saveurs</h3>
                    <label><input type="checkbox" name="volaille" checked> Volaille</label>
                    <label><input type="checkbox" name="boeuf/gibier" checked> Bœuf / Gibier</label>
                    <label><input type="checkbox" name="poisson" checked> Poisson</label>
                    <label><input type="checkbox" name="veggie" checked> Végétarien</label>
                </div>

                <div class="groupe-filtres">
                    <h3>⚠️ Spécifique</h3>
                    <label><input type="checkbox" name="sans cereale" checked> Sans Céréales</label>
                    <label><input type="checkbox" name="hypoallergenique" checked> Hypoallergénique</label>
                    <label><input type="checkbox" name="digestion sensible" checked> Digestion Sensible</label>
                </div>

                <div class="groupe-filtres">
                    <h3>🛒 Pack</h3>
                    <label><input type="checkbox" name="pack" checked> Pack</label>
                    <label><input type="checkbox" name="produit_unique" checked> Produit Unique</label>
                </div>

                <button class="btn-filtres">Appliquer les filtres</button>
            </aside>

            <div class="zone-plats">
                
                <div class="barre-recherche-menu">
                    <input type="text" placeholder="Rechercher une croquette précise...">
                    <button>🔍</button>
                </div>
                <form method="POST" action="menu.php">
                    <div class="grille-plats">
                        <?php foreach($plat as $index=>$detail){ ?>
                            <article class="carte-plat">
                                <div class="carte-img">
                                    <img src="assets/<?php echo $detail['image']; ?>" alt="<?php echo $detail['name']; ?>">
                                    <?php if($detail['new']==true){ ?>
                                        <span class="etiquette-nouveau">Nouveau</span>
                                    <?php } ?>
                                </div>
                                <div class="carte-contenu">
                                    <h4><?php echo $detail['name']; ?></h4>
                                    <p class="description"><?php echo $detail['description']; ?></p>
                                    <div class="carte-footer">
                                        <span class="prix"><?php echo number_format($detail['prix'], 2, ',', ' ');?>€</span>
                                        <button name="btn_plus_<?php echo str_replace(" ", "_", $index); ?>" class="btn-carte">+</button>
                                    </div>
                                </div>
                            </article>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>

</body>
</html>
