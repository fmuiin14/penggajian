<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataGaji extends CI_Controller
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
        $data['title'] = "Data Gaji";
        $id = $this->session->userdata('nik');
        $this->load->view('template_pegawai/header', $data);
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_jabatan.gaji_pokok, data_jabatan.`tj_transport`, data_jabatan.`uang_makan`, data_kehadiran.`alpa`, data_kehadiran.`bulan`, data_kehadiran.`id_kehadiran` FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.`nama_jabatan` = data_pegawai.`jabatan` WHERE data_kehadiran.nik = '$id' ORDER BY data_kehadiran.`bulan` DESC")->result();
        $this->load->view('template_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji', $data);
        $this->load->view('template_pegawai/footer');
    }

    public function cetakSlip($id)
    {
        $data['title'] = "Cetak Slip Gaji";
        $this->load->view('template_pegawai/header', $data);
        $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
        $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpa, data_kehadiran.bulan FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_kehadiran.id_kehadiran='$id'")->result();
        // var_dump($data['print_slip']);
        // die;
        $this->load->view('pegawai/cetakSlipGaji', $data);
    }
}
