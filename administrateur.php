<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Visites Médicales - Université de Ngaoundéré</title>
    <style>
        body {background-image: url("main.jpg"); padding: 0px; margin: 15px;}
        .menu {background: #55b7c8; font-size: 45px; line-height: 0px; padding: 35px 0px 25px 200px; border-radius: 0px; box-shadow: 0 3px 1px black;}
        .dd {background: #55b7c8; text-align: right; padding: 45px;}  
        .footer {background-color: black; color: white; text-align: center; padding: 15px;}
        .med li {display: inline; margin-right: 30px; padding: 10px; margin: 10px;}
        .img {position: relative; width: 100%; height: 100vh; overflow: hidden;}
        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, button {
            width: 100%;
            margin-bottom: 12px;
        }
        button {
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="dd">
        <i>Choisir une langue</i>
        <select name="language" id="language">
            <option value="french">French</option>
            <option value="english">English</option>
        </select>
        <form action="" method="get">
            <input type="text" size="15" maxlength="128" class="form-search" placeholder="Recherche">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <a href="formulaire.html"></a>
    <div>
        <h1>Bienvenu dans la page de l'administrateur</h1>
        <div class="text-overlay">
            <p>
                Le rôle d'un administrateur du système médical est crucial pour assurer le bon fonctionnement et l'efficacité des opérations au sein des établissements de santé. Voici les principales responsabilités d'un administrateur du système médical :
            </p>
        </div>
        <?php
        // Connexion à la base de données
        $conn = new mysqli('localhost', 'root', '', 'cms_univ');

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hasher le mot de passe pour plus de sécurité
            $email = $_POST['email'];

            // Vérifier si le nom d'utilisateur ou l'email existe déjà
            $checkSql = "SELECT * FROM administrators WHERE username = ? OR email = ?";
            $stmt = $conn->prepare($checkSql);
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<p>Erreur : Le nom d'utilisateur ou l'email existe déjà.</p>";
            } else {
                // Insérer les données dans la base de données
                $insertSql = "INSERT INTO administrators (username, password, email) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($insertSql);
                $stmt->bind_param('sss', $username, $password, $email);

                if ($stmt->execute()) {
                    echo "<p>Administrateur enregistré avec succès.</p>";
                } else {
                    echo "<p>Erreur : " . $stmt->error . "</p>";
                }
            }

            $stmt->close();
        }

        $conn->close();
        ?>

        <h1>Enregistrer un administrateur</h1>
        <form action="" method="POST">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br>
            <button type="submit">Enregistrer</button>
        </form>

        <div class="med">                                
            <ul>
                <li><a href="Gestion des Opérations Quotidiennes.html">Gestion des Opérations Quotidiennes</a></li>
                <li><a href="Gestion des Ressources Humaines.html">Gestion des Ressources Humaines</a></li>
                <li><a href="Gestion Financière.html">Gestion Financière</a></li>
                <li><a href="Notification et Rappel.php">Notification et Rappel</a></li>
                <li><a href="Rapport et Statistique.php">Rapport et statistique</a></li>
            </ul>
            <img class="img" src="sup.jpg" alt="">
        </div>
    </div>
    <footer class="footer">
        <span>Centre Médico-Social</span><br>
        <span>BP. 46 Ngaoundéré</span><br>
        <span>Téléphone: 222 29 20 42</span><br> 
        <p>&copy; Copyright Université de Ngaoundéré. Tous droits réservés</p>
    </footer>
</body>
</html>
