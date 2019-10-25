<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuth extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        
        $this->load->helper('form');
                
        $this->load->library('session');
        
        $this->load->model('LoginDatabase');

        $this->load->model('Model_Pelanggan');

        $this->load->model('Model_Transaksi');
    }


	public function index()
	{
		$this->load->view('login');
    }
    
    // Check for user login process
    public function user_login_process() {
        // if(isset($this->session->userdata['logged_in'])){
        //     $this->load->view('admin_page');
        // }else{
        //     $this->load->view('login_form');
        // }
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
        $result = $this->LoginDatabase->login($data);
        if ($result == TRUE) {
            $this->updatePrioritas();
            $this->updateStatusPesanan();
            $username = $this->input->post('username');
            $session_data = array(
                'username' => $data['username']
                );
            // Add user data in session
            $this->session->set_userdata('logged_in', $session_data);
            redirect(base_url('Dashboard'));
        } else {
            $data = array(
                'error_message' => 'Invalid Username or Password'
            );
            $this->load->view('login', $data);
        }
    }

    public function updatePrioritas() {
        $datas = $this->Model_Pelanggan->ShowPelanggan('pelanggan');

        foreach ($datas as $data) {
            $id_pelanggan = $data['idpelanggan'];
            $lastPurchase = ($this->Model_Pelanggan->getLastTransaksi($id_pelanggan))->order_date;
            $now = new DateTime("now");
		    $lastPurchaseDate = new DateTime($lastPurchase);

            $difference = $now->diff($lastPurchaseDate)->days;
            
            if ($difference > 365) {
                $data = array(
                    'prioritas' => "Rendah"
                );
        
                $this->Model_Pelanggan->SaveProfileData($data, $id_pelanggan, 'pelanggan');
            }
        }
    }

    public function updateStatusPesanan() {
        $datas = $this->Model_Transaksi->getDataTransaksi('order');

        foreach ($datas as $data) {
            $id_transaksi = $data['idorder'];
            $status = $data['status'];
            $pickup = $data['pickup_date'];
            $id_pelanggan = $data['idpelanggan'];

            $now = new DateTime("now");
		    $pickupDate = new DateTime($pickup);

            $difference = $now->diff($pickupDate)->days;
            
            if ($difference <= 0 && $status == 'dalam pengerjaan') {
                $data = array(
                    'status' => "Selesai"
                );
        
                $this->Model_Transaksi->ganti_status($id_transaksi, $data);

                $this->kirim_email($id_pelanggan);
            }
        }
    }

    public function kirim_email($id_pelanggan)
    {
        // Konfigurasi email.
        $config = [
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'denimworks90@gmail.com',   
               'smtp_pass' => 'DenimW0rks',             
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];

        $pelanggan = $this->Model_Pelanggan->ShowProfilePelanggan($id_pelanggan, 'pelanggan');
        $email = $pelanggan['email'];
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('denimworks90@gmail.com', 'DenimWorks');    // Email dan nama pegirim.
        $this->email->to(email);                       // Penerima email.
 
        // Subject email.
        $this->email->subject('Update status pesanan');
        
        $message = "Pesanan sudah selesai dikerjakan, silahkan diambil.";

        // Isi email. Bisa dengan format html.
        $this->email->message($message);
        
        $this->email->send();
    }
}
