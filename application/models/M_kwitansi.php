<?php
class M_kwitansi extends CI_Model {
    
    function get_kwitansi() {
        $h = $this->db->query("SELECT * FROM tbl_kwitansi ORDER BY kwitansi_id DESC ");
        return $h->result_array();
    }
    function get_data_rincian($id_anggota,$id_sppd) {
        $h = $this->db->query("SELECT sum(rincian_jumlah) AS jumlah FROM tbl_rincian WHERE rincian_id_anggota = '$id_anggota' AND rincian_id_sppd = '$id_sppd' ");
        return $h->row_array();
    }
    function get_data_sppd($id_sppd) {
        $h = $this->db->query("SELECT * FROM tbl_sppd WHERE sppd_id = '$id_sppd' ");
        return $h->row_array();
    }
    function buat_kwitansi($id_sppd,$kode_sppd,$tanggal,$id_anggota,$nama,$jumlah) {
        $h = $this->db->query("INSERT INTO tbl_kwitansi VALUES (NULL,'$id_sppd','$kode_sppd','$tanggal',$id_anggota,'$nama','$jumlah') ");
        return $h;
    }
    function get_data_anggota($id_anggota) {
        $h = $this->db->query("SELECT * FROM tbl_nominatif WHERE nominatif_id_anggota = '$id_anggota' ");
        return $h->row_array();
    }
    function get_setup() {
        $h = $this->db->query("SELECT * FROM tbl_setup_kwitansi ");
        return $h->row_array();
    }
    function get_kwitansi_anggota($nip) {
        $h = $this->db->query("SELECT * FROM tbl_pegawai WHERE pegawai_nip = '$nip' ");
        return $h->row_array();
    }
    function edit_setup($header_kanan,$pegawai_kanan,$kota,$header_bawah,$pegawai_bawah) {
        $h = $this->db->query("UPDATE tbl_setup_kwitansi SET text_header_kanan = '$header_kanan', pegawai_kanan = '$pegawai_kanan', kota = '$kota', text_header_bawah = '$header_bawah', pegawai_bawah = '$pegawai_bawah' ");
        return $h;
    }
    function hapus_kwitansi($id) {
        $h = $this->db->query("DELETE FROM tbl_kwitansi WHERE kwitansi_id = '$id' ");
        return $h;
    }
}