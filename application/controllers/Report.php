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
    public function report_sale_data(){
		
		$data['row'] = $this->report_m->get_sale()->result();
        $this->template->load('template', 'report/report_sale/report_sale_data', $data);
        }
        public function report_stock_data(){
            $data['row'] = $this->stock_m->get_all()->result();
        $this->template->load('template', 'report/report_stock/report_stock_data', $data);
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
		echo "<script>window.location='".site_url('report/report_sale')."';</script>";
	}
    function export_excel(){
        $data['row'] = $this->report_m->get_sale()->result();
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
	
	
