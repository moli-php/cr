<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends MY_Controller {


	public function __construct() {
		parent::__construct();
		$this->_init();
	}

	public function _init() {
		// Preparation time values
		$this->data->options[''] = 'Select preparation time';
		$minutes_in_one_day = 1440;
		for($i = 0; $i < $minutes_in_one_day; $i = $i + 10) {
			if($i > 0) {
				$mins = ($i%60) > 0 ? ' '. ($i%60) . ' mins' : '';		
				if($i < 60) {
					$this->data->options[$i . ' mins'] = $i . ' mins';
				}else if($i/60 < 2) {
					$hr = (int)($i/60) . ' hr' . $mins;
					$this->data->options[$hr] = $hr;

				}else if($i/60 >= 2) {
					$hrs = (int)($i/60) . ' hrs' . $mins;
					$this->data->options[$hrs] = $hrs;
				}
			}
		}


	}

	public function add($category = null) {

		if(empty($category)) {
			show_404();
		}

		// Get category_id
		foreach($this->data->categories as $val) {
			if($val->url === $category) {
				$this->data->category_id = $val->id;
			}
		}

		$this->_loadView(__FUNCTION__, $this->data, true);
	}

	public function edit($category = null, $id = null) {

		if(empty($category) || empty($id) || !is_numeric($id)) {
			show_404();
		}

		$recipe = $this->recipies->getRecipe($id);

		if(empty($recipe)) {
			show_404();
		}
		// get recipe data
		foreach($recipe as $k => $v) {
			$this->data->$k = $v;
		}

		$this->data->category = $category;

		$this->_loadView(__FUNCTION__, $this->data, true);
	}

	// this is my reference, nothing to do with the project
	public function my_count() {
		$path = dirname(dirname(__DIR__)) .'/assets/img/uploads';
		$main = scandir($path);
		unset($main[0]);
		unset($main[1]);
		$counter = 0;

		foreach($main as $k => $v) {
			$child = scandir($path ."/".$v);
			foreach($child as $val) {
				
				if($val != '.' && $val != '..') {
					$counter++;
				}
			}
		}

		echo "total images : ". $counter;
		echo "<br>";
		echo "total table records : " . $this->recipies->total_rows();

	}

	// this is my reference, nothing to do with the project
	public function my_reset() {

		$path = dirname(dirname(__DIR__)) .'/assets/img/uploads';
		$main = scandir($path);
		unset($main[0]);
		unset($main[1]);
		$counter = 0;

		foreach($main as $k => $v) {
			$child = scandir($path ."/".$v);
			foreach($child as $val) {
				
				if($val != '.' && $val != '..') {
					$counter++;
					unlink($path . "/{$v}/".$val);
				}
			}
		}

		echo "files deleted : " . $counter;
		echo "<br>";
		echo "Table recipies truncated : " . $this->recipies->truncate();

	}



}