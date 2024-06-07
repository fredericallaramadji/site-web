<?php
session_start();

 // Connexion à la base de données
 $conn = new mysqli('localhost', 'root', '', 'cms univ');

 // Vérifier la connexion
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

// Vérification de l'authentification de l'utilisateur
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        // Authentification réussie, rediriger vers la page sécurisée
        $_SESSION['loggedin'] = true;
        header("Location: page_securisee.php");
        exit;
    } else {
        // Authentification échouée, afficher un message d'erreur
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

// Fermeture de la connexion à la base de données
$stmt->close();
$conn->close();
?>
/***page sécurisé les données
    <?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("Location: connexion.php");
    exit;
}

// Autres traitements de la page sécurisée
// Par exemple, afficher les données médicales des patients, etc.
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sécurité des Données</title>
</head>
<style>
    .body{background-image:url("main.jpg"); padding: 00px;margin: 15px;}
    .dd{ background:#55b7c8;text-align: right;padding:20px }
          .id{text-align: center;margin-top:-210px;} 
          .footer{background-color: black; text-align: center;color: #f4f4f4;padding:15px;}
</style>
<body class="body">
    <div class="dd">
        <i class="" id="">Choisir une langue</i>
        <select name="" id="">
         <option value=""> <a href="">French</a></option>
         <option value=""> <a href="">English</a></option>
         <option value=""> <a href="">Chinois</a></option>
         <option value=""> <a href="">Allemand</a></option>
         <option value=""> <a href="">Russe</a></option>
     </select><br><br>
                 <form action="">
                     <input titsize="15" maxlength="128" class="form-search" placeholder="Recherche">
                     <button type="submit"></span>Rechercher</button>
                 </form>
     </div>
                 
    <h1>Sécurité des Données</h1>
    <p>L'application garantit la confidentialité et la sécurité des données médicales des patients conformément aux normes et réglementations en vigueur.</p>
    
    <!-- Formulaire de connexion -->
    <h2>Connexion</h2>
    <form action="connexion.php" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Se connecter">
    </form>
    
    <a href="CMS.html">Retour a la page précedante</a>
    <footer class="footer">    <span>Centre Médico-Social</span><br>
    
    <span>BP 454 Ngaoundéré</span><br>
    <span>Téléphone: (237) 222 25 40 20</span><br>
    <p><div>© Copyright Université de Ngaoundéré. Tous droits reservés</div></p>
</footer>

</body>
</html>