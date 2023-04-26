<?php 

class M_provinsi extends CI_Model {

    function get_provinsi() {
        $h = $this->db->query("SELECT * FROM tbl_provinsi");
        return $h->result_array();
    }
    function tambah_provinsi($provinsi) {
        $h = $this->db->query("INSERT INTO tbl_provinsi VALUES (NULL,'$provinsi')");
        return $h;
    }
    function edit_provinsi($id,$nama) {
        $h = $this->db->query("UPDATE tbl_provinsi SET provinsi_nama='$nama' WHERE provinsi_id='$id' ");
        return $h;
    }
    function hapus_provinsi($id) {
        $h = $this->db->query("DELETE FROM tbl_provinsi WHERE provinsi_id='$id' ");
        return $h;
    }
}