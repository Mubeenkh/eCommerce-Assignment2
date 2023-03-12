<?php $this->view('shared/header','CliqueBait'); ?>

	
	<?php $this->view('shared/search'); ?>
		
	<!-- /////Should use php here to post  -->
<!-- 	<?php 
		//foreach to get all the publications
		foreach ($data as $publication) 
		{ 

			$profile = new \app\models\Profile();
			$profile = $profile->getByUserId($publication->profile_id);
	?>

		<div class="card p-5 m-3" style=" max-height: 350px;">
			
			<div class="row">

				<label>Posted by <a href='Profile\index\' ><?= $profile->first_name ?></a></label><hr>

				<div class="col-sm-4">
					<img class="col-sm-10" src="/images/<?= $publication->picture ?>" style=" max-width:250px; max-height:250px;">
				</div>
				<div class="card col-sm-8">
					<h2>Caption</h2>
					<p><?=htmlspecialchars($publication->caption) ?></p>
					<label><?=$publication->timestamp?></label>
				</div>
			</div>

		</div>

	<?php
		}	
	?> -->


	<?php
		foreach ($data as $publication) {
			$this->view('Publication/partial', $publication);
		}
	?>

	
	<!-- ////// -->
	
<?php $this->view('shared/footer'); ?>