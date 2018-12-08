<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Login to Agendaprovinsi</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='../aset/css/style.auth.css' rel='stylesheet'>
</head>
<body>

<div class="atas primer">
	<b>Agenda</b>provinsi
</div>

<div class="container">
	<div id="kiri">
		<div class="wrap rata-tengah">
			<div class="icon"><i class="fas fa-lock"></i></div>
			<h2>LOGIN</h2>
		</div>
	</div>
	<div id="kanan">
		<form id="formLogin" class="wrap">
			<div class="isi">Email :</div>
			<input type="email" class="box" id="emailLog" required>
			<div class="isi">Password :</div>
			<input type="password" class="box" id="pwdLog" required>
			<div class="bag-tombol">
				<button id="act" class="primer">LOGIN</button>
			</div>
			<div class="opt">
				don't have account? <a href="./register">register</a> now!
			</div>
		</form>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="notif">
	<div class="popup">
		<div class="wrap">
			<h3><i class="fas fa-info"></i> &nbsp; Alert!
				<div class="ke-kanan" id="xNotif"><i class="fas fa-times"></i></div>
			</h3>
			<p id="isiNotif">Hello world</p>
		</div>
	</div>
</div>

<script src='../aset/js/embo.js'></script>
<script>
	submit('#formLogin', () => {
		let email = $("#emailLog").isi()
		let pwd = $("#pwdLog").isi()
		let login = "email="+email+"&pwd="+pwd
		pos("../users/login", login, () => {
			mengarahkan('./home')
		})
		return false
	})
	tekan('Escape', () => {
		hilangPopup('#notif')
	})
	$("#xNotif").klik(() => {
		hilangPopup("#notif")
	})
</script>
<?php
$kuki = $_COOKIE['kukiLogin'];
if($kuki != "") {
	echo '
<script>
	munculPopup("#notif", $("#notif").pengaya("top: 170px"))
	$("#isiNotif").tulis("'.$kuki.'")
</script>';
}
?>

</body>
</html>