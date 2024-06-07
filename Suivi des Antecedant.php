<?php
// Connexion à la base de données
$servername = 'localhost';
$username = 'root';  // Remplacez par votre nom d'utilisateur MySQL
$password = '';  // Remplacez par votre mot de passe MySQL
$dbname = 'medical_history';  // Assurez-vous que ce nom de base de données est correct

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $patient_id = $_POST['patient_id'];
    $visit_date = $_POST['visit_date'];
    $exam_results = $_POST['exam_results'];
    $prescribed_treatments = $_POST['prescribed_treatments'];
    $medical_recommendations = $_POST['medical_recommendations'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO medical_visits (patient_id, visit_date, exam_results, prescribed_treatments, medical_recommendations) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issss', $patient_id, $visit_date, $exam_results, $prescribed_treatments, $medical_recommendations);

    if ($stmt->execute()) {
        echo "<p>Visite médicale enregistrée avec succès.</p>";
    } else {
        echo "<p>Erreur : " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Afficher l'historique des visites médicales
$sql = "SELECT mv.visit_date, mv.exam_results, mv.prescribed_treatments, mv.medical_recommendations, p.name FROM medical_visits mv JOIN patients p ON mv.patient_id = p.id ORDER BY mv.visit_date DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des Antécédents Médicaux</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 20px;}
        h1 {text-align: center;}
        table {width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td {border: 1px solid #f0f0f0; padding: 8px; text-align: left;}
        th {background-color: #b3b3b3;}
        .body {background-image: url("main.jpg"); padding: 20px; margin: 15px;}
        .dd { background: #55b7c8; text-align: right; padding: 20px; }
        .id {text-align: center; margin-top: -210px;} 
        .footer {background-color: black; text-align: center; color: #f4f4f4; padding: 15px;}
    </style>
</head>
<body class="body">
    <div class="dd">
        <i id="">Choisir une langue</i>
        <select name="" id="">
            <option value="">French</option>
            <option value="">English</option>
            <option value="">Chinois</option>
            <option value="">Allemand</option>
            <option value="">Russe</option>
        </select><br><br>
        <form action="">
            <input type="text" name="search" size="15" maxlength="128" class="form-search" placeholder="Recherche">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <h1>Suivi des Antécédents Médicaux</h1>
    <p>L'application permettra de conserver un historique des visites médicales de chaque patient, y compris les résultats des examens, les traitements prescrits et les recommandations médicales.</p>

    <form action="" method="POST">
        <label for="patient_id">Patient :</label>
        <select name="patient_id" id="patient_id">
            <?php
            // Récupérer les patients
            $sql = "SELECT id, name FROM patients";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            } else {
                echo "<option value=''>Aucun patient disponible</option>";
            }
            ?>
        </select><br><br>
        <label for="visit_date">Date de la visite :</label>
        <input type="date" id="visit_date" name="visit_date" required><br><br>
        <label for="exam_results">Résultats des examens :</label>
        <textarea id="exam_results" name="exam_results" required></textarea><br><br>
        <label for="prescribed_treatments">Traitements prescrits :</label>
        <textarea id="prescribed_treatments" name="prescribed_treatments" required></textarea><br><br>
        <label for="medical_recommendations">Recommandations médicales :</label>
        <textarea id="medical_recommendations" name="medical_recommendations" required></textarea><br><br>
        <button type="submit">Enregistrer</button>
    </form>

    <?php
    if ($result->num_rows > 0) {
        echo '<table>
                <thead>
                    <tr>
                        <th>Date de la visite</th>
                        <th>Résultats des examens</th>
                        <th>Traitements prescrits</th>
                        <th>Recommandations médicales</th>
                        <th>Patient</th>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['visit_date']}</td>
                    <td>{$row['exam_results']}</td>
                    <td>{$row['prescribed_treatments']}</td>
                    <td>{$row['medical_recommendations']}</td>
                    <td>{$row['name']}</td>
                  </tr>";
        }
        echo '</tbody>
            </table>';
    } else {
        echo "<p>Aucune visite médicale enregistrée.</p>";
    }

    $conn->close();
    ?>
    <a href="CMS.html">Retour à la page précédente</a>
    <footer class="footer">
        <span>Centre Médico-Social</span><br>
        <span>BP 454 Ngaoundéré</span><br>
        <span>Téléphone: (237) 222 25 40 20</span><br>
        <p><div>© Copyright Université de Ngaoundéré. Tous droits réservés</div></p>
    </footer>
</body>
</html>
