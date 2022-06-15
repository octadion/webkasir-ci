<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		check_not_login();
        $this->load->model('sale_m');
		$this->load->model('item_m');
		$this->load->model('report_m');
    }


	public function index()	
	{
		$this->load->model('customer_m');
		$customer = $this->customer_m->get()->result();
		$item =$this->item_m->get()->result();
        // $supplier =$this->supplier_m->get()->result();
		$data = array(
				'customer' => $customer,
				'item' => $item,
				'invoice' => $this->sale_m->invoice_no(),

		);
		$this->template->load('template', 'transaction/sale/sale_form', $data);
	}

	public function process_payment()
	{
		$post = $this->input->post(null, TRUE);
		$this->item_m->update_stock_out_payment($post);
		// $this->sale_m->add($post);
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
        $id = $this->db->insert_id(); 
        foreach($post['cart'] as $pos){
        $params2 = [
            'sale_id' => $id,
            'item_id' => $pos['item_id_value'],
            'name' => $pos['item_name_value'],
            'price' => $pos['price_value'],
            
        ];
        
        $this->db->insert('sale_detail', $params2);
        }
		
		$invoice = $this->input->post('invoice');
		$customer_id = $this->input->post('customer_id');
		$total_price = $this->input->post('sub_total');
		$discount = $this->input->post('discount');
		$final_price = $this->input->post('grand_total');
		$cash = $this->input->post('cash');
		$remaining = $this->input->post('change');
		// $note = $this->input->post('note');
		$date = $this->input->post('date');
		$user_id = $this->input->post('user_id');
		$email =  $this->input->post('email');
		// foreach($post['cart'] as $pos){
		// 	$output = '	
		// 	<td>
		// 	'.$pos['item_name_value'].'
		// 	</td>
			
		// 	<td>
		// 		'.$pos['price_value'].'
		// 	</td>
		// ';
		// }
		if(!empty($email)){
		$config = [
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_user' => 'superherodion@gmail.com',
			'smtp_pass' => 'SayaSeorangGEEK',
			'smtp_port' => 587,
			'smtp_crypto' => 'tls',
		];

		$this->load->library('email',$config);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html");
		// $id = $this->db->insert_id(); 
		$data = array(
			'row' =>$this->report_m->get($id)->row(),
			'item'=> $this->report_m->get_item($id)->result(),
		);
		$msg = $this->load->view('transaction/sale/email',$data,true);
		$message2 = '
		<html>
		<head>
			<meta charset="utf-8">
			<title>A simple, clean, and responsive HTML invoice template</title>
			<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
			
		</head>
		
		<body>
			<div class="invoice-box">
				<table cellpadding="0" cellspacing="0">
					<tr class="top">
						<td colspan="2">
							<table>
								<tr>
									<td class="title">
										
									</td>
									
									<td>
										Invoice #: '.$invoice.'<br>
										Created: '.$date.'<br>
										
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr class="information">
						<td colspan="2">
							<table>
								<tr>
									<td>
										MyKasir<br>
										12345 Surakarta<br>
										
									</td>
									
									<td>
										Phicos IT Consultanr<br>
										<br>
										phicos@gmail.com
									</td>
								</tr>
							</table>
						</td>
					</tr>
					
					<tr class="heading">
						<td>
							Payment Method
						</td>
						
						<td>
							Cash #
						</td>
					</tr>
					
					<tr class="details">
						<td>
							Cash
						</td>
						
						<td>
							'.$cash.'
						</td>
					</tr>
					<tr class="heading">
					<td>
						Item
					</td>
					
					<td>
					   
					</td>
				</tr>
			
					<tr class="heading">
						<td>
							Payment
						</td>
						
						<td>
							
						</td>
					</tr>
					
					<tr class="item">
						<td>
						   Customer
						</td>
						
						<td>
						'.$customer_id.'
						</td>
					</tr>
					
					<tr class="item">
						<td>
							Total Price
						</td>
						
						<td>
						'.$total_price.'
						</td>
					</tr>
					
					<tr class="item last">
						<td>
							Discount
						</td>
						
						<td>
						'.$discount.'
						</td>
					</tr>
					
					<tr class="total">
						<td>
						Final Price
						</td>
						<td>
						  '.$final_price.'
						</td>
					</tr>
				</table>
			</div>
		</body>
		</html>
    ';
         $subject="Invoice";
         $message=$message2;
          $this->email->from('superherodion@gmail.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($msg);
          if($this->email->send())
         {
			echo "<script type='text/javascript'>alert('Transaksi sukses');</script>";
                 redirect('sale', 'refresh');
         }
         else
        {
         show_error($this->email->print_debugger());
		 redirect('sale');
        }

    
		// if($this->email->send()){
		// 	echo "email sukses";

		// } else {
		// 	show_error($this->email->print_debugger());
		// }
	
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success','Data stock-in berhasil disimpan');
			
	
		}
		redirect('sale');
		
	}else {
		echo "<script type='text/javascript'>alert('Transaksi sukses');</script>";
			
	
		redirect('sale');
	}
	}	
}