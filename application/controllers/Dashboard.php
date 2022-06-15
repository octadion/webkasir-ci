<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['item_m', 'unit_m', 'category_m','sale_m']);


	}
	public function index()
	{
		check_not_login();
		$data = $this->sale_m->get_data()->result();
		$x['data'] = json_encode($data);
		$this->template->load('template', 'dashboard', $x);
	}

	
	public function data()
	{

		$data = $this->item_m->get();

		$category = array();
		$category['name'] = 'name';

		$series1 = array();
		$series1['name'] = 'stock';

		foreach ($data as $row)
		{
		$category['data'][] = $row->name;
		$series1['data'][] = $row->stock;
		}

		$result = array();
		array_push($result,$category);
		array_push($result,$series1);

		print json_encode($result, JSON_NUMERIC_CHECK);
		}
		public function stock(){
			$list = $this->item_m->get_datatables();
			$data = array();
			foreach ($list as $item) {
				$row = array();
				$row[] = $item->name;
				$row[] = $item->stock;
				$data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function grafik(){
		$this->db->select('name, stock as total ');
		$this->db->group_by('item_id');
		// $this->db->where('a.aktif', '1');
		$this->db->order_by('name', 'asc');
		// $this->db->join('ref_kecamatan b', 'kecamatan_id = a.id_kecamatan', 'left');
		$total = $this->db->get('p_item')->result();

		$this->db->select('*');
		// $this->db->where('a.aktif', '1');
		// $this->db->join('ref_kecamatan b', 'kecamatan_id = a.id_kecamatan', 'left');
		$total_item = $this->db->get('p_item')->num_rows();		

		foreach ($total as $key) {
			$row['name']	= $key->name;
			$row['total']	= $key->total;
			$row['y']		= @$key->total ? (float) number_format(($key->total / $total_item) * 100, 2) : 0;
			$data[] = $row;
		}
		echo json_encode([
			'data' => $data
		]);
	}
	public function grafik2(){
		$this->db->select('invoice, date, sale_id as total ');
		$this->db->group_by('date');
		// $this->db->where('a.aktif', '1');
		$this->db->order_by('invoice', 'asc');
		// $this->db->join('ref_kecamatan b', 'kecamatan_id = a.id_kecamatan', 'left');
		$total = $this->db->get('t_sale')->result();

		$this->db->select('*');
		// $this->db->where('a.aktif', '1');
		// $this->db->join('ref_kecamatan b', 'kecamatan_id = a.id_kecamatan', 'left');
		$total_item = $this->db->get('t_sale')->num_rows();		

		foreach ($total as $key) {
			$row['invoice']	= $key->invoice;
			$row['total']	= $key->total;
			$row['y']		= @$key->total ? (float) number_format(($key->total / $total_item) * 100, 2) : 0;
			$data[] = $row;
		}
		echo json_encode([
			'data' => $data
		]);
	}

}

