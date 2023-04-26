<?php

class Dashboard extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_pegawai');
        $this->load->model('M_anggota');
        $this->load->model('M_sppd');
    }

    function index () {
        $x['title'] = "Home";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $x['pegawai'] = $this->M_pegawai->get_total_pegawai();
        $x['anggota'] = $this->M_anggota->get_total_anggota();
        $x['sppd'] = $this->M_sppd->get_total_sppd();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_dashboard', $x);
        $this->load->view('template/V_footer');
    }
}