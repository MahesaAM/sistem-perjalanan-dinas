<?php

class M_kota extends CI_Model {

    function get_kota() {
        $h = $this->db->query("SELECT * FROM tbl_kota");
        return $h->result_array();
    }
    function get_kota_jadwal($provinsi) {
        $h = $this->db->query("SELECT * FROM tbl_kota WHERE kota_provinsi='$provinsi' ");
        return $h->result_array();
    }
    function tambah_kota($kota,$provinsi) {
        $h = $this->db->query("INSERT INTO tbl_kota VALUES (NULL,'$kota','$provinsi') ");
        return $h;
    }
    function edit_kota($id,$kota,$provinsi) {
        $h = $this->db->query("UPDATE tbl_kota SET kota_nama = '$kota', kota_provinsi = '$provinsi' WHERE kota_id = '$id' ");
        return $h;
    }
    function hapus_kota($id) {
        $h = $this->db->query("DELETE FROM tbl_kota WHERE kota_id = '$id' ");
        return $h;
    }
}