<?php

class Tickets{

  private $db;

	function __construct($db){

		$this->_db = $db;

	}
  public function sumTicketsSoldAmount()
  {
  
    try {

      $stmt = $this->_db->prepare("SELECT COALESCE(Sum(AmountPaid),0) as ToTalTicketsAmountSold FROM `tickets` WHERE 1");
      $stmt->execute();
      $row = $stmt->fetch();

     return $row['ToTalTicketsAmountSold'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }

  public function countTicketsSold()
  {
  
    try {

      $stmt = $this->_db->prepare("SELECT Count(TicketNumber) as ToTalTicketsSold FROM `tickets` WHERE 1");
      $stmt->execute();
      $row = $stmt->fetch();

     return $row['ToTalTicketsSold'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }

  public function CreateTicket($Type, $EventId, $UserId,  $AmountPaid)
  {
      $stmt =  $this->_db->prepare('INSERT INTO tickets(Type, EventId, UserId, AmountPaid) VALUES (:Type, :EventId, :UserId, :AmountPaid)');

      $stmt->bindParam(':Type', $Type);
      $stmt->bindParam(':EventId', $EventId);
      $stmt->bindParam(':UserId', $UserId);
      $stmt->bindParam(':AmountPaid', $AmountPaid);
      if($stmt->execute())
      {
        $message = "The ticket was successfully created";
        //header("refresh:5;index.php"); // redirects image view page after 5 seconds.
      }
      else
      {
        $errMSG = "An error occured while inserting....";
      }

    }

}

?>
