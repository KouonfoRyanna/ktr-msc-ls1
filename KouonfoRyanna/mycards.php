<html>
    <head>
        <title>My Visit cards</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <h1>BIENVENUE <?php echo $_COOKIE['user']?></h1>
            <h1>VOTRE APPLICATION DE GESTION DE CARTES DE VISITES</h1>
            <h2>VOS CARTES DE VISITES</h2>

            <hr>
                <a href="index.php"><button name="disconnect" value="deconnexion">Deconnexion</button></a>
            <hr>
            <hr>
                <a href="userscards.php"><button name="cards" value="cards">creer mes cartes</button></a>
            <hr>

            <table>
            <?php
                // Create connection
                $conn = new mysqli('localhost', 'root' ,'', 'carte-visite');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $userId = $_COOKIE['user'];
                $sql = "SELECT * FROM `cartes` WHERE `user_id` = $userId";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {                            
                        echo "<tr><td>hi</td></tr>";
                    } 
                    $conn->close();;
                }
                ?>
            </table>
            
        </div>
    </body>
</html>