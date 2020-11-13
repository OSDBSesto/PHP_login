<!-- POPOLAZIONE ARRAY -->
<?php
// dichiaro nome file
$path = "credenziali.txt";
//istanzio fuori dal contesto del while var generica credenziali che diventerà array associativo
$_CREDENZIALI;
//creo  hendle del file e verifico che esista
if ($fileCredenziali = fopen($path, "r")) {
    while (!feof($fileCredenziali)) {
        // lettura della stringa
        $linea = fgets($fileCredenziali);
        // estraggo dalla linea il nome utente e di seguito la password
        $nomeUtente = substr($linea, 0, strpos($linea, ";"));
        /* sono obbligato a fare questo pasticcio per togliere l'ultimo carattere finale della
           password poichè si buggava con il <br />
           sono arrivato a questa soluzione anche se moolto brutta dopo 3 ore di troubleshooting e test */
        $password = substr($linea, strpos($linea, ";") + 1, strpos($linea, "|") - 1);
        $password = $password . " .";
        $password = substr($password, 0, strpos($password, "|"));

        /*indicizzo al nome utente la rispettiva password, questo tipo di indicizzazione anche se potrebbe
        sembrare inizialmente confusionaria e non efficace penso sia utile nell'eventualità di dover salvare 
        molte informazioni relative ad utente in seguito es. Pw Email Sesso Tel Indirizzo etc...*/
        $_CREDENZIALI[$nomeUtente] = $password;
    }
    // chiudo stream al file
    fclose($fileCredenziali);
} else {
    //comunico l'impossibilità di apertura del file
    echo ("Impossibile aprire il file!");
}
?>

<html>

<head>
    <title>Verifica delle credenziali</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Pagina di verifica credenziali.</h1>
    <form>
        <div class="container">
            <?php
            if (isset($_CREDENZIALI[$_POST["username"]])) {
                if ($_POST["psw"] == $_CREDENZIALI[$_POST["username"]]) {
                    echo "<div class=\"container\"><h2>Benvenuto nella tua area dedicata, </h2>";
                    echo "<h1 style=\"color:green\">".$_POST["username"]."</h1>";
                    echo "</div>";
                } else {
                    echo "<img src=\"https://i0.wp.com/vincenttechblog.com/wp-content/uploads/2018/02/lock-pc-wrong-password.jpg?ssl=1\" class =\"avatar\">";
                    echo "<h2 style=\"color:red\">Password errata!</h4>";
                }
            } else {
                echo "<img src=\"https://roundhouse-assets.s3.amazonaws.com/assets/Image/15214-fitandcrop-1200x681.jpg\" class =\"avatar\">";
                echo "<h2 style=\"color:orange\">Utente non trovato!</h4>";
            }
            echo "<div class=\"container\" style=\"background-color:#f1f1f1\"";
            echo "<span class=\"psw\">Torna al <a href=\"/esercizi/loginForm.php\">login</a></span></div>";
            ?>
        </div>

    </form>
</body>

</html>