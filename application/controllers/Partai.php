<?php
class Partai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_partai');
    }

    function index() {
        $x['title'] = "Partai";
        $x['partai'] = $this->M_partai->get_partai();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_partai', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_partai() {
        $partai = $this->input->post('partai');
        $this->M_partai->tambah_partai($partai);
        redirect('Partai');
    }
    function edit_partai() {
        $id = $this->input->post('id');
        $partai = $this->input->post('partai');
        $this->M_partai->edit_partai($id,$partai);
        redirect('Partai');
    }
    function hapus_partai() {
        $id = $this->input->post('id');
        $this->M_partai->hapus_partai($id);
        redirect('Partai');
    }
}