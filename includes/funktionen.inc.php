<?php

function hole_eintraege($umgedreht = false) {
    $eintraege = array();
    if (file_exists(PFAD_EINTRAEGE)) {
        $eintraege = unserialize(file_get_contents(PFAD_EINTRAEGE));
        if ($umgedreht === true) {
            $eintraege = array_reverse($eintraege);
        }
    }
    return $eintraege;
}

//pfeil ist wie der punkt in java
function hole_eintraege2(){
    $db = getDBconnection();
    $query = 'SELECT * FROM entry';
    $result = $db->query($query);
    return $result->fetchAll();
}

function ist_eingeloggt() {
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}

function logge_ein($benutzername) {
    $_SESSION['eingeloggt'] = $benutzername;
}

function logge_aus() {
    unset($_SESSION['eingeloggt']);
}

function ist_loeschberechtigt($autor){
    if(ist_eingeloggt()){
        if($autor == $_SESSION['eingeloggt']){
            return true;
        }
    }
    return false;
}

function getDBconnection(){
    $db = new PDO('mysql:host=localhost;dbname=weblog','root');
    return $db;
}

?>