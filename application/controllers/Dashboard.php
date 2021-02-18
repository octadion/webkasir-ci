<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('item_m');
	 }
	public function index()
	{
		check_not_login();
		$this->template->load('template', 'dashboard');
	}
	public function data()
	{

		$data = $this->item_m->get();

		$category = array();
		$category['name'] = 'name';

		$series1 = array();
		$series1['name'] = 'stock';

		foreach ($data as $row)
		{
		$category['data'][] = $row->name;
		$series1['data'][] = $row->stock;
		}

		$result = array();
		array_push($result,$category);
		array_push($result,$series1);

		print json_encode($result, JSON_NUMERIC_CHECK);
		}
}
