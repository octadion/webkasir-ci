<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model {

    // start datatables
    var $column_order = array(null, 'name'); //set column field database for datatable orderable
    var $column_search = array('name'); //set column field database for datatable searchable
    var $order = array('category_id' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        // $this->db->select('p_category.*');
        $this->db->from('p_category');
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
        $this->db->from('p_category');
        return $this->db->count_all_results();
    }
    // end datatables


    public function get($id = null)
    {
        $this->db->from('p_category');
        if($id != null){
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['category_name'],
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['category_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['id']);
        $this->db->update('p_category', $params);
    }

    public function del($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
