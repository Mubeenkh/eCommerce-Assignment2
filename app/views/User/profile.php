<?php $this->view('shared/header','Register your Account'); ?>

USER PROFILE!! 
<a href="/Profile/index">See My Profile</a>

<h1>Messages</h1>

<h2>My Messages</h2>

<form action='/Message/send' method="post" >

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">TO:</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="receiver">
		</div>
		<br><br>
	</div>

	<div class="form-group row">
		<label class="col-sm-2 col-form-label">Message:</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="message"></textarea>
		</div>
		<br><br>
	</div>
	<br>
	<input  type="submit" name="action" value="Send Message">
</form>

<button href='/User/logout'> Sign out </button>

<br><br><br><br>
<?php $this->view('shared/footer'); ?>
