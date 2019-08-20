<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Memesan_model');
        $this->load->helper(array('url','html'));
        $this->load->library(array('simple_login','session','datatables','template','form_validation'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/memesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/memesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/memesan/index.html';
            $config['first_url'] = base_url() . 'admin/memesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Memesan_model->total_rows($q);
        $memesan = $this->Memesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'memesan_data' => $memesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Pemesanan');
        $this->template->load('sbadmin_layout', 'contents' , 'memesan/memesan_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Memesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_memesan' => $row->id_memesan,
		'id_pemesan' => $row->id_pemesan,
        'nama' => $row->nama,
		'id_tiket' => $row->id_tiket,
		'jumlah' => $row->jumlah,
        'gambar' => $row->gambar,
        'total_bayar' => $row->total_bayar,
	    );
            $this->template->set('title', 'Detail Pemesanan');
            $this->template->load('sbadmin_layout', 'contents' , 'memesan/memesan_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/memesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/memesan/create_action'),
	    'id_memesan' => set_value('id_memesan'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'id_tiket' => set_value('id_tiket'),
	    'jumlah' => set_value('jumlah'),
	);
        $this->template->set('title', 'Input Pemesanan');
        $this->template->load('sbadmin_layout', 'contents' , 'memesan/memesan_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemesan' => $this->input->post('id_pemesan',TRUE),
		'id_tiket' => $this->input->post('id_tiket',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Memesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/memesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Memesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/memesan/update_action'),
		'id_memesan' => set_value('id_memesan', $row->id_memesan),
		'id_pemesan' => set_value('id_pemesan', $row->id_pemesan),
		'id_tiket' => set_value('id_tiket', $row->id_tiket),
		'jumlah' => set_value('jumlah', $row->jumlah),
	    );
            $this->template->set('title', 'Update Pemesanan');
            $this->template->load('sbadmin_layout', 'contents' , 'memesan/memesan_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/memesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_memesan', TRUE));
        } else {
            $data = array(
		'id_pemesan' => $this->input->post('id_pemesan',TRUE),
		'id_tiket' => $this->input->post('id_tiket',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
	    );

            $this->Memesan_model->update($this->input->post('id_memesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/memesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Memesan_model->get_by_id($id);

        if ($row) {
            $this->Memesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/memesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/memesan'));
        }
    }

    public function verifikasi($id){
        $this->Memesan_model->verifikasi($id);
        redirect(site_url('admin/memesan'));
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemesan', 'id pemesan', 'trim|required');
	$this->form_validation->set_rules('id_tiket', 'id tiket', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

	$this->form_validation->set_rules('id_memesan', 'id_memesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Memesan.php */
/* Location: ./application/controllers/Memesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:35 */
/* http://harviacode.com */