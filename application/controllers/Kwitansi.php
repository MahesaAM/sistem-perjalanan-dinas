<?php
class Kwitansi extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_kwitansi');
    }

    function index() {
        $x['title'] = "Kwitansi";
        $x['kwitansi'] = $this->M_kwitansi->get_kwitansi();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_kwitansi', $x);
        $this->load->view('template/V_footer');
    }
    function buat_kwitansi() {
        $id_anggota = $this->input->post('id_anggota');
        $nama = $this->input->post('nama');
        $id_sppd = $this->input->post('id_sppd');
        $kode_sppd = $this->input->post('kode_sppd');
        $r = $this->M_kwitansi->get_data_rincian($id_anggota,$id_sppd);
        $s = $this->M_kwitansi->get_data_sppd($id_sppd);
        $this->M_kwitansi->buat_kwitansi($id_sppd,$kode_sppd,$s['sppd_tanggal'],$id_anggota,$nama,$r['jumlah']);
        redirect('Kwitansi');
    }
    function hapus_kwitansi() {
        $id = $this->input->post('id');
        $this->M_kwitansi->hapus_kwitansi($id);
        redirect('Kwitansi');
    }
    function print_kwitansi() {
        $id_sppd = $this->uri->segment(3);
        $id_anggota = $this->uri->segment(4);
        $k = $this->M_kwitansi->get_setup();
        $x['k'] = $k;
        $x['ki'] = $this->M_kwitansi->get_kwitansi_anggota($k['pegawai_kiri']);
        $x['ka'] = $this->M_kwitansi->get_kwitansi_anggota($k['pegawai_kanan']);
        $x['a'] = $this->M_kwitansi->get_data_anggota($id_anggota);
        $x['s'] = $this->M_kwitansi->get_data_sppd($id_sppd);
        $x['r'] = $this->M_kwitansi->get_data_rincian($id_anggota,$id_sppd);
        $this->load->view('prints/print_kwitansi', $x);
    }
}