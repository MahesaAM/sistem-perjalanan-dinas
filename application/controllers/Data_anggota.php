<?php 

class Data_anggota extends CI_Controller {

    function __construct() {

        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_anggota');
        $this->load->model('M_jabatan_dprd');
        $this->load->model('M_partai');
        $this->load->model('M_jenis_anggota');
        $this->load->model('M_komisi');
        $this->load->model('M_badan');
    }

    function index() {
        $x['title'] = "Anggota";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $x['anggota'] = $this->M_anggota->get_anggota();
        $x['golongan_anggota'] = $this->M_jenis_anggota->get_jenis_anggota();
        $x['jabatan_dprd'] = $this->M_jabatan_dprd->get_jabatan();
        $x['partai'] = $this->M_partai->get_partai();
        $x['komisi'] = $this->M_komisi->get_komisi();
        $x['komisi_jabatan'] = $this->M_komisi->get_jabatan();
        $x['badan'] = $this->M_badan->get_badan();
        $x['jabatan_badan'] = $this->M_badan->get_jabatan_badan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_data_anggota', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_anggota() {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jabatan = $this->input->post('jabatan');
        $partai = $this->input->post('partai');
        $masa_jabatan = $this->input->post('masa_jabatan');
        $komisi = $this->input->post('komisi');
        $jabatan_komisi = $this->input->post('jabatan_komisi');
        $username_input = $this->input->post('username_input');
        $date_input = $this->input->post('date_input');
        $masuk_badan = count($this->input->post('masuk_badan'));

        $this->M_anggota->tambah_anggota($nama,$alamat,$no_hp,$jabatan,$partai,$masa_jabatan,$komisi,$jabatan_komisi,$username_input,$date_input);
        $id = $this->db->insert_id();
        
        for ($i=0; $i < $masuk_badan; $i++) { 
            $badan = $_POST['masuk_badan'][$i];
            $jabatan = $_POST['masuk_jabatan'][$i];
            if(!empty($badan)) {
                $this->M_badan->masuk_badan($id,$badan,$jabatan);
            }
        }

        redirect('Data_anggota');
    }

    function check_nip() {
        if($this->M_anggota->check_nip($_POST["nip"])) {  
           echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Nip Sudah Ada</label>';  
        }else{  
           echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Nip Tersedia</label>';  
        }  
    }

    function edit_anggota() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $jabatan = $this->input->post('jabatan');
        $partai = $this->input->post('partai');
        $masa_jabatan = $this->input->post('masa_jabatan');
        $komisi = $this->input->post('komisi');
        $jabatan_komisi = $this->input->post('jabatan_komisi');
        $username_update = $this->input->post('username_update');
        $date_update = $this->input->post('date_update');
        $masuk_badan = count($this->input->post('masuk_badan'));

        $this->M_anggota->edit_anggota($id,$nama,$alamat,$no_hp,$jabatan,$partai,$masa_jabatan,$komisi,$jabatan_komisi,$username_update,$date_update);
        $this->M_badan->reedit_badan($id);
        for ($i=0; $i < $masuk_badan; $i++) { 
            $badan = $_POST['masuk_badan'][$i];
            $jabatan = $_POST['masuk_jabatan'][$i];
            if(!empty($badan)) {
                $this->M_badan->masuk_badan($id,$badan,$jabatan);
            }
        }

        redirect('Data_anggota');
    }

    function hapus_anggota() {
        $id = $this->input->post('id');
        $this->M_anggota->hapus_anggota($id);
        $this->M_anggota->hapus_anggota_badan($id);
        redirect('Data_anggota');
    }
    function detail_anggota() {
        $x['title'] = "Detail Anggota";
        $id = $this->uri->segment(3);
        $k = $this->M_anggota->detail_anggota($id);
        $x['k'] = $this->db->get_where('tbl_komisi', ['komisi_id' => $k['anggota_komisi'] ])->row_array();
        $x['masuk_b'] = $this->db->get_where('tbl_anggota_badan', ['badan_anggota_id' => $k['anggota_id'] ])->result_array();
        $x['d'] = $k;
        $x['badan'] = $this->M_badan->get_badan();
        $x['jabatan'] = $this->M_badan->get_jabatan_badan();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_detail_anggota', $x);
        $this->load->view('template/V_footer');
    }
    function tambah_badan() {
        $id = $this->input->post('id');
        $badan = $this->input->post('badan'); 
        $jabatan = $this->input->post('jabatan'); 
        $this->M_badan->masuk_badan($id,$badan,$jabatan);
        redirect('Data_anggota/detail_anggota/'.$id);
    }
    function hapus_badan() {
        $b = $this->uri->segment(4);
        $id = $this->uri->segment(3);
        $this->db->delete('tbl_anggota_badan', ['badan_id' => $b ]);
        redirect('Data_anggota/detail_anggota/'.$id);
    }
    function print_anggota() {
        $x['anggota'] = $this->M_anggota->get_anggota();
        $this->load->view('prints/print_anggota', $x);
    }
    
}