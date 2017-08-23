<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends MY_Controller {

	public function __construct()  {
		parent::__construct();
	}

	public function index()
	{
		$this->_loadView('home', $this->data);
	}

	public function appetizer() {
		$this->_loadView(__FUNCTION__, $this->data);
	}

	public function soup() {
		$this->_loadView(__FUNCTION__, $this->data);
	}

	public function main_dish() {
		$this->_loadView(__FUNCTION__, $this->data);
	}

	public function dessert() {
		$this->_loadView(__FUNCTION__, $this->data);
	}

	public function details($id = null) {
		
		if(empty($id) || !is_numeric($id)){
			show_404();
		}
		$this->data->id = $id;
		$this->_loadView(__FUNCTION__, $this->data, TRUE);
	}







	
}


