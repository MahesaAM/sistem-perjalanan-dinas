<?php

class Auth extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $x['title'] = "Login";
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run() == false) {
            $this->load->view('V_auth', $x);
        }else{
            $u=$this->input->post('username');
            $p=md5($this->input->post('password'));

            $user = $this->db->get_where('tbl_admin', ['admin_username' => $u, 'admin_password' => $p])->row_array();
            
            if ($user) {
                $data = [
                    'admin_id' => $user['admin_id'],
                    'admin_nama' => $user['admin_nama'],
                    'admin_username' => $user['admin_username'],
                    'admin_level' => $user['admin_level']
                ];
                $this->session->set_userdata($data);
                if($user['admin_level']=='admin') {
                    redirect('Dashboard');
                }else{
                    redirect('Dashboard_notulis');
                }
            }else{
                redirect('Auth');
            }

        }
    }

    function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_nama');
        $this->session->unset_userdata('admin_username');
        redirect('Auth');
    }
}