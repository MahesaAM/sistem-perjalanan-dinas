<?php
class Data_pegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_pegawai');
        $this->load->model('M_golongan_pegawai');
        $this->load->model('M_jabatan_pegawai');
    }

    function index() {
        $x['title'] = "Pegawai";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $x['pegawai'] = $this->M_pegawai->get_pegawai();
        $x['golongan'] = $this->M_golongan_pegawai->get_golongan();
        $x['jabatan'] = $this->M_jabatan_pegawai->get_jabatan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_pegawai', $x);
        $this->load->view('template/V_footer');
    }
    function check_nip() {
        if($this->M_pegawai->check_nip($_POST["nip"])) {  
           echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Nip Sudah Ada</label>';  
        }else{  
           echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Nip Tersedia</label>';  
        }  
    }
    function tambah_pegawai() {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $golongan = $this->input->post('golongan');
        $jabatan = $this->input->post('jabatan');
        $username = $this->input->post('username_input');
        $date = $this->input->post('date_input');
        $this->M_pegawai->tambah_pegawai($nip,$nama,$alamat,$no_hp,$golongan,$jabatan,$username,$date);
        redirect('Data_pegawai');
    }
    function edit_pegawai() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $golongan = $this->input->post('golongan');
        $jabatan = $this->input->post('jabatan');
        $username = $this->input->post('username_update');
        $date = $this->input->post('date_update');
        $this->M_pegawai->edit_pegawai($id,$nama,$alamat,$no_hp,$golongan,$jabatan,$username,$date);
        redirect('Data_pegawai');
    }
    function hapus_pegawai() {
        $id = $this->input->post('id');
        $this->M_pegawai->hapus_pegawai($id);
        redirect('Data_pegawai');
    }
    function print_pegawai() {
        $x['pegawai'] = $this->M_pegawai->get_pegawai();
        $this->load->view('prints/print_pegawai', $x);
    }
}