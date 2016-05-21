<?php

class M_user extends CI_Model
{
	public function login($username, $password)
 	{
		$this->db->select('*');
		$query = $this->db->get_where('ta.ms_akun', array(
		'username' => $username, 
		'password' => md5($password)
		));
		if ($query->num_rows() > 0){	            
	            foreach ($query->result() as $row) {
	                if($row->status == 1){
	                	$result['code'] = "212";
		            	$result['message'] = "Selamat, anda berhasil login";
		                $result['data'] = $row;

						$this->db->where('username', $username);
	                }
	                else if($row->status == 0){
	                	$result['code'] = "404";
		            	$result['message'] = "Akun anda diblokir, silahkan hubungi admin untuk pengaktifan akun kembali";
		                $result['data'] = $row;
	                }
	                else{
	                	$result['code'] = "212";
		            	$result['message'] = "Akun anda belum diaktifkan, hubungi admin untuk aktivasi akun";
		                $result['data'] = $row;
	                }
	            }
            
	        }
	        else{
	        	$result['code'] = "515";
	        	$result['message'] = "Username atau password tidak ditemukan";
	        	$result['data'] = null;	
	        }
	        return $result;
 	}

 	public function register($data)
 	{
 		$data['password'] = md5($data['password']);
 		$result = $this->db->get_where('ta.ms_akun', array('username' => $data['username']));
		if ($result->num_rows() > 0){
			$data = array(
				'code' => "515",
				'message' => "Username telah terpakai, silahkan mendaftar dengan username lain",
				'data' => null
				);
		}
		else{
			$this->db->insert('ta.ms_akun', $data); 
			$data = array(
				'code' => "212",
				'message' => "Selamat, registrasi berhasil. Silakan tunggu konfirmasi dari admin. Terima kasih",
				'data' => $data
				);			
		}
		return $data;
 	}

 	public function getall(){
 		$query = $this->db->get('ta.ms_akun');

		if ($query->num_rows() > 0){
			$result['code'] = "212";
        	        $result['message'] = "Daftar User";
                        $row = $query->result_array();
                        $result['data'] = $row;
                                   
                }
                else{
        	        $result['code'] = "515";
        	        $result['message'] = "User tidak ditemukan";
        	        $result['data'] = null;	
                }
                return $result;
 	}	

    public function delete($username)
	{
		$result = $this->db->get_where('ta.ms_akun', array('username' => $username));
		if($result->num_rows() > 0)
		{
			$this->db->delete('ta.ms_akun', array('username' => $username));
			$data = array(
				'code' => "212",
				'message' => "Data Berhasil Dihapus",
				'data' => null
				);
		}
		else
		{
			$data = array(
				'code' => "515",
				'message' => "Data Gagal Dihapus / Username tidak Ditemukan",
				'data' => null
				);
		}
		return $data;
	}

    public function update($data)
    {
    	$password = explode('|', $data['password']);
    	if($data['password'])
    	{
	    	if($password[0] == $password[1])
	    	{
	    		$data['password'] = $password[0];
	    		$data['password'] = md5($data['password']);
	    		$this->db->where('username', $data['username']);
				$this->db->update('ta.ms_akun', $data);
	    		$data = array(
					'code' => "212",
					'message' => "Password Berhasil Diperbarui",
					'data' => $data
					); 
	    	}
	    	else
	    	{
	    		$data = array(
					'code' => "515",
					'message' => "Password tidak sama",
					'data' => null
					); 
	    	}
 		}
 		else
 		{
 			$this->db->where('username', $data['username']);
			$result = $this->db->update('ta.ms_akun', $data);
			if($result) 
			{
	    		$data = array(
					'code' => "212",
					'message' => "Akun Berhasil Diperbarui",
					'data' => $data
					); 
	    	}
	    	else
	    	{
	    		$data = array(
					'code' => "515",
					'message' => "Akun Gagal Diperbarui",
					'data' => null
					); 
	    	}
		}

		return $data;
	}
}

/* End of file akun.php */