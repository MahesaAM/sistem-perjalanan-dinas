<?php
class Golongan_pegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_golongan_pegawai');
    }

    function index() {
        $x['title'] = "Golongan Pegawai";
        $x['golongan'] = $this->M_golongan_pegawai->get_golongan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_golongan_pegawai', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_golongan() {
        $title = $this->input->post('title');
        $this->M_golongan_pegawai->tambah_golongan($title);
        redirect('Golongan_pegawai');
    }
    function edit_golongan() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $this->M_golongan_pegawai->edit_golongan($id,$title);
        redirect('Golongan_pegawai');
    }
    function hapus_golongan() {
        $id = $this->input->post('id');
        $this->M_golongan_pegawai->hapus_golongan($id);
        redirect('Golongan_pegawai');
    }
}