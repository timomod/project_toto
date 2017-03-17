<?php 


/***********************************************************/
//Include config.php
/***********************************************************/
require dirname(dirname(__FILE__)).'/inc/config.php';


/***********************************************************/
//Include OTHER DATA
/***********************************************************/
$headerH1 = 'Student List';

//Get page number parameter for pagiation and check if it exsists
$pageNo = isset($_GET['page']) ? $_GET['page'] : 1 ; 
//Transform page number into offset number
$pageOffset = ($pageNo - 1) * 5;

//Retrieve and check search form content
$searchData = isset($_GET['s']) ? $_GET['s'] : '';


/***********************************************************/

//SQL query to retrieve all student data OR search results IF $searchData is NOT empty
$sql = "

SELECT *
FROM student

";
//Add Search conditions to SQL query for lastname/firstname/email/city
// If $serachData id NOT empty 
if(!empty($searchData)){
	//echo '<br>Search is NOT empty<br>';

	$sql .= "
	LEFT JOIN city ON student.city_cit_id = city.cit_id
	WHERE stu_lastname LIKE :search
	OR stu_firstname LIKE :search
	OR stu_email LIKE :search
	OR cit_name LIKE :search

	";
} else {
//Limit restults to 5 with offset if NOT search
	$sql .= "

	LIMIT 5 OFFSET $pageOffset

	";
}

//prepare the query 
$students = $pdo->prepare($sql);
	//IF search has been called : bind search value 
	if(!empty($searchData)){
		$students->bindValue(':search', "%$searchData%");
	}
//execute the query
$students->execute();
//Fetcall results - without numbered index
$resultsList = $students->fetchAll(PDO::FETCH_ASSOC);


/***********************************************************/

//SQL query that return the number of rows: used for pagiation
$sqlCount = "

SELECT COUNT(*) AS stunum
FROM student

";

$rows = $pdo->query($sqlCount);
$rowCount = $rows->fetch(PDO::FETCH_ASSOC);
$studentCount = $rowCount['stunum'];


/***********************************************************/
//Include the VIEWS
/***********************************************************/
include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/list.php';
include dirname(dirname(__FILE__)).'/view/footer.php';