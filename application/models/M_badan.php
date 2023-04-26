<?php

class M_badan extends CI_Model {

    function get_badan() {
        $h = $this->db->query("SELECT * FROM tbl_badan");
        return $h->result_array();
    }
    function get_jabatan() {
        $h = $this->db->query("SELECT * FROM tbl_jabatan_badan");
        return $h->result_array();
    }
    function get_jabatan_badan() {
        $h = $this->db->query("SELECT * FROM tbl_jabatan_badan");
        return $h->result_array();
    }
    function tambah_badan($badan) {
        $h = $this->db->query("INSERT INTO tbl_badan VALUES (NULL,'$badan') ");
        return $h;
    }
    function tambah_jabatan($jabatan) {
        $h = $this->db->query("INSERT INTO tbl_jabatan_badan VALUES (NULL,'$jabatan') ");
        return $h;
    }
    function edit_badan($id,$badan) {
        $h = $this->db->query("UPDATE tbl_badan SET badan_nama = '$badan' WHERE badan_id = '$id' ");
        return $h;
    }
    function edit_jabatan($id,$jabatan) {
        $h = $this->db->query("UPDATE tbl_jabatan_badan SET jabatan_nama = '$jabatan' WHERE jabatan_id = '$id' ");
        return $h;
    }
    function hapus_badan($id) {
        $h = $this->db->query("DELETE FROM tbl_badan WHERE badan_id = '$id' ");
        return $h;
    }
    function hapus_jabatan($id) {
        $h = $this->db->query("DELETE FROM tbl_jabatan_badan WHERE jabatan_id = '$id'  ");
        return $h;
    }
    function reedit_badan($id) {
        $h = $this->db->query("DELETE FROM tbl_anggota_badan WHERE badan_anggota_id = '$id' ");
        return $h;
    }
    function masuk_badan($id,$badan,$jabatan) {
        $h = $this->db->query("INSERT INTO tbl_anggota_badan VALUES (NULL,'$id','$badan','$jabatan') ");
        return $h;
    }
}