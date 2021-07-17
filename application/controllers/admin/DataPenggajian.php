<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPenggajian extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Data Gaji Pegawai";
		
		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}

		$data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();

		$data['gaji'] = $this->db->query("SELECT * FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.`jabatan` = data_jabatan.`nama_jabatan` INNER JOIN data_kehadiran ON data_pegawai.`nik` = data_kehadiran.`nik` WHERE data_kehadiran.bulan='$bulantahun' ORDER BY data_pegawai.`nama_pegawai` ASC")->result(); 

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function cetakGaji()
	{
		$data['title'] = "Cetak Data Gaji Pegawai";
		
		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}

		$data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();

		$data['cetakGaji'] = $this->db->query("SELECT * FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.`jabatan` = data_jabatan.`nama_jabatan` INNER JOIN data_kehadiran ON data_pegawai.`nik` = data_kehadiran.`nik` WHERE data_kehadiran.bulan='$bulantahun' ORDER BY data_pegawai.`nama_pegawai` ASC")->result(); 

		$this->load->view('template_admin/header', $data);
		// $this->load->view('template_admin/sidebar');
		$this->load->view('admin/cetakDataGaji', $data);
		// $this->load->view('template_admin/footer');
	}

}
