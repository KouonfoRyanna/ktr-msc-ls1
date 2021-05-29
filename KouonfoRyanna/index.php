<html>
    <head>
        <title>My Visit cards</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <h1>VOTRE APPLICATION DE GESTION DE CARTES DE VISITES</h1>
            <h2>CONNECTEZ VOUS!</h2>
            <form action="index.php" method="get">
                <input type="text" name="identifiant" placeholder="votre identifiant" required><br><br>
                <input type="password" name="pwd" placeholder="entrez le mot de passse" required><br><br>
                <input type="submit" value="connexion" name="submit">
                <input type="reset" value="Annuler" name="reset">

            </form>
        </div>
    </body>
</html>

    <?php

        // Create connection
        $conn = new mysqli('localhost', 'root' ,'', 'carte-visite');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $iden = $_GET['identifiant'];
        $pwd = $_GET['pwd'];
        $connect = "SELECT * FROM users WHERE nom='$iden' && pwd='$pwd'"; 
        $result = $conn->query($connect);
        if ($result->num_rows > 0) {
            $cookie_name = "user";
            $cookie_value = $_GET['identifiant'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            header("Location: profil.php");
        }else{
            echo "echec, information non valides";
        }
    ?>