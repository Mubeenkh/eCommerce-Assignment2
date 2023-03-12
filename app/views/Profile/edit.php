<?php $this->view('shared/header','Edit Your Profile'); ?>

<div class="card p-5 m-3">
	<form action="" method="post" enctype="multipart/form-data">
		
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">First Name:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="first_name" value='<?=$data->first_name?>'>
			</div>
			<br><br>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Middle Name:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="middle_name" value='<?=$data->middle_name?>'></input>
			</div>
			<br><br>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Last Name:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="last_name" value='<?=$data->last_name?>'></input>
			</div>
			<br><br>
		</div>

		<!-- Posting a picture -->
		<label class="form-label">Profile Picture: </label>
		<input type="file" name="profilePicture" class="form-control"></br>


		<input  type="submit" name="action" value="Save Changes" class="btn btn-secondary">
	</form>

	<div>
		<a href="/Profile/index">Back</a>
	</div>

</div>

<?php $this->view('shared/footer'); ?>