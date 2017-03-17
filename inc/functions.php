<?php 	

function siteSignup($postdata, $dbConnect) {

	if(!empty($postdata)){
		print_r($postdata);


		$email = isset($postdata['email']) ? trim($postdata['email']) : '' ;
		$pword1 = isset($postdata['pword1']) ? trim($postdata['pword1']) : '' ;
		$pword2 = isset($postdata['pword2']) ? trim($postdata['pword2']) : '' ;


		$errorList = array();

		if (empty($email)) {
			$errorList[] = 'Email is empty';
		}

		if($pword1 != $pword2) {
			$errorList[] = 'The 2 passwords are different';
		}

		if(empty($errorList)) {
			echo 'Signup OK';
			$sql = "
			INSERT INTO user (usr_email,usr_password,usr_date_creation)
			VALUES (:email, :password, NOW())
			";

			$sth = $dbConnect->prepare($sql);
			 $sth->bindValue(':email', $email);
			 //password encypted using md5 and salt:
			 //$sth->bindValue('password',md5('w@#$fHtGh'.$pword1.'bgGHzx%$!90'));
			 // password encrypted with pasword_hash
			 $sth->bindValue('password',password_hash($pword1, PASSWORD_BCRYPT));
			
			if($sth->execute() === false) {
				print_r($sth->errorInfo());
			} else {
				echo 'Sign up OK<br>';
			}
		}//if(empty($erro



	}//if(!empty(£_PO...


}//function


function emailAndPasswordCheck($email,$pword1,$pword2,$dbConnect) {

	$errorList = array();

	if (empty($email)) {
		$errorList[] = 'Email is empty';
	}

	if($pword1 != $pword2) {
		$errorList[] = 'The 2 passwords are different';
	}

	if(empty($errorList)) {
		echo 'Signup OK';
		$sql = "
		INSERT INTO user (usr_email,usr_password,usr_date_creation)
		VALUES (:email, :password, NOW())
		";

		$sth = $dbConnect->prepare($sql);
		 $sth->bindValue(':email', $email);
		 //password encypted using md5 and salt:
		 //$sth->bindValue('password',md5('w@#$fHtGh'.$pword1.'bgGHzx%$!90'));
		 // password encrypted with pasword_hash
		 $sth->bindValue('password',password_hash($pword1, PASSWORD_BCRYPT));
		
		if($sth->execute() === false) {
			print_r($sth->errorInfo());
		} else {
			echo 'Sign up OK<br>';
		}
	}



}