<?php 

class Karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['levels'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	public function index(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['karyawan'] = $this->model_user->karyawan();
		$this->load->view('user/templates_hrd/header');
		$this->load->view('user/templates_hrd/sidebar',$data);
		$this->load->view('user/karyawan/dashboard', $data);
		$this->load->view('user/templates_hrd/footer');
		
	}

	public function edit($id_karyawan){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['karyawan'] = $this->model_user->get_karyawan($id_karyawan);
		$data['subbidang'] = $this->model_user->get_subbidang();
		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/karyawan/edit_karyawan', $data);
		$this->load->view('hrd/templates_hrd/footer');
		
	}


	public function update(){
		$id = $this->input->post('id_karyawan');
		$nama = $this->input->post('nama_karyawan');
		$subbidang = $this->input->post('subbidang');

		$data = array(
			'nama_karyawan' => $nama,
			'id_subbidang' => $subbidang,
		);

		$where = array(
			'id_karyawan' => $id, 
		);
		$this->model_user->update_karyawan($where,$data,'karyawan');
		$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('hrd/karyawan');

	}

	public function tambah(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['subbidang'] = $this->model_user->get_subbidang();
		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/karyawan/tambah_karyawan', $data);
		$this->load->view('hrd/templates_hrd/footer');
		
	}

	public function tambah_aksi(){

		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan','required');

		if($this->form_validation->run()== FALSE){
			$this->tambah();
		}else{
			$nama = $this->input->post('nama_karyawan');
			$subbidangg = $this->input->post('subbidang');

			$data = array(
				'nama_karyawan' => $nama,
				'id_subbidang' => $subbidangg,
			);
			
			$this->model_user->insert_karyawan($data,'karyawan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil ditambahkan<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('hrd/karyawan');
		}
	}


	public function hapus($id){
		$where = array('id_karyawan'=>$id);
		{
			$this->model_user->hapus_karyawan($where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert dismissible fade show" role="alert">Data Karyawan Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		redirect('hrd/karyawan');
	}
}

?>