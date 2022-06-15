<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_m extends CI_Model {
    
    public function invoice_no(){
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM t_sale
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "MP".date('ymd').$no;
        return $invoice;
    }
   

    public function add($post)
    {
    //    $array_response = json_decode($post, true);
        //   echo '<pre>';
        // print_r($post);
        // echo '</pre>';
        $params = [
            'invoice' => $post['invoice'],
            'customer_id' => $post['customer_id'],
            'total_price' => $post['sub_total'],
            'discount' => $post['discount_total'],
            'final_price' => $post['grand_total'],
            'cash' => $post['cash'],
            'remaining' => $post['change'],
            'note' => $post['note'],
            'date' => $post['date'],
            'user_id' => $post['user_id'],
        ];
        $this->db->insert('t_sale', $params);
        $sale_id = $this->db->insert_id(); 
        foreach($post['cart'] as $pos){
        $params2 = [
            'sale_id' => $sale_id,
            'item_id' => $pos['item_id_value'],
            'name' => $pos['item_name_value'],
            'price' => $pos['price_value'],
            
        ];
        
        $this->db->insert('sale_detail', $params2);
        }

    }
    public function get($id = null){
        $id = $this->db->insert_id();
        $this->db->from('t_sale');
        if($id != null){
        $this->db->where('sale_id', $id);
        }
        $query = $this->db->get();
      
        return $query;
    }
    function get_data(){
        $this->db->select("count(sale_id) as total_penjualan, DATE_FORMAT(date, '%M, %Y') AS datetime, sum(total_price) as total");
        $this->db->group_by('datetime');
        $result = $this->db->get('t_sale');
        return $result;
    }
    
}

