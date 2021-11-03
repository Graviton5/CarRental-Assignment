<div class="content">
	<h1>Login</h1>
	<?php if (session()->get('success')): ?>
        <div>
            <div class="alert-good">
                <?= session()->get('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($validation)) : ?>
        <div>
            <div class="alert-bad">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
	<form action="<?= base_url('/Login') ?>" method='post'>
		<div class='username'>
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter Username">
		</div>
		<br>
		<div class='password'>
			<label>Password</label>
			<input type="password" name="password" placeholder="Enter Password">
		</div>
		<div class='choice'>
			<label for='choice'>Account Type</label>
			<input type="radio" id="renter" checked name="login-choice" value="renter">
			<label for="renter">Customer</label>
			<input type="radio" id="agency" name="login-choice" value="agency">
			<label for="agency">Agency</label><br>
		</div>
		<button type="submit">Login</button>
	</form>
</div>
<script type="text/javascript">
	let items = document.getElementsByClassName('active');
	for(let i = 0; i < items.length; i++){
		items[i].classList.remove('active');
	}
	document.getElementById('login').classList.add('active');
</script>