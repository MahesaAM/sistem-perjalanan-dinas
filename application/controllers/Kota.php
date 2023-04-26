<?php

class Kota extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('M_kota');
        $this->load->model('M_provinsi');
    }

    function index() {
        $x['title'] = "Kota";
        $x['kota'] = $this->M_kota->get_kota();
        $x['provinsi'] = $this->M_provinsi->get_provinsi();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_kota', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_kota() {
        $kota       = $this->input->post('kota');
        $provinsi   = $this->input->post('provinsi');
        $this->M_kota->tambah_kota($kota,$provinsi);
        redirect('Kota');
    }
    function edit_kota() {
        $id = $this->input->post('id');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');
        $this->M_kota->edit_kota($id,$kota,$provinsi);
        redirect('Kota');
    }
    function hapus_kota() {
        $id = $this->input->post('id');
        $this->M_kota->hapus_kota($id);
        redirect('Kota');
    }
}