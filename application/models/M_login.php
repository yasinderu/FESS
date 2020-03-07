<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ceklogin($user, $password)
	{
		
		$hasil=$this->db->where('username', $user)
						->where('password',$password)
						->limit(1)
						->get('users')
						->row();

		if(count($hasil)) {
			$session=['login'=>true, 'id'=>$hasil->id, 'email'=>$hasil->email, 'username'=>$hasil->username];

			$this->session->set_userdata($session);
			return true;
		} else {
			return false;
		}

		// $this->db->where('username', $user);	
		// $this->db->where('password', $pass);
		// return $this->db->get('petugas')->row();
	}


}
?>