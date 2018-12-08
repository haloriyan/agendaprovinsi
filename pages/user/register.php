<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale = 1'>
	<title>Register to Agendaprovinsi</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href='../aset/css/style.auth.css' rel='stylesheet'>
</head>
<body>

<div class="atas primer">
	<b>Agenda</b>provinsi
</div>

<div class="container" style="top: 125px;">
	<div id="kiri">
		<div class="wrap rata-tengah">
			<div class="icon" style="margin-top: 90px;"><i class="fas fa-edit"></i></div>
			<h2>REGISTER</h2>
		</div>
	</div>
	<div id="kanan">
		<form id="formReg" class="wrap">
			<div class="isi">Name :</div>
			<input type="text" class="box" id="nameReg" required>
			<div class="isi">Email :</div>
			<input type="email" class="box" id="emailReg" required>
			<div class="isi">Password :</div>
			<input type="password" class="box" id="pwdReg" required>
			<div class="bag-tombol">
				<button class="primer" id="act">REGISTER</button>
			</div>
			<div class="opt">
				already have account? <a href="./login">login</a> now!
			</div>
		</form>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="sukses">
	<div class="popup">
		<div class="wrap">
			<h3>Register success!
				<div class="ke-kanan" id="xSukses"><i class="fas fa-times"></i></div>
			</h3>
			<p>
				Now, you must verify your email address before create event. If you can't find it, please check spam folder
			</p>
		</div>
	</div>
</div>

<script src='../aset/js/embo.js'></script>
<script>
	submit('#formReg', () => {
		let name = $("#nameReg").isi()
		let email = $("#emailReg").isi()
		let pwd = $("#pwdReg").isi()
		let register = "email="+email+"&pwd="+pwd+"&name="+name
		pos("../users/register", register, () => {
			munculPopup('#sukses', $("#sukses").pengaya("top: 200px"))
		})
		return false
	})
	tekan('Escape', () => {
		hilangPopup('#sukses')
	})
	$("#xSukses").klik(() => {
		hilangPopup("#sukses")
	})
</script>

</body>
</html>