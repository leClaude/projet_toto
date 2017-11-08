<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require __DIR__.'/../vendor/autoload.php';

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
    if ( preg_match('/(.*[A-Z].*[0-9].*)|(.*[0-9].*[A-Z].*)/',$pwd) && strlen($pwd)>7 ) {
        return true ;
    } else {
        return false ;
    }
}

function sendEmail($to, $subject, $htmlContent, $textContent='') {
    global $config ;
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $config['MAIL_HOST'];                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
        $mail->Password = $config['MAIL_PASSWORD'];                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        ) ;

        //Recipients
        $mail->setFrom('noreply@projet-toto.com', 'Webmaster projet-toto');
        $mail->addAddress($to, 'User');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $textContent;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
} ; // fin fonction sendEmail
?>
