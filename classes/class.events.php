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

}

?>
