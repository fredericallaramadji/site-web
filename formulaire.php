
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>entrer vos coordonnées</h1>
    <form action="formu.php" method="post">    
        <div id="alph">
            <div> 
                <label for="utilisateur">nom utilisateur</label><br>    
                <input type="text" name="utilisateur" placeholder="nom utilisateur" required>
            </div><br>
        <div><br>
            <label for="password">password</label><br>
            <input type="password" name="password" placeholder="password" required>
        </div><br>
            <input type="submit" name="connecter" value="se connecter">
        </div><br>
    </form> 
</body>
</html>
