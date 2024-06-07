<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'cms_univ');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les notifications
$sql = "SELECT message, created_at FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; }
        .notification { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background-color: #e9ecef; }
        .timestamp { font-size: 0.9em; color: #6c757d; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notifications</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='notification'>";
                echo "<p>" . htmlspecialchars($row['message']) . "</p>";
                echo "<p class='timestamp'>" . htmlspecialchars($row['created_at']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucune notification disponible.</p>";
        }
        ?>
    </div>
</body>
</html>
