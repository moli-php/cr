<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data;

	public function __construct() {
		parent::__construct();
		$this->_init();
	}

	private function _init() {

		$this->data = new stdClass();
		$this->data->categories = $this->categories->getCategories();
		$this->data->menu_active = $this->uri->segment(2, "Home");
		$this->data->title = ucfirst(str_replace("_", " ", $this->data->menu_active));

		// add url key on categories 
		foreach($this->data->categories as $key => $val) {
			$this->data->categories[$key]->url = strtolower(str_replace(" ","_", $val->name));
		}

	}

	protected function _loadView($content, $data, $flag = false) {

		$this->load->view('header', $this->data);
		$this->load->view('contents/'.$content, $this->data);
		if($flag == false) {
			$this->load->view('feature', $this->data);
		}
		
		$this->load->view('footer', $this->data);

	}

}
