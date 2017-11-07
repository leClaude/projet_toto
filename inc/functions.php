<?php

function emailExists ($email) {
    global $pdo ;
    $sql = "SELECT * FROM user WHERE usr_email=:email" ;
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement->bindValue(':email',$email) ;
    $pdoStatement->execute() ;
    $result = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
    if (empty($result[0])) {
        return false ;
    } else {
        return true ;
    } ;
} ;

function pwdCheck ($pwd) {
    if ( strlen($pwd)>7 ) {
        return true ;
    } else {
        return false ;
    }
}

?>
