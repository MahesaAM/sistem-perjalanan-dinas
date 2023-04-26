<?php
class M_jabatan_pegawai extends CI_Model {

    function get_jabatan() {
        $h = $this->db->query("SELECT * FROM tbl_jabatan_pegawai");
        return $h->result_array();
    }
    function tambah_jabatan($jabatan) {
        $h = $this->db->query("INSERT INTO tbl_jabatan_pegawai VALUES (NULL,'$jabatan') ");
        return $h;
    }
    function edit_jabatan($id,$jabatan) {
        $h = $this->db->query("UPDATE tbl_jabatan_pegawai SET jabatan_nama = '$jabatan' WHERE jabatan_id = '$id' ");
        return $h;
    }
    function hapus_jabatan($id) {
        $h = $this->db->query("DELETE from tbl_jabatan_pegawai WHERE jabatan_id = '$id' ");
        return $h;
    }
}