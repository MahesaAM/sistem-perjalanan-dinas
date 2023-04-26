<?php
class Nominatif extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('M_nominatif');
    }

    function index() {
        $x['title'] = "Daftar Nominatif";
        $x['nominatif'] = $this->M_nominatif->get_nominatif();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_nominatif', $x);
        $this->load->view('template/V_footer');
    }
}