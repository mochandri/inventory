<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->library('pagination');
		$this->load->helper('cookie');
		$this->load->model('barang_model');
		$this->load->model('jenis_model');
		$this->load->model('satuan_model');
		$this->load->model('cabang_model');
		$this->load->helper('form');
		$this->load->library('Zend');
	}

	public function index()
	{
		$data['title'] = 'Barang';
		$data['barang'] = $this->barang_model->data()->result();
		$data['rows'] = $this->barang_model->data()->result();

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Barang';

		$data['kode'] = $this->barang_model->buat_kode();

		$data['cabang'] = $this->cabang_model->data()->result();
		$data['jmlCabang'] = $this->barang_model->data()->num_rows();

		$data['tglnow'] = date('m/d/Y');



		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_tambah');
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data['title'] = 'Barang';

		//menampilkan data berdasarkan id
		$where = array('id_barang' => $id);
		$data['data'] = $this->barang_model->detail_join($id)->result();

		//data untuk select




		$this->load->view('templates/header', $data);
		$this->load->view('barang/form_ubah');
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data['title'] = 'Barang';

		//menampilkan data berdasarkan id
		$data['data'] = $this->barang_model->detail_join($id, 'barang')->result();
		$data['urlview'] = 'http://localhost/it_inventory/barang/detail/';
		$data['qr'] = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=';

		$this->load->view('templates/header', $data);
		$this->load->view('barang/detail');
		$this->load->view('templates/footer');
	}

	public function proses_tambah()
	{

        $config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';
	
		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

        $this->load->library('upload', $config);
        
		$kode = 	$this->input->post('id');
		$barang = $this->input->post('barang');
		$tanggal = $this->input->post('tgl');
		$cabang = $this->input->post('cabang');
		$lokasi = $this->input->post('lokasi');
		$keterangan = $this->input->post('keterangan');
        
        if ($namaFile == '') {
            $ganti = 'box.png';
        }else{
          if (! $this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            redirect('barang/tambah');
          }
          else{
  
            $data = array('photo' => $this->upload->data());
            $nama_file= $data['photo']['file_name'];
            $ganti = str_replace(" ", "_", $nama_file);
  
  
          }

      }
		
		$data=array(
			'id_barang'=> $kode,
			'nama_barang'=> $barang,
			'tanggal' =>$tanggal,
			'id_cabang' => $cabang,
			'lokasi' =>$lokasi,
			'keterangan'=>$keterangan,
            'foto' => $ganti
		);

		$this->barang_model->tambah_data($data, 'barang');
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
    	redirect('barang');
	}




	public function proses_ubah()
	{
		$config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);

		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$tanggal = $this->input->post('tanggal');
		$cabang = $this->input->post('cabang');
		$lokasi = $this->input->post('lokasi');
		$keterangan = $this->input->post('keterangan');
		// $status = 'Aktif';


		$flama = $this->input->post('fotoLama');

		if ($namaFile == '') {
			$ganti = $flama;
		} else {
			if (!$this->upload->do_upload('photo')) {
				$error = $this->upload->display_errors();
				redirect('barang/ubah/' . $kode);
			} else {

				$data = array('photo' => $this->upload->data());
				$nama_file = $data['photo']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
				if ($flama == 'box.png') {
				} else {
					unlink('./assets/upload/barang/' . $flama . '');
				}
			}
		}


		$data = array(
			'nama_barang' => $barang,
			'tanggal' => $tanggal,
			'id_cabang' => $cabang,
			'lokasi' => $lokasi,
			'keterangan' => $keterangan,
			// 'status' => $status,
			'foto' => $ganti
		);

		$where = array(
			'id_barang' => $kode
		);

		$this->barang_model->ubah_data($where, $data, 'barang');
		$this->session->set_flashdata('Pesan', '
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
		redirect('barang');
	}

	public function proses_ubah_sold()
	{
		$config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);

		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$tanggal = $this->input->post('tanggal');
		$cabang = $this->input->post('cabang');
		$lokasi = $this->input->post('lokasi');
		$status = 'Sold';


		$flama = $this->input->post('fotoLama');

		if ($namaFile == '') {
			$ganti = $flama;
		} else {
			if (!$this->upload->do_upload('photo')) {
				$error = $this->upload->display_errors();
				redirect('barang/ubah/' . $kode);
			} else {

				$data = array('photo' => $this->upload->data());
				$nama_file = $data['photo']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
				if ($flama == 'box.png') {
				} else {
					unlink('./assets/upload/barang/' . $flama . '');
				}
			}
		}

		$data = array(
			'nama_barang' => $barang,
			'tanggal' => $tanggal,
			'id_cabang' => $cabang,
			'lokasi' => $lokasi,
			'status' => $status,
			'foto' => $ganti
		);

		$where = array(
			'id_barang' => $kode
		);

		$this->barang_model->ubah_data($where, $data, 'barang');
		$this->session->set_flashdata('Pesan', '
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
		redirect('barang');
	}


	public function proses_ubah_rusak()
	{
		$config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);

		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$tanggal = $this->input->post('tanggal');
		$cabang = $this->input->post('cabang');
		$lokasi = $this->input->post('lokasi');
		$status = 'Rusak';


		$flama = $this->input->post('fotoLama');

		if ($namaFile == '') {
			$ganti = $flama;
		} else {
			if (!$this->upload->do_upload('photo')) {
				$error = $this->upload->display_errors();
				redirect('barang/ubah/' . $kode);
			} else {

				$data = array('photo' => $this->upload->data());
				$nama_file = $data['photo']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
				if ($flama == 'box.png') {
				} else {
					unlink('./assets/upload/barang/' . $flama . '');
				}
			}
		}

		$data = array(
			'nama_barang' => $barang,
			'tanggal' => $tanggal,
			'id_cabang' => $cabang,
			'lokasi' => $lokasi,
			'status' => $status,
			'foto' => $ganti
		);

		$where = array(
			'id_barang' => $kode
		);

		$this->barang_model->ubah_data($where, $data, 'barang');
		$this->session->set_flashdata('Pesan', '
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
		redirect('barang');
	}

	public function proses_hapus($id)
	{
		$where = array('id_barang' => $id);
		$foto = $this->barang_model->ambilFoto($where);
		if ($foto) {
			if ($foto == 'box.png') {
			} else {
				unlink('./assets/upload/barang/' . $foto . '');
			}

			$this->barang_model->hapus_data($where, 'barang');
		}

		$this->session->set_flashdata('Pesan', '
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
		redirect('barang');
	}

	public function filterBarang($tglawal, $tglakhir)
	{
		$data = $this->barang_model->lapdata($tglawal, $tglakhir)->result();
		echo json_encode($data);
	}	
	public function getBarang()
	{
    	$data = $this->barang_model->data()->result();
    	echo json_encode($data);
	}

	public function getData()
	{
		$id = $this->input->post('id');
		$where = array('id' => $id);
		$data = $this->barang_model->detail_data($where, 'barang')->result();
		echo json_encode($data);
	}

	public function proses_aktif()
	{
		// $aktif = $this->barang_model->ubah_aktif();

		// $data=array(
		// 	'status'=> $aktif,

		// );

		// $this->barang_model->tambah_data($data, 'barang');
		// $this->session->set_flashdata('Pesan','
		// <script>
		// $(document).ready(function() {
		// 	swal.fire({
		// 		title: "Berhasil ditambahkan!",
		// 		icon: "success",
		// 		confirmButtonColor: "#4e73df",
		// 	});
		// });
		// </script>
		// ');
		$config['upload_path']   = './assets/upload/barang/';
		$config['allowed_types'] = 'png|jpg|JPG|jpeg|JPEG|gif|GIF|tif|TIF||tiff|TIFF';

		$namaFile = $_FILES['photo']['name'];
		$error = $_FILES['photo']['error'];

		$this->load->library('upload', $config);

		$kode =    $this->input->post('idbarang');
		$barang =  $this->input->post('barang');
		$tanggal = $this->input->post('tgl');
		$cabang = $this->input->post('cabang');
		$lokasi = $this->input->post('lokasi');


		$flama = $this->input->post('fotoLama');

		if ($namaFile == '') {
			$ganti = $flama;
		} else {
			if (!$this->upload->do_upload('photo')) {
				$error = $this->upload->display_errors();
				redirect('barang/ubah/' . $kode);
			} else {

				$data = array('photo' => $this->upload->data());
				$nama_file = $data['photo']['file_name'];
				$ganti = str_replace(" ", "_", $nama_file);
				if ($flama == 'box.png') {
				} else {
					unlink('./assets/upload/barang/' . $flama . '');
				}
			}
		}
		$Aktif = $this->barang_model->ubah_aktif();
		$Aktif = ('Aktif');

		$data = array(
			'nama_barang' => $barang,
			'status' => $Aktif,
			'foto' => $ganti,
			'tanggal' => $tanggal,
			'id_cabang' => $cabang,
			'lokasi' => $lokasi,
		);

		$where = array(
			'id_barang' => $kode
		);

		// $this->barang_model->ubah_data($where, $data, 'barang');
		// $this->session->set_flashdata('Pesan','
		// <script>
		// $(document).ready(function() {
		// 	swal.fire({
		// 		title: "Berhasil diubah!",
		// 		icon: "success",
		// 		confirmButtonColor: "#4e73df",
		// 	});
		// });
		// </script>
		// ');
		// redirect('barang');


		// $Aktif = $this->barang_model->ubah_aktif();
		// $Aktif = ('Aktif');

		// $data=array(
		// 	'status' => $Aktif
		// );
		$this->barang_model->tambah_data()()($data, 'barang');

		redirect('barang');
	}
	public function update_product()
	{
		if ($this->input->post('update_button')) {
			$status = $this->input->post('status');
			// retrieve other input field values for updating product data

			// perform the update operation using the retrieved values

			// redirect to a success page or display a success message
			$this->load->model('barang_model');

			// Call the update method in the model
			$update_data = array(
				'status' => $status,

			);
			$this->barang_model->update_product($product_id, $update_data);

			// Redirect to a success page or display a success message
			redirect('barang');
		}
	}
	public function tambah_cabang()
	{

		$data['title'] = 'Pilih Cabang';
		$data['cabang'] = $this->barang_model->get_cabang();
		$this->load->view('templates/header', $data);
		$this->load->view('barang/pilih_cabang');
		$this->load->view('templates/footer');
	}

	public function form()
	{
		
		$a = $_POST['id'];
		$tanggal = $this->input->post('tanggal');
		
		$data = [
			'kode' => $this->barang_model->auto_code($a),
			'in' => $this->barang_model->get_inisial($a),
			'tanggal' => $tanggal
		];
		$data['title'] = 'Form';
		$data['tglnow'] = date('m/d/Y');
		$data['cabang'] = $this->cabang_model->data()->result();
		$data['jmlCabang'] = $this->barang_model->data()->num_rows();
		

		$this->load->view('templates/header', $data);
		$this->load->view('barang/form');
		$this->load->view('templates/footer');
	}
	public function barcode($kodenya = "121212"){
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128','image',array('text' =>$kodenya));
	}

	public function laporan()
	{
		$data['title'] = 'Laporan Barang Assets';

		$this->load->view('templates/header', $data);
		$this->load->view('barang/laporan');
		$this->load->view('templates/footer');
	}
}
