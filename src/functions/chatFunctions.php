<?php
function getChatData($mysqli, $id){
    $resultaat = $mysqli->query("SELECT * FROM tblchat WHERE zenderid= '".$id."' or ontvangerid= '".$id."'"); 
    return ($resultaat->num_rows == 0)?false:$resultaat->fetch_all(MYSQLI_ASSOC); 
}

function InsertIntoChatTbl($mysqli, $ontvanger, $zenderVoornaam, $zenderAchternaam, $bericht, $chatid){
    $sql = "INSERT INTO tblchat(gesprekID, ontvanger, zenderVoornaam, zenderAchternaam, bericht) VALUES ('".$chatid."','".$ontvanger."','".$zenderVoornaam."','".$zenderAchternaam ."','".$bericht."')";
    return $mysqli->query($sql);
    
}
function getZender($mysqli,$gebruikersid) {
 $resultaat = $mysqli->query("SELECT * FROM tblgebruikers WHERE gebruikerid = '".$gebruikersid."'"); 
 return ($resultaat ->num_rows == 0)?false:$resultaat->fetch_all(MYSQLI_ASSOC); 
}

function getOntvanger ($mysqli,$user) {
    $resultaat = $mysqli->query("SELECT * FROM tblgebruikers WHERE gebruikerid = '".$user."'");
    return ($resultaat->num_rows == 0)?false:$resultaat->fetch_assoc()['voornaam']; 
}

function getMessage($mysqli,$chatid) {
    $resultaat = $mysqli ->query("SELECT * FROM tblmessage WHERE chatid='".$chatid."' ORDER BY messageid DESC limit 1"); 
    return ($resultaat->num_rows == 0)?"geen berichten":$resultaat->fetch_assoc()['message']; 
}

function updateNotification ($mysqli, $id) {
    $sql = ("UPDATE tblnotifications
    SET status = '1'
    WHERE id = ".$id); 
    return $mysqli -> query($sql); 
}

function createChat ($mysqli, $gesprekid,$ontvangersid,$zenderid, $link) {
    $sql = ("INSERT INTO tblchat (gesprekid, ontvangerid, zenderid, link)
    VALUES ('".$gesprekid."'," . $ontvangersid . ",".$zenderid.", '".$link."')") ;
    return $mysqli->query($sql);
}

function deleteNotification($mysqli, $id) {
    $sql = ("DELETE FROM tblnotifications WHERE id = " .$id); 
    return $mysqli -> query($sql); 
}

function deletechat($mysqli, $chatid) {
    $sql = ("DELETE FROM tblchat WHERE gesprekid= '" .$chatid."'"); 
    return $mysqli -> query($sql); 
}

function doesChatExists($connection,$userid,$otherUserId){
    $resultaat = $connection->query("SELECT * FROM tblchat WHERE ontvangerid='" .$userid."' AND zenderid='".$otherUserId."'");
    if($resultaat->num_rows == 0){
        $resultaat = $connection->query("SELECT * FROM tblchat WHERE zenderid='" .$userid."' AND ontvangerid='".$otherUserId."'");
        if($resultaat->num_rows == 0){
            return false;
        }
    }
    return $resultaat->fetch_assoc()['link'];
}
?>