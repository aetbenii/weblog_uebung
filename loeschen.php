<?php
require_once 'includes/konfiguration.php';
require_once 'includes/funktionen.inc.php';
//$eintraege= hole_eintraege();

/* $neuauflage= array();

foreach ($eintraege as $e) {
   
    if(!($e['autor']==$_GET['autor'] &&$e['erstellt_am']==$_GET['t'])){
         
        $neuauflage[]=  array(
             'titel'       => $e['titel'],
            'erstellt_am' => $e['erstellt_am'],
            'autor'       => $e['autor'],
            'inhalt'      => $e['inhalt']
        );
        
     
    }
    
} */
    loesche_Beitrag($_GET['index']);

//file_put_contents(PFAD_EINTRAEGE, serialize($neuauflage));
header("Location:index.php");
