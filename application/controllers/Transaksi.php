<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('Model_Transaksi');
        $this->load->model('Model_Pelanggan');
    }

	public function index()
	{
		$data['data_transaksi'] = $this->Model_Transaksi->getDataTransaksi('order');
		$this->load->view('transaksi', $data);
	}

	public function tambah_data()
	{
		$data['nama'] = $this->Model_Pelanggan->getNamaPelanggan();
		$this->load->view('transaksi_tambah_data', $data);
	}

	public function ubah_status_kerjakan($id_order)
	{
		$data = array('status' => 'dalam pengerjaan');
		$this->Model_Transaksi->ganti_status($id_order,$data);
		redirect(base_url('Transaksi'));
	}

	public function ubah_status_selesai($id_order)
	{
		$data = array('status' => 'selesai');
		$this->Model_Transaksi->ganti_status($id_order,$data);
		redirect(base_url('Transaksi'));
	}

	public function save_tambah_data(){
		$id_pelanggan = $this->input->post('id_pelanggan');
		$cost_old = $this->input->post('harga');
		$cost = $this->input->post('harga');
		$diskonUltah = ($this->Model_Pelanggan->getDiskonUltah($id_pelanggan))->disc_birthday;
		$prioritas = ($this->Model_Pelanggan->getPrioritas($id_pelanggan))->prioritas;
		$transaction_count = ($this->Model_Pelanggan->getJumlahTransaksi($id_pelanggan))->disc_counter;
		$transaction = ($this->Model_Pelanggan->getTransaksi($id_pelanggan))->transaction_count;
		$prioritas_new = $prioritas;

		if ($transaction_count == 2) {
			if ($prioritas == "Tinggi") {
				$cost = $cost - 60000;
			} else if ($prioritas == "Sedang") {
				$cost = $cost - 30000;
			}

			$transaction_count = 0;
		} else {
			$transaction_count++;
		}

		if ($cost_old >= 500000) {
			$prioritas_new = "Tinggi";
		} else if ($cost_old >= 250000) {
			$prioritas_new = "Sedang";
		}

		$cost = $cost - $diskonUltah;
		$transaction++;

		$dataPelanggan = array(
			'prioritas' => $prioritas_new,
			'disc_counter' => $transaction_count,
			'disc_birthday' => 0,
			'transaction_count' => $transaction
    	);

    	$this->Model_Pelanggan->SaveProfileData($dataPelanggan, $id_pelanggan, 'pelanggan');

		$data = array(
			'idorder' => $this->input->post('id_order'),
			'product_name' => $this->input->post('nama_produk'),
			'quantity' => $this->input->post('jumlah'),
			'order_date' => date('Y-m-d'),
			'pickup_date' => $this->input->post('tgl_ambil'),
			'cost' => $cost,
			'status' => 'dalam antrian',
			'idpelanggan' => $this->input->post('id_pelanggan')
		);

		$this->Model_Transaksi->addDataTransaksi($data);

		$id_pelanggan = $this->input->post('id_pelanggan');
		$data['nama_pelanggan'] = $this->Model_Pelanggan->getNama($id_pelanggan);

		$data['diskon'] = $cost_old - $cost;
		// redirect(base_url('Transaksi'));
		$this->load->view('laporan_tambah_data', $data);
	}

}
