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
    $EventId = $_POST['Id'];
    $EventDescription = $_POST['EventDescription'];

   // $myDate = date('Y/m/d');
    $Replaceddate = str_replace('/', '-', $Date);
    $FormatedDate = date('Y-m-d', strtotime($Replaceddate));
    $Createdby = 1;
    $message = "";

    $stmt = $db->prepare("UPDATE events SET EventName=:EventName,Location=:Location,Date=:Date,EventTime =:EventTime,TotalCapacity=:TotalCapacity,VIPCapacity=:VIPCapacity,RegularCapacity=:RegularCapacity,VIPTicketCost=:VIPTicketCost,RegularTicketCost=:RegularTicketCost,CreatedBy=:CreatedBy,EventDescription=:EventDescription WHERE Id=:Id") ;
 
    $stmt->bindParam(':Id', $EventId);
    $stmt->bindParam(':EventName', $EventName);
    $stmt->bindParam(':EventDescription', $EventDescription);
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