<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesan_model');
        $this->load->library('form_validation');
        $this->load->library(array('simple_login','session','datatables','template','form_validation'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/pemesan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/pemesan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/pemesan/index.html';
            $config['first_url'] = base_url() . 'admin/pemesan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemesan_model->total_rows($q);
        $pemesan = $this->Pemesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemesan_data' => $pemesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Daftar Pemesan');
        $this->template->load('sbadmin_layout', 'contents' , 'pemesan/pemesan_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesan' => $row->id_pemesan,
		'nama' => $row->nama,
		'NIK' => $row->NIK,
	    );
            $this->template->set('title', 'Detail Pemesan');
            $this->template->load('sbadmin_layout', 'contents' , 'pemesan/pemesan_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pemesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/pemesan/create_action'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'nama' => set_value('nama'),
	    'NIK' => set_value('NIK'),
	);
        $this->template->set('title', 'Tambah Pemesan');
        $this->template->load('sbadmin_layout', 'contents' , 'pemesan/pemesan_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
	    );

            $this->Pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pemesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/pemesan/update_action'),
		'id_pemesan' => set_value('id_pemesan', $row->id_pemesan),
		'nama' => set_value('nama', $row->nama),
		'NIK' => set_value('NIK', $row->NIK),
	    );
            $this->template->set('title', 'Edit Pemesan');
            $this->template->load('sbadmin_layout', 'contents' , 'pemesan/pemesan_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesan', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
	    );

            $this->Pemesan_model->update($this->input->post('id_pemesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pemesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemesan_model->get_by_id($id);

        if ($row) {
            $this->Pemesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pemesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');

	$this->form_validation->set_rules('id_pemesan', 'id_pemesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemesan.php */
/* Location: ./application/controllers/Pemesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:36 */
/* http://harviacode.com */