<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('Model_Dashboard');
    }

	public function index()
	{
		$data['prioritas_tinggi'] = $this->Model_Dashboard->CountPriority('pelanggan','Tinggi');
		$data['prioritas_sedang'] = $this->Model_Dashboard->CountPriority('pelanggan','Sedang');
		$data['prioritas_rendah'] = $this->Model_Dashboard->CountPriority('pelanggan','Rendah');
		$this->load->view('dashboard', $data);
	}

}
