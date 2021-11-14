<?php
	 require('func/config.php');
	 //if not logged in redirect to login page
	// if(!$user->is_logged_in()){ header('Location: signin.php'); }
   
	 if ($_REQUEST['delete']) {
   
		   $pid = $_REQUEST['delete'];
		   $query = "DELETE FROM events WHERE Id=:pid";
		   $stmt = $db->prepare( $query );
		   $stmt->execute(array(':pid'=>$pid));
   
		   if ($stmt) 
		   {
			echo json_encode(array("statusCode"=>200));

		   }
		   else
		   {
			echo json_encode(array("statusCode"=>201));
		   }
   
	   }else{
		echo json_encode(array("statusCode"=>201));
	   }
?>