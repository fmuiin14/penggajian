<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataPegawai extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('hak_akses') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda belum login</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect ('welcome');
		}
	}

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
			$nik = $this->input->post('nik');
			$nama_pegawai = $this->input->post('nama_pegawai');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$jabatan = $this->input->post('jabatan');
			$hak_akses = $this->input->post('hak_akses');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$status = $this->input->post('status');
			// untuk photo menggunakan superglobal variabel dr php
			$photo = $_FILES['photo']['name'];
			if ($photo = '') {

			} else {
				$config['upload_path'] = './assets/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('photo')) {
					echo "Photo Gagal di Upload";
				} else {
					$photo = $this->upload->data('file_name');
				}
			}

			$data = array(
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'tanggal_masuk' => $tanggal_masuk,
				'jabatan' => $jabatan,
				'hak_akses' => $hak_akses,
				'username' => $username,
				'password' => $password,
				'status' => $status,
				'photo' => $photo,
				);

				$this->penggajianModel->insertData($data, 'data_pegawai');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di tambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('admin/dataPegawai');
			}
	}

	public function updateData($id) {
		$where = array('id_pegawai' => $id);

		$data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai = '$id'")->result();

		$data['all_jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
		$data['title'] = "Update Data Pegawai";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/updateDataPegawai', $data);
		$this->load->view('template_admin/footer');
	}

	public function updateDataAksi() {
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$id = $this->input->post('id_pegawai');
			$this->updateData($id);
		} else {
			$id = $this->input->post('id_pegawai');
			$nik = $this->input->post('nik');
			$nama_pegawai = $this->input->post('nama_pegawai');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tanggal_masuk = $this->input->post('tanggal_masuk');
			$jabatan = $this->input->post('jabatan');
			$hak_akses = $this->input->post('hak_akses');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$status = $this->input->post('status');

			$photo = $_FILES['photo']['name'];
			if ($photo) {
				$config['upload_path'] = './assets/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('photo')) {
					$photo = $this->upload->data('file_name');
					$this->db->set('photo', $photo);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nik' => $nik,
				'nama_pegawai' => $nama_pegawai,
				'jenis_kelamin' => $jenis_kelamin,
				'jabatan' => $jabatan,
				'hak_akses' => $hak_akses,
				'username' => $username,
				'password' => $password,
				'tanggal_masuk' => $tanggal_masuk,
				'status' => $status,
		);

		$where = array(
			'id_pegawai' => $id
		);

		$this->penggajianModel->updateData('data_pegawai', $data, $where);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Data berhasil di update</strong><button type="button" class="close" data-dismiss="alert"
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				redirect('admin/dataPegawai');

		}
	}

	public function deleteData($id) {
		$where = array('id_pegawai' =>$id);
		$this->penggajianModel->deleteData($where, 'data_pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus</strong><button type="button" class="close" data-dismiss="alert"
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		redirect('admin/dataPegawai');
	}

	public function _rules() {
	$this->form_validation->set_rules('nik', 'NIK', 'required');
	$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
	$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
	$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
	$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
	$this->form_validation->set_rules('status', 'Status', 'required');
	}
}
