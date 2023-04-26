<?php
class Tahun_anggaran extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_tahun_anggaran');
    }
    
    function index() {
        $x['title'] = "Tahun Anggaran";
        $x['anggaran'] = $this->M_tahun_anggaran->get_anggaran();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_tahun_anggaran', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_tahun_anggaran() {
        $tahun = $this->input->post('tahun');
        $luar_negri = $this->input->post('luar_negri');
        $dalam_negri = $this->input->post('dalam_negri');
        $dalam_kota = $this->input->post('dalam_kota');
        $this->M_tahun_anggaran->tambah_tahun_anggaran($tahun,$luar_negri,$dalam_negri,$dalam_kota);
        redirect('Tahun_anggaran');
    }
    function edit_tahun_anggaran() {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $luar_negri = $this->input->post('luar_negri');
        $dalam_negri = $this->input->post('dalam_negri');
        $dalam_kota = $this->input->post('dalam_kota');
        $this->M_tahun_anggaran->edit_tahun_anggaran($id,$tahun,$luar_negri,$dalam_negri,$dalam_kota);
        redirect('Tahun_anggaran');
    }
    function hapus_tahun_anggaran() {
        $id = $this->input->post('id');
        $this->M_tahun_anggaran->hapus_tahun_anggaran($id);
        redirect('Tahun_anggaran');
    }
}