<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{	
		  
        $this->load->model("M_edit");
		$id = $this->M_edit->id_terakhir();
		$hasilID = $id->id_input;

		$user_id = $hasilID;  
        $data["user_data"] = $this->M_edit->fetch_single_dataH($user_id);  
        $data["fetch_data"] = $this->M_edit->fetch_dataH();
        //$this->load->library('form_validation');   
        $this->load->view("user_biasa", $data); 
		$this->load->model('M_login');
	}

	public function login()
	{
		if (isset($_POST['submit'])) {
			$user = $this->input->post('username', true);
			$pass = $this->input->post('password', true);
			$cek = $this->M_login->ceklogin($user, $password);
			
			if ($cek) {
				// $cek_login = $this->db->get_where('petugas', array('username' => $user, 'password' => $pass))->row();
				redirect(base_url('Pakar'));
				$session['login']=true;
			} else {
				//redirect(base_url('C_login'));
				echo "gagal";
			}
		}
	}

	public function admin() {
		$this->load->view('pakar');
	}

    function logout(){  	
    $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
    $this->session->sess_destroy();
    redirect('http://localhost/SistemPakar-master','refresh');
    }
}
