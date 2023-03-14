<?php $this->view('shared/header','CliqueBait'); ?>

	
	<?php $this->view('shared/search'); ?>
		
	<!-- /////Should use php here to post  -->

	<?php
		//$data here are the publications
		foreach ($data as $publication) {
			$this->view('Publication/posts', $publication);
		}
	?>

	
	<!-- ////// -->
	
<?php $this->view('shared/footer'); ?>