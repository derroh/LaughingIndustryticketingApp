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
}
?>
