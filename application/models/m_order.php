<?php
class M_order extends CI_Model{

	function get_myefood($kopel){
		$hsl=$this->db->query("SELECT * FROM tbl_invoice WHERE inv_plg_id='$kopel' ORDER BY DATE(inv_tanggal) DESC");
		return $hsl;
	}

	function get_tatal_pelanggan(){
		$hsl=$this->db->query("SELECT COUNT(plg_id) AS tot_pelanggan FROM tbl_pelanggan");
		return $hsl;
	}

	function get_total_porsi_terjual_bulan_ini(){
		$hsl=$this->db->query("SELECT SUM(detail_porsi) AS total_porsi FROM tbl_invoice JOIN tbl_detail ON inv_no=detail_inv_no WHERE MONTH(inv_tanggal)=MONTH(CURDATE())");
		return $hsl;
	}

	function get_total_penjualan_bulan_lalu(){
		$hsl=$this->db->query("SELECT SUM(inv_total) AS total_penjualan FROM tbl_invoice WHERE MONTH(inv_tanggal)=MONTH(CURDATE())-1");
		return $hsl;
	}

	function get_total_penjualan_sekarang(){
		$hsl=$this->db->query("SELECT SUM(inv_total) AS total_penjualan FROM tbl_invoice WHERE MONTH(inv_tanggal)=MONTH(CURDATE())");
		return $hsl;
	}


	function get_grafik_penjualan(){
		$query=$this->db->query("SELECT DATE_FORMAT(inv_tanggal,'%d') AS tanggal,SUM(inv_total) AS total FROM tbl_invoice WHERE DATE_FORMAT(inv_tanggal,'%M %Y')=DATE_FORMAT(CURDATE(),'%M %Y') GROUP BY DAY(inv_tanggal)");

		if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
	}

	function get_all_rekening(){
		$hsl=$this->db->query("select * from tbl_rekening");
		return $hsl;
	}

	function get_all_order(){
		$hsl=$this->db->query("SELECT inv_no,DATE_FORMAT(inv_tanggal,'%d %M %Y') AS inv_tanggal,inv_plg_id,inv_plg_nama,inv_status,inv_total,inv_rek_id,inv_rek_bank FROM tbl_invoice ORDER BY DATE(inv_tanggal) DESC");
		return $hsl;
	}

	function update_order($kode,$status){
		$hsl=$this->db->query("UPDATE tbl_invoice SET inv_status='$status' WHERE inv_no='$kode'");
		return $hsl;
	}

	function get_invoice(){
		$q = $this->db->query("SELECT MAX(RIGHT(inv_no,6)) AS kd_max FROM tbl_invoice where date(inv_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "INV".date('dmy').$kd;
	}
	function order_produk($no_invoice,$total){
		$kopel=$this->session->userdata('kopel');
		$napel=$this->session->userdata('nama_pel');
		$this->db->query("INSERT INTO tbl_invoice (inv_no,inv_plg_id,inv_plg_nama,inv_status,inv_total) VALUES ('$no_invoice','$kopel','$napel','Menunggu Konfirmasi','$total')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'detail_menu_id'	 =>	$item['id'],
				'detail_menu_nama'   =>	$item['name'],
				'detail_harjul'		 =>	$item['price'],
				'detail_porsi'  	 =>	$item['qty'],
				'detail_subtotal'    =>	$item['subtotal'],
				'detail_inv_no' 	 =>	$no_invoice
			);
			$this->db->insert('tbl_detail',$data);
		}
		return true;
	}

	function set_pembayaran_cod($no_invoice){
		$hsl=$this->db->query("UPDATE tbl_invoice SET inv_rek_id='COD' WHERE inv_no='$no_invoice'");
		return $hsl;
	}

	function get_checkout($no_invoice){
		$hsl=$this->db->query("SELECT inv_no,DATE_FORMAT(inv_tanggal,'%d/%m/%Y') AS tanggal,inv_plg_nama,inv_status,inv_total,inv_rek_id,inv_rek_no,inv_rek_bank,inv_rek_nama,inv_rek_cabang,detail_menu_id,detail_menu_nama,detail_harjul,detail_porsi,detail_subtotal FROM tbl_invoice JOIN tbl_detail ON inv_no=detail_inv_no WHERE inv_no='$no_invoice'");
		return $hsl;
	}
	function get_rekening($pem_id){
		$hsl=$this->db->query("select * from tbl_rekening where rek_id='$pem_id'");
		return $hsl;
	}
	function set_pembayaran_transfer($no_invoice,$rek_id,$rek_no,$rek_bank,$rek_nama,$rek_cabang){
		$hsl=$this->db->query("UPDATE tbl_invoice SET inv_rek_id='$rek_id',inv_rek_no='$rek_no',inv_rek_bank='$rek_bank',inv_rek_nama='$rek_nama',inv_rek_cabang='$rek_cabang' WHERE inv_no='$no_invoice'");
		return $hsl;
	}

	function hapus_order($kode){
		$this->db->trans_start();
            $this->db->query("delete from tbl_detail where detail_inv_no='$kode'");
            $this->db->query("delete from tbl_invoice where inv_no='$kode'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}


}