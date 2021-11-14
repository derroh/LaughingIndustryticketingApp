<?php
  require('func/config.php');

    $EventName = $_POST['EventName'];
    $Location = $_POST['Location'];
    $Date = $_POST['Date'];
    $EventTime = $_POST['EventTime'];
    $TotalCapacity = $_POST['TotalCapacity'];
    $VIPCapacity = $_POST['VIPCapacity'];
    $RegularCapacity = $_POST['RegularCapacity'];
    $VIPTicketCost = $_POST['VIPTicketCost'];
    $RegularTicketCost = $_POST['RegularTicketCost'];

   // $myDate = date('Y/m/d');
    $Replaceddate = str_replace('/', '-', $Date);
    $FormatedDate = date('Y-m-d', strtotime($Replaceddate));
    $Createdby = 1;
    $message = "";

    $stmt = $db->prepare("INSERT INTO events(EventName, Location, Date, EventTime, TotalCapacity, VIPCapacity, RegularCapacity, VIPTicketCost, RegularTicketCost, CreatedBy) VALUES
 (:EventName,:Location,:Date,:EventTime,:TotalCapacity,:VIPCapacity,:RegularCapacity,:VIPTicketCost,:RegularTicketCost,:CreatedBy)") ;
 
    $stmt->bindParam(':EventName', $EventName);
    $stmt->bindParam(':Location', $Location);
    $stmt->bindParam(':Date', $FormatedDate);
    $stmt->bindParam(':EventTime', $EventTime);
    $stmt->bindParam(':TotalCapacity', $TotalCapacity);
    $stmt->bindParam(':VIPCapacity', $VIPCapacity);
    $stmt->bindParam(':RegularCapacity', $RegularCapacity);
    $stmt->bindParam(':VIPTicketCost', $VIPTicketCost);
    $stmt->bindParam(':RegularTicketCost', $RegularTicketCost);
    $stmt->bindParam(':CreatedBy', $Createdby);

    if($stmt->execute())
    {
        echo json_encode(array("statusCode"=>200));

    }else{
        echo json_encode(array("statusCode"=>201));
    }

  ?>