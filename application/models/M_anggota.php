<?php

class M_anggota extends CI_Model {

    function get_anggota() {
        $h = $this->db->query("SELECT * FROM tbl_anggota");
        return $h->result_array();
    }
    function get_total_anggota() {
        $h = $this->db->query("SELECT count(anggota_id) AS tot_anggota FROM tbl_anggota ");
        return $h->row_array();
    }
    function check_nip($nip) {
        $this->db->where('anggota_nip', $nip);  
           $h = $this->db->get("tbl_anggota");  
           if($h->num_rows() > 0)  {  
                return true;  
           }else{  
                return false;  
           }  
    }
    function get_anggota_pilih($nip) {
        $h = $this->db->query("SELECT * FROM tbl_anggota WHERE anggota_nip = '$nip' ");
        return $h->row_array();
    }
    function detail_anggota($id) {
        $h = $this->db->query("SELECT * FROM tbl_anggota WHERE anggota_id = '$id' ");
        return $h->row_array();
    }
    function tambah_anggota($nama,$alamat,$no_hp,$jabatan,$partai,$masa_jabatan,$komisi,$jabatan_komisi,$username_input,$date_input) {
        $h = $this->db->query("INSERT INTO tbl_anggota VALUES (NULL,'$nama','$no_hp','$alamat','$jabatan','$partai','$masa_jabatan','$komisi','$jabatan_komisi','$username_input','$date_input',NULL,NULL )");
        return $h;
    }
    function edit_anggota($id,$nama,$alamat,$no_hp,$jabatan,$partai,$masa_jabatan,$komisi,$jabatan_komisi,$username_update,$date_update) {
        $h = $this->db->query("UPDATE tbl_anggota SET anggota_nama = '$nama', anggota_no_hp = '$no_hp', anggota_alamat = '$alamat', anggota_jabatan = '$jabatan', anggota_partai = '$partai', anggota_masa_jabatan = '$masa_jabatan', anggota_komisi = '$komisi', anggota_jabatan_komisi = '$jabatan_komisi', anggota_username_update = '$username_update', anggota_datetime_update = '$date_update'  WHERE anggota_id='$id' ");
        return $h;
    }
    function hapus_anggota($id) {
        $h = $this->db->query("DELETE FROM tbl_anggota WHERE anggota_id='$id'");
        return $h;
    }
    function hapus_anggota_badan($id) {
        $h = $this->db->query("DELETE FROM tbl_anggota_badan WHERE badan_anggota_id = '$id' ");
        return $h;
    }
    function pilih_anggota($komisi) {
        $h = $this->db->query("SELECT * FROM tbl_anggota WHERE anggota_komisi = '$komisi' ");
        return $h->result_array();
    }
}