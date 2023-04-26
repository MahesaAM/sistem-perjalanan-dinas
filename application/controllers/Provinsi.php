<?php

class Provinsi extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('M_provinsi');
    }

    function index() {
        $x['title'] = "Provinsi";
        $x['provinsi'] = $this->M_provinsi->get_provinsi();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_provinsi', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_provinsi() {
        $provinsi = $this->input->post('provinsi');
        $this->M_provinsi->tambah_provinsi($provinsi);
        redirect('Provinsi');
    }
    function edit_provinsi() {
        $id = $this->input->post('id');
        $nama = $this->input->post('provinsi');
        $this->M_provinsi->edit_provinsi($id,$nama);
        redirect('Provinsi');
    }
    function hapus_provinsi() {
        $id = $this->input->post('id');
        $this->M_provinsi->hapus_provinsi($id);
        redirect('Provinsi');
    }
} 