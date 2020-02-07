<?php
	
	if(isset($_POST['email'])){
		require_once 'db_connection.php';
		$email = $_POST['email'];
		$stmt = $db->prepare("SELECT email FROM email_subscribe  WHERE email = ? LIMIT 1");
		$stmt->execute(array($email));
		if($stmt->rowCount() > 0){
			echo 'exist';
			exit();
		}else{
			$stmt = $db->prepare("INSERT INTO email_subscribe (email , date) VALUES (? , NOW())");
			$stmt->execute(array($email));
			if($stmt->rowCount() > 0){
				echo 'success';
			}
		}
		
	}

?>