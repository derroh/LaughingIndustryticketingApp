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



    $message ='<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$message .= '<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"></html>';
$message .= '<head>';
  $message .= '<!--[if gte mso 9]>';
    $message .= '<xml>';
      $message .= '<o:OfficeDocumentSettings>';
        $message .= '<o:AllowPNG/>';
        $message .= '<o:PixelsPerInch>96</o:PixelsPerInch>';
        $message .= '</o:OfficeDocumentSettings>';
        $message .= '</xml>';
        $message .= '<![endif]-->';
        $message .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        $message .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $message .= '<meta name="x-apple-disable-message-reformatting">';
        $message .= '<!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->';
        $message .= '<title></title>';
  
        $message .= ' <style type="text/css">';
      $message .= 'table, td { color: #000000; } @media only screen and (min-width: 620px) {';
        $message .= '.u-row {';
          $message .= ' width: 600px !important;';
          $message .= '}';
          $message .= '.u-row .u-col {';
            $message .= 'vertical-align: top;';
            $message .= '}';

            $message .= ' .u-row .u-col-33p33 {';
              $message .= 'width: 199.98px !important;';
              $message .= '}';

              $message .= '.u-row .u-col-66p67 {';
                $message .= ' width: 400.02px !important;';
                $message .= ' }';

                $message .= ' .u-row .u-col-100 {';
                  $message .= 'width: 600px !important;';
                  $message .= '}';

                  $message .= ' }';

                  $message .= '@media (max-width: 620px) {';
                    $message .= ' .u-row-container {';
                      $message .= ' max-width: 100% !important;';
                      $message .= 'padding-left: 0px !important;';
                      $message .= 'padding-right: 0px !important;';
                      $message .= ' }';
                      $message .= '.u-row .u-col {';
                        $message .= 'min-width: 320px !important;';
                        $message .= 'max-width: 100% !important;';
                        $message .= ' display: block !important;';
                        $message .= '}';
                        $message .= '.u-row {';
                          $message .= ' width: calc(100% - 40px) !important;';
                          $message .= '}';
                          $message .= ' .u-col {';
                            $message .= 'width: 100% !important;';
                            $message .= ' }';
                            $message .= ' .u-col > div {';
                              $message .= ' margin: 0 auto;';
                              $message .= '}';
                              $message .= ' }';
                              $message .= ' body {';
                                $message .= 'margin: 0;';
                                $message .= 'padding: 0;';
                                $message .= ' }';

                                $message .= ' table,';
                                $message .= ' tr,';
                                $message .= ' td {';
                                  $message .= ' vertical-align: top;';
                                  $message .= ' border-collapse: collapse;';
                                  $message .= ' }';

                                  $message .= ' p {';
                                    $message .= 'margin: 0;';
                                    $message .= ' }';

                                    $message .= ' .ie-container table,';
                                    $message .= ' .mso-container table {';
                                      $message .= ' table-layout: fixed;';
                                      $message .= '}';

                                      $message .= '* {';
                                        $message .= ' line-height: inherit;';
                                        $message .= '}';

                                        $message .= 'a[x-apple-data-detectors="true"] {';
                                          $message .= ' color: inherit !important;';
                                          $message .= ' text-decoration: none !important;';
                                          $message .= '}';

                                          $message .= '</style>';
  
  

                                          $message .= '<!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" type="text/css"><!--<![endif]-->';

                                            $message .= '</head>';

                                            $message .= '<body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #473a4f;color: #000000">';
                                            $message .= ' <!--[if IE]><div class="ie-container"><![endif]-->';
                                            $message .= ' <!--[if mso]><div class="mso-container"><![endif]-->';
                                            $message .= '<table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #473a4f;width:100%" cellpadding="0" cellspacing="0">';
                                            $message .= '<tbody>';
                                            $message .= '<tr style="vertical-align: top">';
                                            $message .= ' <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #473a4f;"><![endif]-->';
    

                                            $message .= '<div class="u-row-container" style="padding: 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= ' <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">';
                                            $message .= '<div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">';
                                            $message .= ' <div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= ' <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 10px 10px 0px;background-color: rgba(255,255,255,0)">';
                                            $message .= '<div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">';
                                            $message .= '<div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 10px 10px 0px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= '<!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= '<table style="font-family:"Lato",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                            $message .= '<tbody>';
                                            $message .= '<tr>';
                                            $message .= ' <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Lato",sans-serif;" align="left">';
        
                                            $message .= '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
                                            $message .= '<tr>';
                                            $message .= ' <td style="padding-right: 0px;padding-left: 0px;" align="center">';
      
                                            $message .= ' <img align="center" border="0" src="images/image-1.jpeg" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 100%;max-width: 600px;" width="600"/>';
      
                                            $message .= '</td>';
                                            $message .= ' </tr>';
                                            $message .= '</table>';

                                            $message .= ' </td>';
                                            $message .= ' </tr>';
                                            $message .= ' </tbody>';
                                            $message .= '</table>';

                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= '</div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= ' <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= '<table style="font-family:"Lato",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                            $message .= ' <tbody>';
                                            $message .= '<tr>';
                                            $message .= '<td style="overflow-wrap:break-word;word-break:break-word;padding:27px 20px 10px;font-family:"Lato",sans-serif;" align="left">';
        
                                            $message .= ' <div style="color: #473a4f; line-height: 120%; text-align: left; word-wrap: break-word;">';
                                            $message .= '<p style="font-size: 14px; line-height: 120%;"><strong>';
                                            $message .= 'Hello '. $Name.',</strong></p>';
                                            $message .= '</div>';

                                            $message .= ' </td>';
                                            $message .= '</tr>';
                                            $message .= ' </tbody>';
                                            $message .= '</table>';

                                            $message .= '<table style="font-family:"Lato",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                            $message .= '<tbody>';
                                            $message .= ' <tr>';
                                            $message .= ' <td style="overflow-wrap:break-word;word-break:break-word;padding:0px 20px 20px;font-family:"Lato",sans-serif;" align="left">';
        
                                            $message .= ' <div style="color: #473a4f; line-height: 140%; text-align: left; word-wrap: break-word;">';
                                            $message .= ' <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 25.2px;">'.$EmailSubject.'</span></p>';
                                            $message .= '<p style="font-size: 14px; line-height: 140%;">&nbsp;</p>';
                                            $message .= '<p style="font-size: 14px; line-height: 140%;"><span style="font-size: 18px; line-height: 25.2px;">Kindly observe MOH guidlines for COVID-19</span></p>';
                                            $message .= ' </div>';

                                            $message .= '</td>';
                                            $message .= '</tr>';
                                            $message .= '</tbody>';
                                            $message .= '</table>';

                                            $message .= '<table style="font-family:"Lato",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                            $message .= ' <tbody>';
                                            $message .= '<tr>';
                                            $message .= ' <td style="overflow-wrap:break-word;word-break:break-word;padding:0px;font-family:"Lato",sans-serif;" align="left">';
        
                                            $message .= ' <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px dashed #CCC;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">';
                                            $message .= '<tbody>';
                                            $message .= '<tr style="vertical-align: top">';
                                            $message .= '<td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">';
                                            $message .= '<span>&#160;</span>';
                                            $message .= '</td>';
                                            $message .= ' </tr>';
                                            $message .= '</tbody>';
                                            $message .= ' </table>';

                                            $message .= ' </td>';
                                            $message .= '</tr>';
                                            $message .= ' </tbody>';
                                            $message .= '</table>';

                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= ' <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= '</div>';
                                            $message .= ' </div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= ' <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #ffffff;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="400" style="width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= '<!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= '<!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="200" style="width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= '<!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= ' <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= '</div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= ' <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #cb78ff;">';
                                            $message .= '<div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #cb78ff;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="200" style="width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">';
                                            $message .= ' <div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="400" style="width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= '<!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= '<!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= '</div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= '<div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #d7a0fa;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= '<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #d7a0fa;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="200" style="width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="400" style="width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= ' <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= '</div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px;background-color: rgba(255,255,255,0)">';
                                            $message .= '<div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #cb78ff;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #cb78ff;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="200" style="width: 200px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-33p33" style="max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;">';
                                            $message .= '<div style="width: 100% !important;">';
                                            $message .= '<!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="400" style="width: 400px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-66p67" style="max-width: 320px;min-width: 400px;display: table-cell;vertical-align: top;">';
                                            $message .= ' <div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 0px 10px 16px;background-color: rgba(255,255,255,0)">';
                                            $message .= '<div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #1f1724;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= ' <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px 10px 16px;background-color: rgba(255,255,255,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: #1f1724;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">';
                                            $message .= ' <div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= '<table style="font-family:"Lato",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">';
                                            $message .= ' <tbody>';
                                            $message .= '<tr>';
                                            $message .= ' <td style="overflow-wrap:break-word;word-break:break-word;padding:30px 25px;font-family:"Lato",sans-serif;" align="left">';
        
                                            $message .= '<div style="color: #ffffff; line-height: 160%; text-align: center; word-wrap: break-word;">';
                                            $message .= ' <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 16px; line-height: 25.6px;">Laugh Industry Ltd</span></p>';
                                            $message .= '<p style="line-height: 160%; font-size: 14px;">E-Mail: info@churchill.co.ke<br />Phone: (254) 726 109 109<br />Postal Address: 9935 &ndash; 00100 Nairobi, Kenya</p>';
                                            $message .= '</div>';

                                            $message .= ' </td>';
                                            $message .= '</tr>';
                                            $message .= ' </tbody>';
                                            $message .= '</table>';

                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= '</div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= ' <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '</div>';



                                            $message .= '<div class="u-row-container" style="padding: 30px;background-color: rgba(240,240,240,0)">';
                                            $message .= '<div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">';
                                            $message .= ' <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">';
                                            $message .= '<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 30px;background-color: rgba(240,240,240,0);" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:600px;"><tr style="background-color: transparent;"><![endif]-->';
      
                                            $message .= '<!--[if (mso)|(IE)]><td align="center" width="600" style="width: 600px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;" valign="top"><![endif]-->';
                                            $message .= '<div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">';
                                            $message .= ' <div style="width: 100% !important;">';
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--><div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;"><!--<![endif]-->';
  
                                            $message .= ' <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->';
                                            $message .= ' </div>';
                                            $message .= '</div>';
                                            $message .= '<!--[if (mso)|(IE)]></td><![endif]-->';
                                            $message .= '<!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->';
                                            $message .= '</div>';
                                            $message .= ' </div>';
                                            $message .= '</div>';


                                            $message .= ' <!--[if (mso)|(IE)]></td></tr></table><![endif]-->';
                                            $message .= ' </td>';
                                            $message .= '</tr>';
                                            $message .= ' </tbody>';
                                            $message .= ' </table>';
                                            $message .= ' <!--[if mso]></div><![endif]-->';
                                            $message .= '<!--[if IE]></div><![endif]-->';
                                            $message .= '</body>';

                                            $message .= '</html>';

    


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

        $mail->Body    = $message;

        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

       

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    echo json_encode(array("statusCode"=>$EmailSubject));


  ?>