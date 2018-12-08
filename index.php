<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Hello Embo!</title>
	<link href="aset/fw/build/fw.css" rel="stylesheet">
	<link href="aset/fw/build/fontawesome-all.min.css" rel="stylesheet">
	<link href="aset/css/style.index.css" rel="stylesheet">
</head>
<body>

<div class="bege"></div>
<div class="atas">
	<h1 class="judul ke-kiri"><b>Agenda</b>provinsi</h1>
</div>

<div class="container">
	<div class="wrap">
		<h2>Tak ada lagi event terlewatkan</h2>
		<p>
			Temukan banyak event di kotamu!
		</p>
		<button id="cta"><i class="fas fa-search"></i> &nbsp; TEMUKAN EVENT</button><br />
		<div id="atau">atau</div>
		<button id="noCta"><i class="fas fa-edit"></i> &nbsp; BUAT EVENT</button>
	</div>
</div>

<script src="aset/js/embo.js"></script>
<script>
	$("#cta").klik(function() {
		mengarahkan('./explore')
	})
</script>
</body>
</html>
