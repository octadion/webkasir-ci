<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['report_m', 'customer_m', 'user_m','sale_m']);


    }
    public function report_sale_data(){
		
		$data['row'] = $this->report_m->get_sale()->result();
		if($this->input->post('from') && $this->input->post('to')){
			$data['row']=$this->report_m->get_date();

		}
		else if($this->input->post('invoice')){
			$data['row']=$this->report_m->get_invoice();
		}
		else if($this->input->post('customer_name')){
			$data['row']=$this->report_m->get_customer();
		}
        
        $this->template->load('template', 'report/report_sale/report_sale_data', $data);
    }
	public function del($id){
		$this->report_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo '<div id="flash" data-flash="'.$this->session->flashdata('success').'"></div>';
		} else {
			echo '<div id="flash" data-flash="'.$this->session->flashdata('success').'"></div>';
		}
		echo "<script>window.location='".site_url('report/report_sale')."';</script>";
	}
    function cetak_invoice($id){
		$data['row'] = $this->report_m->get($id)->row();
		$html = $this->load->view('report/report_sale/cetak_invoice', $data, true);
		$this->fungsi->PdfGenerator($html, 'Invoice-'.$data['row']->invoice, 'A4', 'portrait');
	}

	
		// else{
		// 	$data['row']=$this->report_m->get_sale()->result();
        // $this->template->load('template', 'report/report_sale/report_sale_data', $data);
		// }
		
		
	}
	
