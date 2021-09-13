<?php 

class Nilai extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['level'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	public function index(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['nilai'] = $this->model_user->get_nilai($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/nilai/dashboard', $data);
		$this->load->view('user/templates/footer');
		
	}

	public function edit($id_nilai){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['nilai'] = $this->model_user->get_nilaiAll($id_nilai);
		$data['pegawai'] = $this->model_user->get_pegawaiN();
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/nilai/edit_nilai', $data);
		$this->load->view('user/templates/footer');
	}


	public function update(){
		$id = $this->input->post('id_nilai');
		$nama = $this->input->post('id_pegawai');
		$c1 = $this->input->post('C1');
		$c2 = $this->input->post('C2');
		$c3 = $this->input->post('C3');
		$c4 = $this->input->post('C4');
		$c5 = $this->input->post('C5');
		$c6 = $this->input->post('C6');
		$c7 = $this->input->post('C7');
		$c8 = $this->input->post('C8');
		

		$data = array(
			'id_pegawai' => $nama,
			'C1' => $c1,
			'C2' => $c2,
			'C3' => $c3,
			'C4' => $c4,
			'C5' => $c5,
			'C6' => $c6,
			'C7' => $c7,
			'C8' => $c8,
			
		);

		$where = array(
			'id_nilai' => $id, 
		);
		$this->model_user->update_nilai($where,$data,'nilai');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Penilaian Berhasil di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('user/nilai');

	}

	public function tambah(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
		$id_subbidang =  $this->session->userdata('id_subbidang');
		$data['user'] = $this->model_user->get_user($id_subbidang);
		$data['pegawai'] = $this->model_user->get_pegawai_sub_nilai($id_subbidang);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/sidebar',$data);
		$this->load->view('user/nilai/tambah_nilai', $data);
		$this->load->view('user/templates/footer');	
	}

	public function tambah_aksi(){

		$this->form_validation->set_rules('nama', 'Nama Karyawan','required');

		if($this->form_validation->run()== FALSE){
			$this->tambah();
		}else{
			$namaa = $this->input->post('nama');
			$C1 = $this->input->post('c1');
			$C2 = $this->input->post('c2');
			$C3 = $this->input->post('c3');
			$C4 = $this->input->post('c4');
			$C5 = $this->input->post('c5');
			$C6 = $this->input->post('c6');
			$C7 = $this->input->post('c7');
			$C8 = $this->input->post('c8');
			$has_same =$this->model_user->has_same_pegawai($namaa);

			if(count($has_same)>0){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Data Nilai Pegawai Sudah Pernah ditambahkan<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('user/nilai/tambah');
			}

			
			$data = array(
				'id_pegawai' => $namaa,
				'C1' => $C1,
				'C2' => $C2,
				'C3' => $C3,
				'C4' => $C4,
				'C5' => $C5,
				'C6' => $C6,
				'C7' => $C7,
				'C8' => $C8,
			);
			
			$this->model_user->insert_nilai($data,'nilai');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Nilai Karyawan Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('user/nilai');
		}
	}


	public function hapus($id){
		$where = array('id_nilai'=>$id);
		{
			$this->model_user->hapus_nilai($where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Nilai Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		redirect('user/nilai');
	}
}

?>