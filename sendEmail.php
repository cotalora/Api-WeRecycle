<?php   
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Authorization, Accept, X-Requested-With, x-xsrf-token");
    header('Content-Type: application/json; charset=utf-8');

    $postjson = json_decode(file_get_contents('php://input'), true);
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exeception;
    
    require 'Phpmailer/Exception.php';
    require 'Phpmailer/PHPMailer.php';
    require 'Phpmailer/SMTP.php';

    $mail = new PHPMailer(true);

    //REGISTRO USUARIO
    if ($postjson['aksi'] == "email_auth") {

        $request = json_decode($postdata);
        $email = $postjson['mil'];
        $token = $postjson['token'];

        try {
            //Server settings
            
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp-relay.sendinblue.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'cristianyesidot@gmail.com';                     // SMTP username
            $mail->Password   = 'SfNEDFPbXsIr7yT2';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom($email, 'WeRecycle');
            $mail->addAddress($email, 'User');     // Add a recipient
        
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Recuperar cuenta';
            $mail->Body    = 'Hola<br> Este es su c&oacute;digo: <b>'.$token.'</b>.';
        
            $mail->send();
            $result = json_encode(array('success'=>true, 'msg'=>'Message has been sent'));
        } catch (Exception $e) {
            $result = json_encode(array('success'=>false, 'msg'=>'No se realizó el registro'));
        }
        echo $result;
    }
?>