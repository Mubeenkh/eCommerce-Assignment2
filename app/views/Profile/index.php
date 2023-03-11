<?php $this->view('shared/header','Your Profile'); ?>

	<?php $this->view('shared/search'); ?>

	<div class="d-flex flex-row card">


		<div class="p-2">

			<dl>
				<dt>First Name</dt>
				<dd><?=$data->first_name?></dd>

				<dt>Middle Name</dt>
				<dd><?=$data->middle_name?></dd>

				<dt>Last Name</dt>
				<dd><?=$data->last_name?></dd>

			</dl>
		</div>
		
	</div>
	<a href="/Profile/edit">Edit my profile</a>
	<a href="/Main/index">Back</a>

	<br><br>
	<div class="profileContent">
		
		<?php $this->view('User/profile','Your Profile'); ?>


	</div>


	


<?php $this->view('shared/footer'); ?>