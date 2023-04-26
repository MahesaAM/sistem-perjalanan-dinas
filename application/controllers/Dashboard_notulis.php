<?php

class Dashboard_notulis extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_sppd');
    }

    function index() {
        $x['title'] = "SPPD";
        $x['sppd'] = $this->M_sppd->get_sppd();
        $this->load->view('template/V_header_notulis', $x);
        $this->load->view('V_dashboard_notulis', $x);
        $this->load->view('template/V_footer_notulis');
    }
}