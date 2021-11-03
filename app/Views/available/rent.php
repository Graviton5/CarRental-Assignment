<div class="content">
	<h1>Available Cars for Rent</h1>
	<?php if (session()->get('success-login')): ?>
        <div>
            <div class="alert-good">
                <?= session()->get('success-login'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->get('success-rent')): ?>
        <div>
            <div class="alert-good">
                <?= session()->get('success-rent'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(session()->get('fail')): ?>
    	<div>
    		<div class='alert-bad'>
    			<?= session()->get('fail'); ?>
    		</div>
    	</div>
    <?php endif; ?>
    <?php if (session()->get('validation')) : ?>
        <div>
            <div class="alert-bad">
                <?= session()->get('validation')->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
	<section class='cars'>
		<?php if(isset($rents)&& count($rents) > 0): ?>
			<?php foreach ($rents as $rentItem): ?>
				<?php if(is_null($rentItem['bookedby'])): ?>
					<form action="<?= base_url('rent/').'\\'.$rentItem['car_id'] ?>" method='post' class='rentBlock'>
						<img  class="image" src="<?= base_url('/homepage/image.jpg') ?>">
						<p class='title'><?= $rentItem['model']; ?></p>
						<p class='cost'>Cost: Rs.<?= $rentItem['price']; ?></p>
						<p class='num'>Number: <?= $rentItem['number']; ?></p>
						<p class='seat'>Seats (per car): <?= $rentItem['seats']; ?></p>
						<p class='user'>Owned by: <?= $rentItem['car_owner']; ?></p>
						<?php if(session()->get('isLogged') && session()->get('id_type') == 0): ?>
							<label for="startDate">Renting Start date: </label>
							<input type="date" name="startDate" placeholder="Enter Renting Start Date">
							</br>
							<label for="forDays">For (in days): </label>
							<select name="forDays" id="days">
								<?php for($i = 1; $i < 8; $i++):?>
									<option value="<?=$i?>"><?=$i?></option>
								<?php endfor; ?>
							</select>
						<?php endif; ?>
						<button type='submit' class="rentBtn">Rent Now</button>
					</form>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<p class='no-rent'>No rentals are available.</p>
		<?php endif; ?>
	</section>
</div>
<script type="text/javascript">
	let items = document.getElementsByClassName('active');
	for(let i = 0; i < items.length; i++){
		items[i].classList.remove('active');
	}
	document.getElementById('avail').classList.add('active');
</script>