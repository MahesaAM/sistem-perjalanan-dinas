<?php

class M_komisi extends CI_Model {

    function get_komisi() {
        $h = $this->db->query("SELECT * FROM tbl_komisi");
        return $h->result_array();
    }
    function get_jabatan() {
        $h = $this->db->query("SELECT * FROM tbl_jabatan_komisi");
        return $h->result_array();
    }
    function tambah_komisi($komisi) {
        $h = $this->db->query("INSERT INTO tbl_komisi VALUES (NULL,'$komisi') ");
        return $h;
    }
    function tambah_jabatan($jabatan) {
        $h = $this->db->query("INSERT INTO tbl_jabatan_komisi VALUES (NULL,'$jabatan') ");
        return $h;
    }
    function edit_komisi($id,$komisi) {
        $h = $this->db->query("UPDATE tbl_komisi SET komisi_nama = '$komisi' WHERE komisi_id = '$id' ");
        return $h;
    }
    function edit_jabatan($id,$jabatan) {
        $h = $this->db->query("UPDATE tbl_jabatan_komisi SET jabatan_nama = '$jabatan' WHERE jabatan_id = '$id' ");
        return $h;
    }
    function hapus_komisi($id) {
        $h = $this->db->query("DELETE FROM tbl_komisi WHERE komisi_id = '$id' ");
        return $h;
    }
    function hapus_jabatan($id) {
        $h = $this->db->query("DELETE FROM tbl_jabatan_komisi WHERE jabatan_id = '$id' ");
        return $h;
    }
}