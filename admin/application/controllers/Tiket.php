<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tiket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Tiket_model','Rute_model','Kereta_model'));
        $this->load->library(array('simple_login','session','datatables','template','form_validation'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/tiket/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/tiket/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/tiket/index.html';
            $config['first_url'] = base_url() . 'admin/tiket/index.html';
        }


        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tiket_model->total_rows($q);
        $tiket = $this->Tiket_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tiket_data' => $tiket,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Daftar Tiket');
        $this->template->load('sbadmin_layout', 'contents' , 'tiket/tiket_list',$data);
    }
    
    public function read($id) 
    {
        $row = $this->Tiket_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tiket' => $row->id_tiket,
		'id_rute' => $row->id_rute,
        'asal_setasiun' => $row->asal_setasiun,
        'tujuan_setasiun' => $row->tujuan_setasiun,
		'id_kereta' => $row->id_kereta,
        'nama_kereta' => $row->nama_kereta,
        'kelas' => $row->kelas,
		'jam' => $row->jam,
		'tanggal' => $row->tanggal,
		'stok' => $row->stok,
		'harga' => $row->harga,
	    );
            $this->template->set('title', 'Detail Tiket');
            $this->template->load('sbadmin_layout', 'contents' , 'tiket/tiket_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tiket'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('admin/tiket/create_action'),
	    'id_tiket' => set_value('id_tiket'),

        'dd_rute' => $this->Tiket_model->dd_rute(),
        'rute_selected' => $this->input->post('id_rute') ? $this->input->post('id_rute') : '',
        'dd_kereta' => $this->Tiket_model->dd_kereta(),
        'kereta_selected' => $this->input->post('id_kereta') ? $this->input->post('id_kereta') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
	    'jam' => set_value('jam'),
	    'tanggal' => set_value('tanggal'),
	    'stok' => set_value('stok'),
	    'harga' => set_value('harga'),
	);
        $this->template->set('title', 'Form Tiket');
        $this->template->load('sbadmin_layout', 'contents' , 'tiket/tiket_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_tiket' => $this->input->post('id_tiket',TRUE),
		'id_rute' => $this->input->post('id_rute',TRUE),
		'id_kereta' => $this->input->post('id_kereta',TRUE),
		'jam' => $this->input->post('jam',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tiket'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tiket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/tiket/update_action'),
		'id_tiket' => set_value('id_tiket', $row->id_tiket),
		//'id_rute' => set_value('id_rute', $row->id_rute),
        'dd_rute' => $this->Tiket_model->dd_rute(),
        'rute_selected' => $this->input->post('id_rute') ? $this->input->post('id_rute') : $row->id_rute,
		//'id_kereta' => set_value('id_kereta', $row->id_kereta),
        'dd_kereta' => $this->Tiket_model->dd_kereta(),
        'kereta_selected' => $this->input->post('id_kereta') ? $this->input->post('id_kereta') : $row->id_kereta,
		'jam' => set_value('jam', $row->jam),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'stok' => set_value('stok', $row->stok),
		'harga' => set_value('harga', $row->harga),
	    );
            $this->template->set('title', 'Form Update Data Tiket');
        $this->template->load('sbadmin_layout', 'contents' , 'tiket/tiket_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tiket'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tiket', TRUE));
        } else {
            $data = array(
        'id_kereta' => $this->input->post('id_kereta',TRUE),
		'id_rute' => $this->input->post('id_rute',TRUE),
		'id_kereta' => $this->input->post('id_kereta',TRUE),
		'jam' => $this->input->post('jam',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'stok' => $this->input->post('stok',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Tiket_model->update($this->input->post('id_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tiket'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tiket_model->get_by_id($id);

        if ($row) {
            $this->Tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tiket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tiket'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_rute', 'rute', 'trim|required');
	$this->form_validation->set_rules('id_kereta', 'kereta', 'trim|required');
	$this->form_validation->set_rules('jam', 'jam', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_tiket', 'id_tiket', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tiket.php */
/* Location: ./application/controllers/Tiket.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:37 */
/* http://harviacode.com */