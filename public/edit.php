<?php 

//Include config.php
require dirname(dirname(__FILE__)).'/inc/config.php';

//Include other data
$headerH1 = 'Edit Student';

//Include the views

include dirname(dirname(__FILE__)).'/view/header.php';
include dirname(dirname(__FILE__)).'/view/edit.php';
include dirname(dirname(__FILE__)).'/view/footer.php';