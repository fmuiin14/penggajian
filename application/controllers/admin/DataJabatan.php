<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataJabatan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda belum login</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect ('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Data Jabatan";
		$data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dataJabatan', $data);
		$this->load->view('template_admin/footer');
		
	}
	
	public function tambahData() {
		$data['title'] = "Tambah Data Jabatan";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/tambahDataJabatan', $data);
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

	// update
	public function updateData($id) {
		$where = array('id_jabatan' => $id);

		$data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan = '$id'")->result();

		$data['title'] = "Update Data Jabatan";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/updateDataJabatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function updateDataAksi() {
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id_jabatan');
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

				$where = array(
					'id_jabatan' => $id
		);

				$this->penggajianModel->updateData('data_jabatan', $data, $where);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di update</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('admin/dataJabatan');
			}
	}

	public function deleteData($id) {
		$where = array('id_jabatan' => $id);
		$this->penggajianModel->deleteData($where, 'data_jabatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus</strong><button type="button" class="close" data-dismiss="alert"
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		redirect('admin/dataJabatan');

	}

	public function _rules() {
		$this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
		$this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
		$this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
		$this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
	}
}
