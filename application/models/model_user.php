<?php

class Model_user extends CI_Model{


	public function get_subbidang(){
		$query = $this->db->query('SELECT * FROM subbidang');
   		return $query->result();
	}
	
	public function update_pegawai($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Tambah Pegawai
	public function insert_pegawai($data){
		$this->db->insert('pegawai',$data);
	}

	//Hapus Karyawan
	public function hapus_pegawai($where){
		$this->db->where($where);
		$this->db->delete('pegawai');
	}

	//kriteria
	public function kriteria(){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->order_by("bobot", "desc");
		$query=$this->db->get();
		return $query->result();
	}

	//Edit Kriteria
	public function get_kriteria($where){
		$this->db->select('*');
		$this->db->from('kriteria');
		$this->db->where(array('id_kriteria' => $where));
		$query=$this->db->get();
		return $query->result();
	}
	
	public function update_kriteria($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//Tambah Kriteria
	public function insert_kriteria($data){
		$this->db->insert('kriteria',$data);
	}

	//Hapus Kriteria
	public function hapus_kriteria($where){
		$this->db->where($where);
		$this->db->delete('kriteria');
	}	

	
	//USER
	public function get_user($subbidangs){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('subbidang','user.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('user.id_subbidang' => $subbidangs));
		return $this->db->get()->row_array();
	}

	//Pegawai
	//Tampilan Pegawai
	public function get_pegawaiall($subbidangs){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('subbidang','subbidang.id_subbidang = pegawai.id_subbidang');
		$this->db->where(array('pegawai.id_subbidang' => $subbidangs));
		$this->db->order_by("pegawai.nama_pegawai", "asc");
		$query=$this->db->get();
		return $query->result();
	}

	//Tampil Pegawai HRD
	public function get_hrdP(){
		$this->db->select('*');
		$this->db->from('pegawai');
		$query=$this->db->get();
		return $query->result();
	}

	//Edit Pegawai
	public function get_pegawai_sub($where){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('subbidang','pegawai.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('id_pegawai' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function is_ada_nilai($id){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('nilai','pegawai.id_pegawai = nilai.id_pegawai');
		$this->db->where(array('nilai.id_pegawai' => $id));
		$query=$this->db->get();
   		return $query->result();
	}

	public function get_subbidang_pegawai($where){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('subbidang','user.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('user.id_subbidang' => $where));
		$query=$this->db->get();
   		return $query->result();
	}


	//Nilai
	public  function get_nilai($subbidang){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('pegawai','pegawai.id_pegawai = nilai.id_pegawai');
		$this->db->join('subbidang','pegawai.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('pegawai.id_subbidang' => $subbidang));
		$this->db->order_by("pegawai.nama_pegawai", "asc");
		$query=$this->db->get();
		return $query->result();

	}

	public function get_nilaiAll($where){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('pegawai','pegawai.id_pegawai = nilai.id_pegawai');
		$this->db->where(array('nilai.id_nilai' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function update_nilai($where, $data,$table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function get_pegawaiN(){
		$query = $this->db->query('SELECT * FROM pegawai');
   		return $query->result();
	}

	public function hapus_nilai($where){
		$this->db->where($where);
		$this->db->delete('nilai');
	}	

	public function get_pegawai_sub_nilai($where){
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->join('subbidang','pegawai.id_subbidang = subbidang.id_subbidang');
		$this->db->where(array('subbidang.id_subbidang' => $where));
		$query=$this->db->get();
		return $query->result();
	}

	public function insert_nilai($data){
		$this->db->insert('nilai',$data);
	}

	public function has_same_pegawai($id){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->where(array('id_pegawai' => $id));
  		$query=$this->db->get();
   		return $query->result();
	}


	//HRD Nilai
	public function get_nilaiK(){
		$this->db->select('*');		
		$this->db->from('nilai');
		$this->db->join('pegawai','pegawai.id_pegawai = nilai.id_pegawai');
		$this->db->join('subbidang','pegawai.id_subbidang = subbidang.id_subbidang');
		$this->db->order_by("subbidang.id_subbidang", "asc");
		$query=$this->db->get();
		return $query->result();
	}

	public function get_keterangan(){
		$this->db->select('keterangan');		
		$this->db->from('kriteria');
		return $this->db->get()->result_array();
	}

	public function get_bobot(){
		$this->db->select('bobot');		
		$this->db->from('kriteria');
		return $this->db->get()->result_array();
	}

	public function has_same_nilai($karyawan){
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('karyawan','karyawan.id_karyawan = nilai.id_karyawan');
		$this->db->where(array('nilai.id_karyawan' => $karyawan));
  		$query=$this->db->get();
   		return $query->result();

	}
	
	public function get_nilai_bobot(){
		$this->db->select_sum('bobot');
		$result = $this->db->get('kriteria')->row();  
		return $result->bobot;
   }




}
?>