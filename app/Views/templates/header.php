<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('/homepage/css/style.css')?>">
	<title>Car Rental Showcase</title>
</head>
<body>
	<header class="navbar">
		<nav class='nav-1'>
			<div class="nav-right">
				<?php if (session()->get('isLogged')) : ?>
			        <a href="#" id="login" class='nav-left'><?php echo session()->get('username') ?></a>
			        <a class='nav-left logout'  href="<?= base_url('/Logout')?>">Logout</a>
					<?php if ((session()->get('id_type')) == 0  ): ?>
						<a class="nav-left" id='booked' href="<?= base_url('/Booked') ?>">Booked Cars</a>
						<a class="active nav-left" id='avail' href="<?=base_url('/Available') ?>">Available Rentals</a>
					<?php elseif ((session()->get('id_type')) == 1): ?>
						<a class="active nav-left" id='avail' href="<?= base_url('/Available') ?>">Available Rentals</a>
						<a class="nav-left" id='addNew' href="<?= base_url('/AddNew') ?>">Add Cars for Rent</a>
						<a class="nav-left" id='bookedAgency' href="<?= base_url('/AgencyBooked') ?>">Booked Cars</a>
					<?php endif; ?>

			    <?php else: ?>
					<a class="nav-left" id="login" href="<?= base_url('/Login') ?>">Login</a>
					<a class="nav-left" id="register" href="<?= base_url('/Register') ?>">Register</a>
					<a class="active nav-left" id='avail' href="<?= base_url('/Available') ?>">Available Rentals</a>
				<?php endif; ?>
				<a id="nav-logo" href="<?= base_url('/') ?>">CarRental Inc.</a>
			</div>
		</nav>
		<div class='nav-2'>
		  	<div class="nav-right">
		  		<a id="nav-logo" href="<?= base_url('/') ?>">CarRental Inc.</a>
		   	 	<?php if (session()->get('isLogged')) : ?>
			        <a href="#" id="login" class='nav-left'><?php echo session()->get('username') ?></a>
			        <a class='nav-left logout'  href="<?= base_url('/Logout')?>">Logout</a>
					<?php if ((session()->get('id_type')) == 0  ): ?>
						<a class="nav-left" id='booked' href="<?= base_url('/Booked') ?>">Booked Cars</a>
						<a class="active nav-left" id='avail' href="<?=base_url('/Available') ?>">Available Rentals</a>
					<?php elseif ((session()->get('id_type')) == 1): ?>
						<a class="active nav-left" id='avail' href="<?=base_url('/Available') ?>">Available Rentals</a>
						<a class="nav-left" id='addNew' href="<?= base_url('/AddNew') ?>">Add Cars for Rent</a>
						<a class="nav-left" id='bookedAgency' href="<?= base_url('/AgencyBooked') ?>">Booked Cars</a>
					<?php endif; ?>

			    <?php else: ?>
					<a class="active nav-left" id='avail' href="<?=base_url('/Available') ?>">Available Rentals</a>
					<a class="nav-left" id="login" href="<?= base_url('/Login') ?>">Login</a>
					<a class="nav-left" id="register" href="<?= base_url('/Register') ?>">Register</a>
				<?php endif; ?>
		 	</div>
		 </div>
	 	<div class="icon" onclick="myFunction()">
	  	 	<img  class="fa fa-bars" src="<?= base_url('/homepage/Hamburger_icon.png') ?>">
	  	</div>

	</header>