<?php
class Setup_sppd extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_kwitansi');
        $this->load->model('M_anggota');
    }

    function index() {
        $x['title'] = "Setup SPPD";
        $s = $this->M_kwitansi->get_setup();
        $x['anggota'] = $this->M_anggota->get_anggota();
        $x['s'] = $s;
        $this->load->view('template/V_header', $x);
        $this->load->view('V_setup_sppd', $x);
        $this->load->view('template/V_footer');
    }
    function edit_setup() {
        $header_kanan = $this->input->post('header_kanan');
        $pegawai_kanan = $this->input->post('pegawai_kanan');
        $header_bawah = $this->input->post('header_bawah');
        $pegawai_bawah = $this->input->post('pegawai_bawah');
        $kota = $this->input->post('kota');
        $this->M_kwitansi->edit_setup($header_kanan,$pegawai_kanan,$kota,$header_bawah,$pegawai_bawah);
        redirect('Setup_sppd');
    }
}