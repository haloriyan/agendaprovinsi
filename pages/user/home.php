<?php
include 'aksi/ctrl/users.php';

$sesi = $users->sesi(1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Home Agendaprovinsi</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href="../aset/css/style.dasbor.css" rel="stylesheet">
</head>
<body>

<div class="kiri primer">
	<div class="wrap">
		<nav class="menu">
			<a href="#"><li aktif='ya'><div id="icon"><i class="fas fa-home"></i></div> Dashboard</li></a>
			<a href="./events"><li><div id="icon"><i class="fas fa-calendar-alt"></i></div> My Events</li></a>
			<a href="./saldo"><li><div id="icon"><i class="fas fa-money-bill-alt"></i></div> Saldo</li></a>
			<a href="./setting"><li><div id="icon"><i class="fas fa-cogs"></i></div> Settings</li></a>
			<a href="./logout"><li><div id="icon"><i class="fas fa-sign-out-alt"></i></div> Logout</li></a>
		</nav>
	</div>
</div>

<div class="atas">
	<div id="tblMenu" aksi='xMenu'><i class="fas fa-bars"></i></div>
	<h1 class="judul ke-kiri">Dashboard</h1>
	<button id="cta" class="tbl primer"><i class="fas fa-plus"></i> &nbsp;New Event</button>
</div>

<div class="container">
	<div class="bagian">
		<div class="wrap">
			<p>
				On this page you can see the events you have and the details
			</p>
			<div class="card primer">
				<div class="wrap">
					<h3>0</h3>
					<p><i class="fas fa-calendar-alt"></i> &nbsp; Events</p>
				</div>
			</div>
			<div class="card primer">
				<div class="wrap">
					<h3>0</h3>
					<p><i class="fas fa-user"></i> &nbsp; Participants</p>
				</div>
			</div>
			<div class="card primer">
				<div class="wrap">
					<h3>0</h3>
					<p><i class="fas fa-money-bill-alt"></i> &nbsp; Redeemable saldo</p>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>