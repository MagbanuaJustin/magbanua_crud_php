<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {
	public function index() {
		$this->call->database();

		$names = $this->db
		->table('super_names')
		->get_all();

		echo '<pre>';
		print_r($names);
		echo '<pre>';
	}
}
?>