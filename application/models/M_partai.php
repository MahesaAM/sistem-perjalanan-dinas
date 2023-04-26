<?php
class M_partai extends CI_Model {
    function get_partai() {
        $h = $this->db->query("SELECT * FROM tbl_partai");
        return $h->result_array();
    }
    function tambah_partai($partai) {
        $h = $this->db->query("INSERT INTO tbl_partai VALUES (NULL,'$partai') ");
        return $h;
    }
    function edit_partai($id,$partai) {
        $h = $this->db->query("UPDATE tbl_partai SET partai_nama = '$partai' WHERE partai_id = '$id' ");
        return $h;
    }
    function hapus_partai($id) {
        $h = $this->db->query("DELETE FROM tbl_partai WHERE partai_id = '$id' ");
        return $h;
    }
}