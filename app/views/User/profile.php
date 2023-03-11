
	USER PROFILE!! 

	<h1>My Publications</h1>


<?php
foreach ($data as $publication) {
	// $this->view('Publication/partial', $publication);
	?>
		
	<div class="card p-5 m-5">

		<form action="" method="post" enctype='multipart/form-data'>
				<!-- Posting a picture -->
			<div class="">

				<label class="form-label">Image Post: </label>
				<img class="border rounded" id='pic_preview' src='/images/' style=" max-width:200px; max-height:400px;"/>

			</div>

			<div class="form-group row">

				<!-- Image that you selected (Uses the script) -->
				

				<div class="col">
					<label class="col-sm-2 col-form-label">Caption:</label>
					<div class="col-sm-10">

						<input type="text" class="form-control" name="caption">

					</div>
				</div>

			</div>

			<div class="">
				<br>
				<input  class="btn btn-success" type="submit" name="action" value="Create Post">
			</div>

		</form>
	</div>
<?php		
}
?>		


	

