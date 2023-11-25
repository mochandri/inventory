<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataBarang extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('supplier_model');
	$this->load->model('barang_model');
	$this->load->model('dataBarang_model');
	$this->load->model('barangKeluar_model');
  }
	
	public function index()
	{
		$data['title'] = 'Data Barang';
		$data['db'] = $this->dataBarang_model->dataJoin()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('dataBarang/index');
		$this->load->view('templates/footer');
	}

	
}
