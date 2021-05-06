<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./ressources/css/style.css">
    <title>Exo Mvc PHP</title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.php">
                <img src="./ressources/img/logo.png" alt="logo">
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <li>
                    <a href="index.php?controller=movie">Films</a>
                </li>
                
                <li>
                    <a href="index.php?controller=user">Utilisateurs</a>
                </li>

                <?php if(!isset($_SESSION['user'])) :?>
                    <li>
                        <a href="index.php?controller=user&action=connect">Se connecter</a>
                    </li>
                <?php elseif(isset($_SESSION['user'])) :?>
                    <li>
                        <a href="index.php?controller=user&action=disconnect">Déconnexion</a>
                    </li>
                <?php endif ;?>
            </ul>
        </nav>
    </header>
