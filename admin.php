<?php 
    $client=json_decode($_COOKIE["client"], true);   
    $file=file_get_contents("donnees/data.json");
    $data=json_decode($file, true);
    $file_pers_supp="donnees/supprime.json";
    if($data[$client['email']]['role']['bloque']==true){
        setcookie("client", json_encode($data[$mail]), time()-3600);  
        header("Location: index.php");
    }
    function aff_role($client){
        if($client['role']['bloque']==true){
            echo "BLOQUE";
        }
        else if($client['role']['livreur']==true){
            echo "Livreur";
            if($client['role']['admin']==true){
                echo "&Admin";
            }
            if($client['role']['restaurateur']==true){
                echo "&Restaurateur";
            }
        }
        else if(($client['role']['admin']==true)){
            echo "Admin";
            if($client['role']['livreur']==true){
                echo "&Livreur";
            }
            if($client['role']['restaurateur']==true){
                echo "&Restaurateur";
            }
        }
        else if(($client['role']['restaurateur']==true)){
            echo "Restaurateur";
            if($client['role']['admin']==true){
                echo "&Admin";
            }
            if($client['role']['livreur']==true){
                echo "&Livreur";
            }
        }
        else{
            echo "Client";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Croquettes du Chef</title>
    
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/client.css">
    <link href="assets/Logo projet.png" rel="icon">
</head>

<body>

<header>
        <div class="logo">
            <img src="assets/Logo projet.png" alt="Logo" class="header-logo" style="height: 35px;">
            Espace Administrateur 
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="menu.php">La Carte</a></li>
                <li><a href="admin.php" class="active">Admin</a></li>
                <li><a href="<?php if(isset($_COOKIE["client"])){ echo "profil.php"; } else{ echo "login.php"; }  ?>" class="btn">
                        <?php  
                            if(isset($_COOKIE["client"])){
                                echo "Profil";
                            }
                            else{
                                echo "Connexion";
                            }
                        ?>
                    </a></li>
            </ul>
        </nav>
</header>

<section class="titre-admin">
    <h1>Utilisateurs</h1>

    <div class="filtres-admin">
        <label for="filtres-choix">Filtrer :</label>
        <select name="type-utilisateur" id="filtres-choix">
            <option value="tous">Tous</option>
            <option value="clients">Tous les clients</option>
            <option value="commandes">Clients ayant déjà commandé</option>
            <option value="livreurs">Livreurs</option>
            <option value="administrateurs">Administrateurs</option>
        </select>
    </div>
</section>


<main>
<table border="1">
    <tr>
        <th>Email</th><th>Nom</th><th>Rôle</th><th>Actions</th>
    </tr>
    <?php foreach($data as $pers){ ?>
    <tr>
        <td><?php echo $pers['email'] ?></td><td><?php echo $pers['name']." ".$pers['fname'] ?></td><td><?php aff_role($pers) ?></td><td><p><a href="">Aller sur le profil</a></p><p><a href="">Bloquer</a></p><p><a href="">Passer en restaurateur</a></p><p><a href="">Passer en admin</a></p><p><a href="">Passer en livreur</a></p><p><a href="">Supprimer</a></p></td>
    </tr>
        <?php } ?>
</table>
</main>

<footer>
        <p>&copy; 2026 Les Croquettes du Chef - Espace Pro</p>
</footer>

</body>

</html>

