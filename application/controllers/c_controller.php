<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

	public function add()
    {
        $data = $this->input->post();
        $this->load->model(model);
        $a_data = $this->{model}->add($data);
        echo json_encode($a_data);
    }

    public function update()
    {
        $data = $this->input->post();
        $this->load->model(model);
        $a_data = $this->{model}->update($data);
        echo json_encode($a_data);
    }

    public function getall()
    {
        $this->load->model(model);
        $a_data = $this->{model}->getall();
        echo json_encode($a_data);
    }

    public function delete()
    {
        $id = $this->input->post(key);
        $this->load->model(model);
        $a_data = $this->{model}->delete($id);
        echo json_encode($a_data);
    }
}

?>