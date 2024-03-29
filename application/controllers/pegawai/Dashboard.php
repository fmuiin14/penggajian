<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '2') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda belum login</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$id = $this->session->userdata('id_pegawai');
		$this->load->view('template_pegawai/header', $data);
		$data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('template_pegawai/footer');
	}
}
