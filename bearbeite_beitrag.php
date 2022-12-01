<?php
    require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    // Nur ein eingeloggter Benutzer darf neue Einträge posten. 
    if (! ist_eingeloggt()) {
    	header('Location: index.php');
    	exit;
    }
    if((boolean)$_GET['value'] === true){
        // echo $_POST['titel'] ?? ""; // die 2 Fragezeichen kann man schreiben ob die Variable leer ist
        if(isset($_POST['titel']) && isset($_POST['inhalt'])){
            update_Beitrag($_GET['index'], $_POST['titel'], $_POST['inhalt'], date("Y-m-d G:i:s", time()));
            header('Location: index.php');
        }
    }
    $eintrag = hole_Beitrag($_GET['index']); 
?>
<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Eintrag bearbeiten</title>
</head>

<body>
    
    <div id="gesamt">
    
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            
            <h1>Bearbeiten Sie ihren Eintrag:</h1>
            
            <form action="bearbeite_beitrag.php?index=<?=$_GET['index']?>&value=<?='true'?>" method="post">
                <p><input type="text" name="titel" id="titel" value="<?=$eintrag['title'] ?>"/></p>
                <p><textarea name="inhalt" id="eintrag" cols="50" rows="10"><?=$eintrag['text'] ?></textarea></p>
                <p><input type="submit" value="Eintragen" /></p>
            </form>
            
        </div>
        
        <div id="menu">
            <?php require 'includes/hauptmenu.php'; ?>
        </div>
        
        <div id="fuss">
            Das ist das Ende
        </div>
            
    </div>

</body>

</html>