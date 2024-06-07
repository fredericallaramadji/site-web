<?php
    // Connexion à la base de données
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'cms_univ';

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Traitement du formulaire de connexion
    if(isset($_POST['connecter'])){
        $motdepasse1 = "1234";
        $nom1 = "medecin";
        $motdepasse2 = "4321";
        $nom2 = "administrateur";
        $utilisateur = $_POST['utilisateur'];
        $password = $_POST['password'];

        if(($password == $motdepasse1) && ($utilisateur == $nom1)){
            header('Location: medecin.php');
            exit(); // Il est important de quitter le script après une redirection
        }
        elseif(($password == $motdepasse2) && ($utilisateur == $nom2)){
            header('Location: administrateur.php');
            exit(); // Il est important de quitter le script après une redirection
        }
        else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }

    // Traitement du formulaire d'ajout de médecin
    if(isset($_POST['ajouter_medecin'])){
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $specialite = $_POST['specialite'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];

        // Préparer la requête SQL
        $sql = "INSERT INTO medecins (nom, prenom, specialite, telephone, email, adresse)
                VALUES ('$nom', '$prenom', '$specialite', '$telephone', '$email', '$adresse')";

        if ($conn->query($sql) === TRUE) {
            echo "Nouveau médecin enregistré avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'ajout de médecin</title>
</head>
<body>
    <h2>Formulaire d'ajout de médecin</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nom: <input type="text" name="nom"><br>
        Prénom: <input type="text" name="prenom"><br>
        Spécialité: <input type="text" name="specialite"><br>
        Téléphone: <input type="text" name="telephone"><br>
        Email: <input type="text" name="email"><br>
        Adresse: <input type="text" name="adresse"><br>
        <input type="submit" name="ajouter_medecin" value="Ajouter Médecin">
    </form>

    <!-- Formulaire de connexion -->
    <h2>Formulaire de connexion</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Utilisateur: <input type="text" name="utilisateur"><br>
        Mot de passe: <input type="password" name="password"><br>
        <input type="submit" name="connecter" value="Se connecter">
    </form>
</body>
</html>

<?php
    // Fermer la connexion
    $conn->close();
?>
