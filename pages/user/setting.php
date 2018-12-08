<?php
include 'aksi/ctrl/users.php';

$sesi = $users->sesi(1);

$name = $users->me($sesi, "nama");
$phone = $users->me($sesi, "phone");
if($phone == 0) {
	$phone = "";
}

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
			<a href="./home"><li><div id="icon"><i class="fas fa-home"></i></div> Dashboard</li></a>
			<a href="./events"><li><div id="icon"><i class="fas fa-calendar-alt"></i></div> My Events</li></a>
			<a href="./saldo"><li><div id="icon"><i class="fas fa-money-bill-alt"></i></div> Saldo</li></a>
			<a href="#"><li aktif='ya'><div id="icon"><i class="fas fa-cogs"></i></div> Settings</li></a>
			<a href="./logout"><li><div id="icon"><i class="fas fa-sign-out-alt"></i></div> Logout</li></a>
		</nav>
	</div>
</div>

<div class="atas">
	<div id="tblMenu" aksi='xMenu'><i class="fas fa-bars"></i></div>
	<h1 class="judul ke-kiri">Settings</h1>
	<button id="cta" class="tbl primer"><i class="fas fa-plus"></i> &nbsp;New Event</button>
</div>

<div class="container">
	<div class="bagian">
		<div class="wrap">
			<form id="formDetail">
				<h3><i class="fas fa-user"></i> &nbsp; Personal Information</h3>
				<div class="isi">Name :</div>
				<input type="text" class="box" value="<?php echo $name; ?>" id='name' placeholder='Your name...' required>
				<div class="isi">Phone :</div>
				<input type="text" class="box" value="<?php echo $phone; ?>" id='phone' placeholder='ex: 628123456789' required>
				<button class="tbl primer">Save</button>
			</form>
		</div>
	</div>
	<div class="bagian">
		<div class="wrap">
			<form id="formSecure">
				<h3><i class="fas fa-lock"></i> &nbsp; Change Password</h3>
				<div class="isi">Old Password :</div>
				<input type="password" class="box" id="oldPwd" required>
				<div class="isi">New Password :</div>
				<input type="password" class="box" id="newPwd" required>
				<div class="isi">Re-type New Password :</div>
				<input type="password" class="box" id="rePwd" required>
				<button class="tbl primer">Save</button>
			</form>
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="notif">
	<div class="popup">
		<div class="wrap">
			<h3><i class="fas fa-save"></i> &nbsp; <span id="isiNotif">Changes Saved</span>
				<div class="ke-kanan" id="xNotif"><i class="fas fa-times"></i></div>
			</h3>
		</div>
	</div>
</div>

<script src="../aset/js/embo.js"></script>
<script>
	function loadNotif() {
		ambil("../users/notif", (notif) => {
			$("#isiNotif").tulis(notif)
		})
	}
	submit('#formDetail', () => {
		let name = $("#name").isi()
		let phone = $("#phone").isi()
		let set = "name="+name+"&phone="+phone+"&bagian=detail"
		pos("../users/edit", set, () => {
			munculPopup("#notif", $("#notif").pengaya("top: 190px"))
			loadNotif()
		})
		return false
	})
	submit('#formSecure', () => {
		let oldPwd = $("#oldPwd").isi()
		let newPwd = $("#newPwd").isi()
		let rePwd  = $("#rePwd").isi()
		if(newPwd != rePwd) {
			munculPopup("#notif", $("#notif").pengaya("top: 190px"))
			$("#isiNotif").tulis("New password doesn't match")
			return false
		}
		let secure = "oldPwd="+oldPwd+"&newPwd="+newPwd+"&bagian=secure"
		pos("../users/edit", secure, () => {
			munculPopup("#notif", $("#notif").pengaya("top: 190px"))
			loadNotif()
		})
		return false
	})
	tekan("Escape", () => {
		hilangPopup("#notif")
	})
	$("#xNotif").klik(() => {
		hilangPopup("#notif")
	})
</script>

</body>
</html>