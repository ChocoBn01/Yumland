<?php 
    $client=json_decode($_COOKIE["client"], true);  
    $plat_data=file_get_contents("donnees/plat.json");
    $plat=json_decode($plat_data, true);
    $file=file_get_contents("donnees/data.json");
    $data=json_decode($file, true);
    if($data[$client['email']]['role']['bloque']==true){
        setcookie("client", json_encode($data[$mail]), time()-3600);  
        header("Location: index.php");
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

                <button class="btn-filtres">Appliquer les filtres</button>
            </aside>

            <div class="zone-plats">
                
                <div class="barre-recherche-menu">
                    <input type="text" placeholder="Rechercher une croquette précise...">
                    <button>🔍</button>
                </div>

                <div class="grille-plats">
                    <?php foreach($plat as $index){ ?>
                        <article class="carte-plat">
                            <div class="carte-img">
                                <img src="assets/<?php echo $index['image']; ?>" alt="<?php echo $index['name']; ?>">
                                <?php if($index['new']==true){ ?>
                                    <span class="etiquette-nouveau">Nouveau</span>
                                <?php } ?>
                            </div>
                            <div class="carte-contenu">
                                <h4><?php echo $index['name']; ?></h4>
                                <p class="description"><?php echo $index['description']; ?></p>
                                <div class="carte-footer">
                                    <span class="prix"><?php echo number_format($index['prix'], 2, ',', ' ');?>€</span>
                                    <button class="btn-carte">+</button>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Client</p>
    </footer>

</body>
</html>
