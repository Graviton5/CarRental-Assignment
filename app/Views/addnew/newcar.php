<div class='content'>
	<?php if(session()->get('isLogged') && session()->get('id_type') == 1): ?>
		<h1>Add New Car for Rentals</h1>
		<?php if (session()->get('success')) : ?>
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
		<form action="<?= base_url('/AddNew') ?>" method='post'>
			<div class='model'>
				<label>Model of the Car: </label>
				<input type="text" name="model" placeholder="Enter Car Model">
			</div>
			<br>
			<div class='address'>
				<label>Address at which car is available: </label>
				<input type="text" name="address" placeholder="Enter Address">
			</div>
			<br>
			<div class='number'>
				<label>Number of Cars for available for rent: </label>
				<input type="text" name="number" placeholder="Enter Count">
			</div>
			<br>
			<div class='price'>
				<label>Price of one Car: </label>
				<input type="text" name="price" placeholder="Enter Price">
			</div>
			<br>
			<div class='seats'>
				<label>Number of Seats: </label>
				<input type="text" name="seats" placeholder="Enter Seats">
			</div>
			<br>
			<button type="submit">Add</button>
		</form>
	<?php else: ?>
		<h1>Error 403 - Forbidden</h1>
		<p>You do not have the permission to access this page.</p>
	<?php endif; ?>
</div>
<script type="text/javascript">
	let items = document.getElementsByClassName('active');
	for(let i = 0; i < items.length; i++){
		items[i].classList.remove('active');
	}
	document.getElementById('addNew').classList.add('active');
</script>