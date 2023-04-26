<?php

class M_sppd extends CI_Model {

    function get_sppd() {
        $h = $this->db->query("SELECT * FROM tbl_sppd");
        return $h->result_array();
    }
    function get_total_sppd() {
        $h = $this->db->query("SELECT count(sppd_id) AS tot_sppd FROM tbl_sppd ");
        return $h->row_array();
    }
    function get_pengikut($id) {
        $h = $this->db->query("SELECT * FROM tbl_sppd_pengikut WHERE pengikut_sppd_id = '$id' ");
        return $h->result_array();
    }
    function detail_sppd($id) {
        $h = $this->db->query("SELECT * FROM tbl_sppd WHERE sppd_id = '$id' ");
        return $h->row_array();
    }
    function tambah_sppd($tanggal,$dalam_luar,$jenis_perjalanan,$nama_kegiatan,$tujuan,$lama_perjalanan,$tanggal_berangkat,$tanggal_kembali,$no_surat_tugas,$upload_surat_tugas,$no_sppd,$peserta,$val_tot,$akun,$username_input,$datetime_input) {
        $h = $this->db->query("INSERT INTO tbl_sppd VALUES (NULL,'$tanggal','$dalam_luar','$jenis_perjalanan','$nama_kegiatan','$tujuan','$lama_perjalanan','$tanggal_berangkat','$tanggal_kembali','$no_surat_tugas','$upload_surat_tugas','$no_sppd','$peserta','$val_tot','$akun','$username_input','$datetime_input',NULL,NULL ) ");
        return $h;
    }
    function edit_sppd($id,$dalam_luar,$jenis_perjalanan,$nama_kegiatan,$tujuan,$lama_perjalanan,$tanggal_berangkat,$tanggal_kembali,$no_surat_tugas,$file_no_surat,$no_sppd,$peserta,$val_tot,$akun,$username_update,$datetime_update) {
        $h = $this->db->query("UPDATE tbl_sppd SET sppd_perjalanan = '$dalam_luar', sppd_jenis_perjalanan = '$jenis_perjalanan', sppd_nama_kegiatan = '$nama_kegiatan', sppd_tujuan = '$tujuan', sppd_lama_perjalanan = '$lama_perjalanan', sppd_tgl_berangkat = '$tanggal_berangkat', sppd_tgl_kembali = '$tanggal_kembali', sppd_no_surat = '$no_surat_tugas', upload_no_surat = '$file_no_surat', sppd_no_sppd = '$no_sppd', sppd_komisi = '$peserta', sppd_biaya = '$val_tot', sppd_akun = '$akun', sppd_username_update = '$username_update', sppd_datetime_update = '$datetime_update' WHERE sppd_id = '$id' ");
        return $h;
    }
    function hapus_sppd($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd WHERE sppd_id='$id' ");
        return $h;
    }
    function hapus_laporan($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_laporan WHERE laporan_sppd_id = '$id' ");
        return $h;
    }
    function hapus_documentasi($id) {
        $h = $this->db->query("DELETE FROM tbl_sppd_documentasi WHERE documentasi_sppd_id = '$id' ");
        return $h;
    }
}