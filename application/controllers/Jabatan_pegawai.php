<?php
class Jabatan_pegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_jabatan_pegawai');
    }

    function index() {
        $x['title'] = "Jabatan Pegawai";
        $x['jabatan'] = $this->M_jabatan_pegawai->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_jabatan_pegawai', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_jabatan() {
        $jabatan = $this->input->post('jabatan');
        $this->M_jabatan_pegawai->tambah_jabatan($jabatan);
        redirect('Jabatan_pegawai');
    }
    function edit_jabatan() {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $this->M_jabatan_pegawai->edit_jabatan($id,$jabatan);
        redirect('Jabatan_pegawai');
    }
    function hapus_jabatan() {
        $id = $this->input->post('id');
        $this->M_jabatan_pegawai->hapus_jabatan($id);
        redirect('Jabatan_pegawai');
    }
}