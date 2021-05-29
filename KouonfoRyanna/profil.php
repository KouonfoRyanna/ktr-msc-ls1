<html>
    <head>
        <title>My Visit cards</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <h1>BIENVENUE <?php echo $_COOKIE['user']?></h1>
            <h1>VOTRE APPLICATION DE GESTION DE CARTES DE VISITES</h1>
            <h2>GEREZ VOS INFORMATIONS</h2>

            <hr>
                <a href="index.php"><button name="disconnect" value="deconnexion">Deconnexion</button></a>
            <hr>
            <hr>
                <a href="userscards.php"><button name="cards" value="cards">creer mes cartes</button></a>
            <hr>
            <form action="profil.php" method="post">
                <input type="text" name="nom" placeholder="entrez votre nom" required><br><br>
                <input type="text" name="entreprise" placeholder="entrez votre société"><br><br>
                <input type="email" name="email" placeholder="entrez votre email" required><br><br>
                <input type="number" name="phone" placeholder="entrez votre numero de telephone"><br><br>
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
        //echo $phone;
        $sql = "UPDATE users SET nom = '$nom', email= '$email', tel='$phone', nom_societe='$entreprise' WHERE nom = 'test'";
        if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
         }
    ?>