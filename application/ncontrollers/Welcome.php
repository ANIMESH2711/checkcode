<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


public function demo()
	
    {
        $data['title'] = "Question Upload ";

        
        $this->load->view('contact', $data);
        
    }

    public function contactSubmit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        

        if ($this->form_validation->run() == false) {
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        }
        else {
            $contactData = array(
                'name' => $this->input->post('name', true),
                'email' => $this->input->post('email', true),
                'phone' => $this->input->post('phone', true),
                'message' => $this->input->post('message', true),
                'created_at' => date('Y-m-d H:i:s')
            );

            $id = $this->page_model->insert_contact($contactData);

            $response = array(
                'status' => 'success',
                'message' => "<h3>Message send successfully.</h3>"
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}




