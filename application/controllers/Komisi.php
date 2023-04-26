<?php 
class Komisi extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_komisi');
    }

    function index() {
        $x['title'] = "Komisi";
        $x['komisi'] = $this->M_komisi->get_komisi();
        $x['jabatan'] = $this->M_komisi->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_komisi', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_komisi(){
        $komisi = $this->input->post('komisi'); 
        $this->M_komisi->tambah_komisi($komisi);
        redirect('Komisi');
    }
    function tambah_jabatan() {
        $jabatan = $this->input->post('jabatan');
        $this->M_komisi->tambah_jabatan($jabatan);
        redirect('Komisi');
    }
    function edit_komisi() {
        $id = $this->input->post('id');
        $komisi = $this->input->post('komisi');
        $this->M_komisi->edit_komisi($id,$komisi);
        redirect('Komisi');
    }
    function edit_jabatan() {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $this->M_komisi->edit_jabatan($id,$jabatan);
        redirect('Komisi');
    }
    function hapus_komisi(){
        $id = $this->input->post('id');
        $this->M_komisi->hapus_komisi($id);
        redirect('Komisi');
    }
    function hapus_jabatan() {
        $id = $this->input->post('id');
        $this->M_komisi->hapus_jabatan($id);
        redirect('Komisi');
    }
}