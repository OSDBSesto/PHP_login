<?php
include("scriptcredenziali.php");
session_start();
if (isset($_SESSION["visite"]))
    $_SESSION["visite"]++;
else {
    setcookie("sessione", $_SESSION["visite"], time() + (60 * 60));
    $_SESSION["visite"] = 1;
}
//unset($_SESSION["visite"]);
//session_destroy();

echo "visite: " . $_SESSION["visite"] . "</br>";
echo "<br/>";

//print_r($_COOKIE);


if (isset($_COOKIE["user"])) {
    header("Location: home.php");
    //echo "Ciao " . $_COOKIE["user"] . "!";
    //setcookie("nome", "", time()-3600);
} else {
    echo "benvenuto per la prima volta";
}

// echo $_COOKIE["nome"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>

    <h2>Pagina di login</h2>

    <!-- post a se stesso -->
    <form method="post">
        <div class="imgcontainer">
            <img src="https://www.piemontetopnews.it/wp-content/uploads/2018/08/Giovanni-Bosco-1-1024x547.jpg" class="avatar">
        </div>

        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserisci Username" name="username" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="psw" required>
            <button type="submit">Login</button>
        </div>
    </form>

    <?php
    if (isset($_POST["username"])) {
        if ($filepwd = fopen("pwd.txt", "r")) {
            while (!feof($filepwd)) {
                $line = fgets($filepwd);
                $user = substr($line, 0, strpos($line, ";"));
                $password = substr($line, strpos($line, ";") + 1, strpos($line, "|") - 1);
                $password = $password . " .";
                $password = substr($password, 0, strpos($password, "|"));
            }
            fclose($filepwd);

            if ($user == $_POST["username"]) {
                if ($password == $_POST["psw"]) {
                    setcookie("user", $_POST["username"], time() + (60 * 60));
                    echo "<div class=\"container\"><h2>Benvenuto nella tua area dedicata, </h2>";
                    echo "<h1 style=\"color:green\">" . $_POST["username"] . "</h1>";
                    echo "</div>";
                } else {
                    echo "<h3 style=\"color:red\">Password errata!</h3>";
                }
            } else {
                echo "<h3 style=\"color:orange\">Utente non trovato!</h3>";
            }
        } else {
            echo "<h3 style=\"color:red\">Errore di sistema!</h3>";
            echo $filepwd;
        }
    }
    ?>

    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Dimenticato <a href="forgotPassword.php">password?</a></span>
    </div>

</body>

</html>