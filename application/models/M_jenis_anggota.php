<?php

class M_jenis_anggota extends CI_Model {

    function get_jenis_anggota() {
        $h = $this->db->query("SELECT * FROM tbl_golongan");
        return $h->result_array();
    }
    function tambah_jenis($title,$deskripsi) {
        $h = $this->db->query("INSERT INTO tbl_golongan VALUES (NULL,'$title','$deskripsi')");
        return $h;
    }
    function edit_jenis($id,$title,$deskripsi) {
        $h = $this->db->query("UPDATE tbl_golongan SET golongan_title='$title', golongan_deskripsi = '$deskripsi' WHERE golongan_id='$id' ");
        return $h;
    }
    function hapus_jenis($id) {
        $h = $this->db->query("DELETE FROM tbl_golongan WHERE golongan_id='$id' ");
        return $h;
    }
}