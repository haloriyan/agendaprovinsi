<?php
$listCity = ["Bandung","Denpasar","Jakarta","Makassar","Malang","Surabaya"];

$tglSkrg = date('Y-m-d');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Create Event at Agendaprovinsi</title>
	<link href='../aset/fw/build/fw.css' rel='stylesheet'>
	<link href='../aset/fw/build/fontawesome-all.min.css' rel='stylesheet'>
	<link href="../aset/css/style.createEvent.css" rel="stylesheet">
	<link href="../aset/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
	<link href="../aset/flatpickr/dist/themes/material_green.css" rel="stylesheet">
</head>
<body>

<div class="myStep">
	<div class="step" id="stepOne" aktif='ya'><i class="fas fa-edit"></i></div>
	<div class="after" id="afterOne"></div>
	<div class="step" id="stepTwo"><i class="fas fa-align-justify"></i></div>
	<div class="after" id="afterTwo"></div>
	<div class="step" id="stepThree"><i class="fas fa-calendar-alt"></i></div>
	<div class="after" id="afterThree"></div>
	<div class="step" id="stepFour"><i class="fas fa-map-marker"></i></div>
	<div class="after" id="afterFour"></div>
	<div class="step" id="stepFive"><i class="fas fa-image"></i></div>
	<div class="after" id="afterFive"></div>
	<div class="step" id="stepSix"><i class="fas fa-money-bill"></i></div>
</div>

<div class="container">
	<div class="wrap">
		<form class="bagian" id="formTitle" style="display: block;">
			<h3>Apa nama dari event ini?</h3>
			<input type="text" class="box" id="name" placeholder="ex : My Awesome Event">
			<button class="tbl primer">Next</button>
		</form>
		<form class="bagian" id="formDesc">
			<h3>Deskripsikan tentang event yang akan kamu selenggarakan</h3>
			<textarea class="box" id="description" style="height: 150px"></textarea>
			<button class="tbl primer">Next</button>
		</form>
		<form class="bagian" id="formTanggal">
			<h3>Kapan event ini akan diselenggarakan?</h3>
			<input type="hidden" id="tglSkrg" value="<?php echo $tglSkrg; ?>">
			<div class="bag bag-5">
				Tanggal mulai :
				<input type="date" class="box" id="dateStart" onchange="setDateStart()">
			</div>
			<div class="bag bag-5">
				Tanggal berakhir :
				<input type="date" class="box" readonly id="dateEnd" onchange="setDateEnd()">
			</div>
			<div class="bag bag-5">
				Waktu mulai :<br />
				<select class="box" id="jamMulai" style="width: 47%;margin-right: 10px;" onchange="setWaktuMulai()">
					<?php
					for($i = 0; $i <= 24; $i++) {
						if($i < 10) {
							$i = "0".$i;
						}
						echo "<option>".$i."</option>";
					}
					?>
				</select> : 
				<select class="box" id="menitMulai" style="width: 47%" onchange="setWaktuMulai()">
					<?php
					for ($i=0; $i <= 59; $i++) { 
						if($i < 10) {
							$i = "0".$i;
						}
						echo "<option>".$i."</option>";
					}
					?>
				</select>
			</div>
			<div class="bag bag-5">
				Waktu berakhir :<br />
				<select class="box" id="jamAkhir" style="width: 47%;margin-right: 10px;">
					<!-- <?php
					for($i = 0; $i <= 24; $i++) {
						if($i < 10) {
							$i = "0".$i;
						}
						echo "<option>".$i."</option>";
					}
					?> -->
				</select> : 
				<select class="box" id="menitAkhir" style="width: 47%">
					<!-- <?php
					for ($i=0; $i <= 59; $i++) { 
						if($i < 10) {
							$i = "0".$i;
							echo "<option>".$i."</option>";
						}
					}
					?> -->
				</select>
			</div>
			<button class="tbl primer">Next</button>
		</form>
		<form id="formLocation" class="bagian">
			<h3>Dimana event ini akan dilaksanakan</h3>
			<select class="box" id="city">
				<option value="">Select city...</option>
				<?php
				foreach($listCity as $key => $values) {
					echo "<option>".$values."</option>";
				}
				?>
			</select>
			<button class="tbl primer">Next</button>
		</form>
		<form id="formImage" class="bagian">
			<h3>Upload cover eventmu agar lebih menarik</h3>
			Upload cover :
			<input type="file" class="box" id="cover">
			<button class="tbl primer">Next</button>
		</form>
		<form id="formTicket" class="bagian">
			<h3>Buat tiket untuk acara ini</h3>
		</form>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="notif">
	<div class="popup">
		<div class="wrap">
			<h3><i class="fas fa-info"></i> &nbsp;Alert!
				<div class="ke-kanan" id="xNotif"><i class="fas fa-times"></i></div>
			</h3>
			<p id="isiNotif"></p>
		</div>
	</div>
</div>

<script src="../aset/js/embo.js"></script>
<script src="../aset/js/upload.js"></script>
<script src="../aset/flatpickr/dist/flatpickr.min.js"></script>
<script>
	flatpickr("#dateStart", {
		dateFormat: 'Y-m-d',
		minDate: $("#tglSkrg").isi()
	})
	function setDateStart() {
		flatpickr("#dateEnd", {
			dateFormat: 'Y-m-d',
			minDate: $("#dateStart").isi()
		})
	}
	function setDateEnd() {
		$("#dateStart").atribut('readonly', '')
		$("#dateEnd").atribut('readonly', '')
	}
	function removeOption(selectBox) {
		for(i = selectBox.options.length - 1; i >= 0; i--) {
			selectBox.remove(i)
		}
	}
	function setWaktuMulai() {
		let jamMulai = $("#jamMulai").isi()
		let menitMulai = $("#menitMulai").isi()

		removeOption($("#jamAkhir"))
		removeOption($("#menitAkhir"))

		// set jam akhir
		for (i = parseInt(jamMulai); i <= 24; i++) {
			let option = document.createElement('option')
			if(i < 10) {
				i = '0'+i
			}
			option.text = i
			option.value = i
			$("#jamAkhir").appendChild(option)
		}

		// set menit akhir
		for(i = parseInt(menitMulai); i <= 59; i++) {
			let optMenit = document.createElement('option')
			if(i < 10) {
				i = '0'+i
			}
			optMenit.text = i
			optMenit.value = i
			$("#menitAkhir").appendChild(optMenit)
			console.log(i)
		}
	}
	function setNotif(notif) {
		munculPopup("#notif", $('#notif').pengaya("top: 155px"))
		$("#isiNotif").tulis(notif)
	}
	function hilangKecuali(y) {
		$("#formTitle").hilang()
		$("#formDesc").hilang()
		$("#formTanggal").hilang()
		$("#formLocation").hilang()
		$("#formImage").hilang()
		$("#"+y).muncul()

		if(y == 'formDesc') {
			$("#stepTwo").atribut("aktif", "ya")
			$("#afterOne").atribut("aktif", "ya")
		}else if(y == 'formTanggal') {
			$("#stepThree").atribut("aktif", "ya")
			$("#afterTwo").atribut("aktif", "ya")
		}else if(y == 'formLocation') {
			$("#stepFour").atribut("aktif", "ya")
			$("#afterThree").atribut("aktif", "ya")
		}else if(y == 'formImage') {
			$("#stepFive").atribut("aktif", "ya")
			$("#afterFour").atribut("aktif", "ya")
		}
	}
	submit('#formTitle', () => {
		if($("#name").isi() == "") {
			// setNotif("Name must be filled");
			// return false
		}
		hilangKecuali('formDesc')
		return false
	})
	submit('#formDesc', () => {
		if($("#description").isi() == "") {
			// setNotif("Description must be filled")
			// return false
		}
		hilangKecuali('formTanggal')
		return false
	})
	submit('#formTanggal', () => {
		let dateStart = $("#dateStart").isi()
		let dateEnd = $("#dateEnd").isi()
		let jamMulai = $("#jamMulai").isi()
		let menitMulai = $("#menitMulai").isi()
		let jamAkhir = $("#jamAkhir").isi()
		let menitAkhir = $("#menitAkhir").isi()
		if(dateStart == '' || dateEnd == '' || jamMulai == '' || menitMulai == '' || jamAkhir == '' || menitAkhir == '') {
			setNotif('All field must be filled')
			return false
		}
		hilangKecuali('formLocation')
		return false
	})
	submit('#formLocation', () => {
		hilangKecuali('formImage')
		return false
	})
	submit('#formImage', () => {
		hilangKecuali('formTicket')
		return false
	})
	function sukses() {
		console.log('uploaded');
	}
	$("#cover").di('ganti', function(the) {
		// var file = $(this)[0].files[0]
		var file = the.srcElement.files[0]
		var upload = new Upload(file);
		upload.doUpload();
	})
	tekan("Escape", () => {
		hilangPopup("#notif")
	})
</script>

</body>
</html>