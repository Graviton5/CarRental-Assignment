<div class="content">
	<div class="register-selection">
		<h1>Register as?</h1>
		<a href="<?= base_url('/Register/Agency') ?>"><div class="agency">Agency Registration</div></a>
		<a href="<?= base_url('/Register/Customer') ?>"><div class="customer">Customer Registration</div></a>
	</div>
</div>
<script type="text/javascript">
	let items = document.getElementsByClassName('active');
	for(let i = 0; i < items.length; i++){
		items[i].classList.remove('active');
	}
	document.getElementById('register').classList.add('active');
</script>
