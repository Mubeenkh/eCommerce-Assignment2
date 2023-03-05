<?php $this->view('shared/header','Create Your Profile'); ?>


	
		<div class="d-flex  p-3">
			
			
			<form action="/Main/search" method="get" style="display:inline-block">					
				
				<div class="input-group">
				    <input type="search" name="search_term" class="form-control" placeholder="Enter search term">
				  <input type="submit" class="btn btn-primary" value="Search" ></input>
				</div>
				
			</form>
		</div>
			

		<p>This is the index of the Main controller. This is where you see publications.</p>

		<div class="jumbotron" id="publication7">
			<hr>
			<a href="">
				<img src="/images/634866e81b234.jpg">
			</a>

			<p>Posted by <a href="/Profile/details/1">John Love Jane Clayton</a> on 2022-10-13 15:28:40</p>
			<p>My new friends!</p>
			
			<form action="" method="post">
				<div class="input-group">
					<input class="form-control" type="text" name="comment" placeholder="Comment here" fdprocessedid="shdtg">
					<input type="submit" name="action" class="btn btn-primary" ></input>
				</div>

			</form>
		</div>
		
	
<?php $this->view('shared/footer'); ?>