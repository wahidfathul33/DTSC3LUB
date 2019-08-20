<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->library(array(
			'form_validation',
			'template'
		));

	}

	public function index()
	{
		$data = array(
			'dd_rute' => $this->Transaksi_model->dd_rute(),
			'rute_selected' => $this->input->post('id_rute') ? $this->input->post('id_rute') : '',
			'tanggal' => set_value('tanggal'),
		);

		

		$this->template->set('title', 'Home');
		$this->template->load('front', 'contents', 'transaksi/transaksi_form', $data);
	}

	public function submit()
	{
		if ($this->input->post())
		{
			$id_rute = $this->input->post('id_rute');
			$tanggal = $this->input->post('tanggal');

			$q = $this->Transaksi_model->search($id_rute,$tanggal);

			$data['results'] = $q;
			$data['header'] = 'Daftar Tiket Kereta';

			if ($q) {
				$this->template->set('title', 'Daftar transaksi');
				$this->template->load('front_2', 'contents', 'transaksi/transaksi_list', $data);
			} else {
				$this->template->set('title', 'Daftar transaksi');
				$this->template->load('front_2', 'contents', 'transaksi/transaksi_error', $data);
			}
		}
		else
		{
			redirect(base_url('transaksi'));
		}
	}

	public function save_temp($id_tiket)
	{

		if ( isset($_SESSION['id_tiket']) ) {
			$prev_tiket = $this->session->id_tiket;
			array_push($prev_tiket, $id_tiket);
			$session_tiket['id_tiket'] = $prev_tiket;

			$this->session->set_userdata( $session_tiket );
		} else {
			$session_tiket['id_tiket'][0] = $id_tiket;
			$this->session->set_userdata( $session_tiket );
		}

		$this->detail($id_tiket);
	}

	public function unset()
	{
		unset($_SESSION['id_tiket']);
		redirect(base_url('transaksi'));
	}

	public function detail()
	{
        $id_tiket = $this->session->id_tiket;
        for ($i=0; $i < count($id_tiket); $i++) { 
			$row = $this->Transaksi_model->get_by_id($id_tiket[$i]);
			$data['id_tiket'][$i] = $id_tiket[$i];
			$data['id_rute'][$i] = $row->id_rute;
	        $data['asal_setasiun'][$i] = $row->asal_setasiun;
	        $data['tujuan_setasiun'][$i] = $row->tujuan_setasiun;
			$data['id_kereta'][$i] = $row->id_kereta;
	        $data['nama_kereta'][$i] = $row->nama_kereta;
	        $data['kelas'][$i] = $row->kelas;
			$data['jam'][$i] = $row->jam;
			$data['tanggal'][$i] = $row->tanggal;
			$data['harga'][$i] = $row->harga;
			//$data['jumlah'][$i] = $this->input->post('jumlah');
	        $data['header']= 'Transaksi Anda';  
       	}
       		$this->template->set('title', 'Detail transaksi');
            $this->template->load('front_2', 'contents' , 'transaksi/transaksi_detail', $data);
	        
	}
	
	public function addtransaksi() 
    {

	           $data[ 'button'] = 'Lanjut';
	           $data[ 'header']= 'Isi Data Diri Anda';
	        $data['id_pemesan'] = set_value('id_pemesan');
	        $data['status'] = set_value('status');
	        $data['nama'] = set_value('nama');
	        $data['nik'] = set_value('nik');
	        $total_bayar = $this->input->post('total_bayar');
	        $jumlah = $this->input->post('jumlah');
	         $data['total_bayar'] = set_value('total_bayar');
	         //$data['jumlah'] = set_value('jumlah');
            $this->template->set('title', 'Detail transaksi');
            $this->template->load('front_2', 'contents' , 'transaksi/transaksi_add', $data);
    }

	public function actiontransaksi()
	{
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$total_bayar = $this->input->post('total_bayar');
		//$jumlah[] = $this->input->post('jumlah');
		$id_tiket = $this->session->id_tiket;
		

		$data = array(
			'nama' => $nama,
			'nik' => $nik,
			'total_bayar' => $total_bayar
		);

		$this->Transaksi_model->inserttransaksi($data,$id_tiket);
		$this->pembayaran();
	}

	public function pembayaran()
    {
        $data = array(
            'header' => 'Pembayaran',
            'action' => site_url('transaksi/action_pembayaran')
        );
        $this->template->set('title', 'Detail transaksi');
        $this->template->load('front_2', 'contents' , 'transaksi/transaksi_pembayaran',$data);
    }

    public function action_pembayaran()
    {
        // validasi judul
        $this->form_validation->set_rules('gambar', 'gambar', 'trim');
 
        if ($this->form_validation->run() == FALSE) {
            // jika validasi judul gagal
            $this->pembayaran();
        } else {

            $id_data=$this->Transaksi_model->ambildatapemesan();

           foreach ($id_data as $row)
            {
                $idpemesan=$row->id_pemesan;
            }  
                            $namaFile = $idpemesan."-".$_FILES['gambar']['name'];

                            $config['upload_path'] = './uploads';
                            $config['allowed_types'] = 'jpg|png|jpeg';
                            $config['max_size']     = '1024';
                            $this->load->library('upload', $config);

                            $config['file_name'] = $namaFile;
                            $this->upload->initialize($config);

                            if($this->upload->do_upload('gambar')){
                                $data['gambar'] = $this->upload->data('file_name');
                            }
                            else{
                                $data['gambar'] = 'gagal';
                            }

            $this->Transaksi_model->upload_bayar($idpemesan, $data);
            $this->success();
            
        }
    }

    public function success()
    {
    	$data[ 'header']= 'Success';

            $this->template->set('title', 'Detail transaksi');
            $this->template->load('front_2', 'contents' , 'transaksi/transaksi_success',$data);
    }



}

/* End of file transaksi.php */