<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rute extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rute_model');
        $this->load->library(array('simple_login','session','datatables','template','form_validation'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/rute/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/rute/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/rute/index.html';
            $config['first_url'] = base_url() . 'admin/rute/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rute_model->total_rows($q);
        $rute = $this->Rute_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rute_data' => $rute,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Rute');
        $this->template->load('sbadmin_layout', 'contents' , 'rute/rute_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Rute_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_rute' => $row->id_rute,
		'asal_setasiun' => $row->asal_setasiun,
		'tujuan_setasiun' => $row->tujuan_setasiun,
	    );
            $this->template->set('title', 'Detail Rute');
            $this->template->load('sbadmin_layout', 'contents' , 'rute/rute_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rute'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/rute/create_action'),
	    'id_rute' => set_value('id_rute'),
	    'asal_setasiun' => set_value('asal_setasiun'),
	    'tujuan_setasiun' => set_value('tujuan_setasiun'),
	);
        $this->template->set('title', 'Rute');
        $this->template->load('sbadmin_layout', 'contents' , 'rute/rute_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_rute' => $this->input->post('id_rute',TRUE),
		'asal_setasiun' => $this->input->post('asal_setasiun',TRUE),
		'tujuan_setasiun' => $this->input->post('tujuan_setasiun',TRUE),
	    );

            $this->Rute_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/rute'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Rute_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/rute/update_action'),
		'id_rute' => set_value('id_rute', $row->id_rute),
		'asal_setasiun' => set_value('asal_setasiun', $row->asal_setasiun),
		'tujuan_setasiun' => set_value('tujuan_setasiun', $row->tujuan_setasiun),
	    );
            $this->template->set('title', 'Rute');
            $this->template->load('sbadmin_layout', 'contents' , 'rute/rute_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rute'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_rute', TRUE));
        } else {
            $data = array(
		'asal_setasiun' => $this->input->post('asal_setasiun',TRUE),
		'tujuan_setasiun' => $this->input->post('tujuan_setasiun',TRUE),
	    );

            $this->Rute_model->update($this->input->post('id_rute', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/rute'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rute_model->get_by_id($id);

        if ($row) {
            $this->Rute_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/rute'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/rute'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('asal_setasiun', 'asal setasiun', 'trim|required');
	$this->form_validation->set_rules('tujuan_setasiun', 'tujuan setasiun', 'trim|required');

	$this->form_validation->set_rules('id_rute', 'id_rute', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Rute.php */
/* Location: ./application/controllers/Rute.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:36 */
/* http://harviacode.com */