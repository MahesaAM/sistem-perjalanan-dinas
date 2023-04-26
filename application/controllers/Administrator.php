<?php

class Administrator extends CI_Controller {

    function __construct() {

        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_administrator');
    }

    function index() {
        $x['title'] = "Administrator";
        $x['admin'] = $this->M_administrator->get_administrator();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_administrator', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_admin() {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $level = $this->input->post('level');

        $this->M_administrator->tambah_admin($nama,$username,$password,$level);

        redirect('Administrator');
    }
    function edit_admin() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $level = $this->input->post('level');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $password_h = $this->input->post('password_h');

        if(empty($password)) {
            $this->M_administrator->edit_admin($id,$nama,$username,$password_h,$level);
        }else{
            $this->M_administrator->edit_admin($id,$nama,$username,$password,$level);
        }


        redirect('Administrator');
    }
    function hapus_admin() {
        $id = $this->input->post('id');
        $this->M_administrator->hapus_admin($id);
        redirect('Administrator');
    }
}