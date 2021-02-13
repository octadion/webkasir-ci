<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('category_m');


	}

	function get_ajax() {
        $list = $this->category_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->name;
            // add html for action
            $row[] = '<a href="'.site_url('category/edit/'.$item->category_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="'.site_url('category/del/'.$item->category_id).'" id="btn-hapus"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->category_m->count_all(),
                    "recordsFiltered" => $this->category_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->category_m->get();
		$this->template->load('template', 'product/category/category_data', $data);
	}
	public function del($id){
		$this->category_m->del($id);
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('category');
	}
	public function edit($id){
		$query =$this->category_m->get($id);
		if($query->num_rows()>0){
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
			);
			$this->template->load('template', 'product/category/category_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".site_url('category')."';</script>";
		}
	}
	public function process(){
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->category_m->add($post);
		} else if(isset($_POST['edit'])){
			$this->category_m->edit($post);
		} 
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success','Data berhasil disimpan');
	
		}
		redirect('category');
	}
	public function add(){
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->template->load('template', 'product/category/category_form', $data);
	}
}
