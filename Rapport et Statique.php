<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'cms_univ');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requêtes SQL pour récupérer les données d'activité
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$sql_posts = "SELECT COUNT(*) AS total_posts FROM posts";
$sql_comments = "SELECT COUNT(*) AS total_comments FROM comments";
$sql_likes = "SELECT COUNT(*) AS total_likes FROM likes";

$result_users = $conn->query($sql_users);
$result_posts = $conn->query($sql_posts);
$result_comments = $conn->query($sql_comments);
$result_likes = $conn->query($sql_likes);

// Vérification des résultats et affichage des rapports
if ($result_users && $result_posts && $result_comments && $result_likes) {
    $row_users = $result_users->fetch_assoc();
    $row_posts = $result_posts->fetch_assoc();
    $row_comments = $result_comments->fetch_assoc();
    $row_likes = $result_likes->fetch_assoc();

    // Affichage des rapports
    echo "<h2>Rapports d'activité</h2>";
    echo "<ul>";
    echo "<li>Nombre total d'utilisateurs : " . $row_users['total_users'] . "</li>";
    echo "<li>Nombre total de publications : " . $row_posts['total_posts'] . "</li>";
    echo "<li>Nombre total de commentaires : " . $row_comments['total_comments'] . "</li>";
    echo "<li>Nombre total de likes : " . $row_likes['total_likes'] . "</li>";
    echo "</ul>";
} else {
    echo "Erreur lors de l'exécution des requêtes SQL : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports et Statistiques</title>
    <style>
        .body { background-image: url("main.jpg"); padding: 0; margin: 15px; }
        .dd { background: #55b7c8; text-align: right; padding: 20px; }
        .id { text-align: center; margin-top: -210px; }
        .footer { background-color: black; text-align: center; color: #f4f4f4; padding: 15px; }
    </style>
</head>
<body class="body">
    <div class="dd">
        <i>Choisir une langue</i>
        <select name="" id="">
            <option value="">French</option>
            <option value="">English</option>
            <option value="">Chinois</option>
            <option value="">Allemand</option>
            <option value="">Russe</option>
        </select><br><br>
        <form action="">
            <input type="text" size="15" maxlength="128" class="form-search" placeholder="Recherche">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <h1>Rapports et Statistiques</h1>
    <p>Les administrateurs auront accès à des rapports et des statistiques sur l'activité du CMS, permettant ainsi d'analyser les tendances, d'identifier les besoins et de planifier les ressources.</p>

    <!-- Exemple de rapport -->
    <h2>Rapport d'activité mensuel</h2>
    <table border="1">
        <tr>
            <th>Mois</th>
            <th>Nombre d'utilisateurs</th>
            <th>Nombre de publications</th>
            <th>Nombre de commentaires</th>
        </tr>
        <tr>
            <td>Janvier 2024</td>
            <td>100</td>
            <td>250</td>
            <td>150</td>
        </tr>
        <tr>
            <td>Janvier 2014</td>
            <td>183</td>
            <td>290</td>
            <td>450</td>
        </tr>
        <tr>
            <td>Juin 2007</td>
            <td>83</td>
            <td>210</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Mars 2022</td>
            <td>283</td>
            <td>190</td>
            <td>250</td>
        </tr>
        <!-- Autres lignes de données -->
    </table>

    <!-- Exemple de statistiques -->
    <h2>Statistiques globales</h2>
    <ul>
        <li>Nombre total d'utilisateurs : 1000</li>
        <li>Nombre total de publications : 3000</li>
        <li>Nombre total de j'aimes : 32000</li>
        <li>Nombre total de commentaires : 2000</li>
        <!-- Autres statistiques -->
    </ul>

    <p>Dans cet exemple :
        <ul>
            <li>Un rapport d'activité mensuel est affiché sous forme de tableau, montrant le nombre d'utilisateurs, de publications et de commentaires pour chaque mois.</li>
            <li>Des statistiques globales sont présentées sous forme de liste à puces, donnant un aperçu général de l'activité du CMS.</li>
        </ul>
    </p>
    <a href="CMS.html">Retour à la page précédente</a> 
    <footer class="footer">
        <span>Centre Médico-Social</span><br>
        <span>BP 454 Ngaoundéré</span><br>
        <span>Téléphone: (237) 222 25 40 20</span><br>
        <p><div>© Copyright Université de Ngaoundéré. Tous droits réservés</div></p>
    </footer>
</body>
</html>
