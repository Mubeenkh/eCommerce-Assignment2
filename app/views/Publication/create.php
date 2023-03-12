<?php $this->view('shared/header','Create Your Profile'); ?>

<div class="card p-5 m-5">
	
	<div class="text-center">

		<h1>Create Publication</h1>

	</div>

	<form action="" method="post" enctype='multipart/form-data'>
		
		<!-- Posting a picture -->
		<div class="">

			<label class="form-label">Image Post: </label>
			<input type="file" class="form-control" name="postPicture" id="picture"></br>

		</div>

		<div class="form-group row">

			<!-- Image that you selected (Uses the script) -->
			<img class="border rounded" id='pic_preview' src='' style=" max-width:200px; max-height:400px;" />	

			<div class="col">
				<label class="col-sm-2 col-form-label">Caption:</label>
				<div class="col-sm-10">

					<input type="text" class="form-control" name="caption">

				</div>
			</div>

		</div>

		<div class="">
			<br>
			<input  class="btn btn-success" type="submit" name="create" value="Create Post">
		</div>

	</form>

	
	<div>
		<br>
		<a href="/Profile/index" class="btn btn-danger">Cancel</a>
	</div>

</div>

<!-- this script displays the image you selected -->
<script>
	picture.onchange = evt => { 
		const [file] = picture.files
		if (file) {
			pic_preview.src = URL.createObjectURL(file)
		}
	}
</script>
<?php $this->view('shared/footer'); ?>