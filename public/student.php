<?php 

//REFERENCE PAGE CHECK
//Get URL of reference page
$refUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'list.php?page=1' ;
//Strip  'http://toto.dev/' to get simple link
$pageRef =  str_replace("http://toto.dev/", "", $refUrl) ;



//Include config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

//Include other data
$headerH1 = 'Student Info';


$studentId = isset($_GET['stu_id']) ? intval($_GET['stu_id']) : 0 ;

$sql = "

SELECT *
FROM student
INNER JOIN session ON student.session_ses_id = session.ses_id
INNER JOIN location ON session.location_loc_id = location.loc_id
WHERE stu_id = $studentId 

";

//execute the query and save it in a variable

$student = $pdo->prepare($sql);

	$student->bindValue(':stuLastName', $studentId);

$student->execute();


//fetchall results - without numbered index
$studentInfo = $student->fetch(PDO::FETCH_ASSOC);


$from = new DateTime($studentInfo['stu_birthdate']);
$to   = new DateTime('today');
$age = $from->diff($to)->y;

if($from <= $to) {
 $studentAge = $age;
} else
$studentAge = '-'.$age.' (Not yet born)';
;


//Include the views

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/student.php';
include dirname(dirname(__FILE__)).'/view/footer.php';