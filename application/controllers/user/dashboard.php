<?php 

class Dashboard extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['level'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}

    public function index(){
    $data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('user/templates/header');
    $this->load->view('user/templates/sidebar',$data);
    $this->load->view('user/dashboard', $data);
    $this->load->view('user/templates/footer');   
    }

        



}

?>