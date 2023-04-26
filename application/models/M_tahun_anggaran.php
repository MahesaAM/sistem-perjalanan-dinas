<?php
class M_tahun_anggaran extends CI_Model {
    
    function get_anggaran() {
        $h = $this->db->query("SELECT * FROM tbl_tahun_anggaran ");
        return $h->result_array();
    }
    function tambah_tahun_anggaran($tahun,$luar_negri,$dalam_negri,$dalam_kota) {
        $h = $this->db->query("INSERT INTO tbl_tahun_anggaran VALUES (NULL,'$tahun','$luar_negri','$dalam_negri','$dalam_kota') ");
        return $h;
    }
    function edit_tahun_anggaran($id,$tahun,$luar_negri,$dalam_negri,$dalam_kota) {
        $h = $this->db->query("UPDATE tbl_tahun_anggaran SET anggaran_tahun = '$tahun', anggaran_luar_negri = '$luar_negri', anggaran_dalam_negri = '$dalam_negri', anggaran_dalam_kota = '$dalam_kota' WHERE anggaran_id = '$id' ");
        return $h;
    }
    function hapus_tahun_anggaran($id) {
        $h = $this->db->query("DELETE FROM tbl_tahun_anggaran WHERE anggaran_id = '$id' ");
        return $h;
    }
}