<?php
defined('BASEPATH') or exit('No direct script access allowed');

class potonganGaji extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Setting Potongan Gaji";

		$data['potongan_gaji'] = $this->penggajianModel->get_data('potongan_gaji')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/potonganGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Potongan Gaji";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/formPotonganGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$potongan = $this->input->post('potongan');
			$jml_potongan = $this->input->post('jml_potongan');

			$data = array(
				'potongan' => $potongan,
				'jml_potongan' => $jml_potongan	
			);

			$this->penggajianModel->insertData($data, 'potongan_gaji');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di tambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/potonganGaji');
		}
	}

	// update
	public function updateData($id)
	{
		$where = array('id' => $id);

		$data['potongan'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id = '$id'")->result();

		$data['title'] = "Update Potongan Gaji";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/updatePotonganGaji', $data);
		$this->load->view('template_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('id');
			$potongan = $this->input->post('potongan');
			$jml_potongan = $this->input->post('jml_potongan');
			
			$data = array(
				'potongan' => $potongan,
				'jml_potongan' => $jml_potongan
			);

			$where = array(
				'id' => $id
			);

			$this->penggajianModel->updateData('potongan_gaji', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di update</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('admin/potonganGaji');
		}
	}

	public function deleteData($id)
	{
		$where = array('id' => $id);
		$this->penggajianModel->deleteData($where, 'potongan_gaji');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Data berhasil di hapus</strong><button type="button" class="close" data-dismiss="alert"
				aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

		redirect('admin/potonganGaji');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('potongan', 'jenis potongan', 'required');
		$this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
		
	}

	// absensi start
	public function inputAbsensi()
	{
		if ($this->input->post('submit', TRUE) == 'submit') {
			$post = $this->input->post();

			foreach ($post['bulan'] as $key => $value) {
				if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
					$simpan[] = array(
						'bulan' => $post['bulan'][$key],
						'nik' => $post['nik'][$key],
						'nama_pegawai' => $post['nama_pegawai'][$key],
						'jenis_kelamin' => $post['jenis_kelamin'][$key],
						'nama_jabatan' => $post['nama_jabatan'][$key],
						'hadir' => $post['hadir'][$key],
						'sakit' => $post['sakit'][$key],
						'alpa' => $post['alpa'][$key]
					);
				}
			}

			$this->penggajianModel->insert_batch('data_kehadiran', $simpan);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil di tambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/dataAbsensi');
		}

		$data['title'] = "Form Input Absensi";
		if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan . $tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan . $tahun;
		}
		$data['inputabsensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
		WHERE not exists (SELECT * FROM data_kehadiran WHERE bulan = '$bulantahun' AND data_pegawai.nik = data_kehadiran.nik) ORDER BY data_pegawai.nama_pegawai ASC")->result();
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/formInputAbsensi', $data);
		$this->load->view('template_admin/footer');
	}
	// absensi end
}
