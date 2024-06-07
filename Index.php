<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Visites Médicales - Université de Ngaoundéré</title>
    
    <!-- Ajoutez vos scripts JavaScript ici -->
    <style>
        .body {background-image: url("main.jpg"); padding: 0px; margin: 15px;}
        .menu {background: #55b7c8; font-size: 45px; line-height: 0px; padding: 35px 0px 25px 200px; border-radius: 0px; box-shadow: 0 3px 1px black; position: relative;}
        .dd {background: #55b7c8; text-align: right; padding: 20px;}
        .logo {background-image: url("logo.png.jpeg"); width: 100px; padding-top: 200px; margin: top 250px; height: 0px; width: 201px;}
        .id {text-align: center; margin-top: -165px;}
        .footer {background-color: black; color: white; text-align: center; padding: 15px;}
        .title {background-color: #4bc0d4; padding: 5px;}
        .home {padding: 35px 0px 25px -1200px;}
        /* Dropdown container */
        .dropdown {display: inline-block;}
        /* Dropdown content (hidden by default) */
        .dropdown-content {display: none;position: absolute;min-width: 00px;box-shadow: 0 3px 1px black;z-index: 1;}
        /* Links inside the dropdown */
        .dropdown-content a { padding: 20px 16px;text-decoration: none;display: block;}
        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #ddd;}
        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {  display: block;}
        /* Common style for dropdown items */
        .dropdown-item { color: black; padding: 12px 16px; text-decoration: none; display: block;}
        .dropdown-item:hover {background-color: #ddd;}
        .img{position: relative;width: 100%;height: 70vh;overflow: hidden;}
     
    </style>
</head>
<body class="body">
    <div>
        <div class="dd">
            <i class="" id="">Choisir une langue</i>
            <select name="" id="">
                <option value="">French</option>
                <option value="">English</option>
            </select>
            <form action="">
                <input type="text" size="15" maxlength="128" class="form-search" placeholder="Recherche">
                <button type="submit"></span>Rechercher</button>
            </form>
        </div>
        <div class="logo"></div>
        <div class="id">
            <h1>Université de Ngaoundéré</h1>
            <h2>Science - Sagesse - Service</h2>
        </div>
        
        <ul class="menu">
            <div class="home"><a href="Accueil.html"><img src="home.png" alt=""></a></div>
            <a href="A Propos.html">A Propos</a>
            <a href="contact.html">Contact</a>
            <div class="dropdown">
                <a href="" class="dropbtn">se connecter</a>
                <div class="dropdown-content">
                    <a href="formulaire.php" class="dropdown-item">en tant que médecin</a>
                    <a href="formulaire.php" class="dropdown-item">en tant qu'administrateur</a>
                    <a href="Autre.html" class="dropdown-item">Autre</a>
                </div>
            </div>
            <span>Suivez-nous sur:</span>
        </ul>
        <img class="img" src="Capture.PNG" alt="">
        <h1 class="title">Centre Medico-Social</h1>
        <div>
            <p>Le Centre Médico-Social de l’Université de Ngaoundéré posséde un service de santé et un service de l’action sociale<br> Il a comme mission:</p>
            <ul>
                <li>Prospection médicale des étudiants dans le but de dépister les affections médicales et les troubles de la santé.</li>
                <li>Surveillance sanitaire.</li>
                <li>Hygiène et salubrité du campus.</li>
                <li>Action sociale.</li>
                <li>Cellule d’écoute.</li>
            </ul>
            <h1 class="title">Missions</h1>
            <ul>
                <h2><p><span>Une équipe pluridisciplinair,constituée de Médecins, Infirmiers, laborantins, Kinésithérapeute, Assistants Sociaux… vous accueille, vous écoute, vous informe et vous oriente sur:</p></h2>
                <button class="btn-1">
                    <h1><a href="Prise de RV.php">CLIQUEZ ICI POUR PRENDRE RENDEZ VOUS</a></h1>
                </button>
            </ul>
            <h1 class="title">Horaire</h1>
            <span>Ouvert du Lundi au Vendredi de 07h00 à 19h00, Samedis et jours fériés de 07h30 à 14h.</span>
            <h1 class="title">Contact</h1>
            <footer class="footer">
                <span>Centre Médico-Social</span><br>
                <span>BP. 46 Ngaoundéré</span><br>
                <span>Téléphone: 222 29 20 42</span><br>
                <p><div>© Copyright Université de Ngaoundéré. Tous droits reservés</div></p>
            </footer>
        </div>
    </div>
</body>
</html>
