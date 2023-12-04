<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';

$route['home'] = 'Home/index';
$route['profile'] = 'Profile/index';

//user & login
$route['user'] = 'User/index';
$route['login'] = 'Login/index';

//master
$route['supplier'] = 'Supplier/index';
$route['data_barang'] = 'dataBarang/index';
$route['jenis'] = 'Jenis/index';
$route['cabang'] = 'Cabang/index';
$route['satuan'] = 'Satuan/index';
$route['barang'] = 'Barang/index';
$route['barang_masuk'] = 'barangMasuk/index';
$route['barang_keluar'] = 'barangKeluar/index';

//laporan
$route['lap_barang'] = 'barang/laporan';
$route['lap_barang_keluar'] = 'barangKeluar/laporan';



$route['(:any)'] = 'gagal/index/$1';
$route['404_override'] = 'Gagal/index';
$route['translate_uri_dashes'] = FALSE;

$route['form'] = 'Barang/form';
$route['form_tambah'] = 'Barang/form_tambah';