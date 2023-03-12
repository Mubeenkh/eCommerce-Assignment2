<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

	<title><?= $data ?></title>
	<style>
		
		a:link { 
			text-decoration: none; 
		}


		a:visited { 
			text-decoration: none; 
		}


		a:hover { text-decoration: none; }


		a:active { text-decoration: none; }

	</style>


</head>

<body>

	<div class="d-flex">



		
		<!-- Side Bar -->
		<div class="card p-3" style="width: 18rem;">
			<ul class="list-group list-group-flush">
				<!-- <div class="text-center"> -->
				    <a href="/Main/index"  ><h2>CliqueBait</h2></a>  
				<!-- </div> -->
			    <?php
					if(isset($_SESSION['user_id'])){
						//try to display username
						
					}else{
						echo '<li class="list-group-item"><a href="/User/index">Login</a></li>';
						echo '<li class="list-group-item"><a href="/User/register">Register</a></li>';
					}
				?>
				
				
				<li class="list-group-item"><a href="/Profile/index">My Profile</a></li>
				<li class="list-group-item"><a href='/Publication/create'>New Post</i></a></li>
				<li class="list-group-item"><a href='/User/logout'>Sign Out</i></a></li>


			</ul>
		</div>
<!-- //////////////////////////////	 -->
		
		<!-- Content -->
		<div class="container">
			<!-- Error Message -->
			
				<?php 
					if(isset($_GET['error'])){
						echo '<div class="alert alert-danger">' . $_GET['error'] . '</div>';
					}
					if(isset($_GET['success'])){
						echo '<div class="alert alert-success">' . $_GET['success'] . '</div>';
					}
				?>
			