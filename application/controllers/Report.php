<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./application/third_party/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {
    function __construct()
	{
		parent 	::__construct();
		check_not_login();
		$this->load->model(['report_m', 'customer_m', 'user_m','sale_m','stock_m']);


    }

    function get_ajax() {
        $list = $this->report_m->get_datatables();
        $total_order = 0;
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->invoice;
            $row[] = $item->date;
            $row[] = $item->customer_name;
          
            $row[] = indo_currency($item->total_price);
            $row[] = $item->discount;
            $row[] = indo_currency($item->final_price);
            $row[] = '
            <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail" 
            data-invoice="'.$item->invoice.'"
            data-date="'.$item->date.'"
            data-customer="'.$item->customer_name.'"
            data-total="'.$item->total_price.'"
            data-discount="'.$item->discount.'"
            data-grandtotal="'.$item->final_price.'"
            data-note="'.$item->note.'"
            data-item_name="'.$item->item_name.'"
            data-price="'.$item->item_price.'"
            data-sale_id="'.$item->sale_id.'"> <i class="fa fa-eye"></i> Detail
            </a>
            <a href="'.site_url('report/cetak_invoice/'.$item->sale_id).'" class="btn btn-info btn-xs" target="_blank" > <i class="fa fa-print"></i>Print</a>
                    <a href="'.site_url('report/del/'.$item->sale_id).'" id="btn-hapus"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
                $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->report_m->count_all(),
                    "recordsFiltered" => $this->report_m->count_filtered(),
                    "data" => $data,
                    // 'total'    => indo_currency($total_order, 2)
                );
        // output to json format
        echo json_encode($output);
    }
    public function index()
	{
		$data['row'] = $this->report_m->get_index();
		$this->template->load('template', 'report/report_sale/report_sale_data', $data);
	}
    public function report_sale_data(){
		$this->load->model('customer_m');
		$customer = $this->customer_m->get()->result();
        $row = $this->report_m->get_sale()->result();
        $data = array(
            'customer' => $customer,
            'row' => $row
        );
		
        $this->template->load('template', 'report/report_sale/report_sale_data', $data);
        }
        public function report_stock_data(){
            // $data['year_list'] = $this->report_m->fetch_year();
        $this->template->load('template', 'report/report_stock/report_stock_data');
        }
       
        public function getData(){
            $data = $this->report_m->get_sale()->result();
            echo json_encode($data);
        }
	public function del($id){
		$this->report_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo '<div id="flash" data-flash="'.$this->session->flashdata('success').'"></div>';
		} else {
			echo '<div id="flash" data-flash="'.$this->session->flashdata('success').'"></div>';
		}
		echo "<script>window.location='".site_url('report/sale')."';</script>";
	}
    public function get_item_list(){
        // $product_id = $this->input->get('product_id');
        $id = $this->input->get('id');
        // print_r($id);
        $barang = $this->db
        ->select('t_sale.*, sale_detail.name as item_name, sale_detail.price as item_price')
        ->join('sale_detail', 'sale_detail.sale_id = t_sale.sale_id', 'left')
        ->get_where('t_sale', [
            // 'product_id' => $product_id,
            // 'orders.deleted_at' => null,
            't_sale.sale_id' => $id,
        
        ])->result();

    $result = [];
    foreach ($barang as $brg) {
        $result[] = [
            // 'id' => $brg->id,
            // 'product_id' => $brg->product_id,
            'item_name' => $brg->item_name,
            'item_price' => $brg->item_price,
            // 'qty' => $brg->qty,
           
        ];
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));

    
    }
    function export_excel(){
        if(isset($_GET['from']) && isset($_GET['to'])){
			$data['row'] = $this->report_m->get_date();
        } else if(isset($_GET['customer_name'])){
			$data['row'] = $this->report_m->get_customer();
        }
        else if(isset($_GET['invoice'])){
			$data['row'] = $this->report_m->get_invoice();
        }
        else {
            $data['row'] = $this->report_m->get_sale()->result();
        }
        $objPHPExcel = new Spreadsheet;
 
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Nomor')
        ->setCellValue('B1', 'Invoice')
        ->setCellValue('C1', 'Date')
        ->setCellValue('D1', 'Customer')
        ->setCellValue('E1', 'Total')
        ->setCellValue('F1', 'Discount')
        ->setCellValue('G1', 'Grand Total')
        ->setCellValue('H1', 'Detail');
        
        $baris=2;
        $x=1;

        foreach($data['row'] as $data){
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$baris, $x)
            ->setCellValue('B'.$baris, $data->invoice)
            ->setCellValue('C'.$baris, $data->date)
            ->setCellValue('D'.$baris, $data->customer_name)
            ->setCellValue('E'.$baris, $data->total_price)
            ->setCellValue('F'.$baris, $data->discount)
            ->setCellValue('G'.$baris, $data->final_price)
            ->setCellValue('H'.$baris, $data->note);
            
            $baris++;
            $x++;
        }
        
        $writer = new Xlsx($objPHPExcel);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data-Penjualan.xlsx"');
        header('Cache-Control: max-age=0');
  
        $writer->save('php://output');

    }
    function cetak_invoice($id){
		$data['row'] = $this->report_m->get($id)->row();
        $data['item'] = $this->report_m->get_item($id)->result();
		$html = $this->load->view('report/report_sale/cetak_invoice', $data, true);
		$this->fungsi->PdfGenerator($html, 'Invoice-'.$data['row']->invoice, 'A4', 'portrait');
	}

	function print_laporan(){
        if(isset($_GET['from']) && isset($_GET['to'])){
			$data['row'] = $this->report_m->get_date();
        } else if(isset($_GET['customer_name'])){
			$data['row'] = $this->report_m->get_customer();
        }
        else if(isset($_GET['invoice'])){
			$data['row'] = $this->report_m->get_invoice();
        }
        else {
            $data['row'] = $this->report_m->get_sale()->result();
        }
        $html = $this->load->view('report/report_sale/print_laporan_view', $data, true);
		$this->fungsi->PdfGenerator($html, 'Laporan', 'A4', 'portrait');

	}

	
    public function filter_all(){
        
        if(isset($_GET['from']) && isset($_GET['to'])){
			$data['row'] = $this->report_m->get_date();
			$row = $data['row'];
		$no = 1;foreach($row as $key=> $data): ?>
		 <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->invoice?></td>
                    <td><?=$data->date?></td>
                    <td><?=$data->customer_name?></td>
                    <td><?=$data->total_price?></td>
                    <td><?=$data->discount?></td>
                    <td><?=$data->final_price?></td>
                    <td class="text-center" width="200px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=$data->date?>"
                            data-customer="<?=$data->customer_name?>"
                            data-total="<?=$data->total_price?>"
                            data-discount="<?=$data->discount?>"
                            data-grandtotal="<?=$data->final_price?>"
                            data-note="<?=$data->note?>" >
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    <a href="<?=site_url('report/cetak_invoice/'.$data->sale_id)?>" class="btn btn-info btn-xs" target="_blank">
                            <i class="fa fa-print"></i> Print
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>
				<?php endforeach ?><?php
		}
        else if(isset($_GET['customer_name'])){
			$data['row'] = $this->report_m->get_customer();
			$row = $data['row'];
		$no = 1;foreach($row as $key=> $data): ?>
		 <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->invoice?></td>
                    <td><?=$data->date?></td>
                    <td><?=$data->customer_name?></td>
                    <td><?=$data->total_price?></td>
                    <td><?=$data->discount?></td>
                    <td><?=$data->final_price?></td>
                    <td class="text-center" width="200px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=$data->date?>"
                            data-customer="<?=$data->customer_name?>"
                            data-total="<?=$data->total_price?>"
                            data-discount="<?=$data->discount?>"
                            data-grandtotal="<?=$data->final_price?>"
                            data-note="<?=$data->note?>" >
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    <a href="<?=site_url('report/cetak_invoice/'.$data->sale_id)?>" class="btn btn-info btn-xs" target="_blank">
                            <i class="fa fa-print"></i> Print
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>
				<?php endforeach ?><?php
		}
        else if(isset($_GET['invoice'])){
			$data['row'] = $this->report_m->get_invoice();
			$row = $data['row'];
		$no = 1;foreach($row as $key=> $data): ?>
		 <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->invoice?></td>
                    <td><?=$data->date?></td>
                    <td><?=$data->customer_name?></td>
                    <td><?=$data->total_price?></td>
                    <td><?=$data->discount?></td>
                    <td><?=$data->final_price?></td>
                    <td class="text-center" width="200px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=$data->date?>"
                            data-customer="<?=$data->customer_name?>"
                            data-total="<?=$data->total_price?>"
                            data-discount="<?=$data->discount?>"
                            data-grandtotal="<?=$data->final_price?>"
                            data-note="<?=$data->note?>" >
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    <a href="<?=site_url('report/cetak_invoice/'.$data->sale_id)?>" class="btn btn-info btn-xs" target="_blank">
                            <i class="fa fa-print"></i> Print
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>
				<?php endforeach ?><?php
		}
    }
	
	
}
	
	
