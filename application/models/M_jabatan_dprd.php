<?php
class M_jabatan_dprd extends CI_Model {

    function get_jabatan() {
        $h = $this->db->query("SELECT * FROM tbl_jabatan_dprd ");
        return $h->result_array();
    }
    function tambah_jabatan($jabatan) {
        $h = $this->db->query("INSERT INTO tbl_jabatan_dprd VALUES (NULL,'$jabatan') ");
        return $h;
    }
    function edit_jabatan($id,$jabatan) {
        $h = $this->db->query("UPDATE tbl_jabatan_dprd SET jabatan_nama = '$jabatan' WHERE jabatan_id = '$id' ");
        return $h;
    }
    function hapus_jabatan($id) {
        $h = $this->db->query("DELETE FROM tbl_jabatan_dprd WHERE jabatan_id = '$id' ");
        return $h;
    }
}