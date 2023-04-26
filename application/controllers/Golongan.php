<?php
class Golongan extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_jenis_anggota');
    }

    function index() {
        $x['title'] = "Golongan";
        $x['golongan'] = $this->M_jenis_anggota->get_jenis_anggota();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_golongan', $x);
        $this->load->view('template/V_footer');
    }

    function tambah_jenis() {
        $title = $this->input->post('title');
        $deskripsi = $this->input->post('deskripsi');
        $this->M_jenis_anggota->tambah_jenis($title,$deskripsi);
        redirect('Golongan');
    }

    function edit_jenis() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $deskripsi = $this->input->post('deskripsi');
        $this->M_jenis_anggota->edit_jenis($id,$title,$deskripsi);
        redirect('Golongan');
    }

    function hapus_jenis() {
        $id = $this->input->post('id');
        $this->M_jenis_anggota->hapus_jenis($id);
        redirect('Golongan');
    }
}