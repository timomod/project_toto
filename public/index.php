<?php 

//Include config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

//Include other data
$headerH1 = 'Toto Home';




$sql = "

SELECT *
FROM session
INNER JOIN location ON session.location_loc_id = location.loc_id
INNER JOIN training ON session.training_tra_id = training.tra_id
GROUP BY ses_id
ORDER BY loc_name, ses_id

";

//execute the query and save it in a variable
$sessions = $pdo->query($sql);

//fetchall results - without numbered index
$sessionsInfo = $sessions->fetchAll(PDO::FETCH_ASSOC);




//Include the views

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/home.php';
include dirname(dirname(__FILE__)).'/view/footer.php';







