<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{

    public $table = 'tiket';
    public $id = 'id_tiket';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('rute', 'tiket.id_rute = rute.id_rute','inner');
        $this->db->join('kereta', 'tiket.id_kereta = kereta.id_kereta','inner');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('rute', 'tiket.id_rute = rute.id_rute','inner');
        $this->db->join('kereta', 'tiket.id_kereta = kereta.id_kereta','inner');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_array($array)
    {
        $this->db->select('*');
        $this->db->join('rute', 'tiket.id_rute = rute.id_rute','inner');
        $this->db->join('kereta', 'tiket.id_kereta = kereta.id_kereta','inner');
        $this->db->where_in($this->id, $array);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tiket', $q);
	$this->db->or_like('id_rute', $q);
	$this->db->or_like('id_kereta', $q);
	$this->db->or_like('jam', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('harga', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*');
        $this->db->join('rute', 'tiket.id_rute = rute.id_rute','inner');
        $this->db->join('kereta', 'tiket.id_kereta = kereta.id_kereta','inner');

        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tiket', $q);
	$this->db->or_like('rute.id_rute', $q);
    $this->db->or_like('rute.asal_setasiun', $q);
    $this->db->or_like('rute.tujuan_setasiun', $q);
	$this->db->or_like('kereta.id_kereta', $q);
    $this->db->or_like('kereta.kelas', $q);
    $this->db->or_like('nama_kereta', $q);
	$this->db->or_like('jam', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('stok', $q);
	$this->db->or_like('harga', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function search($rute,$tanggal)
    {
        $this->db->select('*');
        $this->db->join('rute', 'tiket.id_rute = rute.id_rute','inner');
        $this->db->join('kereta', 'tiket.id_kereta = kereta.id_kereta','inner');
        $this->db->order_by($this->id, $this->order);
        $this->db->like('rute.id_rute',$rute);
        $this->db->where('tanggal', $tanggal);
        
        return $this->db->get($this->table)->result();
    }

    function inserttransaksi($data,$id_tiket)
    {
        $this->db->insert('pemesan', $data);
        $id_pemesan = $this->db->insert_id();

        for ($i=0; $i < count($id_tiket); $i++) { 
            $data2 = array(
                'id_pemesan' => $id_pemesan,
                'id_tiket' => $id_tiket[$i],
                'jumlah' => $this->input->post('jumlah'),
                'status' => $this->input->post('status'),
                
            );
            $this->db->insert('memesan', $data2);

            $this->db->select('stok');
            $this->db->where('id_tiket', $id_tiket[$i]);
            $row = $this->db->get('tiket')->row();

            $stok['stok'] = $row->stok - $this->input->post('jumlah');
                $this->db->where('id_tiket', $id_tiket[$i]);
                $this->db->update('tiket', $stok);
        }
    }

    // insert data

    function ambildatapemesan(){
         $this->db->order_by('id_pemesan', $this->order);
         $this->db->limit('1','0');
        return $this->db->get('pemesan')->result();
    }

    function upload_bayar($idpemesan, $data)
    {
        $this->db->where('id_pemesan', $idpemesan);
        $this->db->update('pemesan', $data);
    }

    function dd_rute()
    {
        // ambil data dari db
        $this->db->order_by('id_rute', 'asc');
        $result = $this->db->get('rute');
        
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->id_rute] = $row->asal_setasiun.' - '.$row->tujuan_setasiun;
            }
        }
        return $dd;
    }
}

/* End of file Tiket_model.php */
/* Location: ./application/models/Tiket_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-06-23 04:51:37 */
/* http://harviacode.com */