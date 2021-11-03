<div class="content">
	<h1>Registration - Customer</h1>
	<?php if (isset($validation)) : ?>
        <div>
            <div class="alert-bad">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
	<form action="<?= base_url('Register/Customer/submit') ?>" method='post'>
		<div class='username'>
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter Username">
		</div>
		<br>
		<div class='password'>
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter Password">
		</div>
		<div class='password'>
			<label>Confirm Password</label>
			<input type="password" name="password_confirm" placeholder="Confirm Password">
		</div>
		<div class='email'>
			<label>Email</label>
			<input type="text" name="email" placeholder="Enter Email">
		</div>
		<div class='contact'>
			<label>Contact</label>
			<input type="text" name="contact" placeholder="Enter Contact Number">
		</div>
		<button type="submit">Register</button>
	</form>
</div>
<script type="text/javascript">
	let items = document.getElementsByClassName('active');
	for(let i = 0; i < items.length; i++){
		items[i].classList.remove('active');
	}
	document.getElementById('register').classList.add('active');
</script>