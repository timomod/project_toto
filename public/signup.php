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

//Form sent
if(!empty($_POST)){
	print_r($_POST);


	$emailToto = isset($_POST['emailToto']) ? trim($_POST['emailToto']) : '' ;
	$passwordToto1 = isset($_POST['passwordToto1']) ? trim($_POST['passwordToto1']) : '' ;
	$passwordToto2 = isset($_POST['passwordToto2']) ? trim($_POST['passwordToto2']) : '' ;

	$errorList = array();

	if (empty($emailToto)) {
		$errorList[] = 'Email is empty';
	} 

	if ( strlen($passwordToto1) <= 7 ){
		$errorList[] = 'Minumum length of password is 8 characters';
		
	} elseif ($passwordToto1 != $passwordToto2) {
		$errorList[] = 'The 2 passwords are different';
	}

	if(empty($errorList)) {
		echo 'Signup OK';
		$sql = "
		INSERT INTO user (usr_email,usr_password,usr_date_creation)
		VALUES (:email, :password, NOW())
		";

		$sth = $pdo->prepare($sql);
		 $sth->bindValue(':email', $emailToto);
		 //password encypted using md5 and salt:
		 	//$sth->bindValue('password',md5('w@#$fHtGh'.$passwordToto1.'bgGHzx%$!90'));
		 // password encrypted with pasword_hash
		 $sth->bindValue(':password',password_hash($passwordToto1, PASSWORD_BCRYPT));
		
		if($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			echo 'Sign up OK<br>';
		}
	}



}




/***********************************************************/
//Include the VIEWS
/***********************************************************/
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/signup.phtml';
include dirname(dirname(__FILE__)).'/view/footer.php';