<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanAbsensi extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Laporan Absensi";

		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}


		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/filterLaporanAbsensi');
		$this->load->view('template_admin/footer');
	}

	public function cetakLaporanAbsensi()
	{
		$data['title'] = "Cetak Laporan Absensi";
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun = $bulan.$tahun;

		$data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('admin/cetakLaporanAbsensi', $data);
		// $this->load->view('template_admin/footer');
	}
}
