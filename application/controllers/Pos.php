<?php
class Pos extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pos');
	}
	function index(){
		$this->load->view('v_pos');
	}

	function get_barang(){
		$nama_barang=$this->input->post('nama_barang');
		$data=$this->m_pos->get_data_barang_bykode($nama_barang);
		echo json_encode($data);
	}
}