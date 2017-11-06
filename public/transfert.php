<?php
require_once __DIR__.'/../inc/config.php' ;

// formulaire d'upload
if(!empty($_POST)) {
    if(!empty($_FILES)) {
        $fileUpload = isset($_FILES['fileUpload']) ? $_FILES['fileUpload'] : array() ;

        $fileOk = true ;
        $allowedExtensions = array('csv') ;
        // vérification de la taille du fichier
        if(filesize($fileUpload['tmp_name'])>100000) {
            $fileOk = false ;
            echo "<script>alert('Fichier trop gros !')</script>" ;
        }
        // vérification du type de fichier
        if($fileUpload['type'] != 'application/vnd.ms-excel') {
            $fileOk = false ;
            echo "<script>alert('type non valide')</script>" ;
        }
        // vérification de l'extension
        $dotPosition = strrpos($fileUpload['name'],'.') ;
        $extension = substr($fileUpload['name'], $dotPosition+1) ;
        if(!in_array($extension, $allowedExtensions)) {
            $fileOk = false ;
            echo "<script>alert('extension non valide')</script>" ;
        }
        // si le file est OK
        if($fileOk) {
            // renommer le fichier et l'enregistrer dans un dossier
            $newFileName = md5(uniqid().'zut').'.'.$extension ;
            if(move_uploaded_file($fileUpload['tmp_name'], __DIR__.'/csv/'.$newFileName)) {
                // ouvrir le fichier
                $handle = fopen(__DIR__.'/csv/'.$newFileName,'r') ;
                // préparer la requête
                $sql = "INSERT INTO student (stu_lastname, stu_firstname, stu_birthdate, stu_email, stu_friendliness, session_ses_id, city_cit_id) VALUES (:lastname, :firstname, :birthdate, :email, :friendliness, :session, :city)" ;
                $session = 1 ;
                $city = 4 ;
                $pdoStatement = $pdo->prepare($sql) ;
                // enregistrement de chaque étudiant
                while (!feof($handle)) {
                    $student = explode(';',fgets($handle)) ;
                    if (!empty($student[0])) {
                        $pdoStatement->bindValue(':lastname',$student[0]) ;
                        $pdoStatement->bindValue(':firstname',$student[1]) ;
                        $pdoStatement->bindValue(':email',$student[2]) ;
                        $pdoStatement->bindValue(':friendliness',$student[3]) ;
                        $pdoStatement->bindValue(':birthdate',$student[4]) ;
                        $pdoStatement->bindValue(':session',$session) ;
                        $pdoStatement->bindValue(':city',$city) ;
                        $pdoStatement->execute() ;
                    }
                }
                // fermeture du fichier
                if(fclose($handle)) {
                    echo "<script>alert('Fichier enregistré')</script>" ;
                } else {
                    echo "<script>alert('Fichier non fermé')</script>" ;
                }
            } else {
                echo "<script>alert('Fichier non enregistré')</script>" ;
            }
        }
    }
}

// formulaire d'export
if(!empty($_GET)) {
    // requête
    $sql = "SELECT stu_lastname, stu_firstname,  stu_email,  stu_friendliness, stu_birthdate, session_ses_id, city_cit_id FROM student" ;
    $pdoStatement = $pdo->prepare($sql) ;
    $pdoStatement -> execute() ;
    $studentsList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ;
    // suppression du fichier si il existe déjà
    $path = __DIR__.'/export/export-'.date('Ymd').'.csv' ;
    if (file_exists($path)) {
        unlink($path) ;
        echo "<script>alert('Fichier existant supprimé')</script>" ;
    } ;
    // ouverture et remplissage du fichier csv
    $handle = fopen($path,'w') ;
    foreach ($studentsList as $key => $student) {
        $row = $student['stu_lastname'].';'.$student['stu_firstname'].';'.$student['stu_email'].';'.$student['stu_friendliness'].';'.$student['stu_birthdate'].PHP_EOL ;
        fwrite($handle,$row) ;
    }
    // fermeture du fichier
    fclose($handle) ;
    echo "<script>alert('Fichier exporté')</script>" ;

}
require_once __DIR__.'/../view/header.php' ;
require_once __DIR__.'/../view/transfert.php' ;
require_once __DIR__.'/../view/footer.php' ;
 ?>
