<?php
include("scriptcredenziali.php");
echo "Ciao " . $_COOKIE["user"] . "!</br>";
echo "visite: " . $_COOKIE["sessione"] . "</br>";

$path = "voti.txt";

// popolo l'array di voti dell'utente
if ($file = fopen($path, "r")) {
    while (!feof($file)) {
        $line = fgets($file);
        $user = substr($line, 0, strpos($line, ":"));
        $loggedUser;
        if (isset($_COOKIE["user"])) {
            $loggedUser = $_COOKIE["user"];
        } else {
            $loggedUser = $_POST["username"];
        }
        if ($user == $loggedUser) {
            $voti = substr($line, strpos($line, ":") + 1, strlen($line));
            $arrayVoti = explode(';', $voti);    
        break;
        }
    }
    fclose($file);
} else {
    echo "Impossibile aprire il file";
}
?>

<html>

<head>
    <title>home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Benvento!</h1>
    <form>
        <div class="container">
            <?php
            if (isset($_COOKIE["user"])) {
                echo "<div class=\"container\"><h2>Benvenuto nella tua area dedicata, </h2>";
                echo "<h1 style=\"color:green\">" . $_COOKIE["user"] . "</h1>";
                echo "<table><tr><th>Voti</th></tr>";
                foreach($arrayVoti as $voto){
                    echo "<tr>";
                    echo "<td>";
                    echo $voto;
                    echo "</td>";
                    echo "</tr>";
                }                
                echo "</table>";
            } else {
                if (isset($_pwd[$_POST["username"]])) {
                    if ($_POST["psw"] == $_pwd[$_POST["username"]]) {
                        setcookie("user", $_POST["username"], time() + (60 * 60));
                        echo "<div class=\"container\"><h2>Benvenuto nella tua area dedicata, </h2>";
                        echo "<h1 style=\"color:green\">" . $_POST["username"] . "</h1>";
                        echo "<table><tr><th>Voti</th></tr>";
                        foreach($arrayVoti as $voto){
                            echo "<tr>";
                            echo "<td>";
                            echo $voto;
                            echo "</td>";
                            echo "</tr>";
                        }                
                        echo "</table>";
                        echo "</div>";
                    } else {
                        echo "<img src=\"https://i0.wp.com/vincenttechblog.com/wp-content/uploads/2018/02/lock-pc-wrong-password.jpg?ssl=1\" class =\"avatar\">";
                        echo "<h2 style=\"color:red\">Password errata!</h4>";
                    }
                } else {
                    echo "<img src=\"https://roundhouse-assets.s3.amazonaws.com/assets/Image/15214-fitandcrop-1200x681.jpg\" class =\"avatar\">";
                    echo "<h2 style=\"color:orange\">Utente non trovato!</h4>";
                }
            }

            echo "<div class=\"container\" style=\"background-color:#f1f1f1\"";
            echo "<span class=\"psw\">Esegui <a href=\"logout.php\">logout</a></span></div>";
            ?>
        </div>

    </form>
</body>

</html>