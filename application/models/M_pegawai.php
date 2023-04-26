<?php
class M_pegawai extends CI_Model {

    function get_pegawai() {
        $h = $this->db->query("SELECT * FROM tbl_pegawai");
        return $h->result_array();
    }
    function check_nip($nip) {
        $this->db->where('pegawai_nip', $nip);  
           $h = $this->db->get("tbl_pegawai");  
           if($h->num_rows() > 0)  {  
                return true;  
           }else{  
                return false;  
           }  
    }
    function get_total_pegawai() {
        $h = $this->db->query("SELECT count(pegawai_nip) AS tot_pegawai FROM tbl_pegawai ");
        return $h->row_array();
    }
    function get_pegawai_pilih($tim) {
        $h = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai_nip = '$tim' ");
        return $h->row_array();
    }
    function tambah_pegawai($nip,$nama,$alamat,$no_hp,$golongan,$jabatan,$username,$date) {
        $h = $this->db->query("INSERT INTO tbl_pegawai VALUES (NULL,'$nip','$nama','$alamat','$no_hp','$golongan','$jabatan','$username','$date',NULL,NULL) ");
        return $h;
    }
    function edit_pegawai($id,$nama,$alamat,$no_hp,$golongan,$jabatan,$username,$date) {
        $h = $this->db->query("UPDATE tbl_pegawai SET pegawai_nama = '$nama', pegawai_alamat = '$alamat', pegawai_nohp = '$no_hp', pegawai_golongan = '$golongan', pegawai_jabatan = '$jabatan', pegawai_username_update = '$username', pegawai_datetime_update = '$date' WHERE pegawai_id = '$id'  ");
        return $h;
    }
    function hapus_pegawai($id) {
        $h = $this->db->query("DELETE FROM tbl_pegawai WHERE pegawai_id = '$id'");
        return $h;
    }
}