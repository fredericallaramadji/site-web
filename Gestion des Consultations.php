<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'cms_univ');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ajouter un nouveau rendez-vous
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_appointment'])) {
    $patient_id = $_POST['patient_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "INSERT INTO consultations (patient_id, date, time) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $patient_id, $date, $time);

    if ($stmt->execute()) {
        echo "<p>Rendez-vous ajouté avec succès.</p>";
    } else {
        echo "<p>Erreur : " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion des Consultations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            margin: 20px 0;
        }
        label, select, input, button {
            display: block;
            width: 100%;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .body {
            background-image: url("main.jpg");
            padding: 0;
            margin: 15px;
        }
        .dd {
            background: #55b7c8;
            text-align: right;
            padding: 20px;
        }
        .id {
            text-align: center;
            margin-top: -210px;
        }
        .footer {
            background-color: black;
            text-align: center;
            color: #f4f4f4;
            padding: 15px;
        }
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
            <input type="text" size="15" maxlength="128" class="form-search" placeholder="Recherche">
            <button type="submit">Rechercher</button>
        </form>
    </div>
    
    <div class="container">
        <h1>Tableau de Bord - Gestion des Consultations</h1>
        <p>Les médecins auront accès à un tableau de bord pour gérer les rendez-vous, consulter les dossiers médicaux des patients et enregistrer les résultats des consultations.</p>
        
        <!-- Formulaire pour ajouter un rendez-vous -->
        <form method="POST" action="">
            <h2>Ajouter un Rendez-vous</h2>
            <label for="patient_id">Patient:</label>
            <select name="patient_id" id="patient_id" required>
                <?php
                // Récupérer les patients
                $sql = "SELECT id, name FROM patients";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option value=''>Aucun patient disponible</option>";
                }
                ?>
            </select>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <label for="time">Heure:</label>
            <input type="time" id="time" name="time" required>
            <button type="submit" name="add_appointment">Ajouter</button>
        </form>
        
        <!-- Affichage des rendez-vous -->
        <h2>Liste des Rendez-vous</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Nom du Patient</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les rendez-vous
                $sql = "SELECT consultation_id, c.date, c.time, p.name FROM consultations c JOIN patients p ON c.patient_id = p.id ORDER BY c.date, c.time";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['date']) . "</td>
                                <td>" . htmlspecialchars($row['time']) . "</td>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>
                                    <a href='consulter_dossier.php?consultation_id=" . htmlspecialchars($row['id']) . "'>Consulter Dossier Médical</a> |
                                    <a href='enregistrer_resultats.php?consultation_id=" . htmlspecialchars($row['id']) . "'>Enregistrer Résultats</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun rendez-vous disponible.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <a href="CMS.html">Retour à la page précédente</a> 
    <footer class="footer">
        <span>Centre Médico-Social</span><br>
        <span>BP 454 Ngaoundéré</span><br>
        <span>Téléphone: (237) 222 25 40 20</span><br>
        <p>© Copyright Université de Ngaoundéré. Tous droits réservés</p>
    </footer>
</body>
</html>
