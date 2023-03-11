<?php $this->view('shared/header','Create Your Profile'); ?>

	
	<?php $this->view('shared/search'); ?>
		
	<?php $this->view('User/userInfo'); ?>
	<!-- /////Should use php here to post  -->
	<!-- <div class="card p-5">
		
		<p>Posted by <a href=""> Name </a>  date and time posted</p>
		<div class="card" style="border: 1px black solid; height: 100px">
			
			<a href="">
				displays image
				<img  src="">
			</a>
			<p>Display the caption</p>
		</div>

		<p>date and time posted</p> -->
			
		<?php foreach ($data as $publication) 
		{ 
		?>
			<hr>
			<div class="card" style="border: 1px black solid; height: 100px">
				<?php $profile=$publication->getProfile(); ?>

				<a href="/Publication/details/<?=$publication->publication_id?>"><img src="/images/<?= $publication->picture ?>"></a>

				<p>Posted by <a href='/Profile/details/<?=$profile->profile_id ?>'><?= htmlspecialchars($profile) ?></a> on <?= $publication->date_time?><?php
					
					if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $publication->profile_id)
					{
						echo "<a href='/Publication/delete/$publication->publication_id'><i class='bi-trash'></i></a>";
						
						echo "<a href='/Publication/edit/$publication->publication_id'><i class='bi-pen'></i></a>";
					}

				?>
				</p>
				<p><?=htmlspecialchars($publication->caption) ?></p>
			</div>
		<?php
		}	
		?>

	<!-- </div> -->
	<!-- ////// -->
	
<?php $this->view('shared/footer'); ?>