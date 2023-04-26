<?php

class badan extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_badan');
    }

    function index() {
        $x['title'] = "Badan";
        $x['badan'] = $this->M_badan->get_badan();
        $x['jabatan'] = $this->M_badan->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_badan', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_badan() {
        $badan = $this->input->post('badan');
        $this->M_badan->tambah_badan($badan);
        redirect('Badan');
    }
    function tambah_jabatan() {
        $jabatan = $this->input->post('jabatan');
        $this->M_badan->tambah_jabatan($jabatan);
        redirect('Badan');
    }
    function edit_badan() {
        $id = $this->input->post('id');
        $badan = $this->input->post('badan');
        $this->M_badan->edit_badan($id,$badan);
        redirect('Badan');
    }
    function edit_jabatan() {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $this->M_badan->edit_jabatan($id,$jabatan);
        redirect('Badan');
    }
    function hapus_badan() {
        $id = $this->input->post('id');
        $this->M_badan->hapus_badan($id);
        redirect('Badan');
    }
    function hapus_jabatan() {
        $id = $this->input->post('id');
        $this->M_badan->hapus_jabatan($id);
        redirect('Badan');
    }
}