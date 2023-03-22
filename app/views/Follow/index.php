<!-- <?php $this->view('shared/header','Followers'); ?>
	

	<div class="px-5 m-5 text-center">
		<h1 style="font-family: 'Comic Sans MS', monospace; color: #9D00FF;">Welcome To CliqueBait</h1>
	</div>


	<?php
		//$data here are the publications
		$profile = new \app\models\Profile();

		$follow = new \app\models\Follow();

		$current = $follow->getFollowingPublication(); 

		foreach ($current as $publication) {
			// $this->view('Publication/posts', $publication);
	?>
			<div class="card p-2 m-3 shadow-lg p-3 mb-5 bg-white rounded" >

				<div class="card-body row ">

					<div class="row">

						<div class="col-md-4">
							<img class="col-sm-10 card" src="/images/<?= $publication->picture ?>" style=" max-width:300px; max-height:300px;">
						</div>

						<div class="col-md-8 ml-auto card">
								<div class="">
									<h4><b>Caption: </b></h4>
									<p><?=htmlspecialchars($publication->caption) ?></p>
								</div>
								<hr>
								<div class="  row" >
									<div>
										<p class=" col-sm">Posted on <?= $data->timestamp?> </p>

										<p >By 
											<a href='/Profile/details/<?=$publication->user_id ?>'>
												<b>
													<?=$publication->first_name ?> 
													<?=$publication->middle_name ?> 
													<?=$publication->last_name ?>
												</b>
											</a>
										</p>

									</div>

								</div>
							
						</div>

					</div>

				</div>
				
			</div>

	<?php
		}
			
	?>

	
<?php $this->view('shared/footer'); ?> -->