<?php
class M_rincian extends CI_Model {

    function get_rincian($id) {
        $h = $this->db->query("SELECT * FROM tbl_rincian WHERE rincian_id_anggota = '$id' ");
        return $h->result_array();
    }
    function get_jumlah($id_anggota) {
        $h = $this->db->query("SELECT sum(rincian_jumlah) AS jumlah FROM tbl_rincian WHERE rincian_id_anggota = '$id_anggota' ");
        return $h->row_array();
    }
    function tambah_rincian($id_anggota,$id_sppd,$perincian_biaya,$jumlah_satuan,$nilai_satuan,$jumlah,$keterangan) {
        $h = $this->db->query("INSERT INTO tbl_rincian VALUES (NULL,'$id_anggota','$id_sppd','$perincian_biaya','$jumlah_satuan','$nilai_satuan','$jumlah','$keterangan') ");
        return $h;
    }
    function reedit_rincian($id_anggota,$id_sppd) {
        $h = $this->db->query("DELETE FROM tbl_rincian WHERE rincian_id_anggota = '$id_anggota' AND rincian_id_sppd = '$id_sppd' ");
        return $h;
    }
    function hapus_rincian($id) {
        $h = $this->db->query("DELETE FROM tbl_rincian WHERE rincian_id_sppd = '$id' ");
        return $h;
    }
}