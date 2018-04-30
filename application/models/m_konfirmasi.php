<?php
class M_konfirmasi extends CI_Model{

	function get_all_konfirmasi(){
		$hsl=$this->db->query("SELECT konfirmasi_id,konfirmasi_invoice,konfirmasi_nama,konfirmasi_bank,inv_total,konfirmasi_jumlah,konfirmasi_bukti,DATE_FORMAT(konfirmasi_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_konfirmasi JOIN tbl_invoice ON konfirmasi_invoice=inv_no WHERE konfirmasi_status='0' ORDER BY konfirmasi_id DESC");
		return $hsl;
	}

	function simpan_konfirmasi($no_invoice,$nama,$bank,$jumlah,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_konfirmasi(konfirmasi_invoice,konfirmasi_nama,konfirmasi_bank,konfirmasi_jumlah,konfirmasi_bukti) VALUES ('$no_invoice','$nama','$bank','$jumlah','$gambar')");
		return $hsl;
	}
	function get_invoice($no_invoice){
		$hsl=$this->db->query("SELECT * FROM tbl_invoice WHERE inv_no='$no_invoice'");
		return $hsl;
	}
	function update_konfirmasi($kode,$no_invoice){
		$this->db->trans_start();
            $this->db->query("UPDATE tbl_invoice SET inv_status='Pembayaran Selesai' WHERE inv_no='$no_invoice'");
            $this->db->query("UPDATE tbl_konfirmasi SET konfirmasi_status='1' WHERE konfirmasi_id='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	function hapus_konfirmasi($kode,$no_invoice){
		$this->db->trans_start();
            $this->db->query("UPDATE tbl_invoice SET inv_status='Konfirmasi Tidak Valid' WHERE inv_no='$no_invoice'");
            $this->db->query("DELETE FROM tbl_konfirmasi WHERE konfirmasi_id='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	
}