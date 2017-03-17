<!DOCTYPE html>
<html>
<head>
	<title>Project Toto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JQuery and jQuery UI - Template</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/normalize.css">

	<!-- JQUERY UI CSS IMPORT -->
	<link rel="stylesheet" type="text/css" href="lib/jquery-ui-lib/jquery-ui.min.css">

	<!-- Bootstrap CDN-->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--Font-Awsome CDN-->
	<script src="https://use.fontawesome.com/62fead301e.js"></script>
	<!-- my styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

<div id="siteWrapper">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<!--Header-->
				<header>
				<!-- Navigation Bar -->
					<nav class="navbar navbar-default ">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="#">ToTo</a>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
							<li><a href="index.php">All Sessions</a></li>
							<li><a href="list.php?page=1">View All Students</a></li>
							<li><a href="add.php">Add a Student</a></li>
					      </ul>
					      
					     
					       <p class="navbar-text">  <?= isset($_SESSION['email']) ? 'Signed in as:'.$_SESSION['email'] : '';  ?> </p>


					      <form class="navbar-form navbar-right" role="search" method="GET" action="list.php" >
								<div class="form-group">
									<input type="text" class="form-control" name="s" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-success" value="Search">Submit</button>
							</form>
							
							<a href="signin.php">
								<button type="button" class="btn btn-success navbar-btn navbar-right"><i class="fa fa-user" aria-hidden="true"></i> Sign in</button>
							</a>
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</header>			
			</div><!--Bootstrap Col-width-->
		</div><!--Bootstrap  Row-->
				
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<h1><?= $headerH1 ?></h1>
		
	
		

