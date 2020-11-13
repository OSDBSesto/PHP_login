<?php
$path = "credenziali.txt";
$credenziali;
if ($fileCredenziali = fopen($path, "r")) {
    while (!feof($fileCredenziali)) {
        
        $linea = fgets($fileCredenziali);
        $nomeUtente = substr($linea, 0, strpos($linea, ";"));

        // sono obbligato a fare questo pasticcio per togliere l'ultimo carattere finale della
        // password poichè si buggava con il <br />
        // sono arrivato a questa soluzione anche se moolto brutta dopo 3 ore di troubleshooting e test
        $password = substr($linea, strpos($linea, ";") + 1, strpos($linea, "|") - 1);
        $password = $password . " .";
        $password = substr($password,0, strpos($password, "|"));

    }
    fclose($fileCredenziali);
} else {
    ("Impossibile aprire il file!");
}

?>

<!-- VIEW -->
<html>

<head>
    <title>Verifica delle credenziali</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>

</body>

</html>