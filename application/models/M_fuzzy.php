<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fuzzy extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	#batas bencana
	function BBdekat_bencana(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[3]['batas_bawah'];
	}

	function BBjauh_bencana(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[3]['batas_bawah'];
	}

	function BAdekat_bencana(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[3]['batas_atas'];
	}

	function BAjauh_bencana(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[3]['batas_atas'];
	}

	#batas sumber air
	function BBdekat_sumberAir(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	function BBjauh_sumberAir(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	function BAdekat_sumberAir(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	function BAjauh_sumberAir(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	#batas sumber tempat ibadah
	function BBdekat_tempatIbadah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	function BBjauh_tempatIbadah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	function BAdekat_tempatIbadah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	function BAjauh_tempatIbadah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	#batas layanan kesehatan
	function BBdekat_layasehat(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_bawah'];
	}

	function BBjauh_layasehat(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_bawah'];
	}

	function BAdekat_layasehat(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_atas'];
	}

	function BAjauh_layasehat(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_atas'];
	}

	#batas pemukiman
	function BBdekat_pemukiman(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[4]['batas_bawah'];
	}

	function BBjauh_pemukiman(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[4]['batas_bawah'];
	}

	function BAdekat_pemukiman(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[4]['batas_atas'];
	}

	function BAjauh_pemukiman(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[4]['batas_atas'];
	}

	#batas kelayakan
	function BBbaik_kelayakan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'baik');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	function BBburuk_kelayakan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'buruk');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	function BAbaik_kelayakan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'baik');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	function BAburuk_kelayakan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'buruk');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function inputMyu($data,$table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}
?>