<?php
class M_golongan_pegawai extends CI_Model {

    function get_golongan() {
        $h = $this->db->query("SELECT * FROM tbl_golongan_pegawai");
        return $h->result_array();
    }
    function tambah_golongan($title) {
        $h = $this->db->query("INSERT INTO tbl_golongan_pegawai VALUES (NULL,'$title') ");
        return $h;
    }
    function edit_golongan($id,$title) {
        $h = $this->db->query("UPDATE tbl_golongan_pegawai SET golongan_title = '$title' WHERE golongan_id = '$id' ");
        return $h;
    }
    function hapus_golongan($id) {
        $h = $this->db->query("DELETE FROM tbl_golongan_pegawai WHERE golongan_id = '$id' ");
        return $h;
    }
}