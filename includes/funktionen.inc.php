<?php

//pfeil ist wie der punkt in java

use LDAP\Result;

function hole_eintraege($umgedreht = false){
    $order = "";
    if($umgedreht){$order = "ORDER BY timestamp DESC";}
    $db = getDBconnection();
    $query = 'SELECT entry.id, title, text, timestamp, nickname, name, surname 
            FROM entry
            JOIN user ON user.id = entry.user_id ' .$order;
    $result = $db->query($query);
    return $result->fetchAll();
}

function logge_ein($n, $p){
    $db = getDBconnection();
    $query = "SELECT id, name FROM `user` 
    where nickname = '$n' AND
    password = '$p'";
    $result = $db->query($query);
    $result = $result->fetch();
    if($result) $_SESSION['eingeloggt'] = $n;
}

function erstelle_Beitrag($title, $text, $timestamp, $user_id){
    $db = getDBconnection();
    $result = $db->query("SELECT id FROM user WHERE nickname like '".$user_id."'");
    $user_id = $result->fetch();
    $query = "INSERT INTO entry (title, text, timestamp, user_id)
            VALUES ('".$title."', '".$text."', '".$timestamp."', '".$user_id[0]."')";
    $result = $db->query($query);
    $result = $result->fetch();
}

function loesche_Beitrag($id){
    $db = getDBconnection();
    $query = "DELETE FROM entry WHERE id = ".$id;
    $result = $db->query($query);
}

function hole_Beitrag($id){
    $db = getDBconnection();
    $query = "SELECT title, text, timestamp FROM entry WHERE id like ".$id;
    $result = $db->query($query);
    $result = $result->fetch();
    return $result;
}

function update_Beitrag($id, $title, $text, $timestamp){
    $db = getDBconnection();
    $query = "UPDATE entry SET title='".$title."', text='".$text."', timestamp='".$timestamp."' WHERE id=".$id;
    $result = $db->query($query);
    $result = $result->fetch();
}

function ist_eingeloggt() {
    $erg = false;
    if (isset($_SESSION['eingeloggt'])) {
        if (!empty($_SESSION['eingeloggt']))
            $erg = true;
    }
    return $erg;
}


function logge_aus() {
    unset($_SESSION['eingeloggt']);
}

function ist_loeschberechtigt($nickname){
    if(ist_eingeloggt()){
        if($nickname == $_SESSION['eingeloggt']){
            return true;
        }
    }
    return false;
}

function getDBconnection(){
    $db = new PDO('mysql:host=localhost;dbname=webuebung','root');
    return $db;
}

?>