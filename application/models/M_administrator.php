<?php

class M_administrator extends CI_Model {

    function get_administrator() {
        $h = $this->db->query("SELECT * FROM tbl_admin");
        return $h->result_array();
    }
    function get_total_admin() {
        $h = $this->db->query("SELECT count(admin_id) AS tot_admin FROM tbl_admin ");
        return $h->row_array();
    }
    function tambah_admin($nama,$username,$password,$level) {
        $h = $this->db->query("INSERT INTO tbl_admin VALUES (NULL,'$nama','$username','$password','$level' ) ");
        return $h;
    }
    function edit_admin($id,$nama,$username,$password,$level) {
        $h = $this->db->query("UPDATE tbl_admin SET admin_nama = '$nama', admin_username = '$username', admin_password = '$password', admin_level = '$level' WHERE admin_id = '$id' ");
        return $h;
    }
    function hapus_admin($id) {
        $h = $this->db->query("DELETE FROM tbl_admin WHERE admin_id = '$id' ");
        return $h;
    }
}