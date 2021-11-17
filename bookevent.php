<?php
  require('func/config.php');

    $EventId = $_POST['EventId'];
    
    $VIPTicketCost = $_POST['VIPTicketCost'];
    $RegularTicketCost = $_POST['RegularTicketCost'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $VIPTickets = $_POST['VIPTickets'];
    $RegularTickets = $_POST['RegularTickets'];
    $Createdby = 1;
    $message = "";
    $EventName = $_POST['EventName'];

    $PhoneNumber= "";  
    $Password = "";
    $EmailSubject = "";
    $UserId = "";
    
    //create user if no email exists.

    if(!$user->EmailExists($Email))
    {        
       $user->CreateUser($Name, $Email, $PhoneNumber,  $Password);

       $UserId = $user->getLastUserID();
    }
    else{
        $UserId = $user->GetId($Email);
    }


    // VIP

    if($VIPTickets)
    {
        for ($x = 1; $x <= $VIPTickets; $x++) 
        {
            $ticket ->CreateTicket('VIP', $EventId, $UserId,  $VIPTicketCost);
        }

        $EmailSubject = "You have successfully booked " . $VIPTickets . " VIP Tickets for  " .$EventName . "." ;
    }

    // Regular
    
    if($RegularTickets > 0)
    {
        for ($x = 1; $x <= $RegularTickets; $x++) 
        {
            $ticket ->CreateTicket('Regular', $EventId, $UserId,  $RegularTicketCost);
        }

        $EmailSubject = "You have successfully booked " . $RegularTickets . " Regular Tickets for  " .$EventName . "." ;
    }  

    if($RegularTickets > 0 && $VIPTickets > 0)
    {
        $EmailSubject = "You have successfully booked " . $VIPTickets . " VIP Tickets and  " .$RegularTickets . " Regular Tickets for " .$EventName . "." ;
    }

    


    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    //require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'acmp013@gmail.com';                     //SMTP username
        $mail->Password   = 'rdcrwqtwrvklcgbd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('acmp013@gmail.com', 'Churchill Laugh Industry Events');
        $mail->addAddress($Email, $Name);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Ticket booking success';

        $mail->Body    = $EmailSubject;

        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

       

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    echo json_encode(array("statusCode"=>$EmailSubject));


  ?>