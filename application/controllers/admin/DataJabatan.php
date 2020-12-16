<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataJabatan extends CI_Controller {

	public function index()
	{
		$data['title'] = "Data Jabatan";
		$data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataJabatan', $data);
		$this->load->view('template_admin/footer');
		
	}
}
