<?php

//popolo file e array solamente se l'utente mi ha già passato il parametro username
if (isset($_POST["username"])) {
    $path = "scriptCredenziali.php";
    include($path);
}
?>

<html>

<head>
    <title>Recupera Password</title>
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>
    <h1>Pagina recupero credenziali</h1>
    <form action="/esercizi/forgotPassword.php" method="post">
        <div class="imgcontainer">
            <img src="https://www.piemontetopnews.it/wp-content/uploads/2018/08/Giovanni-Bosco-1-1024x547.jpg" class="avatar">
        </div>
        <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserisci Username" name="username" required>
            <button type="submit">Login</button>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Torna a <a href="/esercizi/loginForm.php">login</a></span>
        </div>
    </form>
</body>

</html>