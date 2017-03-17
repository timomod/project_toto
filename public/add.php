<?php 

/***********************************************************/
//Include config.php
/***********************************************************/
require dirname(dirname(__FILE__)).'/inc/config.php';

/***********************************************************/
//Include other data
/***********************************************************/

$headerH1 = 'Add New Student';



/***********************************************************/
//SQL query : Fetch all Sessions for display on form, 
$sql = "

SELECT ses_number, tra_name, ses_id
FROM session
INNER JOIN training ON session.training_tra_id = training.tra_id
GROUP BY ses_id
";

//execute the query and save it in a variable
$locations = $pdo->query($sql);
//Fetcall results - without numbered index
$locationsList = $locations->fetchAll(PDO::FETCH_ASSOC);

/***********************************************************/
//Testing


//WARNING variables
$warningLastname = '';
$warningFirstname = '';
$warningDob = '';
$warningEmail = '';
$warningFriendliness = '';
$warningSessions = '';




 if(!empty($_POST)) {

 	/***********************************************************/
	//Image upload

	if(!empty($_FILES)) {
		print_r($_FILES);
		$currentFileUpload = $_FILES['fileForm'];
		//Variables containing file extension check
		$fileExtension = substr($currentFileUpload['name'], -4);
		$fileExtension2 = substr($currentFileUpload['name'], -5);
		//Check file extension
		if($fileExtension == '.jpg' || $fileExtension2 == '.jpeg' || $fileExtension == '.gif' || $fileExtension == '.svg' || $fileExtension == '.png'  ) {  

			if(move_uploaded_file($currentFileUpload['tmp_name'], './files/'.$currentFileUpload['name'] )) {
				echo 'Upload of <strong>'.$currentFileUpload['name'].'</strong> succesfull!';
			} else {
				echo 'File upload failed!';
			}

		}//check extension is pdf
	}//if not empty $_FILES

	/***********************************************************/
	//Form content for DB
 
	$lastname = strip_tags(strtoupper(trim($_POST['lastname'])));
	$firstname = strip_tags(trim($_POST['firstname']));
	//DOB : 3 fields
	$bMonth = strip_tags(trim($_POST['bMonth']));
	$bDay = strip_tags(trim($_POST['bDay']));
	$bYear = strip_tags(trim($_POST['bYear']));
	$dob = "{$bYear}-{$bMonth}-{$bDay}";
	$email = $_POST['email'];
	$friendliness =  $_POST['friendliness'];
	$sessions =  $_POST['session'];
	$formOk = true;


	//FIRSTNAME
	// Vérifie si le nom est vide ou pas
	if (empty($lastname)) {
		$warningLastname =  '<p class="formWarning">Lastname is empty</p>';
		$formOk = false;
	}
	// Vérifie que le nom fait 2 caractères au moins
	else if (strlen($lastname) < 2) {
	
		$warningLastname =  '<p class="formWarning">Minimum lenght of Lastname is 2 characters</p>';
		$formOk = false;
	}
	//LASTNAME
	// Vérifie si le prenom est vide ou pas
	if (empty($firstname)) {
		$warningFirstname =  '<p class="formWarning">Firstname is empty</p>';
		$formOk = false;
	}
	// Vérifie que le prénom fait 2 caractères au moins
	else if (strlen($firstname) < 2) {
		$warningLastname =  '<p class="formWarning">Firstname has to be atleast 2 characters long</p>';
		$formOk = false;
	}
	//DOB
	// Check if any of the date fields is empty
		if (empty($bMonth)  || empty($bDay) || empty($bYear)) {
			$warningDob =  '<p class="formWarning">All DOB fields need to be filled in</p>';
			$formOk = false;
		}
		// Check DOB format
		//else if (checkdate($bMonth, $bDay, $bYear) == false ) {
			//$warningDob =  '<p class="formWarning">DOB format is wrong. Correct format is: DD-MM-YYYY</p>';
			
			//$formOk = false;
		//}
	//EMAIL
	// Vérifie si le prenom est vide ou pas
		if (empty($email)) {
			$warningEmail =  '<p class="formWarning">Email is empty</p>';
			$formOk = false;
		}
		// Vérifie que le prénom fait 2 caractères au moins
		else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
			$warningEmail =  '<p class="formWarning">Invalid Email</p>';
			$formOk = false;
		}
	//FRIENDLINESS
		// Check if frendliness level has been chosen
		if (empty($friendliness)) {
			$warningFriendliness =  '<p class="formWarning">You did not choose a Friendliness level</p>';
			echo 'Friendliness level not chosen<br>';
			$formOk = false;
		}
	//SESSIONS
		if (empty($sessions)) {
			$warningSessions =  '<p class="formWarning">You did not choose a student Session</p>';
			$formOk = false;
		}
	// IF OK ACTION

	if ($formOk) {


		//ADD to DB.

		$sql = "
		INSERT INTO student (stu_lastname,stu_firstname,stu_birthdate,stu_email,stu_friendliness,session_ses_id)
		VALUES ( :lastname, :firstname, :birthdate, :email, :friendliness, :sessions)

		";

		$studentInfo = $pdo->prepare($sql);

			$studentInfo->bindValue(':lastname', $lastname);
			$studentInfo->bindValue(':firstname', $firstname);
			$studentInfo->bindValue(':birthdate', $dob);
			$studentInfo->bindValue(':email', $email);
			$studentInfo->bindValue(':friendliness', $friendliness);
			$studentInfo->bindValue(':sessions', $sessions);

		$studentInfo->execute();
		


		exit;
	}
}








//Include the views

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/add.php';
include dirname(dirname(__FILE__)).'/view/footer.php';








/* -- Part 5 = Page add/ajout --
--------------------------------
	
- add.php :
	* récupérer toutes les villes de la DB
	* récupérer toutes les sessions de la DB
	* inclure la vue correspondant à la page "add"
	* dans la vue, écrire le formulaire HTML permettant de saisir toutes les données sur un student :
		nom, prénom, date de naissance, email, sympathie, session (menu déroulant <select>) et ville (menu déroulant <select>)
	* après soumissions du formulaire :
		** récupérer les données envoyées en POST par le formulaire
		** traiter et valider les données
		** si toutes les données sont valides, ajouter en DB puis rediriger sur la page "student" de l'étudiant ajouté
	
*/