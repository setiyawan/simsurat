<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function login()
    {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
        $this->load->model('m_user');
		$a_data = $this->m_user->login($username, $password);
		echo json_encode($a_data);
    }

    public function register()
    {
    	$data = $this->input->post();
        $this->load->model('m_user');
		$a_data = $this->m_user->register($data);
		echo json_encode($a_data);
    }

    public function update()
    {
    	$data = $this->input->post();
        $this->load->model('m_user');
		$a_data = $this->m_user->update($data);
		echo json_encode($a_data);
    }

    public function getall()
    {
        $this->load->model('m_user');
		$a_data = $this->m_user->getall();
		echo json_encode($a_data);
    }

    public function delete()
    {
    	$username = $this->input->post('username');
        $this->load->model('m_user');
		$a_data = $this->m_user->delete($username);
		echo json_encode($a_data);
    }

}

?>