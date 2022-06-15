<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		// $this->load->model('category_m');


	}

    public function index(){
        $data['title'] = 'Email';
        $this->load->view('email',$data);
    }
}