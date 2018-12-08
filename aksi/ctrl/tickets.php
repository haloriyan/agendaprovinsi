<?php
include 'controller.php';

class tickets extends EMBO {
	public function get() {
		$tiket = $_COOKIE['tiket'];
		$tick = json_decode($tiket, true);
		return $tick;
	}
	public function set() {
		$get = $this->get();
		foreach ($get as $key => $value) {
			$val[] = $value;
		}
		foreach ($val as $key => $value) {
			echo $key;
		}
	}

	// data cache
	public function loadTicketCache() {
		$ticket = $_COOKIE['ticketCache'];
		//
	}
	public function setTicketCache() {
		$currentTicket = [
			[
				"nama" => "Gratisan",
				"price" => 0,
				"slot"	=> 25
			]
		];
		$newTicket = [
			[
				"nama" => "Mbayar",
				"price" => 25000,
				"slot"	=> 25
			]
		];
		array_push($currentTicket, $newTicket);

		foreach ($currentTicket as $key => $value) {
			foreach ($value as $key => $value) {
				echo $key." : ".$value."<br />";
			}
		}
	}
}

$tickets = new tickets();

?>