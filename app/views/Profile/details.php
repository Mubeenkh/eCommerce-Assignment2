<?php $this->view('shared/header','Profile Page'); ?>

	<!-- <?php $this->view('shared/search'); ?> -->
	<div class="p-5 text-center">
		<h1 style="font-family: 'Courier New', monospace;"> <?=$data->first_name?>'s Profile Page</h1>
	</div>
	<div class=" p-2 shadow p-3 mb-5 bg-white rounded" >

		<div class=" row d-flex justify-content-center align-items-center ">

			<div class="col-md-4 px-5 ">
				<img class="col-sm-10 card rounded-circle " style="max-width:300px; max-height:300px;" src="/images/<?=$data->picture?>">
			</div>
			<div class="col-md-8 ">
				<dl class=" ml-auto shadow-none p-3 mb-5 bg-light rounded" style="max-width:500px;">
					
						<dt><h4>First Name</h4></dt>
						<dd><?=$data->first_name?></dd>

						<dt><h4>Middle Name</h4></dt>
						<dd><?=$data->middle_name?></dd>

						<dt><h4>Last Name</h4></dt>
						<dd><?=$data->last_name?></dd>
					
				</dl>
				
				<?php
					if($_SESSION['user_id'] != $data->user_id){

						//$this here is profile
						$checkFollowing = $this->checkIfFollowing($data->user_id);
						if($checkFollowing == true){	
							//does not exits
							echo '<a href=',"/Follow/unfollowUser/$data->user_id",'>Unfollow</a>';
							
						}else{
							//does exist
							echo '<a href=',"/Follow/followUser/$data->user_id",'>Follow</a>';
							
						}
					}
				?>
				

			</div>
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

	
	<!-- <h2>Publications by <?=$data->first_name ?></h2> -->

	<!-- <div class="card "> -->
		<h2 style="text-align: center;">Posts</h2> 
		
			<?php
				$publications = $data->getPublications($data->user_id);
				// echo "$data->user_id";
				foreach ($publications as $publication) {
					$this->view('Publication/posts', $publication);
				}
			?>
	</div>


	<div style="width: 500px;" class="p-3 card">
		<div style="height: 120px;">
			
		</div>
		<hr>
		<?php
			//$data here are the publications
			$profile = new \app\models\Profile();

			$follow = new \app\models\Follow();

			// $current = $follow->getFollowing();
			$current = $follow->getFollowing(); 

			foreach ($current as $publication) {
				// $this->view('Publication/posts', $publication);
		?>		
				<div class=" p-2 m-3 shadow-lg p-3 mt-6 bg-white rounded text-center justify-content-center" style="max-width: 250px; max-height: 250px;" >

					<img class="col-sm-10 card" src="/images/<?= $publication->picture ?>" style=" max-width:100px; max-height:100px; ">
					<p>
						<a href='/Profile/details/<?=$publication->user_id ?>'>

							<b>
								<?=$publication->first_name ?> 
								<?=$publication->middle_name ?> 
								<?=$publication->last_name ?>
							</b>

						</a>
					</p>
				</div>
				<hr>
		<?php
			}
				
		?>

		
	</div>	

		
	</div>	


	<!-- </div> -->
<?php $this->view('shared/footer'); ?>
