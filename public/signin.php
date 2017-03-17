<?php

/***********************************************************/
//Include config.php
/***********************************************************/
require dirname(dirname(__FILE__)).'/inc/config.php';


/***********************************************************/
//Include OTHER DATA
/***********************************************************/

$headerH1 = '';

/***********************************************************/

// MON CODE ICI
//Sent form

if (!empty($_POST)) {
	print_r($_POST);

	//I capture the data
	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '' ;
	$passwordToto = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '' ;
	//Error table 
	$errorList = array();

	//Validate the input:
	if (empty($emailToto)) {
		$errorList[] = 'Email is empty';
	}

	//When no errors:
	if(empty($errorList)) {
		//Check if user email exist in database
		$sql = "
			SELECT usr_id, usr_password, usr_email
			FROM user
			WHERE usr_email = :email
			
		";

		//Preapre the sql request
		$sth = $pdo->prepare($sql);
			$sth->bindValue(':email', $emailToto);

		//Exectute sql request and check if it is okay
		if($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			//If atleat 1 response -> check password
			if ($sth->rowCount() > 0) {
				//Fetch 1st line of the results
				$row = $sth->fetch(PDO::FETCH_ASSOC);


				if (password_verify($passwordToto, $row['usr_password'])) {
					echo 'Connection OK';

					$value = $row['usr_email'];
					$_SESSION['email'] = $value;
					print_r($_SESSION);exit;

				} 
				else {
					echo 'Email/Password combination does not exist';
				}

				

			} 
			else {
				echo 'Email does not exist';
			}
		}//Close-> Else 1


	}//Close->When no errors:
	else {
		print_r($errorList);

	}


}


/***********************************************************/
//Include the VIEWS
/***********************************************************/
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/signin.phtml';
include dirname(dirname(__FILE__)).'/view/footer.php';