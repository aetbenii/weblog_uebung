<?php
    require_once 'includes/konfiguration.php';
    require_once 'includes/funktionen.inc.php';
    session_start();
    
    // In Blogs werden Einträge immer in umgekehrter Reihenfolge angezeigt
    $eintraege = hole_eintraege(true);
    $eintraege2 = hole_eintraege2();
    var_dump($eintraege2);
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
              
                
                <h1><?php echo htmlspecialchars($e['titel']); ?></h1>
	            <?php echo nl2br(htmlspecialchars($e['inhalt'])); ?>
	            
	            <p class="eintrag_unten">
	                <span>
	                    <?php $benutzer = $benutzer_daten[$e['autor']]; ?>
	                    geschrieben von
	                    <?php echo $benutzer['vorname']; ?>
	                    <?php echo $benutzer['nachname']; ?>
	                    am <?php echo  date('d.m.Y', $e['erstellt_am']); ?>
	                    um <?php echo date('G:i', $e['erstellt_am']); ?>
                        <?php 
                        
                        //$autor = $eintraege[$e['autor']];
                        if(ist_loeschberechtigt($e['autor'])){ ?>
                             <a href="loeschen.php?autor=<?=$e['autor']?>&t=<?=$e['erstellt_am']?>">Löschen</a>
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