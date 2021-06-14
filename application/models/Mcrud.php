<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_data($tbl)
	{
			$this->db->from($tbl);
			$query = $this->db->get();

			return $query;
	}

	public function get_data_by_pk($tbl, $where, $id)
	{
				$this->db->from($tbl);
				$this->db->where($where,$id);
				$query = $this->db->get();

				return $query;
	}

	public function get_data_join($tbl, $tbl2, $join)
	{
			$this->db->from($tbl);
			$this->db->join($tbl2, "$tbl2.$join=$tbl.$join");
			$query = $this->db->get();

			return $query;
	}

	public function get_data_join_by_pk($tbl, $tbl2, $join, $id)
	{
			$this->db->from($tbl);
			$this->db->join($tbl2, "$tbl2.$join=$tbl.$join");
			$query = $this->db->get();

			return $query;
	}

	public function get_data_join_order_limit($tbl, $tbl2, $join, $id, $order, $limit)
	{
			$this->db->from($tbl);
			$this->db->join($tbl2, "$tbl2.$join=$tbl.$join");
			$this->db->order_by("$tbl.$id", "$order");
			$this->db->limit($limit);
			$query = $this->db->get();

			return $query;
	}

	public function get_menu_artikel()
	{
		$this->db->order_by('nama_kat_berita', 'ASC');
		return $this->db->get('tbl_kat_berita')->result();
	}

	public function save_data($tbl, $data)
	{
		$this->db->insert($tbl, $data);
		return $this->db->insert_id();
	}

	public function update_data($tbl, $where, $data)
	{
		$this->db->update($tbl, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_data_by_pk($tbl, $where, $id)
	{
		$this->db->where($where, $id);
		$this->db->delete($tbl);
	}


	function berita_popular_limit()
	{
		$query =$this->db->query("SELECT * FROM tbl_berita
															INNER JOIN tbl_kat_berita ON tbl_berita.id_kat_berita=tbl_kat_berita.id_kat_berita
															ORDER BY tbl_berita.dilihat DESC Limit 10");
		return $query;
	}

	function view_berita($num, $offset)
	{
		$query =$this->db->query("SELECT * FROM tbl_berita
															INNER JOIN tbl_kat_berita ON tbl_berita.id_kat_berita=tbl_kat_berita.id_kat_berita
															ORDER BY tbl_berita.id_berita DESC Limit $offset, $num");
		return $query;
	}

	function view_berita_cari($num, $offset, $cari)
	{
		$query =$this->db->query("SELECT * FROM tbl_berita
															INNER JOIN tbl_kat_berita ON tbl_berita.id_kat_berita=tbl_kat_berita.id_kat_berita
															WHERE tbl_berita.judul like '%$cari%' or tbl_kat_berita.nama_kat_berita like '%$cari%'
															ORDER BY tbl_berita.id_berita DESC Limit $offset, $num");
		return $query;
	}

	function view_berita_cari_kat($num, $offset, $id)
	{
		$query =$this->db->query("SELECT * FROM tbl_berita
															INNER JOIN tbl_kat_berita ON tbl_berita.id_kat_berita=tbl_kat_berita.id_kat_berita
															WHERE tbl_kat_berita.id_kat_berita = '$id'
															ORDER BY tbl_berita.id_berita Limit $offset, $num");
		return $query;
	}

	function view_kat_galeri($num, $offset)
	{
		$query =$this->db->query("SELECT * FROM tbl_kat_galeri ORDER BY id_kat_galeri DESC Limit $offset, $num");
		return $query;
	}

	function view_galeri($num, $offset, $id)
	{
		$query =$this->db->query("SELECT * FROM tbl_galeri
															INNER JOIN tbl_kat_galeri ON tbl_kat_galeri.id_kat_galeri=tbl_galeri.id_kat_galeri
															WHERE tbl_kat_galeri.id_kat_galeri='$id'
															ORDER BY tbl_galeri.id_galeri DESC Limit $offset, $num");
		return $query;
	}

}
