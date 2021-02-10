<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m', 'supplier_m', 'stock_m']);


    }
    /**stock_in_session
     * 
     * 
     * 
     * */
    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_del(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('success','Data stock-in berhasil dihapus');
    
        }
        redirect('stock/in');

    }

    public function stock_in_add(){
        $item =$this->item_m->get()->result();
        $supplier =$this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('success','Data stock-in berhasil disimpan');
        
            }
            redirect('stock/in');
        } 
        else if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $stock = $this->item_m->get($post['item_id'])->row()->stock;
            if($post['qty'] > $stock){   
                $this->session->set_flashdata('error','qty lebih dr stock');
                redirect('stock/out/add'); 
                 
            } 
            else {
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('success','Data stock-out berhasil disimpan');
        
            }
            redirect('stock/out');
            }
        }
    }

        /**end_stock_in_session
     * 
     * 
     * 
     * */
        /**stock_out_session
     * 
     * 
     * 
     * */
    public function stock_out_data(){
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }
    public function stock_out_del(){
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('success','Data stock-in berhasil dihapus');
    
        }
        redirect('stock/out');

    }

    public function stock_out_add(){
        $item =$this->item_m->get()->result();
        $supplier =$this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }
    

}