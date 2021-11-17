<?php

include('class.password.php');

class User extends Password{

    private $db;

	function __construct($db){
		parent::__construct();

		$this->_db = $db;
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}
  public function get_user(){
			return $_SESSION['user'];
	}

	private function get_user_hash($user_email){

		try {

			$stmt = $this->_db->prepare('SELECT Password FROM users WHERE Email = :Email');
			$stmt->execute(array('Email' => $user_email));

			$row = $stmt->fetch();

      return $row['Password'] ?? 'default value';
		//	return $row['Password'];

		} catch(PDOException $e) {
		    echo '	<div class="alert alert-danger">'.$e->getMessage().'</div>';
		}
	}

	public function login($user_email,$password){

		$hashed = $this->get_user_hash($user_email);

    if(md5($password) == $hashed ){
      $_SESSION['loggedin'] = true;
		    return true;
    }

		// if($this->password_verify($password,$hashed) == 1){

		//     $_SESSION['loggedin'] = true;
		//     return true;
		// }
	}

	public function logout(){
		session_destroy();
	}

  public function countUsers()
  {
  
    try {

      $stmt = $this->_db->prepare("SELECT Count(Id) as ToTalUsers FROM `users` WHERE 1");
      $stmt->execute();
      $row = $stmt->fetch();

     return $row['ToTalUsers'];

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }

  public function CreateUser($Name, $Email, $PhoneNumber,  $Password)
  {
	$stmt =  $this->_db->prepare('INSERT INTO users( Name, Email, PhoneNumber, Password) VALUES (:Name, :Email, :PhoneNumber, :Password)                                ');

	$stmt->bindParam(':Name', $Name);
	$stmt->bindParam(':Email', $Email);
	$stmt->bindParam(':PhoneNumber', $PhoneNumber);
	$stmt->bindParam(':Password', $Password);
	if($stmt->execute())
	{
		$message = "The account was successfully created";
		//header("refresh:5;index.php"); // redirects image view page after 5 seconds.
	}
	else
	{
		$errMSG = "An error occured while inserting....";
	}
  }
  public function EmailExists($user_email)
  {
    try {

			$stmt = $this->_db->prepare('SELECT Password FROM users WHERE Email = :user_email');
			$stmt->execute(array('user_email' => $user_email));
      		$row = $stmt->fetch();

			return $stmt->rowCount();

		} catch(PDOException $e) {
		    echo '<p class="error">'.$e->getMessage().'</p>';
		}
  }
  public function getLastUserID()
  {
    try {

			$stmt = $this->_db->prepare('SELECT MAX(Id) FROM users ');
			$stmt->execute();
      		$row = $stmt->fetch();

			return $row['MAX(Id)'];

	} catch(PDOException $e) {
		echo '<p class="error">'.$e->getMessage().'</p>';
	}
  }
  public function GetId($user_email)
  {
    try {

			$stmt = $this->_db->prepare('SELECT Id FROM users WHERE Email = :user_email');
			$stmt->execute(array('user_email' => $user_email));
      		$row = $stmt->fetch();

	 	 return $row['Id'];

	} catch(PDOException $e) {
		echo '<p class="error">'.$e->getMessage().'</p>';
	}
  }
}
?>
