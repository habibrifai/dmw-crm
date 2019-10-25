<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_Pelanggan');
    
    }

	public function index()
	{
		$data['pelanggan'] = $this->Model_Pelanggan->ShowPelanggan('pelanggan');
		$this->load->view('pelanggan', $data);
    }

    public function tinggi()
    {
        $data['pelanggan'] = $this->Model_Pelanggan->showPelangganPrioritas('pelanggan', 'Tinggi');
        $this->load->view('pelanggan', $data);
    }

    public function sedang()
    {
        $data['pelanggan'] = $this->Model_Pelanggan->showPelangganPrioritas('pelanggan', 'Sedang');
        $this->load->view('pelanggan', $data);
    }

    public function rendah()
    {
        $data['pelanggan'] = $this->Model_Pelanggan->showPelangganPrioritas('pelanggan', 'Rendah');
        $this->load->view('pelanggan', $data);
    }

    public function profile($id_pelanggan){
    	$data['profile_pelanggan'] = $this->Model_Pelanggan->ShowProfilePelanggan($id_pelanggan, 'pelanggan');
    	$this->load->view('pelanggan_profile', $data);
    }

    public function save_profile($id_pelanggan){

    	$data = array(
    		'name' => $this->input->post('nama'),
    		'birthday' => $this->input->post('tgl_lahir'),
    		'email' => $this->input->post('email')
    	);

    	$this->Model_Pelanggan->SaveProfileData($data, $id_pelanggan, 'pelanggan');
    	redirect(base_url('Pelanggan'));
    }

    public function tambah_pelanggan(){
        $this->load->view('tambah_pelanggan');
    }

    public function add_data_pelanggan(){
        $data = array(
            'name' => $this->input->post('nama'),
            'birthday' => $this->input->post('tgl_lahir'),
            'email' => $this->input->post('email'),
            'prioritas' => 'Rendah',
            'transaction_count' => '0',
            'disc_counter' => '0'
        );

        $this->Model_Pelanggan->addData($data);
        redirect(base_url('Pelanggan'));
    }
}
