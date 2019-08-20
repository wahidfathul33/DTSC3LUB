<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($username, $password) {
		$query = $this->CI->db->get_where('users',array('username'=>$username,'password' => $password));
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM users where username = "'.$username.'"');
			$admin 	= $row->row();
			$id 	= $admin->username;
			$nama	= $admin->nama;
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('id', $id);
			redirect('admin/home/');
		}else{
			$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
			redirect('admin/login/');
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login');
			redirect('admin/login/');
		}
	}
	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect('admin/login/');
	}
}