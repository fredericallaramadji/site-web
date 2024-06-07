<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suivi des Visites Médicales - Université de Ngaoundéré</title>
        
        <!-- Ajoutez vos scripts JavaScript ici -->
    </head>
    <style>
        .body {background-image: url("main.jpg");padding: 0px;margin: 15px;}
        .menu {background: #55b7c8; font-size: 45px;line-height: 0px;padding: 35px 0px 25px 200px;border-radius: 0px;box-shadow: 0 3px 1px black;}
        .dd {background: #55b7c8;text-align: right;padding: 45px;}  
        .footer {background-color: black;color: white;text-align: center;padding: 15px;}
        .med li {display: inline;margin-right: 30px;padding: 10px;margin: 10px;}
        .img{position: relative;width: 100%;height: 100vh;overflow: hidden;}
        .text-overlay {position: absolute;top: 85%;left: 50%;transform: translate(-50%, -50%);color:bleue;font-size: 50px;text-align: center;z-index: 2;}
    </style>
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
                    <button type="submit">Rechercher</button>
                </form>
            </div>
            <div class="">
                <h1>Bienvenu dans la page du Médecins</h1>
                <div class="med">                                
                    <ul>
                        <li><a href="Prise de RV.php">Prise de Rendez-vous</a></li>
                        <li><a href="Gestion des Consultations.php">Gestion des Consultations</a></li>
                        <li><a href="Suivi des Antecedant.php">Suivi des Antécedants Medicaux</a></li>
                        <li><a href="Notification et Rappel.php">Notification et Rappel</a></li>
                        <li><a href="Rapport et Statique.php">Rapport et statistique</a></li>
                    </ul>
                    <img class="img" src="j.PNG" alt="">
                    <div class="text-overlay">
                        <p>
                        Vous avez non seulement traité ma condition médicale avec un grand professionnalisme, mais vous avez également pris le temps de m'expliquer chaque étape du processus de traitement</p>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <span>Centre Médico-Social</span><br>
                <span>BP. 46 Ngaoundéré</span><br>
                <span>Téléphone: 222 29 20 42</span><br> 
                <p><div>© Copyright Université de Ngaoundéré. Tous droits reservés</div></p> 
            </footer>
        </div>    
    </body>
</html>
