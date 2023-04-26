<?php 

class M_tim extends CI_Model {

    function tambah_tim($id,$tim) {
        $h = $this->db->query("INSERT INTO tbl_sppd_pengikut VALUES (NULL,'$tim','$id') ");
        return $h;
    }
    function reedit_tim($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_pengikut WHERE pengikut_sppd_id = '$id' ");
        return $h;
    }
    function hapus_tim_sppd($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_pengikut WHERE pengikut_sppd_id = '$id' ");
        return $h;
    }
    function hapus_peserta_sppd($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_peserta WHERE peserta_sppd_id = '$id' ");
        return $h;
    }
}