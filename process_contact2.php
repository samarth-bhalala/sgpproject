<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();

$email = $_GET['email'];
$message = $_GET['message'];
$name = $_GET['name'];
$username=$_SESSION['username'];
$q="INSERT INTO `contactus`( `full_name`, `username`, `email`, `message`) VALUES ('$name','$username','$email','$message')";
$result = mysqli_query($con, $q);
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;  
    
        require 'PHPMailer-master\src\Exception.php';
        require 'PHPMailer-master\src\PHPMailer.php';
        require 'PHPMailer-master\src\SMTP.php';
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
                    $mail->setFrom('samarthbhalala@gmail.com', 'contactus');
                    $mail->addAddress("samarthbhalala@gmail.com","$name");     //Add a recipient
                    // $mail->addAddress('');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/fil.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = "Physiofit";
                    $mail->Body    = " $email has send $message ";
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    if($mail->send())
                    {   
                        header("Location:contactus.php?msg='message sent succesfully'");
                    }
                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            



?>