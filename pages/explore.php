<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>explore</title>
	<link href='aset/fw/build/fw.css' rel='stylesheet'>
	<link href='aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='aset/css/style.explore.css' rel='stylesheet'>
</head>
<body>

<div class="atas">
	<div class="icon">
		<img src="aset/gbr/iconAgendakota2.jpeg">
	</div>
	<form class="pencarian">
		<input type="text" class="box" id="q" placeholder="Cari event...">
		<button id="cari" class="tbl"><i class="fas fa-search"></i></button>
	</form>
</div>

<div class="container" id="vueApp">
	<div class="grid">
		<div class="grid-sizer"></div>
		<!-- <div class="list grid-item">
			<img src="http://localhost/hotel/aset/gbr/swissBelCover.jpg" class="cover">
			<div class="wrap">
				<h3 id="title">Jalan jalan ke swiss belinn buat nemenin</h3>
				<hr size="2" color="#999" width="25%" align="left">
				<div id="tgl">
					<div id="icon"><i class="fas fa-calendar-alt"></i></div> 09 Jul 2018 - 10 Jul 2018<br />
					<div id="icon"><i class="fas fa-clock"></i></div> 06:00 - 23:00<br />
					<div id="icon"><i class="fas fa-map-marker"></i></div> Bumiarjo<br />
				</div>
			</div>
		</div> -->
		<div id="load"></div>
	</div>
</div>

<script src='aset/js/embo.js'></script>
<script src='aset/js/vue.js'></script>
<script src='aset/js/isotope.pkgd.min.js'></script>
<script src='aset/js/script.explore.js'></script>

</body>
</html>