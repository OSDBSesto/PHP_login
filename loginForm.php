<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>

    <h2>Pagina di login</h2>

    <form action="/checkData.php" method="post">
        <div class="imgcontainer">
            <img src="https://www.donboscoperugia.it/wp/wp-content/uploads/2014/10/don-bosco.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="username"><b>Username</b></label>

            <input type="text" placeholder="Inserisci Username" name="username" required> <!-- Stile definito uguale a PSW -->
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="psw" required>

            <button type="submit">Login</button>

            <label>
                <input type="checkbox" name="demo" title="Spuntando la casella tutte le credenziali verranno accettate"> Demo
            </label>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>

</body>

</html>