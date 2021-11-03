<div class='content'>
	<?php if(session()->get('isLogged') && session()->get('id_type') == 0): ?>
		<section class='cars'>
			<?php if(isset($booked)): ?>
				<?php foreach ($booked as $item): ?>
					<div class='booked rentBlock'>
						<img  class="image" src="<?= base_url('/homepage/image.jpg') ?>">
							<p class='title'><?= $item['model']; ?></p>
							<p class='cost'>Cost: Rs.<?= $item['price']; ?></p>
							<p class='num'>Number: <?= $item['number']; ?></p>
							<p class='seat'>Seats (per car): <?= $item['seats']; ?></p>
							<p class='user'>From: <?= $item['start_date']; ?></p>
							<p class='user'>For (in days): <?= $item['for_days']; ?></p>
							<p class='user'>Owned by: <?= $item['car_owner']; ?></p>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<h1>No Car is booked at this moment.</h1>
			<?php endif; ?>
		</section>
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
	document.getElementById('booked').classList.add('active');
</script>