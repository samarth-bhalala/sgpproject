<?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP; 
    use PHPMailer\PHPMailer\Exception;  
    session_start();
    extract($_POST);
    $mal=$_SESSION['email'];
    $code=rand(100000,999999);
    $_SESSION['cd']=$code;
    if($nps==null or $nps=="" or $cnps==null or $cnps=="" or $nps!=$cnps)
    {
        header("Location:chng_pass.php?unfil_msg=PLEASE ENTER PASSWORD And CONFIRM PASSWORD.");
    }
    else
    {
            
                require 'PHPMailer-master\src\Exception.php';
                require 'PHPMailer-master\src\PHPMailer.php';
                require 'PHPMailer-master\src\SMTP.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                
                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'samarthbhalala@gmail.com';                     //SMTP username
                    $mail->Password   = 'ovcv sekn kgeu glsa';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('samarthbhalala@gmail.com', 'Pysiofit');
                    $mail->addAddress("$mal");     //Add a recipient
                    // $mail->addAddress('');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/fil.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Code verification';
                    $mail->Body    = "Dear user,<br>Your code is:<br><h1>$code</h1><br>enter this code to change password.<br>Donot share with anyone.";
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    if($mail->send())
                    {
                        $_SESSION['nps']=$nps;
                        header("Location:chng_pass_verify.php");
                    }
                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
?>