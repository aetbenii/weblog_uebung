<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleregister.css">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST">
        <!-- Zur not alle Label weg lassen und in jeden input Tag einen Placeholder einfügen. -->
        <h1>Registriere dich jetzt</h1>
        <div class="input_container">
            
            <input type="text" name="benutzername" id="benutzername" placeholder="Benuztername">
            
            <input type="text" name="vorname" id="vorname" placeholder="Vorname">
            
            <input type="text" name="nachname" id="nachname" placeholder="Nachname">
            
            <input type="password" name="passwort" id="passwort" placeholder="Passwort">
        </div>
        <input type="submit" name="btnregister" id="btnregister" value="Registrieren">
    </form>

</body>
</html>