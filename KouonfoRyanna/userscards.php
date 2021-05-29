<html>
    <head>
        <title>My Visit cards</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <h1>BIENVENUE <?php echo $_COOKIE['user']?></h1>
            <h1>VOTRE APPLICATION DE GESTION DE CARTES DE VISITES</h1>
            <h2>CREER UNE CARTE DED VISITE</h2>

            <hr>
                <a href="index.php"><button name="disconnect" value="deconnexion">Deconnexion</button></a>
            <hr>
            <hr>
                <a href="mycards.php"><button name="cards" value="cards">Voir mes cartes</button></a>
            <hr>
            <form action="userscards.php" method="post">
                <input type="text" name="nom" placeholder="entrez le nom sur la carte" required><br><br>
                <input type="text" name="entreprise" placeholder="entrez le nom de la société"><br><br>
                <input type="email" name="email" placeholder="entrez l'email" required><br><br>
                <input type="number" name="phone" placeholder="entrez le numero de telephone"><br><br>
                <input type="submit" value="Enregistrer" name="submit">
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
        $nom = $_POST['nom'];
        $entreprise = $_POST['entreprise'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $userId = $_COOKIE['user'];
        $sql = "INSERT INTO `cartes` (`nom`, `nom_societe`, `email`, `tel`, `user_id`) VALUES ('$nom', '$entreprise', '$email', '$phone', '$userId');";
        if(mysqli_query($conn, $sql)){
           echo "Records inserted successfully.";
           header("Location: mycards.php");
        } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    ?>