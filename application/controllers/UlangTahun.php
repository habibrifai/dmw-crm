<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UlangTahun extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_Pelanggan');
    
    }

	public function index()
	{
		$data['pelanggan'] = $this->Model_Pelanggan->ShowPelanggan('pelanggan');
		$this->load->view('ulang_tahun', $data);
    }

    public function kirim_email()
    {
        // Konfigurasi email.
        $config = [
            //    'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
            //    'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'denimworks90@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'DenimW0rks',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
            //    'smtp_crypto' => 'SSL',
            //    'wordwrap'  => TRUE,
            //    'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('denimworks90@gmail.com', 'DenimWorks');    // Email dan nama pegirim.
        $this->email->to($this->input->post('email'));                       // Penerima email.
 
        // Lampiran email. Isi dengan url/path file.
        //$this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
 
        // Subject email.
        $this->email->subject($this->input->post('subject'));
 
        // Isi email. Bisa dengan format html.
        $this->email->message($this->input->post('emailbody'));
 
        if ($this->email->send())
        {
            $id_pelanggan = $this->input->post('id_pelanggan');
            $data = array(
              'disc_birthday' => 30000,
              'ucapan' => $this->input->post('ulangtahun')
            );
            $this->Model_Pelanggan->gantiDiscUltah($id_pelanggan, $data);
        }
        else
        {
            echo 'Error! email tidak dapat dikirim.';
        }

        redirect(base_url('UlangTahun'));
    }

    public function ucapan($id_pelanggan){
    	$data['pelanggan'] = $this->Model_Pelanggan->ShowProfilePelangganArray($id_pelanggan, 'pelanggan');
    	$this->load->view('buat_ucapan_ultah', $data);
    }
}
