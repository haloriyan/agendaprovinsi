<?php
include 'users.php';

class events extends users {
	public function convertDate($date) {
		$bulan = ['01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Aug', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec'];
		$d = explode('-', $date);
		$bln = $d[1];
		$res = $bulan[$bln].' '.$d[2].', '.$d[0];
		return $res;
	}
	public function my() {
		$iduser = users::me(users::sesi(), 'iduser');
		$q = EMBO::tabel('event')->pilih()->dimana(['iduser' => $iduser])->eksekusi();
		while($r = EMBO::ambil($q)) {
			$res[] = $r;
		}
		echo json_encode($res);
	}
	public function allEvents($echo = NULL) {
		$res = [
			[
				"title" => "Jalan jalan ke swiss belinn",
				"cover" => "http://localhost/hotel/aset/gbr/swissBelCover.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			],
			[
				"title" => "Jalan jalan ke restoran",
				"cover" => "http://localhost/imageDailyhotels/gbr/restaurant-449952_1920.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			],
			[
				"title" => "Jalan jalan ke swiss belinn",
				"cover" => "http://localhost/hotel/aset/gbr/swissBelCover.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			],
			[
				"title" => "Jalan jalan ke restoran",
				"cover" => "http://localhost/imageDailyhotels/gbr/restaurant-449952_1920.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			],
			[
				"title" => "Jalan jalan ke swiss belinn",
				"cover" => "http://localhost/hotel/aset/gbr/swissBelCover.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			],
			[
				"title" => "Jalan jalan ke restoran",
				"cover" => "http://localhost/imageDailyhotels/gbr/restaurant-449952_1920.jpg",
				"date" => [
					"start" => $this->convertDate("2018-12-01"),
					"end" => $this->convertDate("2018-12-25")
				],
				"time" => [
					"start" => "08.00",
					"end"	=> "20.00"
				],
				"location" => "Surabaya"
			]
		];
		if($echo == "") {
			echo json_encode($res);
		}
		return json_encode($res);
	}
	public function getAllEvent() {
		$all = $this->allEvents(1);
		$events = json_decode($all, true);
		foreach ($events as $row) {
			echo "<div class='list grid-item'>".
					"<img src='".$row['cover']."' class='cover'>".
					"<div class='wrap'>".
						"<h3 id='title'>".$row['title']."</h3>".
						"<hr size='2' color='#999' style='width: 25%;' align='left'>".
						"<div id='tgl'>".
							"<div id='icon'><i class='fas fa-calendar-alt'></i></div> ".$row['date']['start']." - ".$row['date']['end']."<br />".
							"<div id='icon'><i class='fas fa-clock'></i></div> ".$row['time']['start']. " - ".$row['time']['end']."<br />".
							"<div id='icon'><i class='fas fa-map-marker'></i></div> ".$row['location'].
						"</div>".
					"</div>".
				 "</div>";
		}
	}
	public function delete() {
		$id = EMBO::pos('idevent');
		$del = EMBO::tabel('event')->hapus()->dimana(['idevent' => $id])->eksekusi();
	}
	public function cok() {
		echo $_COOKIE['berkas'];
	}
}

$events = new events();

?>