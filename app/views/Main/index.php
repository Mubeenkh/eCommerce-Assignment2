<?php $this->view('shared/header','Create Your Profile'); ?>


	
	<div class="d-flex  p-3">
		
		
		<form action="" method="get" style="display:inline-block">					
			
			<div class="input-group">
				<input type="search" name="search" class="form-control" placeholder="Enter search term">
				<input type="submit" class="btn btn-secondary" value="Search" ></input>
			</div>
			
		</form>
	</div>
		

	<!-- /////Should use php here to post  -->
	<div class="" id="">
		
			
		<p>Posted by <a href=""> Name </a>  date and time posted</p>
			<div style="border: 1px black solid; height: 100px">
				
				<a href="">
					displays image
					<img  src="">
				</a>
				<p>Display the caption</p>
			</div>

			<p>date and time posted</p>
			
		


		<!-- <?php
			// foreach ($data as $publication){
			 	// echo "<p>Posted by <a href=""> Name </a>  date and time posted</p>
			// 		<div style="border: 1px black solid; height: 100px">
						
			// 			<a href="">
			// 				displays image
			// 				<img  src="">
			// 			</a>
			// 			<p>Display the caption</p>
			// 		</div>

			// 		<p>date and time posted</p>";
			// }
		?> -->
	</div>
	<!-- ////// -->
	
<?php $this->view('shared/footer'); ?>