<?php
class Komisi_jabatan extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_komisi_jabatan');
    }

    function index() {
        $x['title'] = "Jabatan Komisi";
        $x['jabatan'] = $this->M_komisi_jabatan->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_komisi_jabatan', $x);
        $this->load->view('template/V_footer');
    }
}