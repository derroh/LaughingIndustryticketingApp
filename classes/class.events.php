<?php

class Events{

    private $db;

	function __construct($db){

		$this->_db = $db;

	}

  public function fetch_events($query){

    $stmt = $this->_db->prepare($query);
    $stmt->execute();

    $userData = array();

    $row=$stmt->fetchAll();

    $userData = $row;

    $this->data [] = $userData;


    return $userData;

  }

  public function countEvents()
  {
  
    try {

      $stmt = $this->_db->prepare("SELECT COUNT(Id) as EventCount FROM `events` WHERE 1");
      $stmt->execute();
      $row = $stmt->fetch();

     return $row['EventCount'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }
  public function fetch_top_events(){
    $query = "select
    @rownum := @rownum +1 as rank,
    prequery.EventId,
    prequery.TicketsSold,
    prequery.AmountCollected,
    prequery.EventName,
    prequery.EventLocation,
    prequery.EventDate
from
    ( select @rownum := 0 ) sqlvars,
    ( SELECT EventId, COUNT(tickets.Type) TicketsSold, SUM(tickets.AmountPaid) as AmountCollected, events.EventName as EventName, events.Location as EventLocation,  events.Date as EventDate
        from tickets, events where tickets.EventId = events.Id
        group by EventId
        order by count(TicketNumber) desc )  prequery";

    $stmt = $this->_db->prepare($query);
    $stmt->execute();

    $userData = array();

    $row=$stmt->fetchAll();

    $userData = $row;

    $this->data [] = $userData;


    return $userData;

  }

}

?>
