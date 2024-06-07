<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'frederic');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Gestion de la prise de rendez-vous
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];

    // Insérer le rendez-vous dans la base de données
    $sql = "INSERT INTO appointments (doctor_id, appointment_date, appointment_time, patient_name, email, notified) VALUES (?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issss', $doctor_id, $date, $time, $patient_name, $email);

    if ($stmt->execute()) {
        echo "<p class='success'>Votre demande de rendez-vous a été envoyée avec succès. Veuillez attendre dans un plus bref délai pour la confirmation.</p>";

        // Ajouter une notification pour le médecin
        $notification_msg = "Nouveau rendez-vous pour $patient_name le $date à $time.";
        $sql = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $doctor_id, $notification_msg);
        $stmt->execute();

        // Ajouter une notification pour l'administrateur (user_id = 2 pour l'exemple)
        $admin_id = 2;  // ID de l'administrateur
        $stmt->bind_param('is', $admin_id, $notification_msg);
        $stmt->execute();
    } else {
        echo "<p class='error'>Erreur : " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de Rendez-vous et Notifications</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        label { display: block; margin-bottom: 5px; }
        input[type="date"],
        input[type="time"],
        input[type="text"],
        input[type="email"],
        select,
        button { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { background-color: #007bff; color: #fff; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Prise de Rendez-vous pour Visite Médicale</h1>
        <p>Les étudiants et le personnel pourront prendre rendez-vous en ligne pour leurs visites médicales, en sélectionnant la date et l'heure souhaitées.</p>
        <form action="" method="POST">
            <label for="doctor">Choisir un médecin :</label>
            <select name="doctor_id" id="doctor" required>
                <?php
                // Récupérer les médecins
                $sql = "SELECT id, name, specialty FROM doctors";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']} ({$row['specialty']})</option>";
                    }
                } else {
                    echo "<option value=''>Aucun médecin disponible</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="date">Date du rendez-vous :</label>
            <input type="date" id="date" name="date" required>
            <br><br>
            <label for="time">Heure du rendez-vous :</label>
            <input type="time" id="time" name="time" required>
            <br><br>
            <label for="patient_name">Nom du patient :</label>
            <input type="text" id="patient_name" name="patient_name" required>
            <br><br>
            <label for="email">Entrée votre email :</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <button type="submit">Prendre Rendez-vous</button>
        </form>
    </div>
</body>
</html>
