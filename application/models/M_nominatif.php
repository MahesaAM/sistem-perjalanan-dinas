<?php
class M_nominatif extends CI_Model {

    function get_nominatif() {
        $h = $this->db->query("SELECT * FROM tbl_nominatif");
        return $h->result_array();
    }
    function get_nominatif_anggota($id) {
        $h = $this->db->query("SELECT * FROM tbl_nominatif WHERE nominatif_id_sppd = '$id' ");
        return $h->result_array();
    }
    function tambah_nominatif($id,$code,$id_anggota,$nama) {
        $h = $this->db->query("INSERT INTO tbl_nominatif VALUES (NULL,'$id','$code','$id_anggota','$nama') ");
        return $h;
    }
    function hapus_nominatif($id) {
        $h = $this->db->query("DELETE FROM tbl_nominatif WHERE nominatif_id_sppd = '$id' ");
        return $h;
    }
    function reedit_nominatif($id) {
        $h = $this->db->query("DELETE FROM tbl_nominatif WHERE nominatif_id_sppd = '$id' ");
        return $h;
    }
    function hapus_biaya($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_biaya WHERE biaya_sppd_id = '$id' ");
        return $h;
    }
}