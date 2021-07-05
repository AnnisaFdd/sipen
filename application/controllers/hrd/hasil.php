<?php 

class Hasil extends CI_Controller{

	function __construct(){
		parent::__construct();
		if (!isset($this->session->userdata['levels'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('auth');
		}
	}
	public function index(){
		$data['usernya'] = $this->db->get_where('user',['username' => $this->session->userdata('usernames')])->row_array();
		$data['kriteria'] = $this->model_user->kriteria();
		$data['nilai'] = $this->model_user->get_nilaiK();
		$bobot= $data['nilai'];
		foreach($bobot as $row) {
			foreach($row as $a){
				$bobot = $a;
				break;
			}
		}
		// foreach ($bobot as $a){
			// $nilai[] = array($a->C1, $a->C2, $a->C3, $a->C4, $a->C5,$a->C6, $a->C7, $a->C8);
			// $nilai[] = array_slice((array)$a, 2, -2);
			// foreach ($nilai as $n)
			// foreach($nilai as $n){
			// 	$b= $nilai[0][0];
			// 	break;
			// 	if ($n>= 0 && $n <=50) {
			// 		$n =1;
			// 	}elseif ($n>= 51 && $n <=60){
			// 		$n = 2;
			// 	}elseif ($n>= 61 && $n <=75){
			// 		$n = 3;
			// 	}elseif ($n>= 76 && $n <=90){
			// 		$n = 4;
			// 	}else{
			// 		$n= 5;
			// 	}
			// }
			// break;
		// }
		$data['bobot'] = $bobot;
		$this->load->view('hrd/templates_hrd/header');
		$this->load->view('hrd/templates_hrd/sidebar',$data);
		$this->load->view('hrd/hasil/dashboard', $data);
		$this->load->view('hrd/templates_hrd/footer');



		
	}


}
?>