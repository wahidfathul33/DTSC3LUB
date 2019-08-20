<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kereta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kereta_model');
        $this->load->library(array('simple_login','session','datatables','template','form_validation'));
        $this->simple_login->cek_login();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/kereta/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/kereta/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/kereta/index.html';
            $config['first_url'] = base_url() . 'admin/kereta/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kereta_model->total_rows($q);
        $kereta = $this->Kereta_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kereta_data' => $kereta,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->set('title', 'Daftar Kereta Api');
        $this->template->load('sbadmin_layout', 'contents' , 'kereta/kereta_list',$data);
    }

    public function read($id) 
    {
        $row = $this->Kereta_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_kereta' => $row->id_kereta,
              'nama_kereta' => $row->nama_kereta,
              'kelas' => $row->kelas,
          );
            $this->template->set('title', 'Detail Kereta Api');
            $this->template->load('sbadmin_layout', 'contents' , 'kereta/kereta_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kereta'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/kereta/create_action'),
            'id_kereta' => set_value('id_kereta'),
            'nama_kereta' => set_value('nama_kereta'),
            'kelas' => set_value('kelas'),
        );
        $this->template->set('title', 'Input Kereta Api');
        $this->template->load('sbadmin_layout', 'contents' , 'kereta/kereta_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
        $this->create();
        } 
        else {
            $data = array(
              'nama_kereta' => $this->input->post('nama_kereta',TRUE),
              'kelas' => $this->input->post('kelas',TRUE),
          );

            $this->Kereta_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('admin/kereta'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kereta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/kereta/update_action'),
                'id_kereta' => set_value('id_kereta', $row->id_kereta),
                'nama_kereta' => set_value('nama_kereta', $row->nama_kereta),
                'kelas' => set_value('kelas', $row->kelas),
            );
            $this->template->set('title', 'Edit Kereta Api');
            $this->template->load('sbadmin_layout', 'contents' , 'kereta/kereta_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kereta'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kereta', TRUE));
        } else {
            $data = array(
              'nama_kereta' => $this->input->post('nama_kereta',TRUE),
              'kelas' => $this->input->post('kelas',TRUE),
          );

            $this->Kereta_model->update($this->input->post('id_kereta', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kereta'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kereta_model->get_by_id($id);

        if ($row) {
            $this->Kereta_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kereta'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kereta'));
        }
    }

    public function _rules() 
    {
     $this->form_validation->set_rules('nama_kereta', 'nama kereta', 'trim|required');
     $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');

     $this->form_validation->set_rules('id_kereta', 'id_kereta', 'trim|required');
     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
 }

}

/* End of file Kereta.php */
/* Location: ./application/controllers/Kereta.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:34 */
/* http://harviacode.com */