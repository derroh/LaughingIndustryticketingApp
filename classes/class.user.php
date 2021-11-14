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
			return $row['Password'];

		} catch(PDOException $e) {
		    echo '	<div class="alert alert-danger">'.$e->getMessage().'</div>';
		}
	}

	public function login($user_email,$password){

		$hashed = $this->get_user_hash($user_email);

		if($this->password_verify($password,$hashed) == 1){

		    $_SESSION['loggedin'] = true;
		    return true;
		}
	}

	public function logout(){
		session_destroy();
	}

  //// Send Email
  public function send_mail($email,$message,$subject)
  {
    require_once('mailer/class.phpmailer.php');

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($email);
    $mail->Username="youremail@gmail.com";
    $mail->Password="emailpassword";
    $mail->SetFrom('youremail@gmail.com','Asset Manager');
    $mail->AddReplyTo("youremail@gmail.com","Asset Manager");
    $mail->Subject    = $subject;
    $mail->MsgHTML($message);
    if($mail->Send()){
      return "sent";
    }else {
        return "Failed";
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
  public function UsernameExists($Username)
  {
    try {

      $stmt = $this->_db->prepare('SELECT Password FROM users WHERE Username = :Username');
      $stmt->execute(array('Username' => $Username));
      $row = $stmt->fetch();

      return $stmt->rowCount();

    } catch(PDOException $e) {
        echo '<p class="error">'.$e->getMessage().'</p>';
    }
  }
}
?>
