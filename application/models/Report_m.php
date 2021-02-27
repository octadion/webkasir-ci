<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {
    
        public function get($id = null){
            $this->db->from('t_sale');
            if($id != null){
                $this->db->where('sale_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }
      public function get_sale(){
        $this->db->select('t_sale.*, customer.name as customer_name');
        $this->db->from('t_sale');
        $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
        $query = $this->db->get();
        return $query;
      }
      public function del($id){
        $this->db->where('sale_id', $id);
        $this->db->delete('t_sale');
    }
    public function get_invoice(){
      $invoice = $_GET['invoice'];
      $this->db->select('t_sale.*, customer.name as customer_name');
      $this->db->from('t_sale');
      $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
      $this->db->like('invoice',$invoice);
      // $this->db->where('date <=', $daterange[1]);
      // $this->db->or_like('customer_name',$customer_name);
      
      return $this->db->get()->result();
  }
    public function get_date(){
      $from = $_GET['from'];
      $to =$_GET['to'];
      $this->db->select('t_sale.*, customer.name as customer_name');
      $this->db->from('t_sale');
      $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
      $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
      return $this->db->get()->result();
    }
    public function get_customer(){
      $customer_name = $_GET['customer_name'];
      $this->db->select('t_sale.*, customer.name as customer_name');
      $this->db->from('t_sale');
      $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
      $this->db->like('name', $customer_name);
      return $this->db->get()->result();
    }
    public function get_sale_pagination($limit = null, $start=null){
      $this->db->select('t_sale.*, customer.name as customer_name');
      $this->db->from('t_sale');
      $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
      $this->db->order_by('date', 'desc');
      $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query;
    }   
}