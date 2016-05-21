<?php

class M_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

	public function add($data)
 	{
 		$result = $this->db->get_where(table, $data);
		if ($result->num_rows() > 0){
			$data = array(
				'code' => "515",
				'message' => header . " Sudah Ditambahkan Sebelumnya",
				'data' => null
				);
		}
		else{
			$this->db->insert(table, $data); 
			$data = array(
				'code' => "212",
				'message' => header . " Berhasil ditambahkan",
				'data' => $data
				);			
		}
		return $data;
 	}

 	function update($data)
 	{
 		$this->db->where(key, $data[key]);
		$result = $this->db->update(table, $data);
		if($result) 
		{
    		$data = array(
				'code' => "212",
				'message' => header . " Berhasil Diperbarui",
				'data' => $data
				); 
    	}
    	else
    	{
    		$data = array(
				'code' => "515",
				'message' => header . " Gagal Diperbarui",
				'data' => null
				); 
    	}
    	return $data;
 	}

 	public function getall(){
 		$result = $this->db->get(table);
 		if($result->num_rows() > 0) 
		{
    		$data = array(
				'code' => "212",
				'message' => "Daftar " . header,
				'data' => $result->result_array()
				); 
    	}
    	else
    	{
    		$data = array(
				'code' => "515",
				'message' => header . " Tidak Ditemukan",
				'data' => null
				); 
    	}
    	return $data;
 	}

 	public function delete($id)
	{
		$result = $this->db->get_where(table, array(key => $id));
		if($result->num_rows() > 0)
		{
			$this->db->delete(table, array(key => $id));
			$data = array(
				'code' => "212",
				'message' => header . " Berhasil Dihapus",
				'data' => null
				);
		}
		else
		{
			$data = array(
				'code' => "515",
				'message' => header . " Gagal Dihapus",
				'data' => null
				);
		}
		return $data;
	}

}

?>