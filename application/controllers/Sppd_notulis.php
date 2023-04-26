<?php 
class Sppd_notulis extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_sppd');
        $this->load->model('M_nominatif');
    }
    function index() {
        $x['title'] = "SPPD";
        $x['sppd'] = $this->M_sppd->get_sppd();
        $this->load->view('template/V_header_notulis', $x);
        $this->load->view('V_sppd_notulis' ,$x);
        $this->load->view('template/V_footer_notulis');
    }
    function detail() {
        $x['title'] = "Detail";
        $id = $this->uri->segment(3);
        $d = $this->M_sppd->detail_sppd($id);
        $x['d'] = $d;
        $id = $d['sppd_id'];
        $x['pengikut'] = $this->M_sppd->get_pengikut($id);
        $x['peserta'] = $this->db->get_where('tbl_sppd_peserta', ['peserta_sppd_id' => $id ])->result_array();
        $x['biaya'] = $this->db->get_where('tbl_sppd_biaya', ['biaya_sppd_id' => $id ])->result_array();
        $x['laporan'] = $this->db->get_where('tbl_sppd_laporan', ['laporan_sppd_id' => $id ])->result_array();
        $x['documentasi'] = $this->db->get_where('tbl_sppd_documentasi', ['documentasi_sppd_id' => $id ])->result_array();
        $this->load->view('template/V_header_notulis', $x);
        $this->load->view('V_detail_notulis', $x);
        $this->load->view('template/V_footer_notulis');
    }
    function v_tambah_lampiran() {
        $x['title'] = "Lampiran";
        $this->load->view('template/V_header_notulis', $x);
        $this->load->view('V_tambah_lampiran' ,$x);
        $this->load->view('template/V_footer_notulis');
    }
    function v_edit_lampiran() {
        $x['title'] = "Edit Lampiran";
        $id = $this->uri->segment(3);
        $sppd = $this->db->get_where('tbl_sppd', ['sppd_id' => $id ])->row_array();
        $x['sppd'] = $sppd;
        $x['biaya'] = $this->db->get_where('tbl_sppd_biaya', ['biaya_sppd_id' => $id ])->result_array();
        $x['laporan'] = $this->db->get_where('tbl_sppd_laporan', ['laporan_sppd_id' => $id ])->result_array();
        $x['documentasi'] = $this->db->get_where('tbl_sppd_documentasi', ['documentasi_sppd_id' => $id ])->result_array();
        $this->load->view('template/V_header_notulis', $x);
        $this->load->view('V_edit_lampiran' ,$x);
        $this->load->view('template/V_footer_notulis');
    }
    function tambah_notulis() {
        $id = $this->input->post('id');
        $ket = count($this->input->post('ket'));
        $ket_tot = $this->input->post('ket_tot');
        $val_tot = $this->input->post('val_tot');
        $lprn = count($this->input->post('nama_laporan'));
        $doc = count($this->input->post('nama_documentasi'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);

        for ($k=0; $k < $ket; $k++) { 
            $ke = $_POST['ket'][$k];
            $val = $_POST['val'][$k];
            if(!empty($ket)) {
                $this->db->query("INSERT INTO tbl_sppd_biaya VALUES (NULL,'$ke','$val','$id') ");
            }
        }
        $this->db->query("INSERT INTO tbl_sppd_biaya VALUES (NULL,'$ket_tot','$val_tot','$id') ");
        $this->db->query("UPDATE tbl_sppd SET sppd_biaya = '$val_tot' WHERE sppd_id = '$id' ");


        for ($l=0; $l < $lprn; $l++) { 
                if (isset($_POST['nama_laporan'][$l])) {
                $nama_laporan = $_POST['nama_laporan'][$l];
                $_FILES['file']['name'] = $_FILES['laporan']['name'][$l];
                $_FILES['file']['type'] = $_FILES['laporan']['type'][$l];
                $_FILES['file']['tmp_name'] = $_FILES['laporan']['tmp_name'][$l];
                $_FILES['file']['size'] = $_FILES['laporan']['size'][$l];
                $laporan = $_FILES['file']['name'];
                if ( $this->upload->do_upload('file')) {
                    $this->upload->data();
                }
                $this->db->query("INSERT INTO tbl_sppd_laporan VALUES (NULL,'$nama_laporan','$laporan','$id') ");
                }
        }
        for ($d=0; $d < $doc; $d++) { 
                if (isset($_POST['nama_documentasi'][$d])) {
                $nama_documentasi = $_POST['nama_documentasi'][$d];
                $_FILES['file']['name'] = $_FILES['documentasi']['name'][$d];
                $_FILES['file']['type'] = $_FILES['documentasi']['type'][$d];
                $_FILES['file']['tmp_name'] = $_FILES['documentasi']['tmp_name'][$d];
                $_FILES['file']['size'] = $_FILES['documentasi']['size'][$d];
                $documentasi = $_FILES['file']['name'];
                if ( $this->upload->do_upload('file')) {
                    $this->upload->data();
                }
                $this->db->query("INSERT INTO tbl_sppd_documentasi VALUES (NULL,'$nama_documentasi','$documentasi','$id') ");
                }
        }
        redirect('Sppd_notulis');
    }
    function edit_notulis() {
        $id = $this->input->post('id');
        $ket = count($this->input->post('ket'));
        $ket_tot = $this->input->post('ket_tot');
        $val_tot = $this->input->post('val_tot');
        $lprn = count($this->input->post('nama_laporan'));
        $doc = count($this->input->post('nama_documentasi'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);

        $this->M_nominatif->hapus_biaya($id);
        for ($k=0; $k < $ket; $k++) { 
            $ke = $_POST['ket'][$k];
            $val = $_POST['val'][$k];
            if(!empty($ket)) {
                $this->db->query("INSERT INTO tbl_sppd_biaya VALUES (NULL,'$ke','$val','$id') ");
            }
        }
        $this->db->query("INSERT INTO tbl_sppd_biaya VALUES (NULL,'$ket_tot','$val_tot','$id') ");
        $this->db->query("UPDATE tbl_sppd SET sppd_biaya = '$val_tot' WHERE sppd_id = '$id' ");

        $this->M_sppd->hapus_laporan($id);
        for ($l=0; $l < $lprn; $l++) { 
            if (isset($_POST['nama_laporan'][$l])) {
            $nama_laporan = $_POST['nama_laporan'][$l];
            $_FILES['file']['name'] = $_FILES['laporan']['name'][$l];
            $_FILES['file']['type'] = $_FILES['laporan']['type'][$l];
            $_FILES['file']['tmp_name'] = $_FILES['laporan']['tmp_name'][$l];
            $_FILES['file']['size'] = $_FILES['laporan']['size'][$l];
            
            if(!empty($_FILES['file']['name'])) {
                $laporan = $_FILES['file']['name'];
            }else{
                $laporan = $_POST['nama_file_laporan'][$l];
            }
            if ( $this->upload->do_upload('file')) {
                $this->upload->data();
            }
            $this->db->query("INSERT INTO tbl_sppd_laporan VALUES (NULL,'$nama_laporan','$laporan','$id') ");
            }
        }
        $this->M_sppd->hapus_documentasi($id);
        for ($d=0; $d < $doc; $d++) { 
            if (isset($_POST['nama_documentasi'][$d])) {
            $nama_documentasi = $_POST['nama_documentasi'][$d];
            $_FILES['file']['name'] = $_FILES['documentasi']['name'][$d];
            $_FILES['file']['type'] = $_FILES['documentasi']['type'][$d];
            $_FILES['file']['tmp_name'] = $_FILES['documentasi']['tmp_name'][$d];
            $_FILES['file']['size'] = $_FILES['documentasi']['size'][$d];

            if(!empty($_FILES['file']['name'])) {
                $documentasi = $_FILES['file']['name'];
            }else{
                $documentasi = $_POST['nama_file_documentasi'][$d];
            }
            if ( $this->upload->do_upload('file')) {
                $this->upload->data();
            }
            $this->db->query("INSERT INTO tbl_sppd_documentasi VALUES (NULL,'$nama_documentasi','$documentasi','$id') ");
            }
    }
        redirect('Sppd_notulis/v_edit_lampiran/'.$id);
    }
}