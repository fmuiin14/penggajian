<?php
class GantiPassword extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Ganti Password";
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('formGantiPassword', $data);
		$this->load->view('template_admin/footer');
	}

	public function gantiPasswordAksi()
	{
		$password = $this->input->post('password');
		$password_match = $this->input->post('password_match');

		$this->form_validation->set_rules('password', 'password baru', 'required|matches[password_match]');
		$this->form_validation->set_rules('password_match', 'ulangi password', 'required');

		if ($this->form_validation->run() != FALSE) {
			$data = array(
				'password' => md5($password)
			);

			$id = array(
				'id_pegawai' => $this->session->userdata('id_pegawai')
			);

			$this->penggajianModel->updateData('data_pegawai', $data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Password berhasil di ganti</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			redirect('welcome');		
		} else {
			
			$data['title'] = "Ganti Password";
			$this->load->view('template_admin/header', $data);
			$this->load->view('template_admin/sidebar');
			$this->load->view('formGantiPassword', $data);
			$this->load->view('template_admin/footer');
		}

	}
}
