<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_m extends CI_Model {
  var $column_order = array(null, 'invoice','customer_id', 'customer_name','sale_id'); //set column field database for datatable orderable
  var $column_search = array('invoice', 'customer.name'); //set column field database for datatable searchable
  var $order = array('sale_id' => 'desc'); // default order 
  
  private function _get_datatables_query() {
      $this->db->select('t_sale.*, customer.name as customer_name, sale_detail.name as item_name, sale_detail.price as item_price');
      $this->db->from('t_sale');
      $this->db->join('customer', 'customer.customer_id = t_sale.customer_id', 'left');
      $this->db->join('sale_detail', 'sale_detail.sale_id = t_sale.sale_id', 'left');
      $this->db->group_by('sale_id');
      if($_POST["start_date"] && $_POST["end_date"])
      {
      $this->db->where('t_sale.date BETWEEN "'.$_POST["start_date"] . '" and "'.$_POST["end_date"] .'"');
      }
      
      $i = 0;
      foreach ($this->column_search as $item) { // loop column 
          if(@$_POST['search']['value']) { // if datatable send POST for search
              if($i===0) { // first loop
                  $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                  $this->db->like($item, $_POST['search']['value']);
              } else {
                  $this->db->or_like($item, $_POST['search']['value']);
              }
              if(count($this->column_search) - 1 == $i) //last loop
                  $this->db->group_end(); //close bracket
          }
          $i++;
      }
          
      if(isset($_POST['order'])) { // here order processing
          $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      }  else if(isset($this->order)) {
          $order = $this->order;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

  function get_datatables() {
      $this->_get_datatables_query();
      if(@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
      $query = $this->db->get();
      return $query->result();
  }

  function count_filtered() {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  function count_all() {
      $this->db->from('t_sale');
      return $this->db->count_all_results();
  }
  // end datatables

  public function get($id =  null){
      $this->db->from('t_sale');
      if($id !=null){
          $this->db->where('sale_id', $id);
      }
      $query = $this->db->get();
      return $query;
  }
        public function get1($id = null){
            $this->db->from('t_sale');
            if($id != null){
                $this->db->where('sale_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        public function get_item($id = null){
          $this->db->from('sale_detail');
          if($id != null){
              $this->db->where('sale_id', $id);
          }
          $query = $this->db->get();
          return $query;
      }
      public function get_index($id = null){
        $this->db->select('t_sale.*, customer.name as customer_name, sale_detail.name as item_name, sale_detail.price as item_price');
        $this->db->from('t_sale');
        $this->db->join('customer', 'customer.customer_id = t_sale.customer_id', 'left');
        $this->db->join('sale_detail', 'sale_detail.sale_id = t_sale.sale_id', 'left');
        $this->db->group_by('sale_id');
        if($id !=null){
            $this->db->where('sale_id', $id);
        }
        $this->db->order_by('sale_id', 'desc');
        $query = $this->db->get();
        
        return $query;
      }
      
      public function get_sale(){
        $this->db->select('t_sale.*, customer.name as customer_name, sale_detail.name as item_name, sale_detail.price as item_price');
        $this->db->from('t_sale');
        $this->db->join('customer','customer.customer_id = t_sale.customer_id', 'left');
        $this->db->join('sale_detail','sale_detail.sale_id = t_sale.sale_id', 'left');
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

    function get_chart_data($start_date, $end_date) {

      $sql = 'SELECT * FROM ' . $this->tabel . ' WHERE DATE(date)>=' . $this->db->escape($start_date) . ' AND DATE(date)<=' . $this->db->escape($end_date);

      $query = $this->db->query($sql);

      $results = $query->result();

      return $results;

  }


  

}