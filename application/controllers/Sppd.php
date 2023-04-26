<?php

class Sppd extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        if (empty($this->session->admin_username)) {
            redirect('Auth');
        }
        $this->load->model('M_sppd');
        $this->load->model('M_provinsi');
        $this->load->model('M_anggota');
        $this->load->model('M_pegawai');
        $this->load->model('M_kota');
        $this->load->model('M_tim');
        $this->load->model('M_rincian');
        $this->load->model('M_nominatif');
        $this->load->model('M_tahun_anggaran');
        $this->load->model('M_komisi');
        
    }

    function index() {
        $x['title'] = "Sppd";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $x['sppd'] = $this->M_sppd->get_sppd();
        $x['anggota'] = $this->M_anggota->get_anggota();
        $x['pegawai'] = $this->M_pegawai->get_pegawai();
        $x['tahun_anggaran'] = $this->M_tahun_anggaran->get_anggaran();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_sppd', $x);
        $this->load->view('template/V_footer');
    }
    function detail() {
        $x['title'] = "Detail";
        $id = $this->uri->segment(3);
        $d = $this->M_sppd->detail_sppd($id);
        $x['d'] = $d;
        $id = $d['sppd_id'];
        $x['pengikut'] = $this->M_sppd->get_pengikut($id);
        $x['peserta'] = $this->db->get_where('tbl_sppd_peserta', ['peserta_sppd_id' => $id ])->result_array();
        $x['biaya'] = $this->db->get_where('tbl_sppd_biaya', ['biaya_sppd_id' => $id ])->result_array();
        $x['laporan'] = $this->db->get_where('tbl_sppd_laporan', ['laporan_sppd_id' => $id ])->result_array();
        $x['documentasi'] = $this->db->get_where('tbl_sppd_documentasi', ['documentasi_sppd_id' => $id ])->result_array();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_detail', $x);
        $this->load->view('template/V_footer');
    }
    function download_laporan($id){
            $g = $this->db->query("SELECT * FROM tbl_sppd_laporan WHERE laporan_id = '$id' ")->row_array();
            $file = 'uploads/'.$g['laporan_file'];
            force_download($file, NULL);
    }
    function download_documentasi($id){
        $g = $this->db->query("SELECT * FROM tbl_sppd_documentasi WHERE documentasi_id = '$id' ")->row_array();
            $file = 'uploads/'.$g['documentasi_file'];
            force_download($file, NULL);
    }
    function nominatif() {
        $x['title'] = "Nominatif";
        $id = $this->uri->segment(3);
        $x['nominatif'] = $this->M_nominatif->get_nominatif_anggota($id);
        $this->load->view('template/V_header', $x);
        $this->load->view('V_nominatif', $x);
        $this->load->view('template/V_footer');
    }
    function rincian() {
        $x['title'] = "Rincian";
        $id_anggota = $this->uri->segment(3);
        $id_sppd = $this->uri->segment(4);
        $x['rincian'] = $this->M_rincian->get_rincian($id_anggota);
        $this->load->view('template/V_header', $x);
        $this->load->view('V_rincian', $x);
        $this->load->view('template/V_footer');
    }
    function v_tambah_sppd() {
        $x['title'] = "Tambah SPPD";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $x['komisi'] = $this->M_komisi->get_komisi();
        $x['pegawai'] = $this->M_pegawai->get_pegawai();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_tambah_sppd', $x);
        $this->load->view('template/V_footer');
    }
    function v_edit_sppd() {
        $x['title'] = "Edit SPPD";
        $x['user'] = $this->db->get_where('tbl_admin', ['admin_id' => $this->session->userdata('admin_id') ])->row_array();
        $id = $this->uri->segment(3);
        $sppd = $this->db->get_where('tbl_sppd', ['sppd_id' => $id ])->row_array();
        $x['sppd'] = $sppd;
        $x['peserta'] = $this->db->get_where('tbl_anggota', ['anggota_komisi' => $sppd['sppd_komisi'] ])->result_array();
        $x['pengikut'] = $this->db->get_where('tbl_sppd_pengikut', ['pengikut_sppd_id' => $id ])->result_array();
        $x['biaya'] = $this->db->get_where('tbl_sppd_biaya', ['biaya_sppd_id' => $id ])->result_array();
        $x['laporan'] = $this->db->get_where('tbl_sppd_laporan', ['laporan_sppd_id' => $id ])->result_array();
        $x['documentasi'] = $this->db->get_where('tbl_sppd_documentasi', ['documentasi_sppd_id' => $id ])->result_array();
        $x['komisi'] = $this->M_komisi->get_komisi();
        $x['pegawai'] = $this->M_pegawai->get_pegawai();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_edit_sppd', $x);
        $this->load->view('template/V_footer');
    }
    function list_peserta() {
        $x['title'] = "Peserta";
        $id = $this->uri->segment(3);
        $x['pengikut'] = $this->M_sppd->get_pengikut($id);
        $x['peserta'] = $this->db->get_where('tbl_sppd_peserta', ['peserta_sppd_id' => $id ])->result_array();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_list_peserta', $x);
        $this->load->view('template/V_footer');
    }
    function spd_peserta() {
        $x['title'] = "SPD";
        $id_anggota = $this->uri->segment(4);
        $id_sppd = $this->uri->segment(3);
        $x['p'] = $this->db->get_where('tbl_anggota', ['anggota_id' => $id_anggota ])->row_array();
        $x['s'] = $this->db->get_where('tbl_sppd', ['sppd_id' => $id_sppd ])->row_array();
        $x['t'] = $this->db->get('tbl_setup_kwitansi')->row_array();
        $this->load->view('template/V_header', $x);
        $this->load->view('V_spd_peserta', $x);
        $this->load->view('template/V_footer');
    }
    function spd_pendamping() {
        $x['title'] = "SPD";
        $id_pegawai = $this->uri->segment(4);
        $id_sppd = $this->uri->segment(3);
        $x['p'] = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $id_pegawai ])->row_array();
        $x['s'] = $this->db->get_where('tbl_sppd', ['sppd_id' => $id_sppd ])->row_array();
        $ttd = $this->db->get('tbl_setup_kwitansi')->row_array();
        $x['a'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_kanan'] ])->row_array();
        $x['b'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_bawah'] ])->row_array();
        $x['t'] = $ttd;
        $this->load->view('template/V_header', $x);
        $this->load->view('V_spd_pendamping', $x);
        $this->load->view('template/V_footer');
    }
    function pilih_anggota() {
        $komisi = $this->input->post('komisi');
        $anggota = $this->M_anggota->pilih_anggota($komisi);
        if (count($anggota)>0) {
            $daftar='';
            foreach($anggota as $a ) {
                if ($a['anggota_komisi']=="Pimpinan DPRD") {
                    $daftar .= '<tr><td>'.$a['anggota_nama'].'</td><td>'.$a['anggota_jabatan'].'</td><td><input type="checkbox" value="'.$a['anggota_id'].'" name="ikut[]"></td></tr>';
                }else{
                    $daftar .= '<tr><td>'.$a['anggota_nama'].'</td><td>'.$a['anggota_jabatan'].'</td><td><input type="checkbox" value="'.$a['anggota_id'].'" checked name="ikut[]"></td></tr>';
                }
            }
            echo json_encode($daftar);
        }
    }
    function tambah_sppd() {
        $dalam_luar = $this->input->post('dalam_luar');
        $jenis_perjalanan = $this->input->post('jenis_perjalanan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $tujuan = $this->input->post('tujuan');
        $lama_perjalanan = $this->input->post('lama_perjalanan');
        $tanggal_berangkat = $this->input->post('tanggal_berangkat');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $no_surat_tugas = $this->input->post('no_surat_tugas');
        $upload_surat_tugas = $this->input->post('upload_surat_tugas');
        $no_sppd = $this->input->post('no_sppd');
        $peserta = $this->input->post('peserta');
        $username_input = $this->input->post('username_input');
        $datetime_input = $this->input->post('datetime_input');
        $akun = $this->input->post('akun');
        $val_tot = $this->input->post('val_tot');
        $tanggal = date('Y-m-d');
        $pengikut = count($this->input->post('pengikut'));
        $ikut = count($this->input->post('ikut'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png';
        $config['max_size']             = 0;
        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('upload_surat_tugas')) {
                $this->upload->data();
        }
                
        
        $this->M_sppd->tambah_sppd($tanggal,$dalam_luar,$jenis_perjalanan,$nama_kegiatan,$tujuan,$lama_perjalanan,$tanggal_berangkat,$tanggal_kembali,$no_surat_tugas,$_FILES['upload_surat_tugas']['name'],$no_sppd,$peserta,$val_tot,$akun,$username_input,$datetime_input);
        $id = $this->db->insert_id();

        for ($p=0; $p < $ikut; $p++) { 
            if (isset($_POST['ikut'][$p])) {
                $ikut = $_POST['ikut'][$p];
                $a = $this->db->get_where('tbl_anggota', ['anggota_id' => $ikut ])->row_array();
                $nama = $a['anggota_nama'];
                $this->db->query("INSERT INTO tbl_sppd_peserta VALUES (NULL,'$ikut','$nama','$id') ");
                // $this->M_nominatif->tambah_nominatif($id,$no_sppd,$ikut,$nama);
            }
        }

        for ($pgi=0; $pgi < $pengikut; $pgi++) { 
                $pengi = $_POST['pengikut'][$pgi];
                if (!empty($pengi)) {
                    $this->db->query("INSERT INTO tbl_sppd_pengikut VALUES (NULL,'$pengi','$id') ");
                    $p = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $pengi ])->row_array();
                    // $this->M_nominatif->tambah_nominatif($id,$no_sppd,$pengi,$p['pegawai_nama']);
                }
        }

        redirect('Sppd');
    }
    function edit_sppd() {
        $id = $this->input->post('id');
        $dalam_luar = $this->input->post('dalam_luar');
        $jenis_perjalanan = $this->input->post('jenis_perjalanan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $tujuan = $this->input->post('tujuan');
        $lama_perjalanan = $this->input->post('lama_perjalanan');
        $tanggal_berangkat = $this->input->post('tanggal_berangkat');
        $tanggal_kembali = $this->input->post('tanggal_kembali');
        $no_surat_tugas = $this->input->post('no_surat_tugas');
        $no_sppd = $this->input->post('no_sppd');
        $peserta = $this->input->post('peserta');
        $username_update = $this->input->post('username_update');
        $datetime_update = $this->input->post('datetime_update');
        $val_tot = $this->input->post('val_tot');
        $akun = $this->input->post('akun');
        $pengikut = count($this->input->post('pengikut'));
        $ikut = count($this->input->post('ikut'));

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|jpg|jpeg|png';
        $config['max_size']             = 0;
        $this->load->library('upload', $config);

        if (!empty($_FILES['upload_surat_tugas']['name'])) {
            if ( $this->upload->do_upload('upload_surat_tugas')) {
                $this->upload->data();
            }
            $file_no_surat = $_FILES['upload_surat_tugas']['name'];
        }else{
            $file_no_surat = $this->input->post('file_no_surat');
        }

        $this->M_sppd->edit_sppd($id,$dalam_luar,$jenis_perjalanan,$nama_kegiatan,$tujuan,$lama_perjalanan,$tanggal_berangkat,$tanggal_kembali,$no_surat_tugas,$file_no_surat,$no_sppd,$peserta,$val_tot,$akun,$username_update,$datetime_update);
        // $this->M_nominatif->hapus_nominatif($id);
        $this->M_tim->hapus_peserta_sppd($id);
        for ($p=0; $p < $ikut; $p++) { 
            if (isset($_POST['ikut'][$p])) {
                $ikut = $_POST['ikut'][$p];
                $a = $this->db->get_where('tbl_anggota', ['anggota_id' => $ikut ])->row_array();
                $nama = $a['anggota_nama'];
                $this->db->query("INSERT INTO tbl_sppd_peserta VALUES (NULL,'$ikut','$nama','$id') ");
                $this->M_nominatif->tambah_nominatif($id,$no_sppd,$ikut,$nama);
            }
        }
        $this->M_tim->hapus_tim_sppd($id);
        for ($pgi=0; $pgi < $pengikut; $pgi++) { 
            $pengi = $_POST['pengikut'][$pgi];
            if (!empty($pengi)) {
                $this->db->query("INSERT INTO tbl_sppd_pengikut VALUES (NULL,'$pengi','$id') ");
                $p = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $pengi ])->row_array();
                $this->M_nominatif->tambah_nominatif($id,$no_sppd,$pengi,$p['pegawai_nama']);
            }
    }

        redirect('Sppd/v_edit_sppd/'.$id);

    }
    function get_kota() {
        $provinsi = $this->input->post('provinsi');
        $kota = $this->M_kota->get_kota_sppd($provinsi);
        if (count($kota)>0) {
            $select_box = '';
            $select_box .= '<option value="">Pilih Kota</option>';
            foreach ($kota as $k) {
                $select_box .= '<option value="'.$k['kota_nama'].'">'.$k['kota_nama'].'</option>';
            }
            echo json_encode($select_box);
        }
    }
    function hapus_sppd() {
        $id = $this->input->post('id');
        $this->M_sppd->hapus_sppd($id);
        $this->M_tim->hapus_tim_sppd($id);
        $this->M_tim->hapus_peserta_sppd($id);
        $this->M_sppd->hapus_laporan($id);
        $this->M_sppd->hapus_documentasi($id);
        // $this->M_nominatif->hapus_nominatif($id);
        $this->M_nominatif->hapus_biaya($id);
        // $this->M_rincian->hapus_rincian($id);
        redirect('Sppd');
    }
    function print_sppd() {
        $x['sppd'] = $this->M_sppd->get_sppd();
        $this->load->view('prints/print_sppd', $x);
    }
    function print_detail_sppd() {
        $x['title'] = "Detail";
        $id = $this->uri->segment(3);
        $d = $this->M_sppd->detail_sppd($id);
        $x['d'] = $d;
        $id = $d['sppd_id'];
        $x['pengikut'] = $this->M_sppd->get_pengikut($id);
        $x['peserta'] = $this->db->get_where('tbl_sppd_peserta', ['peserta_sppd_id' => $id ])->result_array();
        $x['biaya'] = $this->db->get_where('tbl_sppd_biaya', ['biaya_sppd_id' => $id ])->result_array();
        $this->load->view('prints/print_detail_sppd', $x);
    }
    function print_spd_peserta() {
        $id_anggota = $this->uri->segment(4);
        $id_sppd = $this->uri->segment(3);
        $x['p'] = $this->db->get_where('tbl_anggota', ['anggota_id' => $id_anggota ])->row_array();
        $x['s'] = $this->db->get_where('tbl_sppd', ['sppd_id' => $id_sppd ])->row_array();
        $ttd = $this->db->get('tbl_setup_kwitansi')->row_array();
        $x['a'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_kanan'] ])->row_array();
        $x['b'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_bawah'] ])->row_array();
        $x['t'] = $ttd;
        $this->load->view('prints/print_spd_peserta', $x);
    }
    function print_spd_pendamping() {
        $id_pegawai = $this->uri->segment(4);
        $id_sppd = $this->uri->segment(3);
        $x['p'] = $this->db->get_where('tbl_pegawai', ['pegawai_id' => $id_pegawai ])->row_array();
        $x['s'] = $this->db->get_where('tbl_sppd', ['sppd_id' => $id_sppd ])->row_array();
        $ttd = $this->db->get('tbl_setup_kwitansi')->row_array();
        $x['a'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_kanan'] ])->row_array();
        $x['b'] = $this->db->get_where('tbl_pegawai', ['pegawai_nip' => $ttd['pegawai_bawah'] ])->row_array();
        $x['t'] = $ttd;
        $this->load->view('prints/print_spd_pendamping', $x);
    }
    function tambah_rincian() {
        $r = count($this->input->post('perincian_biaya'));
        $id_anggota = $_POST['id_anggota'];
        $id_sppd = $_POST['id_sppd'];
        $this->M_rincian->reedit_rincian($id_anggota,$id_sppd);
        for ($i=0; $i < $r; $i++) { 
            $perincian_biaya = $_POST['perincian_biaya'][$i];
            $jumlah_satuan = $_POST['jumlah_satuan'][$i];
            $nilai_satuan = $_POST['nilai_satuan'][$i];
            $jumlah = $_POST['nilai_satuan'][$i]*$_POST['jumlah_satuan'][$i];
            $keterangan = $_POST['keterangan'][$i];
            if(!empty($r)) {
                $this->M_rincian->tambah_rincian($id_anggota,$id_sppd,$perincian_biaya,$jumlah_satuan,$nilai_satuan,$jumlah,$keterangan);
            }
        }
        redirect('Sppd/rincian/'.$id_anggota.'/'.$id_sppd);
    }
    function detail_nominatif() {
        $x['title'] = "Detail";
        $id_anggota = $this->uri->segment(3);
        $id_sppd = $this->uri->segment(4);
        $x['rincian'] = $this->M_rincian->get_rincian($id_anggota);
        $x['jumlah'] = $this->M_rincian->get_jumlah($id_anggota);
        $this->load->view('template/V_header', $x);
        $this->load->view('V_detail_nominatif', $x);
        $this->load->view('template/V_footer');
    }
}