<?php
include 'controller.php';

class users extends EMBO {
	public function me($e, $kolom) {
		$q = EMBO::query("SELECT $kolom FROM user WHERE email = '$e' OR iduser = '$e'");
		$r = EMBO::ambil($q);
		return $r[$kolom];
	}
	public function contoh() {
		$cookie = [
			[
				"nama" => "Gratis",
				"price" => 0,
				"slot" => 25
			],
			[
				"nama" => "Premium",
				"price" => 25000,
				"slot" => 25
			]
		];
		$valCookie = json_encode($cookie);
		setcookie('tiket', $valCookie, time() + 50, '/');
		$kuki = $_COOKIE['tiket'];
		echo $kuki;
	}
	public function login() {
		if(!EMBO::pos('email')) {
			return lihat('user/login');
		}else {
			$e = EMBO::pos('email');
			$p = EMBO::pos('pwd');
			$em = $this->me($e, 'email');
			$pw = $this->me($e, 'password');
			if($e == $em && $p == $pw) {
				session_start();
				$_SESSION['uagenda']=$e;
			}else {
				setcookie('kukiLogin', 'Wrong Email / Password!', time() + 35, '/');
			}
		}
	}
	public function register() {
		if(!EMBO::pos('email')) {
			return lihat('user/register');
		}else {
			$nama = EMBO::pos('name');
			$email = EMBO::pos('email');
			$pwd = EMBO::pos('pwd');

			$reg = EMBO::tabel('user')
						->tambah([
							'iduser' 		=> rand(1, 99999),
							'nama'			=> $nama,
							'email'			=> $email,
							'password'		=> $pwd,
							'status'		=> 0,
							'registered'	=> time()
						])
						->eksekusi();
		}
	}
	public function sesi($auth = NULL) {
		session_start();
		$this->sesi = $_SESSION['uagenda'];
		if($auth != "") {
			if(empty($this->sesi)) {
				if(empty($_COOKIE['kukiLogin'])) {
					setcookie("kukiLogin", "You must login first!", time() + 43, "/");
				}
				header("location: ./login");
			}else if($this->me($this->sesi, 'status') == 0) {
				setcookie("kukiLogin", "You haven't verify your email address. Please click the link which was sent to your email for verifying your account", time() + 42, "/");
				header("location: ./login");
			}
		}
		return $this->sesi;
	}
	public function update($id, $kolom, $value) {
		$q = EMBO::tabel('user')->ubah([$kolom => $value])->dimana(['iduser' => $id])->eksekusi();
		return $q;
	}
	public function edit() {
		$bag = EMBO::pos('bagian');
		if($bag == 'detail') {
			$iduser = $this->me($this->sesi(), 'iduser');
			$name = EMBO::pos('name');
			$phone = EMBO::pos('phone');
			$k = ["nama","phone"];
			$v = [$name,$phone];

			for($i = 0; $i < count($k); $i++) {
				$update = $this->update($iduser, $k[$i], $v[$i]);
				if($update) {
					$this->setNotif('Changes saved');
				}else {
					$this->setNotif('Changes failed to save. System error.');
				}
			}
		}else if($bag == 'secure') {
			$old = EMBO::pos('oldPwd');
			$newPwd = EMBO::pos('newPwd');
			$cek = $this->me($this->sesi(), 'password');
			if($old != $cek) {
				$this->setNotif('Wrong old password. Please check again!');
			}else {
				$update = $this->update($iduser, 'password', $newPwd);
				if($update) {
					$this->setNotif('Password changed');
				}else {
					$this->setNotif('Failed to change password. System error.');
				}
			}
		}
	}
	public function verify() {
		$e = base64_decode($_GET['e']);
		$id = $this->me($e, 'iduser');
		$status = $this->me($e, 'status');
		if($status == 1) {
			die('error');
		}
		$ubah = $this->update($id, 'status', 1);
		return lihat('user/verify');
	}
	public function notif() {
		$notif = $_COOKIE['kukiNotif'];
		echo $notif;
	}
	public function setNotif($val) {
		setcookie('kukiNotif', $val, time() + 45, '/');
	}
	public function kuyla() {
		if(EMBO::pos('tes')) {
			echo EMBO::pos('tes');
		}
	}
	public function ok() {
		$y = EMBO::curl()
				->setUrl('http://localhost/loket/users/kuyla')
				->pos(['tes' => 'halos'])
				->eksekusi();
		echo $y;
	}
}

$users = new users();

?>