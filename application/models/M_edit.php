<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_edit extends CI_Model {

	private $table  = 'variables';
	#private $table2 = 'hasil';
	#private $table3 = 'risiko';
	private $table4 = 'parameter';
  private $table5 = 'input';

	public function editParameter($where, $table){
		return $this->db->get_where($table4, $where);;
	}
	public function show(){
		return $this->db->join($this->table,'variables.variable_id=parameter.variable_id')
						->get($this->table4)
						->result_array();
	}

  public function showH(){
    return $this->db->get($this->table5)
            ->result_array();
  }

  public function inputM($data)
  {
    $this->db->insert('input', $data);
  }

	function fetch_data()  
      {  
           $this->db->select("*");  
           $this->db->from("parameter");  
           $query = $this->db->get();  
           return $query;  
      }

      function fetch_dataH()  
      {  
           $this->db->select("*");  
           $this->db->from("input");  
           $query = $this->db->get();  
           return $query;  
      }

      function fetch_single_data($id)  
      {  
           $this->db->where("id_parameter", $id);  
           $query = $this->db->get("parameter");  
           return $query;  
      }  

      function id_terakhir(){
      	$this->db->select('id_input');
        $this->db->order_by('id_input',"desc");
        $this->db->limit(1);
        $hasil = $this->db->get('input')->row();

        return $hasil;
      }

      function fetch_single_dataH()  
      {  
        $id = $this->id_terakhir();
        $hasilID = $id->id_input;

      	$id = $hasilID;
        $this->db->where("id_input", $id);  
        $query = $this->db->get("input");  
        return $query;  
      }  

    public function showLogMak()
	{
		return $this->db->get($this->table4)
						->result_array();
	}

    public function viewDatabase(){
		return $this->db->get('parameter')->result();
	}

  public function viewH(){
    return $this->db->get('input')->result();
  }

  public function showHistory()
  {
    return $this->db->get($this->table5)
            ->result_array();
  }
      

    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	
}
?>