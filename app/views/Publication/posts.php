<div class="card p-2 m-3 shadow-lg p-3 mb-5 bg-white rounded" >
	<!-- card p-2 m-2 d-flex justify-content-center" style=" max-width:500px; " -->
	
	<?php 
		// $data is $publication
		$profile = new \app\models\Profile();
		$profile = $profile->getByUserId($data->profile_id);

	?>

	
	<div class="card-body row ">

		<div class="row">

			<div class="col-md-4">
				<img class="col-sm-10 card" src="/images/<?= $data->picture ?>" style=" max-width:300px; max-height:300px;">
			</div>

			<div class="col-md-8 ml-auto card">
					<div class="">
						<h4><b>Caption: </b></h4>
						<p><?=htmlspecialchars($data->caption) ?></p>
					</div>
					<hr>
					<div class="  row" >
						<div>
							<p class=" col-sm">Posted on <?= $data->timestamp?> </p>

							<p >By 
								<a href='/Profile/details/<?=$profile->user_id ?>'>
									<b>
										<?=$profile->first_name ?> 
										<?=$profile->middle_name ?> 
										<?=$profile->last_name ?>
										
									</b>
								</a>
							</p>


							<!-- <?php
								if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $data->profile_id)){
									echo "<p >By <b><?=$profile->first_name ?> <?=$profile->middle_name ?> <?=$profile->last_name ?></b></p>";
								}	
							?>	 -->	
						</div>
						<div>
						<?php
							if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $data->profile_id)){
								echo "
									
										<a class='col-sm-2 btn btn-outline-danger' href='/Publication/delete/$data->publication_id'>delete</a>
										<a class='col-sm-2 btn btn-outline-warning' href='/Publication/edit/$data->publication_id'>edit</a>
									
								";	
							}
						?>
						</div>

					</div>
				
			</div>

		</div>


	</div>
	
</div>