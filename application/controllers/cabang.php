<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cabang extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('download');
	$this->load->library('pagination');
	$this->load->helper('cookie');
	$this->load->model('cabang_model');
  }
	
	public function index()
	{
		$data['title'] = 'Cabang';
		$data['cabang'] = $this->cabang_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('cabang/index');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{
		$cabang = $this->input->post('cabang');
		$ket = 	$this->input->post('ket');
		
		$data=array(
			'cabang'=> $cabang,
			'ket'=> $ket,
		);

		$this->cabang_model->tambah_data($data, 'cabang');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil ditambahkan!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('cabang');
	}

	public function proses_ubah()
	{
        $kode = $this->input->post('idcabang');
        $no = $this->input->post('no');
		$cabang = $this->input->post('nama');
		$ket = 	$this->input->post('ket');
		
		$data=array(
            'no' => $no,
			'nama'=> $cabang,
			'ket'=> $ket
		);

		$where = array(
			'id_cabang'=>$kode
		);

		$this->cabang_model->ubah_data($where, $data, 'cabang');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
    	redirect('cabang');
	}

	public function proses_hapus($id)
	{
		$where = array('id_cabang' => $id );
		$this->cabang_model->hapus_data($where, 'cabang');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('cabang');
	}

	public function getData()
	{
		$id = $this->input->post('id');
    	$where = array('id_cabang' => $id );
    	$data = $this->cabang_model->detail_data($where, 'cabang')->result();
    	echo json_encode($data);
	}

}
