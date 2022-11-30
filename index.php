<?php
    require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    
    // In Blogs werden Einträge immer in umgekehrter Reihenfolge angezeigt
    
    $eintraege = hole_eintraege(true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
    <title>Weblog - Einträge</title>
</head>

<body>

    <div id="gesamt">
        
        <div id="kopf">
            <h1>Mein Weblog</h1>
        </div>
        
        <div id="inhalt">
            <!-- 
                überprüfen ob ein user eingeloggt ist. 
                überprüfen ob der beitrag vom selben autor geschrieben wurde und der selbe user eingelogt ist. 
                (wie unten mit ist_eingeloggt() )


            --> 
            <?php foreach ($eintraege as $e): // erweiterte foreach
                //echo implode(" ", $benutzer_daten[$e['autor']]);
                
                ?>
              
                
                <h1><?php echo htmlspecialchars($e['title']); ?></h1>
	            <?php echo nl2br(htmlspecialchars($e['text'])); ?>
	            
	            <p class="eintrag_unten">
	                <span>
                        geschrieben von
	                    <?php echo $e['name']; ?>
	                    <?php echo $e['surname']; 
	                      //echo $e['nickname']; ?> 
	                    am <?php echo  date('d.m.Y',strtotime($e['timestamp'])); ?>
	                    um <?php echo date('G:i', strtotime($e['timestamp'])); ?>
                        <?php 
                        
                        //$autor = $eintraege[$e['autor']];
                        if(ist_loeschberechtigt($e['nickname'])){ ?>
                             <a href="loeschen.php?index=<?=$e['id']?>">Löschen</a>
                             <a href="bearbeite_beitrag.php?index=<?=$e['id']?>">Bearbeiten</a>
                        <?php } ?>
                        <!-- -->
	                </span>
	            </p>
            <?php endforeach; ?>
            
        </div>
        
        <div id="menu">
            <?php
                /**
                 * Zeige das Login-Formular, wenn der Benutzer noch nicht eingeloggt ist,
                 * ansonsten das Hauptmenu.
                 */	 
                if (ist_eingeloggt()) {
				    require 'includes/hauptmenu.php';
                } else {
                	require 'includes/loginformular.php';
                } 
            ?>
        </div>
        
        <div id="fuss">
            Das ist das Ende
        </div>
            
    </div>

</body>

</html>