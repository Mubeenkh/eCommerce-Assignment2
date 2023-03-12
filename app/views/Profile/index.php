<?php $this->view('shared/header','Profile Page'); ?>
<!-- KIND OF USELESS CUUZ NOT BEING USED ************************************************-->
	<?php $this->view('shared/search'); ?>

	<div class="d-flex flex-row card">

		<div class="p-2">

			<div class="p-2">
				<img style="max-width:200px;" src="/images/<?=$data->picture?>">
			</div>
			
			<dl>
				<h2><dt>First Name</dt></h2>
				<dd><?=$data->first_name?></dd>

				<dt>Middle Name</dt>
				<dd><?=$data->middle_name?></dd>

				<dt>Last Name</dt>
				<dd><?=$data->last_name?></dd>

			</dl>

		</div>
		
	</div>
	<!-- <a href="/Profile/edit">Edit my profile</a>
	<a href="/Main/index">Back</a> -->

	<?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
			echo '<a href="/Profile/edit">Edit my profile</a> <br>';
			echo '<a href="/Main/index">Back</a>';
		}
	?>

	<br><br>
		
	
	<h2>Publications by <?=$data ?></h2>
	<?php
		// $publications = $data->getPublications();
		// foreach ($publications as $publication) {
		// 	$this->view('Publication/partial', $publication);
		// }
	?>


<?php $this->view('shared/footer'); ?>


<!-- KIND OF USELESS CUUZ NOT BEING USED ************************************************-->