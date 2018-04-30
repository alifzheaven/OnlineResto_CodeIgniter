<?php
class M_status extends CI_Model{

	function get_all_status(){
		$hsl=$this->db->query("select * from tbl_status");
		return $hsl;
	}
	function simpan_status($status){
		$hsl=$this->db->query("insert into tbl_status (status_nama) values ('$status')");
		return $hsl;
	}
	function update_status($kode,$status){
		$hsl=$this->db->query("update tbl_status set status_nama='$status' where status_id='$kode'");
		return $hsl;
	}
	function hapus_status($kode){
		$hsl=$this->db->query("delete from tbl_status where status_id='$kode'");
		return $hsl;
	}
	function get_kategori_by_id($kategori){
		$hsl=$this->db->query("select * from tbl_kategori where kategori_id='$kategori'");
		return $hsl;
	}

}