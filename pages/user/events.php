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
			<a href="./home"><li><div id="icon"><i class="fas fa-home"></i></div> Dashboard</li></a>
			<a href="#"><li aktif='ya'><div id="icon"><i class="fas fa-calendar-alt"></i></div> My Events</li></a>
			<a href="./saldo"><li><div id="icon"><i class="fas fa-money-bill-alt"></i></div> Saldo</li></a>
			<a href="./setting"><li><div id="icon"><i class="fas fa-cogs"></i></div> Settings</li></a>
			<a href="./logout"><li><div id="icon"><i class="fas fa-sign-out-alt"></i></div> Logout</li></a>
		</nav>
	</div>
</div>

<div class="atas">
	<div id="tblMenu" aksi='xMenu'><i class="fas fa-bars"></i></div>
	<h1 class="judul ke-kiri">Events</h1>
	<button id="cta" class="tbl primer"><i class="fas fa-plus"></i> &nbsp;New Event</button>
</div>

<div class="container">
	<div class="bagian">
		<div class="wrap">
			<h3><i class="fas fa-calendar-alt"></i> &nbsp; My Active Events
				<div class="ke-kanan">
					<input type="text" class="box" style="margin-right: 5%;" placeholder="Search event..." v-model="cari">
				</div>
			</h3>
			<div id="load">
				<table id="myTable">
					<thead>
						<th width="50%">Title</th>
						<th width="30%"><i class="fas fa-calendar-alt"></i></th>
						<th>Act</th>
					</thead>
					<tbody>
						<tr v-for="evt in filteredEvent">
							<td>{{ evt.title }}</td>
							<td>{{ evt.date.start }} - {{ evt.date.end }}</td>
							<td>
								<button class="tbl primer" title="See Details"><i class="fas fa-eye"></i></button>
								<button class="tbl merah" title="Delete event"><i class="fas fa-trash"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src='../aset/js/embo.js'></script>
<script src='../aset/js/vue.js'></script>
<script>
	var app = new Vue({
		el: '.container',
		data() {
			return {
				events: [],
				cari: ''
			}
		},
		methods: {
			loadEvent() {
				ambilJSON("../events/my", (res) => {
					this.events = res
				})
			}
		},
		created() {
			this.loadEvent()
		},
		computed: {
			filteredEvent() {
				return this.events.filter((evt) => {
					return evt.title.includes(this.cari)
				})
			}
		}
	})
</script>

</body>
</html>