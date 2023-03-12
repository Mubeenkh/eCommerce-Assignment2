<?php $this->view('shared/header','Profile Page'); ?>

	<?php $this->view('shared/search'); ?>

	<div class="card p-2 ">

		<div class="row">

			<div class="col-md-4">
				<img class="card" style="max-width:250px;" src="/images/<?=$data->picture?>">
			</div>

			<dl class="col-md-8 ml-auto ">
				<dt><h4>First Name</h4></dt>
				<dd><?=$data->first_name?></dd>

				<dt><h4>Middle Name</h4></dt>
				<dd><?=$data->middle_name?></dd>

				<dt><h4>Last Name</h4></dt>
				<dd><?=$data->last_name?></dd>

			</dl>

		</div>
		
	</div>
	<!-- <a href="/Profile/edit">Edit my profile</a>
	<a href="/Main/index">Back</a> -->

	<?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id){
			echo '<a href="/Profile/edit">Edit my profile</a> <br>';
		}
	?>
	<a href="/Main/index">Back</a>
	<br><br>

	
	<h2>Publications by <?=$data->first_name ?></h2>

	<!-- <div class="card "> -->
		<h2 style="text-align: center;">Posts</h2> 
		
			<?php
				$publications = $data->getPublications($data->user_id);
				// echo "$data->user_id";
				foreach ($publications as $publication) {
					$this->view('Publication/partial', $publication);
				}
			?>
		
	<!-- </div> -->
<?php $this->view('shared/footer'); ?>
