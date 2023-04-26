<?php
class Jabatan_dprd extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_jabatan_dprd');
    }

    function index() {
        $x['title'] = "Jabatan DPRD";
        $x['jabatan'] = $this->M_jabatan_dprd->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_jabatan_dprd', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_jabatan() {
        $jabatan = $this->input->post('jabatan');
        $this->M_jabatan_dprd->tambah_jabatan($jabatan);
        redirect('Jabatan_dprd');
    }
    function edit_jabatan() {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $this->M_jabatan_dprd->edit_jabatan($id,$jabatan);
        redirect('Jabatan_dprd');
    }
    function hapus_jabatan() {
        $id = $this->input->post('id');
        $this->M_jabatan_dprd->hapus_jabatan($id);
        redirect('Jabatan_dprd');
    }
}