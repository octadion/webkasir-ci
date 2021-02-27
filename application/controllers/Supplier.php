<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('supplier_m');


	}
	public function index()
	{
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}
	function get_json(){
		$this->load->library('datatables');
		$this->datatables->add_column('no','ID-$1', 'supplier_id');
		$this->datatables->select('supplier_id, name, phone, address, description');
		$this->datatables->add_column('action', anchor('supplier/edit/$1', 'Update', array('class' => 'btn btn-primary btn-xs'))."".
		anchor('supplier/del/$1', 'Delete', array('class' => 'btn btn-danger btn-xs', 'id' => 'btn-hapus' )),'supplier_id');
		$this->datatables->from('supplier');
		return print_r($this->datatables->generate());
	}
	public function del($id){
		$this->supplier_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo '<div id="flash" data-flash="'.$this->session->flashdata('success').'"></div>';
		} else {
			echo '<div id="flash" data-flash="'.$this->session->flashdata('error').'"></div>';
		}
		echo "<script>window.location='".site_url('supplier')."';</script>";
	}
	public function edit($id){
		$query =$this->supplier_m->get($id);
		if($query->num_rows()>0){
			$supplier = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $supplier
			);
			$this->template->load('template', 'supplier/supplier_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "<script>window.location='".site_url('supplier')."';</script>";
		}
	}
	public function process_add(){
		$post = $this->input->post(null, TRUE);
			$this->supplier_m->add($post);
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('supplier');
	}
	public function add(){
		$supplier = new stdClass();
		$supplier->supplier_id = null;
		$supplier->name = null;
		$supplier->phone = null;
		$supplier->address = null;
		$supplier->description = null;
		$data = array(
			'page' => 'add',
			'row' => $supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->supplier_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->supplier_m->edit($post);
		} 
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('supplier');
	}
}
