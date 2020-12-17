<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataPegawai extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataPegawai', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambahData() {
		$data['title'] = "Tambah Data Pegawai";
		$data['all_jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahDataPegawai', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambahDataAksi() {
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nama_jabatan = $this->input->post('nama_jabatan');
			$gaji_pokok = $this->input->post('gaji_pokok');
			$tj_transport = $this->input->post('tj_transport');
			$uang_makan = $this->input->post('uang_makan');

			$data = array(
				'nama_jabatan' => $nama_jabatan,
				'gaji_pokok' => $gaji_pokok,
				'tj_transport' => $tj_transport,
				'uang_makan' => $uang_makan,
				);

				$this->penggajianModel->insertData($data, 'data_jabatan');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di tambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('admin/dataJabatan');
			}
	}
}
