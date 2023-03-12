<?php $this->view('shared/header','Create Profile'); ?>
<div class="card p-5 m-3">

	<h1>Create Your Profile</h1>
	
	<form action="" method="post" enctype="multipart/form-data">
		
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">First Name:</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="first_name">
			</div>
			<br>
		</div>

		<div class="form-group row">

			<label class="col-sm-2 col-form-label">Middle Name:</label>

			<div class="col-sm-10">
				<input class="form-control" name="middle_name"></input>
			</div>

			<br>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Last Name:</label>
			<div class="col-sm-10">
				<input class="form-control" name="last_name"></input>
			</div>
			<br>
		</div>

		<label>Profile Picture:</label><br>
	    <input type="file" name="profilePicture"><br>
		

		<input  type="submit" name="create" value="Create profile">

	</form>

	<div>
		<a href="/Profile/index">Back</a>
	</div>
</div>

<?php $this->view('shared/footer'); ?>